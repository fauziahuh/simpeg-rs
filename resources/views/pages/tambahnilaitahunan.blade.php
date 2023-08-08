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
                    <li>
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <a href="/yearly" class="ml-1 text-sm font-medium text-rose-400 hover:text-rose-600">Penilaian Tahunan</a>
                    </div>
                    </li>
                    <li aria-current="page">
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 text-sm font-medium text-gray-400 md:ml-2">Input Data Baru Penilaian Tahunan</span>
                    </div>
                    </li>
                </ol>
                </nav>

                <div class="pt-8">
                    <div class="font-semibold text-gray-600 text-lg mb-2">Input Data Baru</div>

                        <form>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                                    Periode Penilaian
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" id="name" type="text" placeholder="">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                                    Nama
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" id="name" type="text" placeholder="">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                                    Jabatan
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" id="name" type="text" placeholder="">
                            </div>

                            <div class="mb-12">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="status_kary">
                                    Status Karyawan
                                </label>
                                <div class="relative">
                                    <div class="flex items-center">
                                        <div class="md:w-1/4">
                                            <input name="status_kary" type="radio" value="Training" class="w-4 h-4 text-rose-800 bg-gray-100 border-gray-300">
                                            <label for="inline-radio" class="ml-2 text-sm font-medium text-gray-900">Training</label>
                                        </div>
                                        <div class="md:w-1/4 mr-4">
                                            <input name="status_kary" type="radio" value="Kontrak" class="w-4 h-4 text-rose-800 bg-gray-100 border-gray-300">
                                            <label for="inline-2-radio" class="ml-2 text-sm font-medium text-gray-900">Kontrak</label>
                                        </div>
                                        <div class="md:w-1/4 mr-4">
                                            <input name="status_kary" type="radio" value="Tetap" class="w-4 h-4 text-rose-800 bg-gray-100 border-gray-300">
                                            <label for="inline-2-radio" class="ml-2 text-sm font-medium text-gray-900">Tetap</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            Masukkan nilai sesuai kriteria
                            <div class="flex -mx-3 mb-6">
                                <div class="w-1/2 px-3 mb-6 md:mb-0">
                                    <label class="block text-gray-700 text-sm font-bold mb-3" for="poin-jabatan">
                                    Penilaian Kinerja
                                    </label>
                                    <input disabled class="mb-3 text-sm appearance-none bg-transparent border-none w-full py-2 placeholder-gray-900 leading-tight" id="poin-jabatan" type="text" placeholder="Inisiatif dalam bekerja">
                                    <input disabled class="mb-3 text-sm appearance-none bg-transparent border-none w-full py-2 placeholder-gray-900 leading-tight" id="poin-jabatan" type="text" placeholder="Ketelitian dalam bekerja sesuai dengan posisinya">
                                    <input disabled class="mb-3 text-sm appearance-none bg-transparent border-none w-full py-2 placeholder-gray-900 leading-tight" id="poin-jabatan" type="text" placeholder="Kemampuan menyelesaikan masalah  dan pekerjaannya sesuai dengan posisinya">
                                    <input disabled class="mb-3 text-sm appearance-none bg-transparent border-none w-full py-2 placeholder-gray-900 leading-tight" id="poin-jabatan" type="text" placeholder="Kecepatan menyelesaikan pekerjaan  sesuai dengan posisinya">
                                    <input disabled class="mb-3 text-sm appearance-none bg-transparent border-none w-full py-2 placeholder-gray-900 leading-tight" id="poin-jabatan" type="text" placeholder="Kemampuan mengambil keputusan yang tepat berdasarkan posisinya saat ini">
                                    <input disabled class="mb-3 text-sm appearance-none bg-transparent border-none w-full py-2 placeholder-gray-900 leading-tight" id="poin-jabatan" type="text" placeholder="Responsif dengan pekerjaannya maupun lingkungan kerjanya">
                                    <input disabled class="mb-3 text-sm appearance-none bg-transparent border-none w-full py-2 placeholder-gray-900 leading-tight" id="poin-jabatan" type="text" placeholder="Kemampuan koordinasi kerja dengan karyawan lain">
                                    <input disabled class="mb-3 text-sm appearance-none bg-transparent border-none w-full py-2 placeholder-gray-900 leading-tight" id="poin-jabatan" type="text" placeholder="Kemampuan menjalin komunikasi dengan karyawan lain">
                                </div>
                                <div class="w-1/6 px-3 mb-6 md:mb-0">
                                    <label class="block text-center text-gray-700 text-sm font-bold mb-2" for="poin-jabatan">
                                    Kriteria Minimal
                                    </label>
                                    <input disabled class="mb-2 shadow appearance-none border rounded w-full py-2 px-3 text-center bg-yellow-100 placeholder-gray-800 leading-tight" id="poin-jabatan" type="text" placeholder="80">
                                    <input disabled class="mb-2 shadow appearance-none border rounded w-full py-2 px-3 text-center bg-yellow-100 placeholder-gray-800 leading-tight" id="poin-jabatan" type="text" placeholder="80">
                                    <input disabled class="mb-2 shadow appearance-none border rounded w-full py-2 px-3 text-center bg-yellow-100 placeholder-gray-800 leading-tight" id="poin-jabatan" type="text" placeholder="80">
                                    <input disabled class="mb-2 shadow appearance-none border rounded w-full py-2 px-3 text-center bg-yellow-100 placeholder-gray-800 leading-tight" id="poin-jabatan" type="text" placeholder="80">
                                    <input disabled class="mb-2 shadow appearance-none border rounded w-full py-2 px-3 text-center bg-yellow-100 placeholder-gray-800 leading-tight" id="poin-jabatan" type="text" placeholder="80">
                                    <input disabled class="mb-2 shadow appearance-none border rounded w-full py-2 px-3 text-center bg-yellow-100 placeholder-gray-800 leading-tight" id="poin-jabatan" type="text" placeholder="80">
                                    <input disabled class="mb-2 shadow appearance-none border rounded w-full py-2 px-3 text-center bg-yellow-100 placeholder-gray-800 leading-tight" id="poin-jabatan" type="text" placeholder="80">
                                    <input disabled class="mb-2 shadow appearance-none border rounded w-full py-2 px-3 text-center bg-yellow-100 placeholder-gray-800 leading-tight" id="poin-jabatan" type="text" placeholder="80">
                                </div>
                                <div class="w-1/6 px-3 mb-6 md:mb-0">
                                    <label class="block text-center text-gray-700 text-sm font-bold mb-2" for="poin-laporan">
                                    Nilai Rekan Kary Lain
                                    </label>
                                    <input class="mb-2 shadow appearance-none border rounded w-full text-center py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" id="poin-jabatan" type="number" placeholder="">
                                    <input class="mb-2 shadow appearance-none border rounded w-full text-center py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" id="poin-jabatan" type="number" placeholder="">
                                    <input class="mb-2 shadow appearance-none border rounded w-full text-center py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" id="poin-jabatan" type="number" placeholder="">
                                    <input class="mb-2 shadow appearance-none border rounded w-full text-center py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" id="poin-jabatan" type="number" placeholder="">
                                    <input class="mb-2 shadow appearance-none border rounded w-full text-center py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" id="poin-jabatan" type="number" placeholder="">
                                    <input class="mb-2 shadow appearance-none border rounded w-full text-center py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" id="poin-jabatan" type="number" placeholder="">
                                    <input class="mb-2 shadow appearance-none border rounded w-full text-center py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" id="poin-jabatan" type="number" placeholder="">
                                    <input class="mb-2 shadow appearance-none border rounded w-full text-center py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" id="poin-jabatan" type="number" placeholder="">
                                </div>
                                <div class="w-1/6 px-3 mb-6 md:mb-0">
                                    <label class="block text-center text-gray-700 text-sm font-bold mb-2" for="poin-presensi">
                                    Nilai Manajemen
                                    </label>
                                    <input class="mb-2 shadow appearance-none border rounded w-full text-center py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" id="poin-jabatan" type="number" placeholder="">
                                    <input class="mb-2 shadow appearance-none border rounded w-full text-center py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" id="poin-jabatan" type="number" placeholder="">
                                    <input class="mb-2 shadow appearance-none border rounded w-full text-center py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" id="poin-jabatan" type="number" placeholder="">
                                    <input class="mb-2 shadow appearance-none border rounded w-full text-center py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" id="poin-jabatan" type="number" placeholder="">
                                    <input class="mb-2 shadow appearance-none border rounded w-full text-center py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" id="poin-jabatan" type="number" placeholder="">
                                    <input class="mb-2 shadow appearance-none border rounded w-full text-center py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" id="poin-jabatan" type="number" placeholder="">
                                    <input class="mb-2 shadow appearance-none border rounded w-full text-center py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" id="poin-jabatan" type="number" placeholder="">
                                    <input class="mb-2 shadow appearance-none border rounded w-full text-center py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" id="poin-jabatan" type="number" placeholder="">
                                </div>
                            </div>

                            <div class="flex -mx-3 mb-6">
                                <div class="w-1/2 px-3 mb-6 md:mb-0">
                                    <label class="block text-gray-700 text-sm font-bold mb-3" for="poin-jabatan">
                                    Penilaian Sikap
                                    </label>
                                    <input disabled class="mb-3 text-sm appearance-none bg-transparent border-none w-full py-2 placeholder-gray-900 leading-tight" id="poin-jabatan" type="text" placeholder="Komitmen">
                                    <input disabled class="mb-3 text-sm appearance-none bg-transparent border-none w-full py-2 placeholder-gray-900 leading-tight" id="poin-jabatan" type="text" placeholder="Kerja sama (team work) ">
                                    <input disabled class="mb-3 text-sm appearance-none bg-transparent border-none w-full py-2 placeholder-gray-900 leading-tight" id="poin-jabatan" type="text" placeholder="Kerapian dan kebersihan pakaian & tempat kerja">
                                    <input disabled class="mb-3 text-sm appearance-none bg-transparent border-none w-full py-2 placeholder-gray-900 leading-tight" id="poin-jabatan" type="text" placeholder="Menghargai (respek) dan menghormati rekan kerja maupun pimpinan">
                                    <input disabled class="mb-3 text-sm appearance-none bg-transparent border-none w-full py-2 placeholder-gray-900 leading-tight" id="poin-jabatan" type="text" placeholder="Kemauan membantu rekan kerja yang membutuhkan bantuan dlm pekerjaannya">
                                    <input disabled class="mb-3 text-sm appearance-none bg-transparent border-none w-full py-2 placeholder-gray-900 leading-tight" id="poin-jabatan" type="text" placeholder="Sikap ramah dan sopan baik ke pasien maupun rekan kerja">
                                    <input disabled class="mb-3 text-sm appearance-none bg-transparent border-none w-full py-2 placeholder-gray-900 leading-tight" id="poin-jabatan" type="text" placeholder="Fokus dalam melakukan pekerjaannya  sesuai dengan posisinya">
                                    <input disabled class="mb-3 text-sm appearance-none bg-transparent border-none w-full py-2 placeholder-gray-900 leading-tight" id="poin-jabatan" type="text" placeholder="Mematuhi aturan dan kebijakan klinik">
                                </div>
                                <div class="w-1/6 px-3 mb-6 md:mb-0">
                                    <label class="block text-center text-gray-700 text-sm font-bold mb-2" for="poin-jabatan">
                                    Kriteria Minimal
                                    </label>
                                    <input disabled class="mb-2 shadow appearance-none border rounded w-full py-2 px-3 text-center bg-yellow-100 placeholder-gray-800 leading-tight" id="poin-jabatan" type="text" placeholder="80">
                                    <input disabled class="mb-2 shadow appearance-none border rounded w-full py-2 px-3 text-center bg-yellow-100 placeholder-gray-800 leading-tight" id="poin-jabatan" type="text" placeholder="80">
                                    <input disabled class="mb-2 shadow appearance-none border rounded w-full py-2 px-3 text-center bg-yellow-100 placeholder-gray-800 leading-tight" id="poin-jabatan" type="text" placeholder="80">
                                    <input disabled class="mb-2 shadow appearance-none border rounded w-full py-2 px-3 text-center bg-yellow-100 placeholder-gray-800 leading-tight" id="poin-jabatan" type="text" placeholder="80">
                                    <input disabled class="mb-2 shadow appearance-none border rounded w-full py-2 px-3 text-center bg-yellow-100 placeholder-gray-800 leading-tight" id="poin-jabatan" type="text" placeholder="80">
                                    <input disabled class="mb-2 shadow appearance-none border rounded w-full py-2 px-3 text-center bg-yellow-100 placeholder-gray-800 leading-tight" id="poin-jabatan" type="text" placeholder="80">
                                    <input disabled class="mb-2 shadow appearance-none border rounded w-full py-2 px-3 text-center bg-yellow-100 placeholder-gray-800 leading-tight" id="poin-jabatan" type="text" placeholder="80">
                                    <input disabled class="mb-2 shadow appearance-none border rounded w-full py-2 px-3 text-center bg-yellow-100 placeholder-gray-800 leading-tight" id="poin-jabatan" type="text" placeholder="80">
                                </div>
                                <div class="w-1/6 px-3 mb-6 md:mb-0">
                                    <label class="block text-center text-gray-700 text-sm font-bold mb-2" for="poin-laporan">
                                    Nilai Rekan Kary Lain
                                    </label>
                                    <input class="mb-2 shadow appearance-none border rounded w-full text-center py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" id="poin-jabatan" type="number" placeholder="">
                                    <input class="mb-2 shadow appearance-none border rounded w-full text-center py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" id="poin-jabatan" type="number" placeholder="">
                                    <input class="mb-2 shadow appearance-none border rounded w-full text-center py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" id="poin-jabatan" type="number" placeholder="">
                                    <input class="mb-2 shadow appearance-none border rounded w-full text-center py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" id="poin-jabatan" type="number" placeholder="">
                                    <input class="mb-2 shadow appearance-none border rounded w-full text-center py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" id="poin-jabatan" type="number" placeholder="">
                                    <input class="mb-2 shadow appearance-none border rounded w-full text-center py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" id="poin-jabatan" type="number" placeholder="">
                                    <input class="mb-2 shadow appearance-none border rounded w-full text-center py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" id="poin-jabatan" type="number" placeholder="">
                                    <input class="mb-2 shadow appearance-none border rounded w-full text-center py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" id="poin-jabatan" type="number" placeholder="">
                                </div>
                                <div class="w-1/6 px-3 mb-6 md:mb-0">
                                    <label class="block text-center text-gray-700 text-sm font-bold mb-2" for="poin-presensi">
                                    Nilai Manajemen
                                    </label>
                                    <input class="mb-2 shadow appearance-none border rounded w-full text-center py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" id="poin-jabatan" type="number" placeholder="">
                                    <input class="mb-2 shadow appearance-none border rounded w-full text-center py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" id="poin-jabatan" type="number" placeholder="">
                                    <input class="mb-2 shadow appearance-none border rounded w-full text-center py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" id="poin-jabatan" type="number" placeholder="">
                                    <input class="mb-2 shadow appearance-none border rounded w-full text-center py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" id="poin-jabatan" type="number" placeholder="">
                                    <input class="mb-2 shadow appearance-none border rounded w-full text-center py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" id="poin-jabatan" type="number" placeholder="">
                                    <input class="mb-2 shadow appearance-none border rounded w-full text-center py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" id="poin-jabatan" type="number" placeholder="">
                                    <input class="mb-2 shadow appearance-none border rounded w-full text-center py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" id="poin-jabatan" type="number" placeholder="">
                                    <input class="mb-2 shadow appearance-none border rounded w-full text-center py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" id="poin-jabatan" type="number" placeholder="">
                                </div>
                            </div>

                            <div class="flex -mx-3 mb-6">
                                <div class="w-1/2 px-3 mb-6 md:mb-0">
                                    <label class="block text-gray-700 text-sm font-bold mb-3" for="poin-jabatan">
                                    Penilaian Mutlak
                                    </label>
                                    <input disabled class="mb-3 text-sm appearance-none bg-transparent border-none w-full py-2 placeholder-gray-900 leading-tight" id="poin-jabatan" type="text" placeholder="Integritas kerja (kejujuran dan keterbukaan)">

                                </div>
                                <div class="w-1/6 px-3 mb-6 md:mb-0">
                                    <label class="block text-center text-gray-700 text-sm font-bold mb-2" for="poin-jabatan">
                                    Kriteria Minimal
                                    </label>
                                    <input disabled class="mb-2 shadow appearance-none border rounded w-full py-2 px-3 text-center bg-yellow-100 placeholder-gray-800 leading-tight" id="poin-jabatan" type="text" placeholder="50">

                                </div>
                                <div class="w-1/6 px-3 mb-6 md:mb-0">
                                    <label class="block text-center text-gray-700 text-sm font-bold mb-2" for="poin-laporan">
                                    Nilai Rekan Kary Lain
                                    </label>
                                    <input class="mb-2 shadow appearance-none border rounded w-full text-center py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" id="poin-jabatan" type="number" placeholder="">

                                </div>
                                <div class="w-1/6 px-3 mb-6 md:mb-0">
                                    <label class="block text-center text-gray-700 text-sm font-bold mb-2" for="poin-presensi">
                                    Nilai Manajemen
                                    </label>
                                    <input class="mb-2 shadow appearance-none border rounded w-full text-center py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" id="poin-jabatan" type="number" placeholder="">

                                </div>
                            </div>
                            <div class="mb-8">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                                    Catatan
                                </label>
                                <textarea id="message" rows="4" class="block shadow appearance-none p-2.5 w-full text-sm text-gray-700 bg-gray-50 rounded border focus:outline-none focus:shadow-outline focus:border-gray-500" placeholder="Catatan untuk karyawan"></textarea>
                                
                            </div>

                            <div class="flex items-center justify-between">
                                <button class="bg-rose-800 hover:bg-rose-900 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                    Submit
                                </button>
                            </div>
                        </form>

                </div>
            </div>
        </main>
    </body>
</html>
