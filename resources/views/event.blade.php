<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="Explore expertly curated articles across various domains." />
    <meta name="keywords" content="articles, insights, news, professional" />

    <!-- Bootstrap CSS and Custom Styling -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- AOS Animation library for scroll animations -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">

    <!-- Custom Styles -->
    <style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fa;
    }

    .card {
        border: none;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 15px;
        overflow: hidden;
        margin-bottom: 30px;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .card-img-top {
        height: 200px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .card:hover .card-img-top {
        transform: scale(1.05);
    }

    .card-body {
        padding: 1.5rem;
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 0.75rem;
    }

    .card-text {
        color: #6c757d;
        font-size: 0.9rem;
    }

    .btn-read-more {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 8px 16px;
        border-radius: 30px;
        transition: background-color 0.3s ease;
        font-size: 0.9rem;
    }

    .btn-read-more:hover {
        background-color: #0056b3;
        color: white;
    }

    .article-meta {
        font-size: 0.8rem;
        color: #6c757d;
        margin-bottom: 0.5rem;
    }

    .featured-card .card-img-top {
        height: 300px;
    }

    .featured-card .card-title {
        font-size: 1.5rem;
    }

    .section-title {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 2rem;
        position: relative;
        padding-bottom: 10px;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 50px;
        height: 3px;
        background-color: #007bff;
    }

    .nav-tabs .nav-link {
        color: #495057;
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        padding: 10px 20px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .nav-tabs .nav-link.active {
        color: #007bff;
        background-color: #fff;
        border-bottom-color: transparent;
    }

    .nav-tabs .nav-link:hover {
        border-color: #e9ecef #e9ecef #dee2e6;
    }

    @media (max-width: 768px) {
        .featured-card .card-img-top {
            height: 200px;
        }
    }
    </style>

    <title>Pos UMKM - Artikel Terbaru</title>
</head>

<body>
    @include('layouts.header')

    <div class="container py-5">
        <h2 class="section-title" data-aos="fade-right">Featured Articles</h2>
        <div class="row">
            @foreach ($artikel->take(3) as $featured)
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="card featured-card">
                        <img src="{{ Storage::url($featured->foto) }}" class="card-img-top" alt="{{ $featured->judul }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $featured->judul }}</h5>
                            <div class="article-meta">
                                <span class="me-3"><i class="far fa-clock"></i> {{ $featured->created_at->diffForHumans() }}</span>
                                <span><i class="far fa-eye"></i> {{ number_format(rand(1000, 10000)) }} Views</span>
                            </div>
                            <p class="card-text">{{ Str::limit($featured->isi, 100) }}</p>
                            <a href="{{ route('event.detail', $featured->id) }}" class="btn btn-read-more">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <h2 class="section-title mt-5" data-aos="fade-right">All Articles</h2>

        <ul class="nav nav-tabs mb-4" id="articleTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="event-tab" data-bs-toggle="tab" data-bs-target="#event" type="button" role="tab" aria-controls="event" aria-selected="true">Events</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="news-tab" data-bs-toggle="tab" data-bs-target="#news" type="button" role="tab" aria-controls="news" aria-selected="false">News</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="tips-tab" data-bs-toggle="tab" data-bs-target="#tips" type="button" role="tab" aria-controls="tips" aria-selected="false">Tips</button>
            </li>
        </ul>

        <div class="tab-content" id="articleTabsContent">
            @foreach (['event', 'news', 'tips'] as $category)
                <div class="tab-pane fade {{ $category === 'event' ? 'show active' : '' }}" id="{{ $category }}" role="tabpanel" aria-labelledby="{{ $category }}-tab">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="row">
                                @foreach ($artikel->where('category', $category)->skip(3) as $item)
                                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                                        <div class="card">
                                            <img src="{{ Storage::url($item->foto) }}" class="card-img-top" alt="{{ $item->judul }}">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $item->judul }}</h5>
                                                <div class="article-meta">
                                                    <span class="me-3"><i class="far fa-clock"></i> {{ $item->created_at->diffForHumans() }}</span>
                                                    <span><i class="far fa-comment"></i> {{ rand(5, 50) }} Comments</span>
                                                </div>
                                                <p class="card-text">{{ Str::limit($item->isi, 80) }}</p>
                                                <a href="{{ route('event.detail', $item->id) }}" class="btn btn-read-more">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-4" data-aos="fade-left" data-aos-delay="200">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">Related {{ ucfirst($category) }}</h5>
                                    @foreach ($artikel->where('category', $category)->take(5) as $related)
                                        <div class="d-flex mb-3">
                                            <img src="{{ Storage::url($related->foto) }}" class="rounded" width="70" height="70" style="object-fit: cover;" alt="{{ $related->judul }}">
                                            <div class="ms-3">
                                                <h6 class="mb-1"><a href="{{ route('event.detail', $related->id) }}" class="text-dark">{{ Str::limit($related->judul, 40) }}</a></h6>
                                                <small class="text-muted">{{ $related->created_at->format('M d, Y') }}</small>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- AOS and Bootstrap Scripts -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/tiny-slider.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true,
            mirror: false
        });

        // Lazy loading images
        document.addEventListener("DOMContentLoaded", function() {
            var lazyImages = [].slice.call(document.querySelectorAll("img.lazy"));

            if ("IntersectionObserver" in window) {
                let lazyImageObserver = new IntersectionObserver(function(entries, observer) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            let lazyImage = entry.target;
                            lazyImage.src = lazyImage.dataset.src;
                            lazyImage.classList.remove("lazy");
                            lazyImageObserver.unobserve(lazyImage);
                        }
                    });
                });

                lazyImages.forEach(function(lazyImage) {
                    lazyImageObserver.observe(lazyImage);
                });
            }
        });
    </script>

    @include('layouts.footer')
</body>

</html>
