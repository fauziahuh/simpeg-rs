<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PenilaianBulananController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\ProfilController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('/pages/login');
});

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::get('home', [HomeController::class, 'index'])->name('home.index')->middleware('auth');

Route::get('/grading', function () {
    return view('/pages/grading');
});

Route::get('/yearly', function () {
    return view('/pages/yearlygrading');
});

Route::get('/tambahnilaitahunan', function () {
    return view('/pages/tambahnilaitahunan');
});


Route::middleware(['auth'])->group(function () {

    Route::get('home', [HomeController::class, 'index'])->name('home.index')->middleware('auth');

    // Definisi rute untuk HRD dan Eksekutif Faskes
    Route::middleware('check_user_level:2')->group(function () {
        Route::get('/biodata-karyawan', [EmployeeController::class, 'index'])->name('employees.index');
        Route::get('/biodata-karyawan/{emp_id}/show', [EmployeeController::class, 'show'])->name('employees.show');
        Route::get('/biodata-karyawan/create', [EmployeeController::class, 'create'])->name('employees.create');
        Route::post('/biodata-karyawan/create', [EmployeeController::class, 'store'])->name('employees.store');
        Route::get('/biodata-karyawan/{emp_id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
        Route::put('/biodata-karyawan/{emp_id}/update', [EmployeeController::class, 'update'])->name('employees.update');
        Route::delete('/biodata-karyawan/{emp_id}', [EmployeeController::class, 'delete'])->name('employees.delete');
        Route::get('/export-biodata', [EmployeeController::class, 'exportBiodata'])->name('employees.export');

        Route::get('/karyawan-resign', [EmployeeController::class, 'resignedEmployees'])->name('employees.resigned');

        Route::get('/penilaian-bulanan/hrd', [PenilaianBulananController::class, 'index'])->name('penilaianbulananHrd.index');
        Route::post('/penilaian-bulanan/create', [PenilaianBulananController::class, 'store'])->name('penilaianbulanan.store');
        Route::delete('/penilaian-bulanan/{nilai_bulanan_id}', [PenilaianBulananController::class, 'delete'])->name('penilaianbulanan.delete');

        Route::get('/approval-cuti/hrd', [CutiController::class, 'showApproval'])->name('approvalHrd.index');
        Route::post('/approval-cuti/process/hrd', [CutiController::class, 'processApproval'])->name('approvalHrd.process');
    });

    // Definisi rute untuk Kepala Seksi
    Route::middleware('check_user_level:3')->group(function () {
        Route::get('/profil', [ProfilController::class, 'index'])->name('profilKasie.index');
        Route::get('/penilaian-bulanan/kasie', [PenilaianBulananController::class, 'index'])->name('penilaianbulananKasie.index');

        Route::get('/cuti/kasie', [CutiController::class, 'index'])->name('cutiKasie.index');
        Route::get('/cuti/create/kasie', [CutiController::class, 'create'])->name('cutiKasie.create');
        Route::post('/cuti/create/kasie', [CutiController::class, 'store'])->name('cutiKasie.store');

        Route::get('/approval-cuti/kasie', [CutiController::class, 'showApproval'])->name('approvalKasie.index');
        Route::post('/approval-cuti/process/kasie', [CutiController::class, 'processApproval'])->name('approvalKasie.process');
    });

    // Definisi rute untuk Karyawan
    Route::middleware('check_user_level:4')->group(function () {
        Route::get('/profil/karyawan', [ProfilController::class, 'index'])->name('profilEmp.index');
        Route::get('/penilaian-bulanan/karyawan', [PenilaianBulananController::class, 'index'])->name('penilaianbulananEmp.index');
        Route::get('/cuti/karyawan', [CutiController::class, 'index'])->name('cutiEmp.index');
        Route::get('/cuti/create/karyawan', [CutiController::class, 'create'])->name('cutiEmp.create');
        Route::post('/cuti/create/karyawan', [CutiController::class, 'store'])->name('cutiEmp.store');
    });

    // Definisi rute untuk Operator IT
    Route::middleware('check_user_level:5')->group(function () {
        Route::get('/usermanagement', [UserManagementController::class, 'index'])->name('usermanagement.index');
        Route::get('/usermanagement/create', [UserManagementController::class, 'create'])->name('usermanagement.create');
        Route::post('/usermanagement/create', [UserManagementController::class, 'store'])->name('usermanagement.store');
        Route::get('/usermanagement/{id}/edit', [UserManagementController::class, 'edit'])->name('usermanagement.edit');
        Route::put('/usermanagement/{id}/update', [UserManagementController::class, 'update'])->name('usermanagement.update');
        Route::delete('/usermanagement/{id}', [UserManagementController::class, 'delete'])->name('usermanagement.delete');
    });    
});











