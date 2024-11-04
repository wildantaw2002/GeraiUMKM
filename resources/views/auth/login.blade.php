<!doctype html>
<html>

<head>
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon" type="image/png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body class="bg-gradient-to-r from-[#0DBDE5] to-[#2DB08B] text-white">
    <div class="flex flex-col items-center justify-center min-h-screen p-4 sm:p-6 lg:p-8">
        <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-white">
            <img class="w-8 h-8 mr-2" src="{{ asset('assets/img/logo.png') }}" alt="logo">
            POS UMKM
        </a>
        <div class="w-full max-w-4xl bg-gray-800 rounded-lg shadow dark:border dark:border-gray-700">
            <div class="p-4 sm:p-6 md:p-8 space-y-4">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-white md:text-2xl">
                    Login Akun
                </h1>
                <form class="space-y-4" action="{{ route('postlogin') }}" method="POST">
                    @csrf
                    <div class="space-y-4">
                        <div class="w-full">
                            <label for="email" class="block mb-2 text-sm font-medium text-white">Email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-700 border border-gray-600 text-white sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="name@company.com" required>
                        </div>
                        <div class="w-full">
                            <label for="password" class="block mb-2 text-sm font-medium text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-700 border border-gray-600 text-white sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required>
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition duration-300 ease-in-out transform hover:scale-105 active:scale-95 border border-gray-600">Login
                            Account</button>
                        <!-- Bagian ini diperbarui -->
                        <div class="flex justify-between">
                            <p class="text-sm font-light text-gray-400">
                                Belum Punya Akun?
                            </p>
                        </div>
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show p-4" style="font-size: 1.5rem;">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <!-- Alert untuk error -->
                        @if (session('error'))
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4"
                                role="alert">
                                <strong class="font-bold">Error!</strong>
                                <span class="block sm:inline">{{ session('error') }}</span>
                            </div>
                        @endif
                        <div class="flex justify-between space-x-2">
                            <a href="{{ route('register') }}"
                                class="w-full text-center text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Registrasi sebagai Mahasiswa
                            </a>
                            <a href="{{ route('registerumkm') }}"
                                class="w-full text-center text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                Registrasi sebagai UMKM
                            </a>
                        </div>
                        <div class="flex justify-between">
                            <p class="text-sm font-light text-gray-400">
                                Lupa Password? <a href="#"
                                    class="font-medium text-primary-500 hover:underline">Klik
                                    Disini</a>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
