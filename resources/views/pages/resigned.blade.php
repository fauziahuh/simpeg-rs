<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('layout/initialization')
        <title>Karyawan Resign</title>
    </head>
    
    <body class="flex bg-gray-100 min-h-screen">
        @include('layout/topbar')
        @include('layout/sidebar')
        <main class="flex-1 pt-20 pb-8 pl-72 pr-8 bg-rose-50">
            <div class="h-96">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="text-3xl font-bold leading-tight tracking-tight text-gray-900">Karyawan yang Resign</h1>
                    <span class="text-md">Daftar karyawan yang telah resign dari klinik</span>
                </div>

                @if(session('success'))
                    <div class="w-1/2 bg-green-100 border border-green-400 text-green-700 px-4 py-3 mb-4 rounded relative">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="pt-8 relative overflow-x-auto">
                    <div class="font-semibold text-gray-600 text-lg mb-2">Daftar Karyawan</div>
                    <div class="bg-white shadow-lg sm:rounded-lg rounded px-4 py-4">
                        <table id="myTable" class="w-full cell-border compact stripe hover row-border text-sm text-left text-gray-500">
                            <thead class="text-gray-700 bg-rose-100">
                                <tr>
                                    <th>
                                        Nama
                                    </th>
                                    <th>
                                        Jenis Kelamin
                                    </th>
                                    <th>
                                        TMK
                                    </th>
                                    <th>
                                        Status Karyawan
                                    </th>
                                    <th>
                                        Posisi
                                    </th>
                                    <th>
                                        Alamat Domisili
                                    </th>
                                    <th>
                                        Nomor HP
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($resignedEmployees as $emp)
                                <tr>
                                    <td>{{ $emp->nama }}</td>
                                    <td>{{ $emp->gender }}</td>
                                    <td>{{ $emp->tmk }}</td>
                                    <td>{{ $emp->status_kary }}</td>
                                    <td>{{ $emp->posisi }}</td>
                                    <td>{{ $emp->alamat_domisili }}</td>
                                    <td>{{ $emp->no_hp }}</td>
                                    <td>{{ $emp->email }}</td>
                                    <td>
                                        <span class="bg-gray-500 rounded text-white px-2">{{ $emp->status_emp }}</span>
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
