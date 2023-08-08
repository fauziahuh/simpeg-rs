<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function index()
    {
        // Mendapat data pengguna yang sedang login
        $user = Auth::user();

        // Mengambil data karyawan sesuai dengan pengguna yang login
        $employee = $user->employee;

        // Menampilkan laman profil dengan membawa data karyawan
        return view('pages.profil', compact('employee'));
    }
}

