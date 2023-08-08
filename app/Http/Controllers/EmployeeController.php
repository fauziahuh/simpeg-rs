<?php
 
namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\SaldoCuti;
use App\Exports\BiodataExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
 
class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::where('status_emp', 'Active')->get();

        return view('pages.employees', compact('employees'));
    }

    public function show($emp_id)
    {
        $employee = Employee::findOrFail($emp_id);

        return view('pages.detailbiodata', compact('employee'));
    }

    public function create()
    {
        return view('pages.tambahkaryawan');
    }

    public function store(Request $request)
    {
        // Membuat Validator untuk validasi data pada $request (HTTP request)
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'gender' => 'required',
            'tmk' => 'required',
            'no_induk_kary' => 'required',
            'ttl' => 'required',
            'no_ktp' => 'required',
            'alamat_ktp' => 'required',
            'alamat_domisili' => 'required',
        ]);
    
        // Mengecek apakah validasi gagal
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput(); // Mengembalikan ke laman sebelumnya dengan pesan error
        }

        // Membuat instance karyawan baru
        $employee = new Employee;
        $employee->nama = $request->input('nama');
        $employee->gender = $request->input('gender');
        $employee->tmk = $request->input('tmk');
        $employee->tgl_tetap = $request->input('tgl_tetap');
        $employee->masa_kerja_tmk = $request->input('masa_kerja_tmk');
        $employee->masa_kerja_kary_tetap = $request->input('masa_kerja_kary_tetap');
        $employee->eval_tahunan = $request->input('eval_tahunan');
        $employee->no_induk_kary = $request->input('no_induk_kary');
        $employee->status_kary = $request->input('status_kary');
        $employee->pelayanan = $request->input('pelayanan');
        $employee->jabatan = $request->input('jabatan');
        $employee->posisi = $request->input('posisi');
        $employee->sanksi_kary = $request->input('sanksi_kary');
        $employee->no_bpjs_tenaga_kerja = $request->input('no_bpjs_tenaga_kerja');
        $employee->no_bpjs_kes = $request->input('no_bpjs_kes');
        $employee->no_rek = $request->input('no_rek');
        $employee->percent_gaji_pokok = $request->input('percent_gaji_pokok');
        $employee->gaji_pokok = $request->input('gaji_pokok');
        $employee->insentif_poin = $request->input('insentif_poin');
        $employee->total_gaji_pokok = $request->input('total_gaji_pokok');
        $employee->gaji_hari = $request->input('gaji_hari');
        $employee->gaji_jam = $request->input('gaji_jam');
        $employee->ttl = $request->input('ttl');
        $employee->no_ktp = $request->input('no_ktp');
        $employee->email = $request->input('email');
        $employee->no_hp = $request->input('no_hp');
        $employee->alamat_ktp = $request->input('alamat_ktp');
        $employee->alamat_domisili = $request->input('alamat_domisili');
        $employee->pend_terakhir = $request->input('pend_terakhir');
        $employee->jurusan = $request->input('jurusan');
        $employee->nama_instansi = $request->input('nama_instansi');
        $employee->guardian_name = $request->input('guardian_name');
        $employee->guardian_relationship = $request->input('guardian_relationship');
        $employee->guardian_phone = $request->input('guardian_phone');
        
        // Menyimpan data karyawan yang baru dibuat ke database
        $employee->save();

        // Mengarahkan ke laman Detail Biodata Karyawan dengan pesan sukses
        return redirect()->route('employees.show', ['emp_id' => $employee->emp_id])->with('success', 'Data karyawan berhasil ditambahkan');
    }

    public function edit($emp_id)
    {
        $employee = Employee::find($emp_id);
        // Mengecek apakah data pengguna ada
        if (!$employee) {
            abort(404); 
        }
        return view('pages.editbiodata', compact('employee'));
    }

    public function update(Request $request, $emp_id)
    {
        $employee = Employee::find($emp_id);
        // Mengecek apakah data pengguna ada
        if (!$employee) {
            abort(404); 
        }

        // Membuat Validator untuk validasi data pada $request (HTTP request)
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'status_emp' => 'required',
            'gender' => 'required',
            'tmk' => 'required',
            'no_induk_kary' => 'required',
            'ttl' => 'required',
            'no_ktp' => 'required',
            'alamat_ktp' => 'required',
            'alamat_domisili' => 'required',
        ]);
    
        // Mengecek apakah validasi gagal
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput(); // Mengembalikan ke laman sebelumnya dengan pesan error
        }

        $oldEmployeeStatus = $employee->status_emp;
        
        // Memperbarui data berdasarkan masukan pengguna
        $employee->nama = $request->input('nama');
        $employee->status_emp = $request->input('status_emp');
        $employee->gender = $request->input('gender');
        $employee->tmk = $request->input('tmk');
        $employee->tgl_tetap = $request->input('tgl_tetap');
        $employee->masa_kerja_tmk = $request->input('masa_kerja_tmk');
        $employee->masa_kerja_kary_tetap = $request->input('masa_kerja_kary_tetap');
        $employee->eval_tahunan = $request->input('eval_tahunan');
        $employee->no_induk_kary = $request->input('no_induk_kary');
        $employee->status_kary = $request->input('status_kary');
        $employee->pelayanan = $request->input('pelayanan');
        $employee->jabatan = $request->input('jabatan');
        $employee->posisi = $request->input('posisi');
        $employee->sanksi_kary = $request->input('sanksi_kary');
        $employee->no_bpjs_tenaga_kerja = $request->input('no_bpjs_tenaga_kerja');
        $employee->no_bpjs_kes = $request->input('no_bpjs_kes');
        $employee->no_rek = $request->input('no_rek');
        $employee->percent_gaji_pokok = $request->input('percent_gaji_pokok');
        $employee->gaji_pokok = $request->input('gaji_pokok');
        $employee->insentif_poin = $request->input('insentif_poin');
        $employee->total_gaji_pokok = $request->input('total_gaji_pokok');
        $employee->gaji_hari = $request->input('gaji_hari');
        $employee->gaji_jam = $request->input('gaji_jam');
        $employee->ttl = $request->input('ttl');
        $employee->no_ktp = $request->input('no_ktp');
        $employee->email = $request->input('email');
        $employee->no_hp = $request->input('no_hp');
        $employee->alamat_ktp = $request->input('alamat_ktp');
        $employee->alamat_domisili = $request->input('alamat_domisili');
        $employee->pend_terakhir = $request->input('pend_terakhir');
        $employee->jurusan = $request->input('jurusan');
        $employee->nama_instansi = $request->input('nama_instansi');
        $employee->guardian_name = $request->input('guardian_name');
        $employee->guardian_relationship = $request->input('guardian_relationship');
        $employee->guardian_phone = $request->input('guardian_phone');
        
        // Menyimpan data karyawan yang diperbarui ke database
        $employee->save();

        // Mengecek apakah status keaktifan diubah
        if ($oldEmployeeStatus !== $employee->status_emp && $employee->status_emp === 'Resigned') {
            return redirect()->route('employees.resigned')->with('success', 'Data karyawan berhasil dipindah ke laman Karyawan Resign'); // Mengarahkan ke laman Karyawan Resign
        } else {
            // Mengarahkan ke laman Detail Biodata Karyawan dengan pesan sukses
            return redirect()->route('employees.show', ['emp_id' => $emp_id])->with('success', 'Data karyawan berhasil diperbarui');
        }

        
    }

    public function delete($emp_id)
    {
        $employee = Employee::findOrFail($emp_id);
        $employee->delete();
    
        return redirect()->route('employees.index')->with('success', 'Data karyawan berhasil dihapus');
    }

    public function exportBiodata()
    {
        return Excel::download(new BiodataExport, 'biodata-karyawan.xlsx');
    }

    public function resignedEmployees()
    {
        $resignedEmployees = Employee::where('status_emp', 'Resigned')->get();

        return view('pages.resigned', compact('resignedEmployees'));
    }

    
}
