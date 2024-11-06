<!doctype html>
<html>

<head>
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon" type="image/png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body class="bg-gradient-to-r from-[#0DBDE5] to-[#2DB08B] text-blue-900">
    <div class="flex flex-col items-center justify-center min-h-screen p-4 sm:p-6 lg:p-8">
        <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-white">
            <img class="w-8 h-8 mr-2" src="{{ asset('assets/img/logo.png') }}" alt="logo">
            POS UMKM
        </a>
        <div class="w-full max-w-4xl bg-gray-800 rounded-lg shadow dark:border dark:border-gray-700">
            <div class="p-4 sm:p-6 md:p-8 space-y-4">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-white md:text-2xl">
                    Buat Akun
                </h1>
                <!-- Tambahkan notifikasi error global -->
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                        role="alert">
                        <strong class="font-bold">Oops!</strong>
                        <span class="block sm:inline">Ada beberapa masalah dengan input Anda.</span>
                    </div>
                @endif
                <form class="space-y-4" action="{{ route('registermahasiswa') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="w-full pt-4">
                            <label for="nama"
                                class="block mb-2 text-sm font-medium text-white">Nama
                                Lengkap</label>
                            <input type="text" name="nama" id="nama"
                                class="bg-gray-700 border border-gray-600 text-white sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('nama') border-red-500 @enderror"
                                required>
                            @error('nama')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full pt-4">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-white">Email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-700 border border-gray-600 text-white sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('email') border-red-500 @enderror"
                                placeholder="name@company.com" required>
                            @error('email')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="w-full pt-4">
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-700 border border-gray-600 text-white sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('password') border-red-500 @enderror"
                                required>
                            @error('password')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full pt-4">
                            <label for="universitas"
                                class="block mb-2 text-sm font-medium text-white">Asal
                                Universitas</label>
                            <input type="text" name="universitas" id="universitas"
                                class="bg-gray-700 border border-gray-600 text-white sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('universitas') border-red-500 @enderror"
                                required>
                            @error('universitas')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full pt-4">
                            <label for="tanggal_lahir"
                                class="block mb-2 text-sm font-medium text-white">Tanggal
                                Lahir</label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                class="bg-gray-700 border border-gray-600 text-white sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('tanggal_lahir') border-red-500 @enderror"
                                required>
                            @error('tanggal_lahir')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full pt-4">
                            <label for="jenis_kelamin"
                                class="block mb-2 text-sm font-medium text-white">Jenis
                                Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin"
                                class="bg-gray-700 border border-gray-600 text-white sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="w-full pt-4">
                            <label for="no_hp"
                                class="block mb-2 text-sm font-medium text-white">Nomor
                                Telepon</label>
                            <input type="tel" name="no_hp" id="no_hp"
                                class="bg-gray-700 border border-gray-600 text-white sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required>
                        </div>
                        <div class="w-full pt-4">
                            <label for="penghasilan"
                                class="block mb-2 text-sm font-medium text-white">Pemasukan</label>
                            <input type="number" name="penghasilan" id="penghasilan"
                                class="bg-gray-700 border border-gray-600 text-white sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required>
                        </div>
                        <div class="w-full pt-4">
                            <label for="pekerjaan"
                                class="block mb-2 text-sm font-medium text-white">Pekerjaan</label>
                            <input type="text" name="pekerjaan" id="pekerjaan"
                                class="bg-gray-700 border border-gray-600 text-white sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required>
                        </div>
                        <div class="w-full pt-4">
                            <label for="foto_profil"
                                class="block mb-2 text-sm font-medium text-white">Upload Foto
                                Profil</label>
                            <input type="file" name="foto_profil" id="foto_profil" accept="image/*"
                                class="bg-gray-700 border border-gray-600 text-white sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required>
                        </div>

                        <div class="w-full pt-4">
                            <label for="provinsi"
                                class="block mb-2 text-sm font-medium text-white">Provinsi</label>
                            <select name="provinsi" id="provinsi"
                                class="bg-gray-700 border border-gray-600 text-white sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required>
                                <option value="">Pilih Provinsi</option>
                            </select>
                        </div>
                        <!-- Kota Select -->
                        <div class="w-full pt-4">
                            <label for="kota"
                                class="block mb-2 text-sm font-medium text-white">Kota</label>
                            <select name="kota" id="kota"
                                class="bg-gray-700 border border-gray-600 text-white sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required>
                                <option value="">Pilih Kota</option>
                            </select>
                        </div>
                        <!-- Kecamatan Select -->
                        <div class="w-full pt-4">
                            <label for="kecamatan"
                                class="block mb-2 text-sm font-medium text-white">Kecamatan</label>
                            <select name="kecamatan" id="kecamatan"
                                class="bg-gray-700 border border-gray-600 text-white sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required>
                                <option value="">Pilih Kecamatan</option>
                            </select>
                        </div>

                        <div class="w-full pt-4">
                            <label for="kode_pos"
                                class="block mb-2 text-sm font-medium text-white">Kode Pos</label>
                            <input type="text" name="kode_pos" id="kode_pos"
                                class="bg-gray-700 border border-gray-600 text-white sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required>
                        </div>
                    </div>
                    <div class="w-full pt-4">
                        <label for="alamat"
                            class="block mb-2 text-sm font-medium text-white">Alamat lengkap</label>
                        <textarea name="alamat" id="alamat" rows="3"
                            class="bg-gray-700 border border-gray-600 text-white sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required></textarea>
                    </div>
                    <div class="w-full">
                        <button type="submit"
                            class="w-full text-white bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition duration-300 ease-in-out transform hover:scale-105 active:scale-95 border border-gray-600">Buat
                            Akun</button>
                    </div>
                    <p class="text-sm font-light text-gray-400">
                        Sudah Punya Akun? <a href="{{ route('login') }}"
                            class="font-medium text-primary-500 hover:underline">Login Disini</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const provinsiSelect = document.getElementById('provinsi');
        const kotaSelect = document.getElementById('kota');
        const kecamatanSelect = document.getElementById('kecamatan');

        let selectedProvinceName = ''; // Variable to store the selected province name
        let selectedKotaName = ''; // Variable to store the selected city name
        let selectedKecamatanName = ''; // Variable to store the selected district name

        // Load provinces
        fetch('/api/provinces')
            .then(response => response.json())
            .then(data => {
                provinsiSelect.innerHTML = '<option value="">Pilih Provinsi</option>';
                data.forEach(province => {
                    provinsiSelect.innerHTML +=
                        `<option value="${province.name}" data-id="${province.id}">${province.name}</option>`;
                });
            });

        // Load cities (regencies) based on selected province
        provinsiSelect.addEventListener('change', function() {
            const provinceId = provinsiSelect.options[provinsiSelect.selectedIndex].getAttribute(
                'data-id');
            selectedProvinceName = this.value; // Store selected province name
            if (provinceId) {
                fetch(`/api/regencies/${provinceId}`)
                    .then(response => response.json())
                    .then(data => {
                        kotaSelect.innerHTML = '<option value="">Pilih Kota</option>';
                        data.forEach(regency => {
                            kotaSelect.innerHTML +=
                                `<option value="${regency.name}" data-id="${regency.id}">${regency.name}</option>`;
                        });
                        kecamatanSelect.innerHTML =
                            '<option value="">Pilih Kecamatan</option>'; // Reset kecamatan
                    });
            } else {
                kotaSelect.innerHTML = '<option value="">Pilih Kota</option>';
                kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
            }
        });

        // Load districts based on selected city (regency)
        kotaSelect.addEventListener('change', function() {
            const regencyId = kotaSelect.options[kotaSelect.selectedIndex].getAttribute('data-id');
            selectedKotaName = this.value; // Store selected city name
            if (regencyId) {
                fetch(`/api/districts/${regencyId}`)
                    .then(response => response.json())
                    .then(data => {
                        kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
                        data.forEach(district => {
                            kecamatanSelect.innerHTML +=
                                `<option value="${district.name}" data-id="${district.id}">${district.name}</option>`;
                        });
                    });
            } else {
                kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
            }
        });

        // Store selected district name
        kecamatanSelect.addEventListener('change', function() {
            selectedKecamatanName = this.value;
        });

        // Assuming you have a form submission or some event where you send the data
        document.getElementById('submit-button').addEventListener('click', function() {
            const formData = {
                province_name: selectedProvinceName,
                city_name: selectedKotaName,
                district_name: selectedKecamatanName
            };

            // Now you can send formData to your server via fetch or AJAX
            console.log(formData); // This is where you'd actually send the data to your server
        });
    });
</script>

</html>
