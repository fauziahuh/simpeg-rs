<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <title>Edit Pengguna</title>

    </head>
    <body class="flex bg-gray-100 min-h-screen">
        @include('layout/topbar')
        @include('layout/sidebar')
        <main class="flex-1 pt-20 pb-8 pl-72 pr-8 bg-rose-50">
            <div class="">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="text-3xl font-bold leading-tight tracking-tight text-gray-900">Edit Data Pengguna</h1>
                    <span class="text-md">Mengubah Data Pengguna</span>
                </div>

                <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                    <a href="{{route('usermanagement.index')}}" class="inline-flex items-center text-sm font-medium text-rose-400 hover:text-rose-600">
                        User Management
                    </a>
                    </li>
                    <li aria-current="page">
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 text-sm font-medium text-gray-400 md:ml-2">Edit Data Pengguna</span>
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
                    <form action="{{ route('usermanagement.update', ['id' => $user->id]) }}" method="POST" class="bg-white shadow-lg sm:rounded-lg rounded px-8 pt-6 pb-8 mb-4">
                        @csrf
                        @method('PUT')
                        <div class="md:flex md:items-center mb-6">        
                            <div class="md:w-1/4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="id">
                                    User ID
                                </label>
                            </div>
                                <div class="md:w-3/4">
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-100 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" name="id" type="text" value="{{ $user->id }}" disabled>
                                </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">        
                            <div class="md:w-1/4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                                    Name
                                </label>
                            </div>
                                <div class="md:w-3/4">
                                    <input required="" class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" name="name" type="text" value="{{ $user->name }}">
                                </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">        
                            <div class="md:w-1/4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                                    Email
                                </label>
                            </div>
                                <div class="md:w-3/4">
                                    <input required="" class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" name="email" type="text" value="{{ $user->email }}">
                                </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">        
                            <div class="md:w-1/4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                    Username
                                </label>
                            </div>
                                <div class="md:w-3/4">
                                    <input required="" class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" name="username" type="text" value="{{ $user->username }}">
                                </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">        
                            <div class="md:w-1/4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                                    Set New Password
                                </label>
                            </div>
                                <div class="md:w-3/4">
                                    <input required="" class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-50 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gray-500" name="password" type="password" value="">
                                </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="user_level">
                                    User Level
                                </label>
                            </div>
                            <div class="md:w-3/4 flex items-center">
                                <div class="md:w-1/4">
                                    <input name="user_level" type="radio" value="2" class="w-4 h-4 text-rose-800 bg-gray-100 border-gray-300" {{ $user->user_level == '2' ? 'checked' : '' }}>
                                    <label for="inline-radio" class="ml-2 text-sm font-medium text-gray-900">HRD & Eksekutif</label>
                                </div>
                                <div class="md:w-1/4 mr-4">
                                    <input name="user_level" type="radio" value="3" class="w-4 h-4 text-rose-800 bg-gray-100 border-gray-300" {{ $user->user_level == '3' ? 'checked' : '' }}>
                                    <label for="inline-2-radio" class="ml-2 text-sm font-medium text-gray-900">Kepala Seksi</label>
                                </div>
                                <div class="md:w-1/4 mr-4">
                                    <input name="user_level" type="radio" value="4" class="w-4 h-4 text-rose-800 bg-gray-100 border-gray-300" {{ $user->user_level == '4' ? 'checked' : '' }}>
                                    <label for="inline-2-radio" class="ml-2 text-sm font-medium text-gray-900">Karyawan</label>
                                </div>
                                <div class="md:w-1/4 mr-4">
                                    <input name="user_level" type="radio" value="5" class="w-4 h-4 text-rose-800 bg-gray-100 border-gray-300" {{ $user->user_level == '5' ? 'checked' : '' }}>
                                    <label for="inline-2-radio" class="ml-2 text-sm font-medium text-gray-900">Operator IT</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="user_level">
                                    User Status
                                </label>
                            </div>
                            <div class="md:w-3/4 flex items-center">
                                <div class="md:w-1/4">
                                    <input name="user_status" type="radio" value="Active" class="w-4 h-4 text-rose-800 bg-gray-100 border-gray-300" {{ $user->user_status == 'Active' ? 'checked' : '' }}>
                                    <label for="inline-radio" class="ml-2 text-sm font-medium text-gray-900">Active</label>
                                </div>
                                <div class="md:w-1/4 mr-4">
                                    <input name="user_status" type="radio" value="Inactive" class="w-4 h-4 text-rose-800 bg-gray-100 border-gray-300" {{ $user->user_status == 'Inactive' ? 'checked' : '' }}>
                                    <label for="inline-2-radio" class="ml-2 text-sm font-medium text-gray-900">Inactive</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex items-center ">
                            <button class="bg-white hover:bg-rose-50 text-rose-800 border border-rose-800 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-2" type="button" onclick="window.history.back();">
                                Cancel
                            </button>
                            <button class="bg-rose-800 hover:bg-rose-900 text-white border border-rose-800 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                Save
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </main>

    </body>
</html>
