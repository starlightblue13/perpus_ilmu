<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register - Gerbang Ilmu Digital</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-[#c7d3dc] flex items-center justify-center min-h-screen">

    <div class="bg-white/30 backdrop-blur-md w-[800px] p-10 rounded-2xl shadow-xl grid grid-cols-2 gap-10">

        <!-- FORM REGISTER -->
        <div>
            <h1 class="text-3xl font-bold text-gray-700 mb-8">Register</h1>

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- NAME -->
                <div>
                    <label class="font-semibold">Name</label>
                    <div class="flex items-center border border-gray-600 rounded-lg px-3 mt-1 bg-white">
                        <i class="fa-solid fa-user text-gray-600"></i>
                        <input type="text" name="name" class="w-full px-3 py-2 focus:outline-none" placeholder="Enter your name">
                    </div>
                </div>

                <!-- EMAIL -->
                <div>
                    <label class="font-semibold">Email</label>
                    <div class="flex items-center border border-gray-600 rounded-lg px-3 mt-1 bg-white">
                        <i class="fa-solid fa-envelope text-gray-600"></i>
                        <input type="email" name="email" class="w-full px-3 py-2 focus:outline-none" placeholder="Enter your email">
                    </div>
                </div>

                <!-- PASSWORD -->
                <div>
                    <label class="font-semibold">Password</label>
                    <div class="flex items-center border border-gray-600 rounded-lg px-3 mt-1 bg-white">
                        <i class="fa-solid fa-lock text-gray-600"></i>
                        <input type="password" name="password" class="w-full px-3 py-2 focus:outline-none" placeholder="Enter your password">
                    </div>
                </div>

                <!-- REGISTER BUTTON -->
                <button class="w-full py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                    Register
                </button>

                <p class="text-sm mt-2">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-blue-700 font-semibold hover:underline">Login now</a>
                </p>

            </form>
        </div>

        <!-- LOGO -->
        <div class="flex flex-col items-center justify-center">
            <img src="{{ asset('images/logo2.png') }}" class="w-44 mb-4">
            <h2 class="text-xl font-bold tracking-wide">GERBANG ILMU DIGITAL</h2>
            <p class="text-gray-700 text-sm">MEMBUKA AKSES PENGETAHUAN TANPA BATAS</p>
        </div>

    </div>

</body>
</html>
