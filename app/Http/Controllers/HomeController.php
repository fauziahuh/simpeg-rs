<?php
  
namespace App\Http\Controllers;

use App\Models\PenilaianBulanan;
use App\Models\PengajuanCuti;
use App\Models\Employee;
use App\Models\User;
use App\Models\SaldoCuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
  
class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $userLevel = $user->user_level;

        if ($userLevel == 2) {
            // Menghitung total karyawan
            $totalEmployees = Employee::where('status_emp', 'Active')->count();

            // Menghitung data pengajuan cuti yang masih pending
            $pendingApprovalCutis = PengajuanCuti::where('hr_approval', '0')->count();

            return view('pages.home', compact('user', 'totalEmployees', 'userLevel', 'pendingApprovalCutis'));

        } elseif ($userLevel == 3) {

            // Mengambil data karyawan sesuai dengan pengguna yang login
            $employee = $user->employee;
            $empId = $employee->emp_id;

            // Mengambil data saldo cuti sesuai dengan ID karyawan
            $cuti = SaldoCuti::where('emp_id', $empId)->first();

            // Mengecek data sissa cuti
            if ($cuti && $cuti->sisa_cuti !== null) {
                $sisaCuti = $cuti->sisa_cuti;
            } else {
                $sisaCuti = 'N/A';
            }

            // Menghitung data pengajuan cuti yang masih pending
            $pendingApprovalCutis = PengajuanCuti::where('manager_approval', '0')->count();

            // Mengambil data nilai bulanan terakhir
            $nilaiBulanans = PenilaianBulanan::where('emp_id', $empId)->get();

            $latestNilaiBulanan = PenilaianBulanan::where('emp_id', $empId)
                ->latest('created_at')
                ->first();

            if ($latestNilaiBulanan) {
                // Menghitung total poin nilai bulanan terakhir
                $latestNilaiBulanan->total_poin = $latestNilaiBulanan->poin_jabatan + $latestNilaiBulanan->poin_laporan + $latestNilaiBulanan->poin_presensi;

                // Menambah properti baru untuk total nilai bulanan
                $totalPoin = $latestNilaiBulanan->total_poin;

            } else {
                // Handle the case when there are no `PenilaianBulanan` records for the employee
                $totalPoin = null;
            }

            return view('pages.home', compact('user', 'userLevel', 'pendingApprovalCutis', 'sisaCuti', 'latestNilaiBulanan'));

        } elseif ($userLevel == 4) {
            // Mengambil data karyawan sesuai dengan pengguna yang login
            $employee = $user->employee;
            $empId = $employee->emp_id;

            // Mengambil data saldo cuti sesuai dengan ID karyawan
            $cuti = SaldoCuti::where('emp_id', $empId)->first();

            // Mengecek data sissa cuti
            if ($cuti && $cuti->sisa_cuti !== null) {
                $sisaCuti = $cuti->sisa_cuti;
            } else {
                $sisaCuti = 'N/A';
            }
    
            // Mengambil data nilai bulanan terakhir
            $nilaiBulanans = PenilaianBulanan::where('emp_id', $empId)->get();

            $latestNilaiBulanan = PenilaianBulanan::where('emp_id', $empId)
                ->latest('created_at')
                ->first();

            if ($latestNilaiBulanan) {
                // Menghitung total poin nilai bulanan terakhir
                $latestNilaiBulanan->total_poin = $latestNilaiBulanan->poin_jabatan + $latestNilaiBulanan->poin_laporan + $latestNilaiBulanan->poin_presensi;

                // Menambah properti baru untuk total nilai bulanan
                $totalPoin = $latestNilaiBulanan->total_poin;

            } else {
                // Handle the case when there are no `PenilaianBulanan` records for the employee
                $totalPoin = null;
            }
    
            return view('pages.home', compact('user', 'employee', 'cuti', 'sisaCuti', 'latestNilaiBulanan', 'userLevel'));
        }

        elseif ($userLevel == 5) {
            $totalUsers = User::where('user_status', 'Active')->count();
    
            return view('pages.home', compact('userLevel', 'user', 'totalUsers'));
        }

    }
}