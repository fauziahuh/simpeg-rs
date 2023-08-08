<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('layout/initialization')
        <title>Penilaian Bulanan</title>

    </head>
    <body class="flex bg-gray-100 min-h-screen">
        @include('layout/topbar')
        @include('layout/sidebar')
        <main class="flex-1 pt-20 pb-8 pl-72 pr-8 bg-rose-50">
            <div>
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="text-3xl font-bold leading-tight tracking-tight text-gray-900">Penilaian Bulanan Karyawan</h1>
                    <span class="text-md">Data penilaian bulanan karyawan Klinik Pratama SWA</span>
                </div>

                
                <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                    <a href="/grading" class="inline-flex items-center text-sm font-medium text-rose-400 hover:text-rose-600">
                        Penilaian Karyawan
                    </a>
                    </li>
                    <li aria-current="page">
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 text-sm font-medium text-gray-400 md:ml-2">Penilaian Bulanan</span>
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
                    <div class="font-semibold text-gray-600 text-lg mb-2">Riwayat</div>
                    <div class="relative overflow-x-auto shadow-lg sm:rounded-lg">
                        <div class="bg-white shadow-lg sm:rounded-lg rounded px-4 py-4">
                            <table id="myTable" class="w-full cell-border compact stripe hover row-border text-sm text-left text-gray-500">
                                <thead class="text-gray-700 bg-rose-100">
                                    <tr>
                                        <th>
                                            Date Created
                                        </th>
                                        <th>
                                            Nama
                                        </th>
                                        <th>
                                            Jabatan
                                        </th>
                                        <th>
                                            Bulan
                                        </th>
                                        <th>
                                            Tahun
                                        </th>
                                        <th>
                                            Poin Jabatan
                                        </th>
                                        <th>
                                            Poin Laporan
                                        </th>
                                        <th>
                                            Poin Presensi
                                        </th>
                                        <th>
                                            Total Poin
                                        </th>
                                        <th>
                                            Rata-Rata Poin
                                        </th>
                                        @if ($userLevel == 2)
                                            <th>
                                                Action
                                            </th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                @foreach ($nilaiBulanans as $nilaiBulanan)
                                    <tr class="bg-white border-b">
                                        <td>{{ $nilaiBulanan->created_at }}</td>
                                        <td>{{ $nilaiBulanan->employee->nama }}</td>
                                        <td>{{ $nilaiBulanan->jabatan }}</td>
                                        <td>{{ $nilaiBulanan->bulan }}</td>
                                        <td>{{ $nilaiBulanan->tahun }}</td>
                                        <td>{{ $nilaiBulanan->poin_jabatan }}</td>
                                        <td>{{ $nilaiBulanan->poin_laporan }}</td>
                                        <td>{{ $nilaiBulanan->poin_presensi }}</td>
                                        <td>{{ $nilaiBulanan->total_poin }}</td>
                                        <td>{{ $nilaiBulanan->rerata_poin }}</td>
                                        @if ($userLevel == 2)
                                            <td>
                                                <div>
                                                    <form action="{{ route('penilaianbulanan.delete', $nilaiBulanan->nilai_bulanan_id) }}" method="POST" onsubmit="return confirm('Apakah anda yakin ingin menghapus data karyawan ini?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded flex items-center">
                                                            <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" id="bin">
                                                                <path fill="currentColor" fill-rule="evenodd" d="M15 5V3H9v2H3v2h18V5zM5 8v12c0 1.103.897 2 2 2h10c1.103 0 2-.897 2-2V8H5zm6 10H9v-6h2v6zm4 0h-2v-6h2v6z"></path>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                @auth
                    @if ($userLevel == 2)
                        <div class="pt-8">
                            <div class="font-semibold text-gray-600 text-lg mb-2">Input Data Baru</div>
                            @if($errors->any())
                                <div class="w-1/2 bg-red-100 border border-red-400 text-red-700 px-4 py-3 mb-4 rounded relative">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('penilaianbulanan.store') }}" method="POST" class="bg-white shadow-lg sm:rounded-lg rounded px-8 pt-6 pb-8 mb-4">
                                @csrf
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="employee-select">
                                        Nama Karyawan
                                    </label>
                                    <select class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" id="employee-select" name="emp_id">
                                        <option value="" disabled selected>Pilih Karyawan</option>
                                        @foreach($employees as $employee)
                                            <option value="{{ $employee->emp_id }}">{{ $employee->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                
                                    <div class="w-full px-3 mb-6 md:mb-0">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="jabatan">
                                            Jabatan
                                        </label>
                                        <div class="relative">
                                            <div class="flex items-center">
                                                <div class="md:w-1/4">
                                                    <input name="jabatan" type="radio" value="Koordinator" class="w-4 h-4 text-rose-800 bg-gray-100 border-gray-300">
                                                    <label for="inline-radio" class="ml-2 text-sm font-medium text-gray-900">Koordinator</label>
                                                </div>
                                                <div class="md:w-1/4 mr-4">
                                                    <input name="jabatan" type="radio" value="Kepala Seksi Pelayanan" class="w-4 h-4 text-rose-800 bg-gray-100 border-gray-300">
                                                    <label for="inline-2-radio" class="ml-2 text-sm font-medium text-gray-900">Kepala Seksi Pelayanan</label>
                                                </div>
                                                <div class="md:w-1/4 mr-4">
                                                    <input name="jabatan" type="radio" value="Top Management" class="w-4 h-4 text-rose-800 bg-gray-100 border-gray-300">
                                                    <label for="inline-2-radio" class="ml-2 text-sm font-medium text-gray-900">Top Management</label>
                                                </div>
                                                <div class="md:w-1/4 mr-4">
                                                    <input name="jabatan" type="radio" value="Tidak Ada" class="w-4 h-4 text-rose-800 bg-gray-100 border-gray-300">
                                                    <label for="inline-2-radio" class="ml-2 text-sm font-medium text-gray-900">Tidak Ada</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="bulan">
                                            Bulan
                                        </label>
                                        <div class="relative">
                                            <select class="shadow appearance-none w-full bg-gray-50 border text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="bulan" name="bulan">
                                                <option value="" disabled selected>Select</option>
                                                <option>Januari</option>
                                                <option>Februari</option>
                                                <option>Maret</option>
                                                <option>April</option>
                                                <option>Mei</option>
                                                <option>Juni</option>
                                                <option>Juli</option>
                                                <option>Agustus</option>
                                                <option>September</option>
                                                <option>Oktober</option>
                                                <option>November</option>
                                                <option>Desember</option>
                                            </select>
                                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="tahun">
                                            Tahun
                                        </label>
                                        <div class="relative">
                                            <select class="shadow appearance-none w-full bg-gray-50 border text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="tahun" name="tahun">
                                                <option value="" disabled selected>Select</option>
                                                <option>2017</option>
                                                <option>2018</option>
                                                <option>2019</option>
                                                <option>2020</option>
                                                <option>2021</option>
                                                <option>2022</option>
                                                <option>2023</option>
                                                <option>2024</option>
                                            </select>
                                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                            </div>
                                        </div>
                                    </div>
                        
                                </div>

                                <div class="flex flex-wrap -mx-3 mb-4">
                                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="poin-jabatan">
                                        Poin Jabatan
                                        </label>
                                        <input name="poin_jabatan" type="number" required="" min="6" max="8" class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" id="poin-jabatan" placeholder="">
                                    </div>
                                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="poin-laporan">
                                        Poin Submisi Laporan
                                        </label>
                                        <input name="poin_laporan" type="number" required="" min="6" max="8"  class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" id="poin-laporan" placeholder="">
                                    </div>
                                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="poin-presensi">
                                        Poin Presensi
                                        </label>
                                        <input name="poin_presensi" type="number" required="" min="6" max="8"  class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" id="poin-presensi" placeholder="">
                                    </div>
                                </div>
                                <span class="text-xs">Kategori nilai : 6 (Kurang), 7 (Cukup), 8 (Baik)</span>
                                
                                <div class="flex items-center justify-between mt-4">
                                    <button class="bg-rose-800 hover:bg-rose-900 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    @endif
                @endauth
            </div>
        </main>
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable( {
                    dom: 'Bfrtip',
                    buttons: [
                        'excel'
                    ]
                });
            });
        </script>
    </body>
</html>
