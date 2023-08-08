<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <title>Tambah Pengajuan Cuti</title>

    </head>
    <body class="flex bg-gray-100 min-h-screen">
        @include('layout/topbar')
        @include('layout/sidebar')
        <main class="flex-1 pt-20 pb-8 pl-72 pr-8 bg-rose-50">
            <div class="">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="text-3xl font-bold leading-tight tracking-tight text-gray-900">Tambah Pengajuan Cuti</h1>
                    <span class="text-md">Mengajukan Cuti Baru</span>
                </div>

                <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                    <a href="{{ Auth::user()->user_level == 3 ? route('cutiKasie.index') : route('cutiEmp.index') }}" class="inline-flex items-center text-sm font-medium text-rose-400 hover:text-rose-600">
                        Cuti
                    </a>
                    </li>
                    <li aria-current="page">
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 text-sm font-medium text-gray-400 md:ml-2">Tambah Pengajuan Cuti</span>
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
                    <form action="{{ Auth::user()->user_level == 3 ? route('cutiKasie.store') : route('cutiEmp.store') }}" method="POST" class="bg-white shadow-lg sm:rounded-lg rounded px-8 pt-6 pb-8 mb-4">
                        @csrf
                        <div class="md:flex md:items-center mb-6">        
                            <div class="md:w-1/4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="alasan_cuti">
                                    Keperluan Cuti
                                </label>
                            </div>
                                <div class="md:w-3/4">
                                    <input required="" class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" name="alasan_cuti" type="text" placeholder="">
                                </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="mulai_cuti">
                                    Tanggal Cuti
                                </label>
                            </div>
                            <div class="md:w-3/4 flex items-center">
                                <div class="md:w-1/4">
                                    <input required="" class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" name="mulai_cuti" type="date" placeholder="">
                                </div>
                                <div class="md:w-1/4 ml-8">
                                    <label class="block text-gray-700 text-sm font-bold mb-2 mr-8" for="akhir_tetap">
                                        sampai dengan
                                    </label>
                                </div>
                                <div class="md:w-1/4">
                                    <input required="" class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" name="akhir_cuti" type="date" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">        
                            <div class="md:w-1/4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="tgl_masuk">
                                    Tanggal Masuk
                                </label>
                            </div>
                            <div class="md:w-1/4">
                                <input required="" class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" name="tgl_masuk" type="date" placeholder="">
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">        
                            <div class="md:w-1/4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="pengganti_jaga">
                                    Pengganti Jaga
                                </label>
                            </div>
                                <div class="md:w-3/4">
                                    <input required="" class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" name="pengganti_jaga" type="text" placeholder="">
                                </div>
                        </div>

                        <div class="flex items-center ">
                            <button class="bg-white hover:bg-rose-50 text-rose-800 border border-rose-800 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-2" type="button" onclick="window.history.back();">
                                Cancel
                            </button>
                            <button class="bg-rose-800 hover:bg-rose-900 text-white border border-rose-800 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </main>

    </body>
</html>
