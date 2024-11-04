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

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }
        .custom-gradient {
            background: linear-gradient(135deg, #0dbde6, #2eaf88);
            color: white;
            padding: 80px 0;
            margin-bottom: 40px;
        }
        .search-container {
            max-width: 600px;
            margin: 0 auto;
            position: relative;
        }
        .search-form {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50px;
            padding: 10px;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
        }
        .search-form:hover, .search-form:focus-within {
            background: rgba(255, 255, 255, 0.3);
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
        }
        .search-form input {
            flex-grow: 1;
            border: none;
            background: transparent;
            color: white;
            font-size: 18px;
            padding: 10px 20px;
            outline: none;
        }
        .search-form input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }
        .search-form button {
            background: white;
            color: #2eaf88;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            font-size: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .search-form button:hover {
            background: #2eaf88;
            color: white;
            transform: scale(1.1);
        }
        .category-section {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 30px;
        }
        .category-title {
            color: #2eaf88;
            border-bottom: 2px solid #0dbde6;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        .card-body {
            padding: 20px;
        }
        .card-title {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }
        .card-text {
            color: #666;
        }
        .btn-primary {
            background-color: #0dbde6;
            border: none;
            border-radius: 30px;
            padding: 10px 20px;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #2eaf88;
        }
        .pagination {
            justify-content: center;
        }
    </style>

    <title>Pos UMKM</title>
</head>

<body>
    @include('layouts.header')
    <div class="custom-gradient">
        <div class="container text-center">
            <h1 class="display-4 mb-4">Jelajahi UMKM Kami</h1>
            <p class="lead mb-5">Lebih Dari {{ $umkms->total() }} UMKM Tersedia di Malang Raya</p>
            <div class="search-container">
                <form action="{{ route('umkm.index.beranda') }}" method="GET" class="search-form">
                    <input type="text" name="search" placeholder="Cari UMKM..." value="{{ $search ?? '' }}">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <!-- Category sections and cards remain the same -->
        @foreach (['F&B', 'Retail', 'Jasa', 'Produksi', 'Pendidikan', 'Kesehatan dan Kecantikan', 'Teknologi dan Digital', 'Pariwisata dan Hospitality', 'Agribisnis', 'Kesenian dan Hiburan', 'Lainnya'] as $category)
        <div class="category-section">
            <h3 class="category-title mb-4">{{ $category }}</h3>
            <div class="row">
                @foreach ($umkms->where('kategori', $category) as $umkm)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ $umkm->foto_profil ? Storage::url('umkm/foto_profil/' . $umkm->foto_profil) : asset('images/default.png') }}" class="card-img-top" alt="{{ $umkm->nama_umkm }}">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $umkm->nama_umkm }}</h5>
                            <p class="card-text flex-grow-1">{{ \Illuminate\Support\Str::limit($umkm->deskripsi, 100) }}</p>
                            <a href="{{ route('umkm.show', $umkm->id) }}" class="btn btn-primary mt-auto">Lihat Detail</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4 mb-5">
            {{ $umkms->links() }}
        </div>
    </div>
    @include('layouts.footer')
</body>
</html>
