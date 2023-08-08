<?php
 
namespace App\Http\Controllers;

use App\Models\PengajuanCuti;
use App\Models\SaldoCuti;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
 
 class CutiController extends Controller
 {

    public function index()
    {
        // Mengambil data pengguna yang login (terautentikasi)
        $user = Auth::user();
        
        // Mengambil data karyawan yang berhubungan dengan pengguna yang login
        $employee = $user->employee;
        $empId = $user->employee->emp_id;

        // Mengambil data saldo cuti sesuai dengan ID karyawan
        $cuti = SaldoCuti::where('emp_id', $empId)->first();

        // Mengecek data saldo cuti
        if ($cuti instanceof SaldoCuti) {
            $sisaCuti = $cuti->sisa_cuti;
        } else {
            $sisaCuti = N/A;
        }

        // Mengambil data pengajuan cuti untuk pengguna yang login
        $pengajuanCutis = PengajuanCuti::with(['employee', 'saldo_cuti'])
        ->where('emp_id', $empId)
        ->get();

        return view('pages.cutikaryawan', compact('sisaCuti','pengajuanCutis'));
    }

    public function create()
    {
        return view('pages.pengajuancutibaru');
    }

    public function store(Request $request)
    {
        // Mengambil data pengguna yang login
        $user = Auth::user();

        // Mengambil data karyawan yang berhubungan dengan pengguna yang login
        $employee = $user->employee;

        // Mengambil data user level dari pengguna yang login
        $userLevel = $user->user_level;

        // Validasi data masukan (input)
        $request->validate([
            'alasan_cuti' => 'required|max:50',
            'mulai_cuti' => 'required|date',
            'akhir_cuti' => 'required|date|after_or_equal:mulai_cuti',
            'tgl_masuk' => 'required|date',
            'pengganti_jaga' => 'required|max:255',
        ]);

        // Membuat instance baru untuk PengajuanCuti
        $pengajuanCuti = new PengajuanCuti();

        // ID karyawan pada pengajuan cuti sama dengan ID karyawan yang login
        $pengajuanCuti->emp_id = $employee->emp_id;

        // Field lainnya
        $pengajuanCuti->alasan_cuti = $request->input('alasan_cuti');
        $pengajuanCuti->mulai_cuti = $request->input('mulai_cuti');
        $pengajuanCuti->akhir_cuti = $request->input('akhir_cuti');
        $pengajuanCuti->tgl_masuk = $request->input('tgl_masuk');
        $pengajuanCuti->pengganti_jaga = $request->input('pengganti_jaga');

        // Set nilai default = 0 (status pending)
        $pengajuanCuti->manager_approval = 0;
        $pengajuanCuti->hr_approval = 0;

        // Mengecek dan mengambil data saldo cuti karyawan
        $saldoCuti = SaldoCuti::where('emp_id', $pengajuanCuti->emp_id)->first();
        if (!$saldoCuti) {
            // Buat data saldo cuti baru jika data tidak ditemukan
            $saldoCuti = new SaldoCuti();
            $saldoCuti->emp_id = $pengajuanCuti->emp_id;
            $saldoCuti->jatah_cuti = 15; // Set jatah cuti yang diperbolehkan
        }

        // Menyimpan data saldo cuti
        $saldoCuti->save();

        // Menghitung jumlah hari pengambilan cuti untuk setiap data (dari field mulai_muti dan akhir_cuti)
        $startDate = $pengajuanCuti->mulai_cuti;
        $endDate = $pengajuanCuti->akhir_cuti;
        $leaveDays = Carbon::parse($endDate)->diffInDays(Carbon::parse($startDate)) + 1;

        // Menyimpan data pengajuan cuti
        $pengajuanCuti->save();

        $routeName = '';

        if ($userLevel == 3) {
            $routeName = 'cutiKasie.index'; // Rute untuk Kasie
        } elseif ($userLevel == 4) {
            $routeName = 'cutiEmp.index'; // Rute untuk karyawan
        } else {
            // Handle other user roles or set a default route if needed
        }

        // Mengembalikan ke laman Pengajuan Cuti dengan pesan sukses
        return redirect()->route($routeName)->with('success', 'Pengajuan Cuti berhasil disimpan.');
    }

    public function showApproval()
    {
        $user = Auth::user();
        $userLevel = $user->user_level;

        // Mengambil semua data pengajuan cuti with related Employee and SaldoCuti
        $pengajuanCutis = PengajuanCuti::with(['employee', 'saldo_cuti'])->get();

        foreach ($pengajuanCutis as $pengajuanCuti) {

            // Menghitung jumlah hari pengambilan cuti untuk setiap data (dari field mulai_muti dan akhir_cuti)
            $startDate = $pengajuanCuti->mulai_cuti;
            $endDate = $pengajuanCuti->akhir_cuti;
            $leaveDays = Carbon::parse($endDate)->diffInDays(Carbon::parse($startDate)) + 1;
    
            // Menambah properti baru (lama_cuti) untuk setiap data $pengajuanCuti
            $pengajuanCuti->lama_cuti = $leaveDays;
        }

        return view('pages.approvalcuti', compact('leaveDays', 'pengajuanCutis', 'userLevel'));
    }

    public function processApproval(Request $request)
    {
        // Mengambil nilai button yang diklik dari request
        $action = $request->input('action');
        // Mengambil ID pengajuan cuti dari request
        $cutiId = $request->input('cuti_id');
        // Mengambil data pengajuan cuti sesuai dengan ID pengajuan cuti yang dibawa
        $pengajuanCuti = PengajuanCuti::find($cutiId);

        // Pengecekan nilai aksi
        // Pengajuan cuti ditolak Kasie 
        if ($action === 'kasie_tolak') { 
            $pengajuanCuti->manager_approval = 2;   // Set nilai manager_spproval = 2 (Ditolak)
            $pengajuanCuti->hr_approval = 2;        // Set nilai hr_spproval = 2 (Ditolak)
        } 
        // Pengajuan cuti disetujui Kasie
        elseif ($action === 'kasie_setuju') { 
            $pengajuanCuti->manager_approval = 1;   // Set nilai manager_spproval = 1 (Disetujui) 
            $pengajuanCuti->save();                 // Simpan perbaruan status
        } 
        // Pengajuan cuti ditolak HRD
        elseif ($action === 'hr_tolak') { 
            $pengajuanCuti->hr_approval = 2;        // Set nilai hr_spproval = 2 (Ditolak) 
        } 
        // Pengajuan cuti disetujui HRD
        elseif ($action === 'hr_setuju') {

            // Menghitung jumlah hari pengambilan cuti untuk setiap data (dari field mulai_muti dan akhir_cuti)
            $startDate = $pengajuanCuti->mulai_cuti;
            $endDate = $pengajuanCuti->akhir_cuti;
            $leaveDays = Carbon::parse($endDate)->diffInDays(Carbon::parse($startDate)) + 1;
        
            // Mengecek apakah jumlah hari pengambilan cuti melebihi sisa_cuti
            $saldoCuti = SaldoCuti::where('emp_id', $pengajuanCuti->emp_id)->first();
            $availableBalance = $saldoCuti->jatah_cuti - $saldoCuti->ambil_cuti;
        
            if ($leaveDays > $availableBalance) {
                // Jika jumlah hari pengambilan cuti melebihi sisa cuti, tampilkan pesan error dan proses approval dibatalkan
                return redirect()->back()->with('error', 'Jumlah pengambilan cuti melebihi sisa cuti');
            } else {
                // Jika jumlah hari pengambilan cuti tidak melebihi sisa cuti, perbarui data SaldoCuti
                $saldoCuti = SaldoCuti::updateOrCreate(
                    ['emp_id' => $pengajuanCuti->emp_id],
                    ['ambil_cuti' => $leaveDays]
                );
                $saldoCuti->sisa_cuti = $saldoCuti->jatah_cuti - $saldoCuti->ambil_cuti;
            
                $saldoCuti->save();
            
                // Set nilai hr_spproval = 1 (Disetujui) setelahpengecekan saldo cuti
                $pengajuanCuti->hr_approval = 1; // Approved by HR
                $pengajuanCuti->save();
            }
        }

        // Menyimpan status pengajuan ke basis data
        $pengajuanCuti->save();

        // Mengembalikan ke laman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Status approval berhasil diperbarui');
    }
 }