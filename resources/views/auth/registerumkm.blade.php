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
                    Buat Akun UMKM
                </h1>
                @if ($errors->any())
                    <div class="bg-red-100 text-red-700 p-4 rounded-lg">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="space-y-4" action="{{ route('umkmregister') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="gap-4 sm:grid-cols-2 lg:grid-cols-3">
                        <!-- Email -->
                        <div class="w-full pt-4">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-white">Email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-700 border {{ $errors->has('email') ? 'border-red-500' : 'border-gray-600' }} text-white sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="name@company.com" required>
                            @error('email')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="w-full pt-4">
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-white">Password</label>
                            <input type="password" name="password" id="password"
                                class="bg-gray-700 border {{ $errors->has('password') ? 'border-red-500' : 'border-gray-600' }} text-white sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="••••••••" required>
                            @error('password')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Nama UMKM -->
                        <div class="w-full pt-4">
                            <label for="nama_umkm"
                                class="block mb-2 text-sm font-medium text-white">Nama UMKM</label>
                            <input type="text" name="nama_umkm" id="nama_umkm"
                                class="bg-gray-700 border border-gray-600 text-white sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required>
                        </div>
                        <!-- Kategori UMKM -->
                        <div class="w-full pt-4">
                            <label for="kategori_umkm"
                                class="block mb-2 text-sm font-medium text-white">Kategori
                                UMKM</label>
                            <select name="kategori" id="kategori_umkm"
                                class="bg-gray-700 border border-gray-600 text-white sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required>
                                <option value="">Pilih Kategori</option>
                                <option value="F&B">F&B</option>
                                <option value="Retail">Retail</option>
                                <option value="Jasa">Jasa</option>
                                <option value="Produksi">Produksi</option>
                                <option value="Pendidikan">Pendidikan</option>
                                <option value="Kesehatan dan Kecantikan">Kesehatan dan Kecantikan</option>
                                <option value="Teknologi dan Digital">Teknologi dan Digital</option>
                                <option value="Pariwisata dan Hospitality">Pariwisata dan Hospitality</option>
                                <option value="Agribisnis">Agribisnis</option>
                                <option value="Kesenian dan Hiburan">Kesenian dan Hiburan</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>


                        <!-- Informasi Pemilik -->
                        <div class="w-full pt-4">
                            <label for="informasi_pemilik"
                                class="block mb-2 text-sm font-medium text-white">
                                Pemilik UMKM
                            </label>
                            <textarea name="informasi_pemilik" id="informasi_pemilik" rows="3"
                                class="bg-gray-700 border border-gray-600 text-white sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required></textarea>
                        </div>

                        <div class="w-full pt-4">
                            <label for="alamat"
                                class="block mb-2 text-sm font-medium text-white">Alamat</label>
                            <input type="text" name="alamat" id="alamat"
                                class="bg-gray-700 border border-gray-600 text-white sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required>
                        </div>

                        <!-- Deskripsi -->
                        <div class="w-full pt-4">
                            <label for="deskripsi"
                                class="block mb-2 text-sm font-medium text-white">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" rows="3"
                                class="bg-gray-700 border border-gray-600 text-white sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required></textarea>
                        </div>



                        <!-- Foto Profil -->
                        <div class="w-full pt-4">
                            <label for="foto_profil"
                                class="block mb-2 text-sm font-medium text-white">Foto Profil
                                (Opsional)</label>
                            <input type="file" name="foto_profil" id="foto_profil" accept="image/*"
                                class="bg-gray-700 border border-gray-600 text-white sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>

                        <div class="w-full pt-4">
                            <!-- Submit Button -->
                            <button type="submit"
                                class="w-full text-white bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition duration-300 ease-in-out transform hover:scale-105 active:scale-95 border border-gray-600">
                                Daftar UMKM
                            </button>

                        </div>

                        <div class="w-full pt-4">
                            <p class="text-sm font-light text-gray-400">
                                Sudah Punya Akun? <a href="{{ route('login') }}"
                                    class="font-medium text-primary-500 hover:underline">Login
                                    Disini</a>
                            </p>
                        </div>

                    </div>


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
