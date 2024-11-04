@include('layouts.header')

<body>
    <div class="py-5 my-auto" style="background: linear-gradient(to right, #0DBDE5, #2DB08B)">
    <div class="container py-5 my-auto"
        style="min-height: 10vh; display: flex; flex-direction: column; justify-content: center;">

        <!-- Baris pertama dengan 5 kartu -->
        <div class="row justify-content-center text-center">
            <!-- Kartu 1 -->
            <div class="col-6 col-sm-4 col-md-2 animate-from-left mb-4">
                <a href="{{ route('mahasiswa.pekerjaan.category', 'Agrikultur') }}">
                    <div class="card shadow-sm p-3 bg-white rounded-lg h-100" style="border-radius: 10px;">
                        <div>
                            <img src="{{ asset('images/agrikultur.png') }}" class="card-img-top mx-auto"
                                alt="Galeri UMKM" style="width: 50%;">
                            <div class="card-body">
                                <h5 class="card-title" style="font-size: 14px;">Agrikultur</h5>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Kartu 2 -->
            <div class="col-6 col-sm-4 col-md-2 animate-from-right mb-4">
                <a href="{{ route('mahasiswa.pekerjaan.category', 'Akuntansi') }}">
                    <div class="card shadow-sm p-3 bg-white rounded-lg h-100">
                        <img src="{{ asset('images/akuntansi.png') }}" class="card-img-top mx-auto"
                            alt="Konsultasi UMKM" style="width: 50%;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 14px;">Akuntansi</h5>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Kartu 3 -->
            <div class="col-6 col-sm-4 col-md-2 animate-from-left mb-4">
                <a href="{{ route('mahasiswa.pekerjaan.category', 'Edukasi') }}">
                    <div class="card shadow-sm p-3 bg-white rounded-lg h-100">
                        <img src="{{ asset('images/edukasi.png') }}" class="card-img-top mx-auto"
                            alt="Informasi Bisnis" style="width: 50%;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 14px;">Edukasi</h5>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Kartu 4 -->
            <div class="col-6 col-sm-4 col-md-2 animate-from-right mb-4">
                <a href="{{ route('mahasiswa.pekerjaan.category', 'Finance') }}">
                    <div class="card shadow-sm p-3 bg-white rounded-lg h-100">
                        <img src="{{ asset('images/finance.png') }}" class="card-img-top mx-auto" alt="Chat"
                            style="width: 50%;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 14px;">Finance</h5>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Kartu 5 -->
            <div class="col-6 col-sm-4 col-md-2 animate-from-left mb-4">
                <a href="{{ route('mahasiswa.pekerjaan.category', 'Teknologi') }}">
                    <div class="card shadow-sm p-3 bg-white rounded-lg h-100">
                        <img src="{{ asset('images/tekonolgi.png') }}" class="card-img-top mx-auto" alt="Blog"
                            style="width: 50%;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 14px;">Teknologi</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Baris kedua dengan 5 kartu -->
        <div class="row justify-content-center text-center">
            <!-- Kartu 6 -->
            <div class="col-6 col-sm-4 col-md-2 animate-from-left mb-4">
                <a href="{{ route('mahasiswa.pekerjaan.category', 'Kesehatan') }}">
                    <div class="card shadow-sm p-3 bg-white rounded-lg h-100">
                        <img src="{{ asset('images/kesehatan.png') }}" class="card-img-top mx-auto" alt="Blog"
                            style="width: 50%;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 14px;">Kesehatan</h5>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Kartu 7 -->
            <div class="col-6 col-sm-4 col-md-2 animate-from-right mb-4">
                <a href="{{ route('mahasiswa.pekerjaan.category', 'Kreatif') }}">
                    <div class="card shadow-sm p-3 bg-white rounded-lg h-100">
                        <img src="{{ asset('images/kreativ.png') }}" class="card-img-top mx-auto" alt="Blog"
                            style="width: 50%;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 14px;">Kreatif</h5>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Kartu 8 -->
            <div class="col-6 col-sm-4 col-md-2 animate-from-left mb-4">
                <a href="{{ route('mahasiswa.pekerjaan.category', 'Lingkungan') }}">
                    <div class="card shadow-sm p-3 bg-white rounded-lg h-100">
                        <img src="{{ asset('images/lingkungan.png') }}" class="card-img-top mx-auto" alt="Blog"
                            style="width: 50%;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 14px;">Lingkungan</h5>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Kartu 9 -->
            <div class="col-6 col-sm-4 col-md-2 animate-from-right mb-4">
                <a href="{{ route('mahasiswa.pekerjaan.category', 'Sosial') }}">
                    <div class="card shadow-sm p-3 bg-white rounded-lg h-100">
                        <img src="{{ asset('images/sosial.png') }}" class="card-img-top mx-auto" alt="Blog"
                            style="width: 50%;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 14px;">Sosial</h5>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Kartu 10 -->
            <div class="col-6 col-sm-4 col-md-2 animate-from-left mb-4">
                <a href="{{ route('mahasiswa.pekerjaan.category','Marketing') }}">
                    <div class="card shadow-sm p-3 bg-white rounded-lg h-100">
                        <img src="{{ asset('images/marketing.png') }}" class="card-img-top mx-auto" alt="Blog"
                            style="width: 50%;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 14px;">Marketing</h5>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Kartu 10 -->
            <div class="col-6 col-sm-4 col-md-2 animate-from-left mb-4">
                <a href="{{ route('mahasiswa.pekerjaan.category', 'Lainnya') }}">
                    <div class="card shadow-sm p-3 bg-white rounded-lg h-100">
                        <img src="{{ asset('images/blog.png') }}" class="card-img-top mx-auto" alt="Blog"
                            style="width: 50%;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 14px;">Lainnya</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Tombol untuk menampilkan semua proyek -->
        <div class="row justify-content-center mt-4">
            <div class="col-md-4 text-center">
                <a href="{{ route('show.all.pekerjaan') }}" class="btn btn-primary btn-lg">
                    Lihat Semua Proyek
                </a>
            </div>
        </div>
    </div>
</div>

     @php
        $categories = ['Agrikultur', 'Akuntansi', 'Edukasi', 'Finance', 'Teknologi', 'Kesehatan', 'Kreatif', 'Lingkungan', 'Sosial','Marketing','Lainnya'];
    @endphp

{{-- {{ route('jobs.show', $job->id) }} --}}
@foreach($categories as $category)
    <div class="shadow-lg">
        <div class="product-section shadow-sm">
            <div class="container">
                <div class="row">
                    <!-- Start Column 1 -->
                    <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
                        <h2 class="mb-4 section-title">{{ $category }}</h2>
                        <p class="mb-4">Temukan pekerjaan menarik di bidang {{ $category }}.</p>
                        <p><a href="{{ route('mahasiswa.pekerjaan.category', $category) }}" class="btn">Explore</a></p>
                    </div>
                    <!-- End Column 1 -->

                    @php
                        $jobs = App\Models\pekerjaan::where('kategori', $category)
                            ->where('status', 'active') // Kondisi hanya menampilkan pekerjaan dengan status active
                            ->take(3)
                            ->get();
                    @endphp

                    @foreach($jobs as $job)
                    <!-- Job Listing -->
                    <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                        <a class="product-item" href="{{ route('mahasiswa.pekerjaan.show', $job->id) }}">
                            <img src="{{ asset('images/logosme.jpg') }}" class="img-fluid product-thumbnail">
                            <h3 class="product-title">{{ $job->posisi }}</h3>
                            <strong class="product-price">{{ $job->tempat_bekerja }}</strong>
                            <span class="icon-cross">
                                <img src="{{ asset('images/logosme.jpg') }}" class="img-fluid">
                            </span>
                        </a>
                    </div>
                    <!-- End Job Listing -->
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endforeach

    @include('layouts.footer')

