<?php
 
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

 
class UserManagementController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('pages.usermanagement', compact('users'));
    }

    public function create()
    {
        return view('pages.tambahuser');
    }

    public function store(Request $request)
    {
        // Membuat Validator untuk validasi data pada $request (HTTP request)
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|unique:users,email',
            'username' => 'required|string|max:25|unique:users,username',
            'password' => 'required|string|min:5',
            'user_level' => 'required|integer|min:1',
            'user_status' => 'required'
        ]);
    
        // Mengecek apakah validasi gagal
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput(); // Mengembalikan ke laman sebelumnya dengan pesan error
        }
 
        // Membuat instance pengguna baru
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->username = $request->input('username');
        $user->password = Hash::make($request->input('password'));
        $user->user_level = $request->input('user_level');
        $user->user_status = $request->input('user_status');

        // Menyimpan data pengguna baru ke database
        $user->save();

        // Mengembalikan ke laman User Management dengan pesan sukses
        return redirect()->route('usermanagement.index')->with('success', 'Data pengguna berhasil ditambahkan');
    }

    public function edit($id)
    {
        $user = User::find($id);
        // Mengecek apakah data pengguna ada
        if (!$user) {
            abort(404);
        }
        return view('pages.edituser', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        
        // Memperbarui data berdasarkan masukan pengguna
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->username = $request->input('username');
        $user->user_level = $request->input('user_level');
        $user->user_status = $request->input('user_status');

        // Mengecek apakah password kosong
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password')); // Perbarui password dengan enkripsi
        }
        
        // Menyimpan data pengguna yang diperbarui ke database
        $user->save();

        // mengembalikan ke laman User Management dengan pesan sukses
        return redirect()->route('usermanagement.index')->with('success', 'Data pengguna berhasil diubah dan diperbarui');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    
        return redirect()->route('usermanagement.index')->with('success', 'Data pengguna berhasil dihapus');
    }


    
}
