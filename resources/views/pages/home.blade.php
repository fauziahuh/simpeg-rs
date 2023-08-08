<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <title>Dashboard</title>

    </head>
    <body class="flex bg-gray-100 min-h-screen">
        @include('layout/topbar')
        @include('layout/sidebar')
        
        <main class="flex-1 pt-20 pb-8 pl-72 pr-8 bg-rose-50">
            <div class="h-96">
                <h6 class="h6 text-normal font-semibold text-gray-400">Welcome back, <b class="text-rose-800"> {{ $user->name; }}  </b></h6>
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="text-3xl font-bold leading-tight tracking-tight text-gray-900">Dashboard</h1>
                    <span class="text-md"></span>
                </div>
                <div class="pt-8 grid grid-cols-3 gap-8">
                    @if($userLevel == 2)
                    <div class="w-full rounded overflow-x-auto shadow-lg bg-white">
                        <div class="px-6 py-4">
                            <div class="font-semibold text-lg mb-2">Jumlah Karyawan</div>
                            <div class="flex">
                                <p class="font-bold text-6xl mb-2 text-gray-700">
                                    @if ($totalEmployees !== null)
                                        {{ $totalEmployees }}
                                    @else
                                        N/A
                                    @endif
                                </p>
                                <p class="font-normal text-xl mb-2 mt-8 ml-2">karyawan</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full rounded overflow-x-auto shadow-lg bg-white">
                        <div class="px-6 py-2">
                            <div class="font-semibold text-lg mb-2">Menunggu Approval Cuti</div>
                            <div class="flex">
                            @if ($pendingApprovalCutis !== null)
                                <p class="font-bold text-6xl mb-2 text-blue-400">{{ $pendingApprovalCutis }}</p>
                            @else
                                <p>0</p>
                            @endif
                                <p class="font-normal text-xl mb-2 mt-8 ml-2">pengajuan</p>
                            </div>
                        </div>
                    </div>
                    

                    @elseif($userLevel == 3)
                    <div class="w-full rounded overflow-x-auto shadow-lg bg-white">
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

                    <div class="w-full rounded overflow-x-auto shadow-lg bg-white">
                        <div class="px-6 py-2">
                            <div class="font-semibold text-lg mb-2">Menunggu Approval Cuti</div>
                            <div class="flex">
                            @if ($pendingApprovalCutis !== null)
                                <p class="font-bold text-6xl mb-2 text-blue-400">{{ $pendingApprovalCutis }}</p>
                            @else
                                <p>0</p>
                            @endif
                                <p class="font-normal text-xl mb-2 mt-8 ml-2">pengajuan</p>
                            </div>
                        </div>
                    </div>

                    <div class="w-full rounded overflow-x-auto shadow-lg bg-white">
                        <div class="px-6 py-2">
                            <div class="font-semibold text-lg mb-2">Nilai Bulanan Terakhir</div>
                            <div class="flex">
                            @if ($latestNilaiBulanan !== null)
                                <p class="font-bold text-6xl mb-2 text-blue-400">{{ $latestNilaiBulanan->total_poin }}</p>
                                <p class="font-normal text-xl mb-2 mt-8 ml-2">poin</p>
                            @else
                                <p>Tidak ada data yang ditemukan</p>
                            @endif
                                
                            </div>
                        </div>
                    </div>

                    @elseif($userLevel == 4)
                    <div class="w-full rounded overflow-x-auto shadow-lg bg-white">
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


                    <div class="w-full rounded overflow-x-auto shadow-lg bg-white">
                        <div class="px-6 py-2">
                            <div class="font-semibold text-lg mb-2">Nilai Bulanan Terakhir</div>
                            <div class="flex">
                            @if ($latestNilaiBulanan !== null)
                                <p class="font-bold text-6xl mb-2 text-blue-400">{{ $latestNilaiBulanan->total_poin }}</p>
                            @else
                                <p>Tidak ada data yang ditemukan</p>
                            @endif
                                <p class="font-normal text-xl mb-2 mt-8 ml-2">poin</p>
                            </div>
                        </div>
                    </div>

                    @elseif($userLevel == 5)
                    <div class="w-full rounded overflow-x-auto shadow-lg bg-white">
                        <div class="px-6 py-4">
                            <div class="font-semibold text-lg mb-2">Jumlah Pengguna Aktif</div>
                            <div class="flex">
                                <p class="font-bold text-6xl mb-2 text-gray-700">
                                    @if ($totalUsers  !== null)
                                        {{ $totalUsers  }}
                                    @else
                                        N/A
                                    @endif
                                </p>
                                <p class="font-normal text-xl mb-2 mt-8 ml-2">pengguna</p>
                            </div>
                        </div>
                    </div>

                    @endif

                </div>

            </div>
        </main>

    </body>
</html>
