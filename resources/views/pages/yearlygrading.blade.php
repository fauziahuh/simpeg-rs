<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <title>Penilaian Tahunan</title>

    </head>
    <body class="flex bg-gray-100 min-h-screen">
        @include('layout/topbar')
        @include('layout/sidebar')
        <main class="flex-1 pt-20 pb-8 pl-72 pr-8 bg-rose-50">
            <div>
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="text-3xl font-bold leading-tight tracking-tight text-gray-900">Penilaian Tahunan Karyawan</h1>
                    <span class="text-md">Data penilaian tahunan karyawan Klinik Pratama SWA</span>
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
                        <span class="ml-1 text-sm font-medium text-gray-400 md:ml-2">Penilaian Tahunan</span>
                    </div>
                    </li>
                </ol>
                </nav>

                <div class="pt-8">
                    <div class="font-semibold text-gray-600 text-lg mb-2">Input Data Baru</div>
                    <div class="flex items-center justify-between">
                        <a href="/tambahnilaitahunan" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold py-1 px-4 rounded focus:outline-none focus:shadow-outline">
                            Masukkan data penilaian baru
                        </a>
                    </div>
                </div>
                
                <div class="pt-8">
                    <div class="font-semibold text-gray-600 text-lg mb-2">Riwayat</div>
                    <div class="relative overflow-x-auto shadow-lg sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-rose-100">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Tanggal
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="flex items-center">Nama</span>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="flex items-center">Jabatan</span>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            Bulan
                                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg></a>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            Tahun
                                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg></a>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            Poin
                                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg></a>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="flex items-center">Grade</span>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="flex items-center">Action</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr class="bg-white border-b">
                                    <td class="px-6 py-4">01-02-2023</td>
                                    <td class="px-6 py-4">George</td>
                                    <td class="px-6 py-4">Koordinator</td>
                                    <td class="px-6 py-4">Januari</td>
                                    <td class="px-6 py-4">2023</td>
                                    <td class="px-6 py-4">85</td>
                                    <td class="px-6 py-4">A</td>
                                    <td class="px-6 py-4 text-blue-600">Edit</td>
                                </tr>
                             
                            </tbody>
                        </table>
                    </div>
                </div>

                
            </div>
        </main>
    </body>
</html>
