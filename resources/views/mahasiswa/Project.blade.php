@include('layouts.header')
@include('layouts.header')

<!-- Search Section -->
<section class="bg-secondary text-primary py-9 pt-20 m-11">
    <div class="container mx-auto text-center px-6 md:px-0">
        <div class="bg-teal-500 text-white py-8 px-10 rounded-lg shadow-lg max-w-5xl mx-auto">
            <h2 class="text-2xl md:text-3xl font-bold">Temukan Pekerjaan</h2>
            <h2 class="text-2xl md:text-3xl font-bold">Di Berbagai Bidang</h2>
        </div>
    </div>
</section>

<!-- Job Categories with Cards (Dynamic Content from Syntax 1) -->
<section id="jobs" class="py-16 px-10">
    <div class="container mx-auto">
        @php
            $categories = ['Agrikultur', 'Akuntansi', 'Edukasi', 'Finance', 'Teknologi', 'Kesehatan', 'Kreatif', 'Lingkungan', 'Sosial','Marketing','Lainnya'];
        @endphp

        @foreach($categories as $category)
            <div class="category-section mb-10">
                <h3 class="text-xl font-bold mb-4">{{ $category }}</h3>
                <p class="mb-4">Temukan pekerjaan menarik di bidang {{ $category }}.</p>
                <div class="flex overflow-x-scroll space-x-6">
                    @php
                        $jobs = App\Models\pekerjaan::where('kategori', $category)
    ->where('status', 'active')
    ->paginate(3); // Use paginate instead of get

                    @endphp

                    @foreach($jobs as $job)
                        <div class="w-80 flex-none bg-white rounded-lg shadow-md p-4 flex flex-col">
                            <img src="{{ asset('images/logosme.jpg') }}" class="w-full h-48 object-cover rounded-t-lg mb-4" alt="{{ $job->posisi }}">
                            <h5 class="font-bold">{{ $job->posisi }}</h5>
                            <strong class="text-gray-700">{{ $job->tempat_bekerja }}</strong>
                            <a href="{{ route('mahasiswa.pekerjaan.show', $job->id) }}" class="btn btn-primary mt-auto bg-teal-500 text-white rounded-lg p-2 mt-4">Lihat Detail</a>
                        </div>
                    @endforeach

                </div>
                <p class="mt-4"><a href="{{ route('mahasiswa.pekerjaan.category', $category) }}" class="btn btn-outline-primary">Explore More in {{ $category }}</a></p>
            </div>
        @endforeach
    </div>
</section>

<!-- Pagination Section -->
<div class="d-flex justify-content-center mt-4 mb-5">
    {{ $jobs->links() }}
</div>

<!-- JavaScript for Hamburger Menu -->
<script>
    document.getElementById('menu-toggle').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>

    @include('layouts.footer')

