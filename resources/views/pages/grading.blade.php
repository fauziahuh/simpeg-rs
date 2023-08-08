<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <title>Penilaian</title>

    </head>
    <body class="flex bg-gray-100 min-h-screen">
        @include('layout/topbar')
        @include('layout/sidebar')
        <main class="flex-1 pt-20 pb-8 pl-72 pr-8 bg-rose-50">
            <div>
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="text-3xl font-bold leading-tight tracking-tight text-gray-900">Penilaian Karyawan</h1>
                    <span class="text-md">Input dan lihat data penilaian bulanan/tahunan karyawan Klinik Pratama SWA</span>
                </div>
                <div class="pt-8 grid grid-cols-2 gap-8">
                    <a href="{{ Auth::user()->user_level == 2 ? route('penilaianbulananHrd.index') : (Auth::user()->user_level == 3 ? route('penilaianbulananKasie.index') : route('penilaianbulananEmp.index')) }}" class="w-full rounded overflow-x-auto shadow-lg bg-white hover:bg-gray-50 border-2 hover:border-sky-400 focus:ring-4 focus:outline-none focus:ring-sky-200">
                        <img class="w-full h-40" src="/img/presentation.jpg" alt="monthly grading">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">Penilaian Bulanan</div>
                            <p class="text-gray-700 text-base">
                            Lihat laporan penilaian bulanan karyawan.
                            </p>
                        </div>
                    </a>
                    <a href="/yearly" class="w-full rounded overflow-x-auto shadow-lg bg-white hover:bg-gray-50 border-2 hover:border-sky-400 focus:ring-4 focus:outline-none focus:ring-sky-200">
                        <img class="w-full h-40" src="/img/report-discussion.jpg" alt="annual grading">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">Penilaian Tahunan</div>
                            <p class="text-gray-700 text-base">
                            Lihat laporan penilaian tahunan karyawan.
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        </main>
    </body>
</html>
