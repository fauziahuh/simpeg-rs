<?php
 
namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\PenilaianBulanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class PenilaianBulananController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $userLevel = $user->user_level;
        
        // Jika user adalah HRD dan Eksekutif
        if ($userLevel == 2) {
            // Mengambil data karyawan yang aktif (tidak resign)
            $employees = Employee::where('status_emp', 'Active')->get();

            // Menampilkan seluruh data penilaian bulanan karyawan
            $nilaiBulanans = PenilaianBulanan::all();

            // Menghitung hasil penjumlahan semua poin
            foreach ($nilaiBulanans as $nilaiBulanan) {
                $nilaiBulanan->total_poin = $nilaiBulanan->poin_jabatan + $nilaiBulanan->poin_laporan + $nilaiBulanan->poin_presensi;
                $nilaiBulanan->rerata_poin = number_format($nilaiBulanan->total_poin / 3, 2, '.', '');
            }            
            return view('pages.nilaibulanan', compact('employees', 'nilaiBulanans', 'userLevel'));
        // Jika user adalah karyawan
        } elseif ($userLevel == 3 ||$userLevel == 4 ) {
            // Menampilkan data nilai bulanan milik user yang sedang login
            $empId = $user->employee->emp_id;
            $nilaiBulanans = PenilaianBulanan::where('emp_id', $empId)->get();

            // Menghitung hasil penjumlahan semua poin
            foreach ($nilaiBulanans as $nilaiBulanan) {
                $nilaiBulanan->total_poin = $nilaiBulanan->poin_jabatan + $nilaiBulanan->poin_laporan + $nilaiBulanan->poin_presensi;
                $nilaiBulanan->rerata_poin = number_format($nilaiBulanan->total_poin / 3, 2, '.', '');
            }
            return view('pages.nilaibulanan', compact('nilaiBulanans', 'userLevel'));
        }
    }
 
    public function store(Request $request)
    {
        // Mengambil data karyawan
        $employees = Employee::all();

        // Membuat Validator untuk validasi data pada $request (HTTP request)
        $validator = Validator::make($request->all(), [
            'emp_id' => 'required|exists:employee,emp_id',
            'jabatan' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
            'poin_jabatan' => 'required',
            'poin_laporan' => 'required',
            'poin_presensi' => 'required',
        ], [
            'emp_id.required' => 'Nama Karyawan is required',
            'emp_id.exists' => 'Invalid emp id selected.',
        ]);

        // Mengecek apakah validasi gagal
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Membuat instance penilaian bulanan baru
        $penilaianBulanan = new PenilaianBulanan;
        $penilaianBulanan->emp_id = $request->input('emp_id');
        $penilaianBulanan->jabatan = $request->input('jabatan');
        $penilaianBulanan->bulan = $request->input('bulan');
        $penilaianBulanan->tahun = $request->input('tahun');
        $penilaianBulanan->poin_jabatan = $request->input('poin_jabatan');
        $penilaianBulanan->poin_laporan = $request->input('poin_laporan');
        $penilaianBulanan->poin_presensi = $request->input('poin_presensi');

        // Menyimpan data penilaian bulanan yang baru dibuat ke database
        $penilaianBulanan->save();

        // Mengembalikan ke laman Penilaian Bulanan dengan pesan sukses
        return redirect()->route('penilaianbulananHrd.index')->with('success', 'Data penilaian bulanan berhasil ditambahkan');
    }

    public function delete($nilai_bulanan_id)
    {
        $nilaiBulanan = PenilaianBulanan::findOrFail($nilai_bulanan_id);
        $nilaiBulanan->delete();

        return redirect()->route('penilaianbulananHrd.index')->with('success', 'Data penilaian bulanan berhasil dihapus');
    }
}
