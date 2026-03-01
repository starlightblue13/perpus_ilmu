<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Gerbang Ilmu Digital</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-[#c7d3dc] min-h-screen flex items-center justify-center">

    <div class="w-[1000px] p-12 grid grid-cols-2 gap-10">

        <!-- ================= FORM LOGIN ================= -->
        <div class="mt-10">
            <h1 class="text-4xl font-bold text-gray-700 mb-10">Login</h1>

            <form method="POST" action="{{ route('login') }}" class="space-y-7">
                @csrf

                <!-- EMAIL -->
                <div>
                    <label class="font-semibold text-gray-800">Email</label>
                    <div class="flex items-center border border-gray-700 rounded-lg px-3 py-2 mt-1 bg-white">
                        <i class="fa-solid fa-user text-gray-700 mr-3"></i>
                        <input type="email" name="email" class="w-full focus:outline-none" placeholder="Enter your email">
                    </div>
                </div>

                <!-- PASSWORD -->
                <div>
                    <label class="font-semibold text-gray-800">Password</label>
                    <div class="flex items-center border border-gray-700 rounded-lg px-3 py-2 mt-1 bg-white">
                        <i class="fa-solid fa-lock text-gray-700 mr-3"></i>
                        <input type="password" name="password" class="w-full focus:outline-none" placeholder="Enter your password">
                    </div>
                </div>

                <!-- BUTTON -->
                <button class="w-full py-2 bg-[#7edcff] border border-white text-white font-semibold rounded-lg hover:bg-[#6ed0f5] transition">
                    Login
                </button>

                <!-- LINK KE REGISTER -->
                <p class="text-sm text-gray-800 mt-2">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="text-blue-700 font-semibold hover:underline">
                        Register now
                    </a>
                </p>

            </form>
        </div>

        <!-- =============== LOGO SAMPING =============== -->
        <div class="flex flex-col justify-center items-center">
            <img src="{{ asset('images/logo.png') }}" class="w-52 mb-4">
            <h2 class="text-2xl font-bold tracking-wide text-gray-700">GERBANG ILMU DIGITAL</h2>
            <p class="text-gray-700 text-sm mt-2">
                MEMBUKA AKSES PENGETAHUAN TANPA BATAS
            </p>
        </div>

    </div>

</body>
</html>
