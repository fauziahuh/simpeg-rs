<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BiodataExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Employee::select(
            'nama',
            'gender',
            'tmk',
            'tgl_tetap',
            'masa_kerja_tmk',
            'masa_kerja_kary_tetap',
            'eval_tahunan',
            'no_surat_perj_kerja',
            'pelayanan',
            'jabatan',
            'posisi',
            'sanksi_kary',
            'no_bpjs_tenaga_kerja',
            'no_bpjs_kes',
            'no_rek',
            'percent_gaji_pokok',
            'gaji_pokok',
            'insentif_poin',
            'total_gaji_pokok',
            'gaji_hari',
            'gaji_jam',
            'ttl',
            'no_ktp',
            'email',
            'no_hp',
            'alamat_ktp',
            'alamat_domisili',
            'pend_terakhir',
            'jurusan',
            'nama_instansi',
            'guardian_name',
            'guardian_relationship',
            'guardian_phone'
        )->get();
    }


    public function headings(): array
    {
        return [
            'Nama',
            'Jenis Kelamin',
            'TMK',
            'Tgl Tetap',
            'Masa Kerja sejak TMK',
            'Masa Kerja sejak Karyawan Tetap',
            'Evaluasi Tahunan',
            'Nomor Induk Karyawan',
            'Status Karyawan',
            'Nomor Surat Perjanjian Kerja',
            'Pelayanan',
            'Jabatan',
            'Posisi',
            'Sanksi Karyawan',
            'No BPJS Ketenagakerjaan',
            'No BPJS Kesehatan',
            'No Rekening Penggajian (BNI)',
            'Presentase Gaji Pokok',
            'Gaji Pokok',
            'Insentif Poin',
            'Total Gaji Pokok',
            'Gaji Per Hari',
            'Gaji Per Jam',
            'TTL',
            'No KTP',
            'Email',
            'No HP',
            'Alamat KTP',
            'Alamat Domisili',
            'Pendidikan Terakhir',
            'Jurusan',
            'Nama Instansi',
            'Nama Keluarga yang Dapat Dihubungi',
            'Hubungan dengan Karyawan',
            'No HP yang Dapat Dihubungi',
        ];
    }
}