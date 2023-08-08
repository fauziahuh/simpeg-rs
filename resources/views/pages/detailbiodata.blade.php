<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <title>Detail Karyawan</title>

    </head>
    <body class="flex bg-gray-100 min-h-screen">
        @include('layout/topbar')
        @include('layout/sidebar')
        <main class="flex-1 pt-20 pb-8 pl-72 pr-8 bg-rose-50">
            <div class="">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="text-3xl font-bold leading-tight tracking-tight text-gray-900">Detail Biodata Karyawan</h1>
                    <span class="text-md">Melihat Data Karyawan</span>
                </div>

                <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                    <a href="{{route('employees.index')}}" class="inline-flex items-center text-sm font-medium text-rose-400 hover:text-rose-600">
                        Biodata Karyawan
                    </a>
                    </li>
                    <li aria-current="page">
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 text-sm font-medium text-gray-400 md:ml-2">Detail Biodata Karyawan</span>
                    </div>
                    </li>
                </ol>
                </nav>

                @if(session('success'))
                    <div class="w-1/2 bg-green-100 border border-green-400 text-green-700 px-4 py-3 mb-4 rounded relative">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="pt-8">
                    <div class="bg-white shadow-lg sm:rounded-lg rounded px-8 pt-6 pb-8 mb-4">
                        <div class="flex">
                            <table class="w-full text-sm text-left text-gray-500">
                                <tbody>
                                    <tr class="bg-white border-b">
                                        <td class="w-1/3 px-4 py-2 font-semibold">Nama</td>
                                        <td class="w-2/3 px-4 py-2">: {{ $employee->nama }}</td>
                                    </tr>
                                    <tr class="bg-white border-b">
                                        <td class="w-1/3 px-4 py-2 font-semibold">Jenis Kelamin</td>
                                        <td class="w-2/3 px-4 py-2">: {{ $employee->gender }}</td>
                                    </tr>
                                    <tr class="bg-white border-b">
                                        <td class="w-1/3 px-4 py-2 font-semibold">TMK</td>
                                        <td class="w-2/3 px-4 py-2">: {{ $employee->tmk }}</td>
                                    </tr>
                                    <tr class="bg-white border-b">
                                        <td class="w-1/3 px-4 py-2 font-semibold">Tgl Tetap</td>
                                        <td class="w-2/3 px-4 py-2">: {{ $employee->tgl_tetap }}</td>
                                    </tr>
                                    <tr class="bg-white border-b">
                                        <td class="w-1/3 px-4 py-2 font-semibold">Masa Kerja sejak TMK</td>
                                        <td class="w-2/3 px-4 py-2">: {{ $employee->masa_kerja_tmk }} </td>
                                    </tr>
                                    <tr class="bg-white border-b">
                                        <td class="w-1/3 px-4 py-2 font-semibold">Masa Kerja sejak Karyawan Tetap</td>
                                        <td class="w-2/3 px-4 py-2">: {{ $employee->masa_kerja_kary_tetap }} </td>
                                    </tr>
                                    <tr class="bg-white border-b">
                                        <td class="w-1/3 px-4 py-2 font-semibold">Evaluasi Tahunan</td>
                                        <td class="w-2/3 px-4 py-2">: {{ $employee->eval_tahunan }} </td>
                                    </tr>
                                    <tr class="bg-white border-b">
                                        <td class="w-1/3 px-4 py-2 font-semibold">Nomer Induk Karyawan</td>
                                        <td class="w-2/3 px-4 py-2">: {{ $employee->no_induk_kary }}</td>
                                    </tr>
                                    <tr class="bg-white border-b">
                                        <td class="w-1/3 px-4 py-2 font-semibold">Status Karyawan</td>
                                        <td class="w-2/3 px-4 py-2">: {{ $employee->status_kary }}</td>
                                    </tr>
                                    <tr class="bg-white border-b">
                                        <td class="w-1/3 px-4 py-2 font-semibold">Pelayanan</td>
                                        <td class="w-2/3 px-4 py-2">: {{ $employee->pelayanan }}</td>
                                    </tr>
                                    <tr class="bg-white border-b">
                                        <td class="w-1/3 px-4 py-2 font-semibold">Jabatan</td>
                                        <td class="w-2/3 px-4 py-2">: {{ $employee->jabatan }}</td>
                                    </tr>
                                    <tr class="bg-white border-b">
                                        <td class="w-1/3 px-4 py-2 font-semibold">Posisi</td>
                                        <td class="w-2/3 px-4 py-2">: {{ $employee->posisi }}</td>
                                    </tr>
                                    <tr class="bg-white border-b">
                                        <td class="w-1/3 px-4 py-2 font-semibold">Sanksi Karyawan</td>
                                        <td class="w-2/3 px-4 py-2">: {{ $employee->sanksi_kary }}</td>
                                    </tr>
                                    <tr class="bg-white border-b">
                                        <td class="w-1/3 px-4 py-2 font-semibold">No. BPJS Ketenagakerjaan</td>
                                        <td class="w-2/3 px-4 py-2">: {{ $employee->no_bpjs_tenaga_kerja }}</td>
                                    </tr>
                                    <tr class="bg-white border-b">
                                        <td class="w-1/3 px-4 py-2 font-semibold">No. BPJS Kesehatan</td>
                                        <td class="w-2/3 px-4 py-2">: {{ $employee->no_bpjs_kes }}</td>
                                    </tr>
                                    <tr class="bg-white border-b">
                                        <td class="w-1/3 px-4 py-2 font-semibold">No. Rek. Penggajian (BNI)</td>
                                        <td class="w-2/3 px-4 py-2">: {{ $employee->no_rek }}</td>
                                    </tr>
                                    <tr class="bg-white border-b">
                                        <td class="w-1/3 px-4 py-2 font-semibold">Presentase Gaji Pokok</td>
                                        <td class="w-2/3 px-4 py-2">: {{ $employee->percent_gaji_pokok }}</td>
                                    </tr>
                                    <tr class="bg-white border-b">
                                        <td class="w-1/3 px-4 py-2 font-semibold">Gaji Pokok</td>
                                        <td class="w-2/3 px-4 py-2">: {{ $employee->gaji_pokok }}</td>
                                    </tr>
                                    <tr class="bg-white border-b">
                                        <td class="w-1/3 px-4 py-2 font-semibold">Insentif Poin</td>
                                        <td class="w-2/3 px-4 py-2">: {{ $employee->insentif_poin }}</td>
                                    </tr>
                                    <tr class="bg-white border-b">
                                        <td class="w-1/3 px-4 py-2 font-semibold">Total Gaji Pokok</td>
                                        <td class="w-2/3 px-4 py-2">: {{ $employee->total_gaji_pokok }}</td>
                                    </tr>
                                    <tr class="bg-white border-b">
                                        <td class="w-1/3 px-4 py-2 font-semibold">Gaji Per Hari</td>
                                        <td class="w-2/3 px-4 py-2">: {{ $employee->gaji_hari }}</td>
                                    </tr>
                                    <tr class="bg-white border-b">
                                        <td class="w-1/3 px-4 py-2 font-semibold">Gaji Per Jam</td>
                                        <td class="w-2/3 px-4 py-2">: {{ $employee->gaji_jam }}</td>
                                    </tr>
                                    <tr class="bg-white border-b">
                                        <td class="w-1/3 px-4 py-2 font-semibold">TTL</td>
                                        <td class="w-2/3 px-4 py-2">: {{ $employee->ttl }}</td>
                                    </tr>
                                    <tr class="bg-white border-b">
                                        <td class="w-1/3 px-4 py-2 font-semibold">No. KTP</td>
                                        <td class="w-2/3 px-4 py-2">: {{ $employee->no_ktp }}</td>
                                    </tr>
                                    <tr class="bg-white border-b">
                                        <td class="w-1/3 px-4 py-2 font-semibold">Email</td>
                                        <td class="w-2/3 px-4 py-2">: {{ $employee->email }}</td>
                                    </tr>
                                    <tr class="bg-white border-b">
                                        <td class="w-1/3 px-4 py-2 font-semibold">No. HP</td>
                                        <td class="w-2/3 px-4 py-2">: {{ $employee->no_hp }}</td>
                                    </tr>
                                    <tr class="bg-white border-b">
                                        <td class="w-1/3 px-4 py-2 font-semibold">Alamat KTP</td>
                                        <td class="w-2/3 px-4 py-2">: {{ $employee->alamat_ktp }}</td>
                                    </tr>
                                    <tr class="bg-white border-b">
                                        <td class="w-1/3 px-4 py-2 font-semibold">Alamat Domisili</td>
                                        <td class="w-2/3 px-4 py-2">: {{ $employee->alamat_domisili }}</td>
                                    </tr>
                                    <tr class="bg-white border-b">
                                        <td class="w-1/3 px-4 py-2 font-semibold">Pendidikan Terakhir</td>
                                        <td class="w-2/3 px-4 py-2">: {{ $employee->pend_terakhir }}</td>
                                    </tr>
                                    <tr class="bg-white border-b">
                                        <td class="w-1/3 px-4 py-2 font-semibold">Jurusan</td>
                                        <td class="w-2/3 px-4 py-2">: {{ $employee->jurusan }}</td>
                                    </tr>
                                    <tr class="bg-white border-b">
                                        <td class="w-1/3 px-4 py-2 font-semibold">Nama Instansi</td>
                                        <td class="w-2/3 px-4 py-2">: {{ $employee->nama_instansi }}</td>
                                    </tr>
                                    <tr class="bg-white border-b">
                                        <td class="w-1/3 px-4 py-2 font-semibold">Nama Keluarga yang Dapat Dihubungi</td>
                                        <td class="w-2/3 px-4 py-2">: {{ $employee->guardian_name }}</td>
                                    </tr>
                                    <tr class="bg-white border-b">
                                        <td class="w-1/3 px-4 py-2 font-semibold">Hubungan dengan Karyawan</td>
                                        <td class="w-2/3 px-4 py-2">: {{ $employee->guardian_relationship }}</td>
                                    </tr>
                                    <tr class="bg-white border-b">
                                        <td class="w-1/3 px-4 py-2 font-semibold">No. HP yang Dapat Dihubungi</td>
                                        <td class="w-2/3 px-4 py-2">: {{ $employee->guardian_phone }}</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

            </div>
        </main>

    </body>
</html>
