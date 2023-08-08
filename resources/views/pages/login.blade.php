<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <title>Login</title>

    </head>
    <body class="antialiased">
    <section class="bg-rose-50">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0 shadow-lg">
            <a href="#" class="flex items-center mb-6 text-2xl font-bold text-gray-900">
                <img class="flex-shrink-0 h-16" src="/img/logo-swa.png" alt="logo-swa">
            </a>
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl text-center">
                        Log in to your account
                    </h1>
                    @if(session('error'))
                        <div class="text-red-600 bg-red-100 p-4 rounded-md">
                            <b>Opps!</b> {{session('error')}}
                        </div>
                    @endif
                    <form class="p-2" action="{{route('actionlogin')}}" method="post">
                        @csrf
                        <div>
                            <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                            <input type="text" name="username" id="username" placeholder="Masukkan username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 mb-4" required="">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                            <input type="password" name="password" id="password" placeholder="Masukkan password" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 mb-8" required="">
                        </div>
                        
                        <button type="submit" class="w-full text-white bg-rose-700 hover:bg-rose-900 focus:ring-4 focus:outline-none focus:ring-rose-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Log in
                        </button>
                    </form>
                </div>
            </div>
        </div>
        </section>
    </body>
</html>
