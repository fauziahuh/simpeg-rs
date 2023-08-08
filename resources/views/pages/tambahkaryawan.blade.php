<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <title>Tambah Karyawan</title>

    </head>
    <body class="flex bg-gray-100 min-h-screen">
        @include('layout/topbar')
        @include('layout/sidebar')
        <main class="flex-1 pt-20 pb-8 pl-72 pr-8 bg-rose-50">
            <div class="">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="text-3xl font-bold leading-tight tracking-tight text-gray-900">Tambah Data Karyawan</h1>
                    <span class="text-md">Menambah Data Karyawan</span>
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
                        <span class="ml-1 text-sm font-medium text-gray-400 md:ml-2">Tambah Data Karyawan</span>
                    </div>
                    </li>
                </ol>
                </nav>

                @if($errors->any())
                    <div class="w-1/2 bg-red-100 border border-red-400 text-red-700 px-4 py-3 mb-4 rounded relative">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="pt-8">
                    <form action="{{ route('employees.store') }}" method="POST" class="bg-white shadow-lg sm:rounded-lg rounded px-8 pt-6 pb-8 mb-4">
                        @csrf
                        <div class="md:flex md:items-center mb-6">        
                            <div class="md:w-1/4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="nama">
                                    Nama
                                </label>
                            </div>
                            <div class="md:w-3/4">
                                <input required="" class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" name="nama" type="text" placeholder="" shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500">
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="gender">
                                    Jenis Kelamin
                                </label>
                            </div>
                            <div class="md:w-3/4 flex items-center">
                                <div class="md:w-1/4">
                                    <input name="gender" type="radio" value="Laki-Laki" class="w-4 h-4 text-rose-800 bg-gray-100 border-gray-300">
                                    <label for="inline-radio" class="ml-2 text-sm font-medium text-gray-900">Laki-Laki</label>
                                </div>
                                <div class="md:w-1/4 mr-4">
                                    <input name="gender" type="radio" value="Perempuan" class="w-4 h-4 text-rose-800 bg-gray-100 border-gray-300">
                                    <label for="inline-2-radio" class="ml-2 text-sm font-medium text-gray-900">Perempuan</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="md:flex md:items-center mb-6">        
                            <div class="md:w-1/4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="tmk">
                                    TMK
                                </label>
                            </div>
                            <div class="md:w-1/4">
                                <input required="" class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" name="tmk" type="date" placeholder="">
                            </div>
                        </div>

                        <div class="md:flex md:items-center mb-6">        
                            <div class="md:w-1/4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="tgl_tetap">
                                    Tanggal Tetap
                                </label>
                            </div>
                            <div class="md:w-1/4">
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" name="tgl_tetap" type="date" placeholder="">
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">        
                            <div class="md:w-1/4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="masa_kerja_tmk">
                                    Masa Kerja Sejak TMK
                                </label>
                            </div>
                            <div class="md:w-3/4">
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" name="masa_kerja_tmk" type="text" placeholder="">
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">        
                            <div class="md:w-1/4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="masa_kerja_kary_tetap">
                                    Masa Kerja Sejak Karyawan Tetap
                                </label>
                            </div>
                            <div class="md:w-3/4">
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" name="masa_kerja_kary_tetap" type="text" placeholder="">
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">        
                            <div class="md:w-1/4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="eval_tahunan">
                                    Evaluasi Tahunan
                                </label>
                            </div>
                            <div class="md:w-3/4">
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" name="eval_tahunan" type="text" placeholder="">
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">        
                            <div class="md:w-1/4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="no_induk_kary">
                                    Nomor Induk Karyawan
                                </label>
                            </div>
                            <div class="md:w-3/4">
                                <input required="" class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" name="no_induk_kary" type="text" placeholder="">
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">        
                            <div class="md:w-1/4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="status_kary">
                                    Status Karyawan
                                </label>
                            </div>
                            <div class="md:w-3/4">
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" name="status_kary" type="text" placeholder="">
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">        
                            <div class="md:w-1/4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="pelayanan">
                                    Pelayanan
                                </label>
                            </div>
                            <div class="md:w-3/4">
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" name="pelayanan" type="text" placeholder="">
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">        
                            <div class="md:w-1/4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="jabatan">
                                    Jabatan
                                </label>
                            </div>
                            <div class="md:w-3/4">
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" name="jabatan" type="text" placeholder="">
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">        
                            <div class="md:w-1/4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="posisi">
                                    Posisi
                                </label>
                            </div>
                            <div class="md:w-3/4">
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" name="posisi" type="text" placeholder="">
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">        
                            <div class="md:w-1/4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="sanksi_kary">
                                    Sanksi Karyawan
                                </label>
                            </div>
                                <div class="md:w-3/4">
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" name="sanksi_kary" type="text" placeholder="">
                                </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">        
                            <div class="md:w-1/4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="no_bpjs_tenaga_kerja">
                                    No. BPJS Ketenagakerjaan
                                </label>
                            </div>
                            <div class="md:w-3/4">
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" name="no_bpjs_tenaga_kerja" type="text" placeholder="">
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">        
                            <div class="md:w-1/4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="no_bpjs_kes">
                                    No. BPJS Kesehatan
                                </label>
                            </div>
                            <div class="md:w-3/4">
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" name="no_bpjs_kes" type="text" placeholder="">
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">        
                            <div class="md:w-1/4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="no_rek">
                                    No. Rek. Penggajian (BNI)
                                </label>
                            </div>
                            <div class="md:w-3/4">
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" name="no_rek" type="text" placeholder="">
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">        
                            <div class="md:w-1/4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="percent_gaji_pokok">
                                    Presentase Gaji Pokok
                                </label>
                            </div>
                            <div class="md:w-3/4">
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" name="percent_gaji_pokok" type="number" placeholder="">
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">        
                            <div class="md:w-1/4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="gaji_pokok">
                                    Gaji Pokok
                                </label>
                            </div>
                            <div class="md:w-3/4">
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" name="gaji_pokok" type="number" placeholder="">
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">        
                            <div class="md:w-1/4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="insentif_poin">
                                    Insentif Poin
                                </label>
                            </div>
                            <div class="md:w-3/4">
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" name="insentif_poin" type="number" placeholder="">
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">        
                            <div class="md:w-1/4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="total_gaji_pokok">
                                    Total Gaji Pokok
                                </label>
                            </div>
                            <div class="md:w-3/4">
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" name="total_gaji_pokok" type="number" placeholder="">
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">        
                            <div class="md:w-1/4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="gaji_hari">
                                    Gaji Per Hari
                                </label>
                            </div>
                            <div class="md:w-3/4">
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" name="gaji_hari" type="number" placeholder="">
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">        
                            <div class="md:w-1/4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="gaji_jam">
                                    Gaji Per Jam
                                </label>
                            </div>
                            <div class="md:w-3/4">
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" name="gaji_jam" type="number" placeholder="">
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">        
                            <div class="md:w-1/4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="ttl">
                                    TTL
                                </label>
                            </div>
                            <div class="md:w-3/4">
                                <input required="" class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" name="ttl" type="text" placeholder="">
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">        
                            <div class="md:w-1/4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="no_ktp">
                                    Nomor KTP
                                </label>
                            </div>
                            <div class="md:w-3/4">
                                <input required="" class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" name="no_ktp" type="text" placeholder="">
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">        
                            <div class="md:w-1/4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                                    Email
                                </label>
                            </div>
                            <div class="md:w-3/4">
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" name="email" type="text" placeholder="">
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">        
                            <div class="md:w-1/4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="no_hp">
                                    Nomor HP
                                </label>
                            </div>
                            <div class="md:w-3/4">
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" name="no_hp" type="text" placeholder="">
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">        
                            <div class="md:w-1/4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="alamat_ktp">
                                    Alamat KTP
                                </label>
                            </div>
                            <div class="md:w-3/4">
                                <input required="" class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" name="alamat_ktp" type="text" placeholder="">
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">        
                            <div class="md:w-1/4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="alamat_domisili">
                                    Alamat Domisili
                                </label>
                            </div>
                            <div class="md:w-3/4">
                                <input required="" class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" name="alamat_domisili" type="text" placeholder="">
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">        
                            <div class="md:w-1/4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="pend_terakhir">
                                    Pendidikan Terakhir
                                </label>
                            </div>
                            <div class="md:w-3/4">
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" name="pend_terakhir" type="text" placeholder="">
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">        
                            <div class="md:w-1/4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="jurusan">
                                    Jurusan
                                </label>
                            </div>
                            <div class="md:w-3/4">
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" name="jurusan" type="text" placeholder="">
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">        
                            <div class="md:w-1/4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="nama_instansi">
                                    Nama Instansi
                                </label>
                            </div>
                            <div class="md:w-3/4">
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" name="nama_instansi" type="text" placeholder="">
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">        
                            <div class="md:w-1/4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="guardian_name">
                                    Nama Keluarga yang Dapat Dihubungi
                                </label>
                            </div>
                            <div class="md:w-3/4">
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" name="guardian_name" type="text" placeholder="">
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">        
                            <div class="md:w-1/4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="guardian_relationship">
                                    Hubungan dengan Karyawan
                                </label>
                            </div>
                            <div class="md:w-3/4">
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" name="guardian_relationship" type="text" placeholder="">
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">        
                            <div class="md:w-1/4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="guardian_phone">
                                    No. HP yang Dapat Dihubungi
                                </label>
                            </div>
                            <div class="md:w-3/4">
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" name="guardian_phone" type="text" placeholder="">
                            </div>
                        </div>
                        
                        <div class="flex items-center ">
                            <button class="bg-white hover:bg-rose-50 text-rose-800 border border-rose-800 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-2" type="button" onclick="window.history.back();">
                                Cancel
                            </button>
                            <button class="bg-rose-800 hover:bg-rose-900 text-white border border-rose-800 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                Save
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </main>

    </body>
</html>
