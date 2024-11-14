    @include('layouts.header')
    <!-- Search Section -->
    <section class="bg-secondary text-primary py-9 pt-20 m-11">
        <div class="container mx-auto text-center px-6 md:px-0">
            <div class="bg-teal-500 text-white py-8 px-10 rounded-lg shadow-lg max-w-5xl mx-auto">
                <h2 class="text-2xl md:text-3xl font-bold">Temukan UMKM</h2>
                <h2 class="text-2xl md:text-3xl font-bold">Di Sekitar Malang Raya</h2>
            </div>
        </div>
    </section>

    <!-- UMKM Categories with Cards (Dynamic Content from Syntax 1) -->
    <section id="umkm" class="py-16 px-10">
        <div class="container mx-auto">
            @foreach (['F&B', 'Retail', 'Jasa', 'Produksi', 'Pendidikan', 'Kesehatan dan Kecantikan', 'Teknologi dan Digital', 'Pariwisata dan Hospitality', 'Agribisnis', 'Kesenian dan Hiburan', 'Lainnya'] as $category)
                <div class="category-section mb-10">
                    <h3 class="text-xl font-bold mb-4">{{ $category }}</h3>
                    <div class="flex overflow-x-scroll space-x-6">
                        @foreach ($umkms->where('kategori', $category) as $umkm)
                        <div class="w-80 flex-none bg-white rounded-lg shadow-md p-4 flex flex-col">
                            <img src="{{ $umkm->foto_profil ? Storage::url('umkm/foto_profil/' . $umkm->foto_profil) : asset('images/default.png') }}" class="w-full h-48 object-cover rounded-t-lg mb-4" alt="{{ $umkm->nama_umkm }}">
                            <h5 class="font-bold">{{ $umkm->nama_umkm }}</h5>
                            <p class="text-gray-500">{{ \Illuminate\Support\Str::limit($umkm->deskripsi, 100) }}</p>
                            <a href="{{ route('umkm.show', $umkm->id) }}" class="btn btn-primary mt-auto bg-teal-500 text-white rounded-lg p-2 mt-4">Lihat Detail</a>
                        </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Pagination Section -->
    <div class="d-flex justify-content-center mt-4 mb-5">
        {{ $umkms->links() }}
    </div>
    @include('layouts.footer')

    <!-- JavaScript for Hamburger Menu -->
    <script>
        document.getElementById('menu-toggle').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
</body>
</html>