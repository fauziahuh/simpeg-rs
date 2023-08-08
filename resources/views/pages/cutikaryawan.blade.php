<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('layout/initialization')
        <title>Cuti</title>

    </head>
    <body class="flex bg-gray-100 min-h-screen">
        @include('layout/topbar')
        @include('layout/sidebar')
        <main class="flex-1 pt-20 pb-8 pl-72 pr-8 bg-rose-50">
            <div class="h-96">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="text-3xl font-bold leading-tight tracking-tight text-gray-900">Pengajuan Cuti</h1>
                    <span class="text-md">Riwayat dan formulir pengajuan cuti</span>
                </div>

                @if(session('success'))
                    <div class="w-1/2 bg-green-100 border border-green-400 text-green-700 px-4 py-3 mb-4 rounded relative">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="w-1/3 rounded overflow-x-auto shadow-lg bg-white">
                    <div class="px-6 py-4">
                        <div class="font-semibold text-lg mb-2">Sisa Cuti</div>
                        <div class="flex">
                            <p class="font-bold text-6xl mb-2 text-rose-400">
                                @if ($sisaCuti !== null)
                                    {{ $sisaCuti }}
                                @else
                                    N/A
                                @endif
                            </p>
                            <p class="font-normal text-xl mb-2 mt-8 ml-2">hari</p>
                        </div>
                    </div>
                </div>

                <div class="pt-8">
                    <div class="font-semibold text-gray-600 text-lg mb-2">Pengajuan Cuti Baru</div>
                    <div class="flex items-center justify-between">
                        <a href="{{ Auth::user()->user_level == 3 ? route('cutiKasie.create') : route('cutiEmp.create') }}" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold py-1 px-4 rounded focus:outline-none focus:shadow-outline">
                            Ajukan Cuti
                        </a>
                    </div>
                </div>

                <div class="pt-8 relative overflow-x-auto shadow-lg sm:rounded-lg">
                    <div class="font-semibold text-gray-600 text-lg mb-2">Riwayat</div>
                    <div class="bg-white shadow-lg sm:rounded-lg rounded px-4 py-4">
                        <table id="myTable" class="w-full cell-border compact stripe hover row-border text-sm text-left text-gray-500">
                            <thead class="text-gray-700 bg-rose-100">
                                <tr>
                                    <th>
                                        Nama
                                    </th>
                                    <th>
                                        Alamat
                                    </th>
                                    <th>
                                        Alasan
                                    </th>
                                    <th>
                                        Mulai Cuti
                                    </th>
                                    <th>
                                        Selesai Cuti
                                    </th>
                                    <th>
                                        Tanggal Masuk
                                    </th>
                                    <th>
                                        Pengganti Jaga
                                    </th>
                                    <th>
                                        Status Approval (Kasie)
                                    </th>
                                    <th>
                                        Status Approval (HRD)
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($pengajuanCutis as $cuti)
                                <tr class="bg-white border-b">
                                <td >{{ $cuti->employee->nama }}</td>
                                    <td>{{ $cuti->employee->alamat_domisili }}</td>
                                    <td>{{ $cuti->alasan_cuti }}</td>
                                    <td>{{ $cuti->mulai_cuti }}</td>
                                    <td>{{ $cuti->akhir_cuti }}</td>
                                    <td>{{ $cuti->tgl_masuk }}</td>
                                    <td>{{ $cuti->pengganti_jaga }}</td>
                                    <td>
                                        @if ($cuti->manager_approval === 0)
                                            <span class="bg-yellow-100 rounded text-yellow-600 px-2 font-medium">Pending</span>
                                        @elseif ($cuti->manager_approval === 1)
                                            <span class="bg-green-100 rounded text-green-600 px-2 font-medium">Disetujui</span>
                                        @elseif ($cuti->manager_approval === 2)
                                            <span class="bg-red-100 rounded text-red-600 px-2 font-medium">Ditolak</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($cuti->hr_approval === 0)
                                            <span class="bg-yellow-100 rounded text-yellow-600 px-2 font-medium">Pending</span>
                                        @elseif ($cuti->hr_approval === 1)
                                            <span class="bg-green-100 rounded text-green-600 px-2 font-medium">Disetujui</span>
                                        @elseif ($cuti->hr_approval === 2)
                                            <span class="bg-red-100 rounded text-red-600 px-2 font-medium">Ditolak</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
        </script>
    </body>
</html>
