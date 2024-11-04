<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">

    <meta name="description" content="{{ $artikel->judul }}" />
    <meta name="keywords" content="event, UMKM, {{ $artikel->judul }}" />

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <!-- AOS CSS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <style>
        .img-zoomin {
            width: 100%;
            height: 400px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .img-zoomin:hover {
            transform: scale(1.05);
        }

        .article-content {
            line-height: 1.8;
            font-size: 1.1rem;
        }
    </style>

    <title>{{ $artikel->judul }} | Pos UMKM</title>
</head>

<body>
    @include('layouts.header')

    <!-- Event Detail Section Start -->
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8">
                <!-- Artikel Detail sebagai Card -->
                <div class="card mb-4" data-aos="fade-up">
                    <img src="{{ Storage::url($artikel->foto) }}" class="card-img-top img-zoomin" alt="{{ $artikel->judul }}">
                    <div class="card-body">
                        <h1 class="card-title display-4 text-dark">{{ $artikel->judul }}</h1>
                        <div class="d-flex justify-content-start mb-3">
                            <span class="text-muted me-3"><i class="fa fa-clock pulsate"></i> {{ $artikel->created_at->diffForHumans() }}</span>
                            <span class="text-muted me-3"><i class="fa fa-eye pulsate"></i> {{ number_format($artikel->views) }} Views</span>
                            <span class="text-muted"><i class="fa fa-share-alt pulsate"></i> {{ number_format($artikel->shares) }} Shares</span>
                        </div>
                        <div class="article-content">
                            {!! nl2br(e($artikel->isi)) !!}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="bg-light rounded p-4" data-aos="fade-right">
                    <h3 class="mb-4">Related Articles</h3>
                    <div class="row g-4">
                        @foreach ($relatedArticles as $related)
                        <div class="col-12" data-aos="fade-up">
                            <div class="card">
                                <img src="{{ Storage::url($related->foto) }}" class="card-img-top img-zoomin" alt="{{ $related->judul }}">
                                <div class="card-body">
                                    <a href="{{ route('event.detail', $related->id) }}" class="h5 card-title">{{ $related->judul }}</a>
                                    <p class="card-text fs-6 text-muted"><i class="fa fa-clock"></i> {{ $related->created_at->diffInMinutes() }} minute read</p>
                                    <p class="card-text fs-6 text-muted"><i class="fa fa-eye"></i> {{ number_format($related->views) }} Views</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Event Detail Section End -->

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/tiny-slider.js') }}"></script>
    <!-- AOS JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            easing: 'slide',
            once: false,
            mirror: true,
        });
    </script>
    @include('layouts.footer')
</body>

</html>
