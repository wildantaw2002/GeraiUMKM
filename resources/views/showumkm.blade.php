<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        .hero-section {
            background: linear-gradient(135deg, #0dbde6, #2eaf88);
            color: white;
            padding: 100px 0 150px;
            clip-path: polygon(0 0, 100% 0, 100% 85%, 0% 100%);
        }
        .hero-content {
            text-align: center;
        }
        .hero-title {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        .hero-subtitle {
            font-size: 1.2rem;
            opacity: 0.8;
        }
        .main-content {
            margin-top: -100px;
        }
        .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        }
        .card-img-top {
            height: 250px;
            object-fit: cover;
        }
        .card-body {
            padding: 2rem;
        }
        .card-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        .info-item {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
        }
        .info-item i {
            margin-right: 10px;
            color: #0dbde6;
        }
        .btn-primary {
            background-color: #0dbde6;
            border: none;
            padding: 10px 20px;
            border-radius: 30px;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #2eaf88;
            transform: scale(1.05);
        }
        .profile-card {
            text-align: center;
        }
        .profile-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 1rem;
            border: 5px solid #fff;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
    </style>

    <title>{{ $umkm->nama_umkm }} - Detail UMKM</title>
</head>

<body>
    @include('layouts.header')

    <div class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title" data-aos="fade-up">{{ $umkm->nama_umkm }}</h1>
                <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="100">Temukan keunikan dan kualitas dari UMKM pilihan</p>
            </div>
        </div>
    </div>

    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5" data-aos="fade-up">
                    <div class="card">
                        <img src="{{ $umkm->foto_sampul ? Storage::url('umkm/foto_sampul/' . $umkm->foto_sampul) : asset('images/sampul.png') }}" class="card-img-top" alt="{{ $umkm->nama_umkm }}">
                        <div class="card-body">
                            <h3 class="card-title">Tentang {{ $umkm->nama_umkm }}</h3>
                            <p class="card-text">{{ $umkm->deskripsi }}</p>

                            <h5 class="mt-4 mb-3">Informasi Bisnis</h5>
                            <div class="info-item">
                                <i class="fas fa-tag"></i>
                                <span><strong>Kategori:</strong> {{ $umkm->kategori }}</span>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span><strong>Alamat:</strong> {{ $umkm->alamat }}, {{ $umkm->kota }}, {{ $umkm->provinsi }} {{ $umkm->kode_pos }}</span>
                            </div>
                            {{-- <div class="info-item">
                                <i class="fas fa-user"></i>
                                <span><strong>Informasi Pemilik:</strong> {{ $umkm->informasi_pemilik }}</span>
                            </div> --}}
                            <div class="info-item">
                                <i class="fas fa-briefcase"></i>
                                <span><strong>Informasi Bisnis:</strong> {{ $umkm->informasi_bisnis }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="100">
                    <div class="card profile-card">
                        <div class="card-body">
                            <img src="{{ Storage::url('umkm/foto_profil/' . $umkm->foto_profil) }}" class="profile-img" alt="{{ $umkm->nama_umkm }}">
                            <h5 class="card-title">{{ $umkm->nama_umkm }}</h5>
                            <div class="info-item justify-content-center">
                                <i class="fas fa-map-pin"></i>
                                <span>{{ $umkm->kota }}, {{ $umkm->provinsi }}</span>
                            </div>
                            <div class="info-item justify-content-center">
                                <i class="fas fa-folder"></i>
                                <span>{{ $umkm->kategori }}</span>
                            </div>
                            <a href="{{ url('/umkm') }}" class="btn btn-primary mt-4">Kembali ke Daftar UMKM</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')

    <script>
        AOS.init({
            duration: 1000,
            once: true,
        });
    </script>
</body>
</html>
