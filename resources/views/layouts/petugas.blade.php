<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Petugas Panel</title>

    @vite('resources/css/app.css')
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-gray-100 flex">

    <!-- ================== SIDEBAR PETUGAS ================== -->
    <aside class="w-64 bg-[#c7d3dc] min-h-screen flex flex-col justify-between">

        <!-- BAGIAN ATAS -->
        <div>

            <!-- LOGO -->
            <div class="py-8 px-4 border-b border-gray-300">
                <img src="{{ asset('images/logo.png') }}" class="w-40 h-auto object-contain">
            </div>

            <!-- MENU -->
            <nav class="mt-4 space-y-3 px-4 text-gray-900 font-medium">

                <a href="{{ route('petugas.dashboard') }}"
                   class="flex items-center gap-3 px-3 py-2 rounded-lg transition
                          {{ request()->routeIs('petugas.dashboard') ? 'bg-white shadow' : '' }}">
                    <i class="fa-solid fa-house text-xl"></i>
                    Dashboard
                </a>

                <a href="{{ route('petugas.peminjaman.pending') }}"
                   class="flex items-center gap-3 px-3 py-2 rounded-lg transition
                          {{ request()->routeIs('petugas.peminjaman.*') ? 'bg-white shadow' : '' }}">
                    <i class="fa-solid fa-layer-group text-xl"></i>
                    Peminjaman Buku
                </a>

                <a href="{{ route('petugas.siswa.index') }}"
                   class="flex items-center gap-3 px-3 py-2 rounded-lg transition">
                    <i class="fa-solid fa-user-graduate text-xl"></i>
                    Data Siswa
                </a>

                <a href="{{ route('petugas.rating.index') }}"
                   class="flex items-center gap-3 px-3 py-2 rounded-lg transition">
                    <i class="fa-solid fa-star text-xl"></i>
                    Rating
                </a>

                <a href="{{ route('petugas.buku.index') }}"
                   class="flex items-center gap-3 px-3 py-2 rounded-lg transition">
                    <i class="fa-solid fa-book text-xl"></i>
                    Data Buku
                </a>

            </nav>

        </div>

        <!-- BAGIAN BAWAH -->
        <div class="px-4 pb-6 space-y-3 text-gray-900 font-medium">

            <a href="{{ route('petugas.profil') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg transition hover:bg-white">
                <i class="fa-solid fa-user text-xl"></i>
                Profil
            </a>

            <a href="?logout=true"
               class="flex items-center gap-3 px-3 py-2 rounded-lg transition hover:bg-red-500 hover:text-white">
                <i class="fa-solid fa-right-from-bracket text-xl"></i>
                Logout
            </a>

        </div>

    </aside>

    <!-- ======== KONTEN ======== -->
    <main class="flex-1 p-10">
        @yield('content')
    </main>

    <!-- ================== POPUP LOGOUT ================== -->
    @if(request('logout') == 'true')
    <div class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm flex items-center justify-center z-[9999]">

        <div class="bg-white w-[380px] p-7 rounded-2xl shadow-2xl text-center">

            <div class="text-6xl text-red-500 mb-3">!</div>

            <h2 class="text-xl font-bold mb-2">Keluar dari Akun?</h2>
            <p class="text-gray-600 mb-6">Apakah Anda yakin ingin logout?</p>

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
