<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('layout/initialization')
        <title>User Management</title>

    </head>
    <body class="flex bg-gray-100 min-h-screen">
        @include('layout/topbar')
        @include('layout/sidebar')
        <main class="flex-1 pt-20 pb-8 pl-72 pr-8 bg-rose-50">
            <div class="h-96">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="text-3xl font-bold leading-tight tracking-tight text-gray-900">User Management</h1>
                    <span class="text-md">Manajemen data pengguna sistem informasi klinik</span>
                </div>

                @if(session('success'))
                    <div class="w-1/2 bg-green-100 border border-green-400 text-green-700 px-4 py-3 mb-4 rounded relative">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="pt-8">
                    <div class="font-semibold text-gray-600 text-lg mb-2">Input Data Baru</div>
                    <div class="flex items-center justify-between">
                        <a href="{{route('usermanagement.create')}}" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold py-1 px-4 rounded focus:outline-none focus:shadow-outline">
                            Tambah Data Pengguna
                        </a>
                    </div>
                </div>

                <div class="pt-8 relative overflow-x-auto shadow-lg sm:rounded-lg">
                    <div class="font-semibold text-gray-600 text-lg mb-2">Daftar Pengguna</div>
                    <div class="bg-white shadow-lg sm:rounded-lg rounded px-4 py-4">
                        <table id="myTable" class="w-full cell-border compact stripe hover row-border text-sm text-left text-gray-500">
                            <thead class="text-gray-700 bg-rose-100">
                                <tr>
                                    <th>
                                        Nama
                                    </th>
                                    <th>
                                        Username
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        User Level
                                    </th>
                                    <th>
                                        User Status
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->user_level }}</td>
                                    <td>
                                        @if ($user->user_status === 'Active')
                                            <span class="bg-emerald-500 rounded text-white px-2">{{ $user->user_status }}</span>
                                        @else
                                            <span class="bg-gray-500 rounded text-white px-2">{{ $user->user_status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="flex">
                                            <a href="{{ route('usermanagement.edit', ['id' => $user->id]) }}" class="bg-yellow-500 hover:bg-yellow-700 font-bold py-1 px-2 rounded mr-2 inline-block">
                                                <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="pencil">
                                                    <path fill="currentColor" d="M22,7.24a1,1,0,0,0-.29-.71L17.47,2.29A1,1,0,0,0,16.76,2a1,1,0,0,0-.71.29L13.22,5.12h0L2.29,16.05a1,1,0,0,0-.29.71V21a1,1,0,0,0,1,1H7.24A1,1,0,0,0,8,21.71L18.87,10.78h0L21.71,8a1.19,1.19,0,0,0,.22-.33,1,1,0,0,0,0-.24.7.7,0,0,0,0-.14ZM6.83,20H4V17.17l9.93-9.93,2.83,2.83ZM18.17,8.66,15.34,5.83l1.42-1.41,2.82,2.82Z"></path>
                                                </svg>
                                            </a>
                                            <form action="{{ route('usermanagement.delete', ['id' => $user->id]) }}" method="POST" onsubmit="return confirm('Apakah anda yakin ingin menghapus data pengguna ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded flex items-center">
                                                    <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" id="bin">
                                                        <path fill="currentColor" fill-rule="evenodd" d="M15 5V3H9v2H3v2h18V5zM5 8v12c0 1.103.897 2 2 2h10c1.103 0 2-.897 2-2V8H5zm6 10H9v-6h2v6zm4 0h-2v-6h2v6z"></path>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
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
