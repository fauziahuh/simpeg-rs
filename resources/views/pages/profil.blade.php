<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <title>Profil</title>

    </head>
    <body class="flex bg-gray-100 min-h-screen">
        @include('layout/topbar')
        @include('layout/sidebar')
        <main class="flex-1 pt-20 pb-8 pl-72 pr-8 bg-rose-50">
            <div class="">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="text-3xl font-bold leading-tight tracking-tight text-gray-900">Profil</h1>
                    <span class="text-md">Data profil saya</span>
                </div>

                <div class="pt-8">
                    <div class="bg-gray-100 border border-gray-400 sm:rounded-xl rounded w-24 h-24 mb-4 flex justify-center items-center">
                        <svg aria-hidden="true" class="flex-shrink-0 w-24 h-24 text-gray-300 transition group-hover:text-gray-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                    </div>
                    <div class="flex">
                        <table class="w-full text-sm text-left text-gray-500">
                            <tbody>
                                <tr class="border-b">
                                    <td class="w-1/3 px-4 py-2 font-semibold">Nama</td>
                                    <td class="w-2/3 px-4 py-2">: {{ $employee->nama }}</td>
                                </tr>
                                <tr class="border-b">
                                    <td class="w-1/3 px-4 py-2 font-semibold">TTL</td>
                                    <td class="w-2/3 px-4 py-2">: {{ $employee->ttl }}</td>
                                </tr>
                                <tr class="border-b">
                                    <td class="w-1/3 px-4 py-2 font-semibold">Jenis Kelamin</td>
                                    <td class="w-2/3 px-4 py-2">: {{ $employee->gender }}</td>
                                </tr>
                                <tr class="border-b">
                                    <td class="w-1/3 px-4 py-2 font-semibold">NIK</td>
                                    <td class="w-2/3 px-4 py-2">: {{ $employee->no_ktp }}</td>
                                </tr>
                                <tr class="border-b">
                                    <td class="w-1/3 px-4 py-2 font-semibold">Nomer Induk Karyawan</td>
                                    <td class="w-2/3 px-4 py-2">: {{ $employee->no_induk_kary }}</td>
                                </tr>
                                <tr class="border-b">
                                    <td class="w-1/3 px-4 py-2 font-semibold">Posisi</td>
                                    <td class="w-2/3 px-4 py-2">: {{ $employee->posisi }}</td>
                                </tr>
                                <tr class="border-b">
                                    <td class="w-1/3 px-4 py-2 font-semibold">Status Karyawan</td>
                                    <td class="w-2/3 px-4 py-2">: {{ $employee->status_kary }}</td>
                                </tr>
                                <tr class="border-b">
                                    <td class="w-1/3 px-4 py-2 font-semibold">Alamat KTP</td>
                                    <td class="w-2/3 px-4 py-2">: {{ $employee->alamat_ktp }}</td>
                                </tr>
                                <tr class="border-b">
                                    <td class="w-1/3 px-4 py-2 font-semibold">Alamat Domisili</td>
                                    <td class="w-2/3 px-4 py-2">: {{ $employee->alamat_domisili }}</td>
                                </tr>
                                <tr class="border-b">
                                    <td class="w-1/3 px-4 py-2 font-semibold">TMK</td>
                                    <td class="w-2/3 px-4 py-2">: {{ $employee->tmk }}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                </div>

            </div>
        </main>

    </body>
</html>
