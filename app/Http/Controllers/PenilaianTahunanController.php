<?php
 
namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\PenilaianBulanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class PenilaianTahunanController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        $nilaiBulanans = PenilaianBulanan::all();

        // Calculate the accumulated points for each row
        foreach ($nilaiBulanans as $nilaiBulanan) {
            $nilaiBulanan->poin = $nilaiBulanan->poin_jabatan + $nilaiBulanan->poin_laporan + $nilaiBulanan->poin_presensi;
        }

        return view('pages.nilaibulanan', compact('employees', 'nilaiBulanans'));
    }
 

    public function store(Request $request)
    {
        // dd($request->all());
        // Validate the input fields
        $validator = Validator::make($request->all(), [
            'emp_id' => 'required|exists:employee,emp_id',
            'jabatan' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
            'poin_jabatan' => 'required',
            'poin_laporan' => 'required',
            'poin_presensi' => 'required',
        ], [
            'emp_id.required' => 'The emp id field harus required.',
            'emp_id.exists' => 'Invalid emp id selected.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create a new monthly grading instance
        $penilaianBulanan = new PenilaianBulanan;
        $penilaianBulanan->emp_id = $request->input('emp_id');
        $penilaianBulanan->jabatan = $request->input('jabatan');
        $penilaianBulanan->bulan = $request->input('bulan');
        $penilaianBulanan->tahun = $request->input('tahun');
        $penilaianBulanan->poin_jabatan = $request->input('poin_jabatan');
        $penilaianBulanan->poin_laporan = $request->input('poin_laporan');
        $penilaianBulanan->poin_presensi = $request->input('poin_presensi');
        // Assign other input fields in the grading system to the corresponding attributes

        // Save the monthly grading to the database
        $penilaianBulanan->save();

        // Redirect to a success page or return a response as needed
        $employees = Employee::all();
        $request->session()->put('employees', $employees);
        return redirect()->route('penilaianbulanan.index')->with('success', 'Monthly grading created successfully');
    }

    public function destroy($nilai_bulanan_id)
    {
        $nilaiBulanan = PenilaianBulanan::findOrFail($nilai_bulanan_id);
        $nilaiBulanan->delete();

        return redirect()->route('penilaianbulanan.index')->with('success', 'Monthly grading deleted successfully');
    }

}