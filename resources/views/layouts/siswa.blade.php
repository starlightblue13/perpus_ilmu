<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Gerbang Ilmu Digital - Siswa</title>

    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-gray-100">

    <!-- ====================== NAVBAR SISWA ====================== -->
    <nav class="w-full bg-[#c7d3dc] px-6 py-4 flex items-center justify-between shadow">

        <div class="flex items-center gap-3">
            <img src="{{ asset('images/logo.png') }}" class="h-10">
        </div>

        <div class="flex items-center gap-10 font-semibold text-gray-900">

            <a href="{{ route('siswa.dashboard') }}"
               class="hover:underline {{ request()->routeIs('siswa.dashboard') ? 'font-bold' : '' }}">
               dashboard
            </a>

            <a href="{{ route('siswa.katalog') }}"
               class="hover:underline {{ request()->routeIs('siswa.katalog') ? 'font-bold' : '' }}">
               katalog buku
            </a>

            <a href="{{ route('siswa.peminjaman.saya') }}"
               class="hover:underline {{ request()->routeIs('siswa.peminjaman.saya') ? 'font-bold' : '' }}">
               peminjaman saya
            </a>

            <a href="{{ route('siswa.riwayat') }}"
               class="hover:underline {{ request()->routeIs('siswa.riwayat') ? 'font-bold' : '' }}">
               riwayat
            </a>

        </div>

        <!-- PROFIL + LOGOUT -->
        <div class="flex items-center gap-6 text-2xl text-gray-900">

            <a href="{{ route('siswa.profil.index') }}">
                <i class="fas fa-user"></i>
            </a>

            <a href="?logout=true" class="hover:text-red-600">
                <i class="fas fa-sign-out-alt"></i>
            </a>

        </div>

    </nav>

    <!-- ====================== HALAMAN KONTEN ====================== -->
    <main class="p-10">
        @yield('content')
    </main>

    <!-- POPUP LOGOUT -->
    @if(request('logout') == 'true')
    <div class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm flex items-center justify-center z-[9999]">

        <div class="bg-white w-[380px] p-7 rounded-2xl shadow-2xl text-center">

            <div class="text-6xl text-red-500 mb-3">!</div>

            <h2 class="text-xl font-bold mb-2">Yakin ingin keluar?</h2>
            <p class="text-gray-600 mb-6">Anda akan logout dari akun siswa.</p>

            <div class="flex gap-4 justify-center">

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="px-6 py-2 bg-red-600 text-white rounded-lg shadow hover:bg-red-700">
                        Ya, Logout
                    </button>
                </form>

                <a href="{{ url()->previous() }}"
                   class="px-6 py-2 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600">
                    Batal
                </a>

            </div>

        </div>

    </div>
    @endif

</body>
</html>
