<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('layout/initialization')
        <title>Pengajuan Cuti</title>

    </head>
    <body class="flex bg-gray-100 min-h-screen">
        @include('layout/topbar')
        @include('layout/sidebar')
        <main class="flex-1 pt-20 pb-8 pl-72 pr-8 bg-rose-50">
            <div class="h-96">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="text-3xl font-bold leading-tight tracking-tight text-gray-900">Approval Cuti</h1>
                    <span class="text-md">Approval dan riwayat pengajuan cuti karyawan</span>
                </div>

                @if(session('success'))
                    <div class="w-1/2 bg-green-100 border border-green-400 text-green-700 px-4 py-3 mb-4 rounded relative">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="w-1/2 bg-red-100 border border-red-400 text-red-700 px-4 py-3 mb-4 rounded relative">
                        <ul>
                            <li>{{ session('error') }}</li>
                        </ul>
                    </div>
                @endif

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
                                        Lama Cuti
                                    </th>
                                    <th>
                                        Saldo Cuti Terakhir
                                    </th>
                                    <th>
                                        Status Approval (Kasie)
                                    </th>
                                    <th>
                                        Status Approval (HRD)
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($pengajuanCutis as $cuti)
                                <tr class="bg-white border-b">
                                    <td>{{ $cuti->employee->nama }}</td>    
                                    <td>{{ $cuti->alasan_cuti }}</td>
                                    <td>{{ $cuti->mulai_cuti }}</td>
                                    <td>{{ $cuti->akhir_cuti }}</td>
                                    <td>{{ $cuti->tgl_masuk }}</td>
                                    <td>{{ $cuti->pengganti_jaga }}</td>
                                    <td>
                                        {{ $cuti->lama_cuti }}
                                    </td>
                                    <td>
                                    @if ($cuti->saldo_cuti)
                                        {{ $cuti->saldo_cuti->sisa_cuti }}
                                    @else
                                        N/A
                                    @endif
                                    </td>
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
                                    <td>
                                        @if($userLevel == 3 && $cuti->manager_approval === 0)
                                        <form action="{{ route('approvalKasie.process') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="cuti_id" value="{{ $cuti->cuti_id }}">
                                            <div class="flex items-center">
                                                <button type="submit" name="action" value="kasie_tolak" class="bg-white hover:bg-rose-50 border border-rose-700 font-semibold text-rose-700 py-1 px-2 rounded flex items-center mr-2">
                                                    Tolak
                                                </button>
                                                <button type="submit" name="action" value="kasie_setuju" class="bg-rose-700 hover:bg-rose-800 border border-rose-700 font-semibold text-white py-1 px-2 rounded flex items-center mr-2">
                                                    Setuju
                                                </button>
                                            </div>
                                        </form>
                                        @elseif($userLevel == 2 && $cuti->manager_approval === 1 && $cuti->hr_approval === 0)
                                        <form action="{{ route('approvalHrd.process') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="cuti_id" value="{{ $cuti->cuti_id }}">
                                            <div class="flex items-center">
                                                <button type="submit" name="action" value="hr_tolak" class="bg-white hover:bg-rose-50 border border-rose-700 font-semibold text-rose-700 py-1 px-2 rounded flex items-center mr-2">
                                                    Tolak
                                                </button>
                                                <button type="submit" name="action" value="hr_setuju" class="bg-rose-700 hover:bg-rose-800 border border-rose-700 font-semibold text-white py-1 px-2 rounded flex items-center mr-2">
                                                    Setuju
                                                </button>
                                            </div>
                                        </form>
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
