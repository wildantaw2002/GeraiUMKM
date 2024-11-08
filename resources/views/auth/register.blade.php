<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Mahasiswa Gerai UMKM</title>
    <link rel="stylesheet" href="./css/style.css">
    @vite('resources/css/app.css')
</head>
<body class="bg-white min-h-screen flex font-poppins">

<!-- Left Side (White Background with Registration Form) -->
<div class="w-full md:w-1/2 h-full bg-white flex items-center justify-center">
    <div class="w-full max-w-lg p-8 py-10 bg-white rounded-lg ">

        <!-- Logo -->
        <div class="flex justify-center mt-12">
           <a href="{{ route('index') }}"><img src="{{ asset('assets/img/logoText.png') }}" alt="POS UMKM Logo" style="height: 45px;"></a>
        </div>

        <p class="text-center text-gray-500 mb-8">Buat akun Anda sebagai mahasiswa</p>

        <!-- Error Notification -->
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Oops!</strong>
                <span class="block sm:inline">Ada beberapa masalah dengan input Anda.</span>
            </div>
        @endif

        <!-- Registration Form -->
        <form action="{{ route('registermahasiswa') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <!-- Nama Lengkap -->
            <div class="relative">
                <label for="nama" class="absolute -top-3 left-3 bg-white px-1 text-gray-400 font-thin">Nama lengkap</label>
                <input type="text" id="nama" name="nama" placeholder="John" class="w-full p-3 border-2 border-gray-300 rounded-lg placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-2 @error('nama') border-red-500 @enderror" required>
                @error('nama')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email and Password -->
            <div class="flex space-x-4">
                <div class="relative w-1/2">
                    <label for="email" class="absolute -top-3 left-3 bg-white px-1 text-gray-400 font-thin">Email</label>
                    <input type="email" id="email" name="email" placeholder="name@company.com" class="w-full p-3 border-2 border-gray-300 rounded-lg placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-2 @error('email') border-red-500 @enderror" required>
                    @error('email')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="relative w-1/2">
                    <label for="password" class="absolute -top-3 left-3 bg-white px-1 text-gray-400 font-thin">Password</label>
                    <input type="password" id="password" name="password" placeholder="Doe" class="w-full p-3 border-2 border-gray-300 rounded-lg placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-2 @error('password') border-red-500 @enderror" required>
                    @error('password')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- University -->
            <div class="relative">
                <label for="universitas" class="absolute -top-3 left-3 bg-white px-1 text-gray-400 font-thin">Asal Universitas</label>
                <input type="text" id="universitas" name="universitas" class="w-full p-3 border-2 border-gray-300 rounded-lg placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-2 @error('universitas') border-red-500 @enderror" required>
                @error('universitas')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tanggal Lahir and Jenis Kelamin -->
            <div class="flex space-x-4">
                <div class="relative w-1/2">
                    <label for="tanggal_lahir" class="absolute -top-3 left-3 bg-white px-1 text-gray-400 font-thin">Tanggal Lahir</label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="w-full p-3 border-2 border-gray-300 rounded-lg placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-2 @error('tanggal_lahir') border-red-500 @enderror" required>
                    @error('tanggal_lahir')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="relative w-1/2">
                    <label for="jenis_kelamin" class="absolute -top-3 left-3 bg-white px-1 text-gray-400 font-thin">Jenis Kelamin</label>
                    <select id="jenis_kelamin" name="jenis_kelamin" class="w-full p-3 border-2 border-gray-300 rounded-lg text-gray-900 focus:outline-none focus:ring-2" required>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
            </div>

            <!-- No Telp and Pekerjaan -->
            <div class="flex space-x-4">
                <div class="relative w-1/2">
                    <label for="no_telp" class="absolute -top-3 left-3 bg-white px-1 text-gray-400 font-thin">No Telp</label>
                    <input type="text" id="no_telp" name="no_telp" class="w-full p-3 border-2 border-gray-300 rounded-lg placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-2 @error('no_telp') border-red-500 @enderror" required>
                    @error('no_telp')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="relative w-1/2">
                    <label for="pekerjaan" class="absolute -top-3 left-3 bg-white px-1 text-gray-400 font-thin">Pekerjaan</label>
                    <input type="text" id="pekerjaan" name="pekerjaan" class="w-full p-3 border-2 border-gray-300 rounded-lg placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-2 @error('pekerjaan') border-red-500 @enderror" required>
                    @error('pekerjaan')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Upload Foto Profile -->
            <div class="relative">
                <label for="foto_profil" class="absolute -top-3 left-3 bg-white px-1 text-gray-400 font-thin">Upload Foto Profile</label>
                <input type="file" id="foto_profil" name="foto_profil" accept="image/*" class="w-full p-3 border-2 border-gray-300 rounded-lg text-gray-900 focus:outline-none focus:ring-2" required>
            </div>

            <!-- Provinsi, Kota, Kecamatan -->
            <div class="flex space-x-4">
                <div class="relative w-1/3">
                    <label for="provinsi" class="absolute -top-3 left-3 bg-white px-1 text-gray-400 font-thin">Provinsi</label>
                    <select id="provinsi" name="provinsi" class="w-full p-3 border-2 border-gray-300 rounded-lg text-gray-900 focus:outline-none focus:ring-2" required>
                        <option value="">Pilih Provinsi</option>
                    </select>
                </div>
                <div class="relative w-1/3">
                    <label for="kota" class="absolute -top-3 left-3 bg-white px-1 text-gray-400 font-thin">Kota</label>
                    <select id="kota" name="kota" class="w-full p-3 border-2 border-gray-300 rounded-lg text-gray-900 focus:outline-none focus:ring-2" required>
                        <option value="">Pilih Kota</option>
                    </select>
                </div>
                <div class="relative w-1/3">
                    <label for="kecamatan" class="absolute -top-3 left-3 bg-white px-1 text-gray-400 font-thin">Kecamatan</label>
                    <select id="kecamatan" name="kecamatan" class="w-full p-3 border-2 border-gray-300 rounded-lg text-gray-900 focus:outline-none focus:ring-2" required>
                        <option value="">Pilih Kecamatan</option>
                    </select>
                </div>
            </div>

            <!-- Alamat Lengkap -->
            <div class="relative">
                <label for="alamat" class="absolute -top-3 left-3 bg-white px-1 text-gray-400 font-thin">Alamat Lengkap</label>
                <input type="text" id="alamat" name="alamat" class="w-full p-3 border-2 border-gray-300 rounded-lg placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-2 @error('alamat') border-red-500 @enderror" required>
            </div>

            <!-- Daftar Button -->
            <button type="submit" class="w-full p-3 bg-teal-400 text-white font-semibold rounded-lg hover:bg-teal-500 transition">Daftar</button>
        </form>

        <div class="text-center mt-4">
            <p class="text-sm text-gray-600">Sudah Punya akun? <a href="{{ route('login') }}" class="text-blue-500 font-semibold hover:underline">Login Here</a></p>
        </div>
    </div>
</div>

<!-- Right Side (Gradient Background with Centered Logo) -->
<div class="hidden md:flex w-full md:w-1/2 min-h-screen bg-gradient-to-r from-custom-start to-custom-end items-center justify-center">
    <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="w-1/3">
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const provinsiSelect = document.getElementById('provinsi');
        const kotaSelect = document.getElementById('kota');
        const kecamatanSelect = document.getElementById('kecamatan');

        // Load provinces
        fetch('/api/provinces')
            .then(response => response.json())
            .then(data => {
                provinsiSelect.innerHTML = '<option value="">Pilih Provinsi</option>';
                data.forEach(province => {
                    provinsiSelect.innerHTML += `<option value="${province.name}" data-id="${province.id}">${province.name}</option>`;
                });
            });

        // Add event listeners to load cities and districts based on province selection
        provinsiSelect.addEventListener('change', function() {
            const provinceId = provinsiSelect.options[provinsiSelect.selectedIndex].getAttribute('data-id');
            if (provinceId) {
                fetch(`/api/regencies/${provinceId}`)
                    .then(response => response.json())
                    .then(data => {
                        kotaSelect.innerHTML = '<option value="">Pilih Kota</option>';
                        data.forEach(regency => {
                            kotaSelect.innerHTML += `<option value="${regency.name}" data-id="${regency.id}">${regency.name}</option>`;
                        });
                        kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
                    });
            } else {
                kotaSelect.innerHTML = '<option value="">Pilih Kota</option>';
                kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
            }
        });

        kotaSelect.addEventListener('change', function() {
            const regencyId = kotaSelect.options[kotaSelect.selectedIndex].getAttribute('data-id');
            if (regencyId) {
                fetch(`/api/districts/${regencyId}`)
                    .then(response => response.json())
                    .then(data => {
                        kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
                        data.forEach(district => {
                            kecamatanSelect.innerHTML += `<option value="${district.name}" data-id="${district.id}">${district.name}</option>`;
                        });
                    });
            } else {
                kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
            }
        });
    });
</script>

</body>
</html>
