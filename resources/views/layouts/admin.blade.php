<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerbang Ilmu Digital</title>

    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-gray-100 flex">

    <!-- ==================== SIDEBAR ADMIN ==================== -->
    <aside class="w-64 bg-[#C9D8E2] min-h-screen shadow-md flex flex-col justify-between">

        <!-- LOGO -->
        <div class="py-8 px-4 border-b border-gray-300">
            <img src="{{ asset('images/logo.png') }}" class="w-35 h-auto object-contain">
        </div>

        <!-- MENU -->
        <nav class="flex-1 px-4 py-6 space-y-2">

            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-3 p-3 rounded-lg hover:bg-white transition
               {{ request()->routeIs('admin.dashboard') ? 'bg-white shadow' : '' }}">
                <i class="fa-solid fa-house text-xl"></i> Dashboard
            </a>

            <a href="{{ route('admin.buku.index') }}"
               class="flex items-center gap-3 p-3 rounded-lg hover:bg-white transition
               {{ request()->routeIs('admin.buku.*') ? 'bg-white shadow' : '' }}">
                <i class="fa-solid fa-book text-xl"></i> Data Buku
            </a>

            <a href="{{ route('admin.riwayat') }}"
               class="flex items-center gap-3 p-3 rounded-lg hover:bg-white transition">
                <i class="fa-solid fa-clock-rotate-left text-xl"></i> Riwayat Peminjaman
            </a>

            <a href="{{ route('admin.pending.index') }}"
               class="flex items-center gap-3 p-3 rounded-lg hover:bg-white transition">
                <i class="fa-solid fa-clock text-xl"></i> Pending
            </a>

            <a href="{{ route('admin.dipinjam.index') }}"
               class="flex items-center gap-3 p-3 rounded-lg hover:bg-white transition">
                <i class="fa-solid fa-book-open text-xl"></i> Buku Dipinjam
            </a>

            <a href="{{ route('admin.pengguna.index') }}"
               class="flex items-center gap-3 p-3 rounded-lg hover:bg-white transition">
                <i class="fa-solid fa-users text-xl"></i> Pengguna
            </a>

            <a href="{{ route('admin.petugas.index') }}"
               class="flex items-center gap-3 p-3 rounded-lg hover:bg-white transition">
                <i class="fa-solid fa-user-tie text-xl"></i> Petugas
            </a>

            <a href="{{ route('admin.rating.index') }}"
               class="flex items-center gap-3 p-3 rounded-lg hover:bg-white transition">
                <i class="fa-solid fa-star text-xl"></i> Rating
            </a>

            <a href="{{ route('admin.profil') }}"
               class="flex items-center gap-3 p-3 rounded-lg hover:bg-white transition">
                <i class="fa-solid fa-user-circle text-xl"></i> Profil
            </a>

        </nav>

        <!-- LOGOUT -->
        <div class="p-4">
            <a href="?logout=true"
               class="flex items-center gap-3 p-3 rounded-lg bg-red-500 text-white hover:bg-red-600 transition">
                <i class="fa-solid fa-right-from-bracket text-xl"></i> Logout
            </a>
        </div>

    </aside>

    <!-- ==================== CONTENT ==================== -->
    <main class="flex-1 p-10">
        @yield('content')
    </main>

    <!-- ======================= POPUP LOGOUT ======================= -->
    @if(request('logout') == 'true')
    <div class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm flex items-center justify-center z-[9999]">

        <div class="bg-white w-[380px] p-7 rounded-2xl shadow-2xl text-center">

            <div class="text-6xl text-red-500 mb-3">!</div>

            <h2 class="text-xl font-bold mb-2">Yakin ingin keluar?</h2>
            <p class="text-gray-600 mb-6">Anda akan logout dari akun admin.</p>

            <div class="flex gap-4 justify-center">

                <!-- YA LOGOUT -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="px-6 py-2 bg-red-600 text-white rounded-lg shadow hover:bg-red-700">
                        Ya, keluar
                    </button>
                </form>

                <!-- BATAL -->
                <a href="{{ route('admin.dashboard') }}"
                   class="px-6 py-2 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600">
                    Batal
                </a>

            </div>

        </div>

    </div>
    @endif

</body>
</html>
