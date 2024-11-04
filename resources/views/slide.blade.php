<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

  <!-- Bootstrap CSS -->
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link href="{{asset('css/tiny-slider.css')}}" rel="stylesheet">
  <link href="{{asset('css/style.css')}}" rel="stylesheet">
  <title>Furni Free Bootstrap 5 Template for Furniture and Interior Design Websites by Untree.co </title>

  <style>
    /* Custom CSS for hero section and slider */
    .hero {
      padding: 100px 0;
      background-color: #f8f9fa;
    }

    .hero .intro-excerpt h1 {
      font-size: 48px;
      color: #333;
    }

    .hero .intro-excerpt p {
      font-size: 18px;
      color: #666;
    }

    .hero .btn {
      padding: 10px 20px;
      font-size: 16px;
    }

    .hero-img-wrap {
      position: relative;
    }

    .hero-img-wrap img {
      max-width: 100%;
      border-radius: 10px;
    }

    .my-slider img {
      width: 100%;
      height: auto;
      border-radius: 10px;
    }

    .tns-controls {
      display: none;
    }

    .tns-nav {
      text-align: center;
      margin-top: 10px;
    }

    .tns-nav button {
      background: #ddd;
      border-radius: 50%;
      width: 10px;
      height: 10px;
      margin: 0 5px;
      border: none;
    }

    .tns-nav button.tns-nav-active {
      background: #333;
    }
  </style>
</head>

<body>

  <!-- Start Header/Navigation -->
  <nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">
    <div class="container">
      <a class="navbar-brand" href="index.html">Pos<span>UMKM</span></a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsFurni">
        <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
          <li class="nav-item active">
            <a class="nav-link" href="index.html">Beranda</a>
          </li>
          <li><a class="nav-link" href="shop.html">Event</a></li>
          <li><a class="nav-link" href="about.html">UMKM</a></li>
        </ul>

        <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
          <li><a class="nav-link" href="#"><img src="{{asset('images/user.svg')}}"></a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Header/Navigation -->

  <!-- Start Hero Section -->
  <div class="hero">
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-lg-5">
          <div class="intro-excerpt">
            <h1>Pos<span clsas="d-block"> UMKM</span></h1>
            <p class="mb-4">Pos UMKM adalah Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eligendi aspernatur asperiores modi delectus. Commodi harum vitae facilis nulla ullam ipsa molestiae possimus consectetur, dolorem eius. Minus quisquam eius repudiandae dolore.</p>
            <p><a href="" class="btn btn-secondary me-2">Apply Lowongan</a><a href="#" class="btn btn-white-outline">Berita</a></p>
          </div>
        </div>

        <!-- Start Hero Image with Slider -->
        <div class="col-lg-7">
          <div class="hero-img-wrap">
            <div class="my-slider">
              <div>
                <img src="{{asset('images/couch.png')}}" class="img-fluid">
              </div>
              <div>
                <img src="{{asset('images/product-1.png')}}" class="img-fluid">
              </div>
              <div>
                <img src="{{asset('images/product-2.png')}}" class="img-fluid">
              </div>
            </div>
          </div>
        </div>
        <!-- End Hero Image with Slider -->

      </div>
    </div>
  </div>
  <!-- End Hero Section -->

  <!-- Scripts -->
  <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('js/tiny-slider.js')}}"></script>

  <script>
    var slider = tns({
      container: '.my-slider',
      items: 1,
      slideBy: 'page',
      autoplay: true,
      controls: false,
      nav: true,
      speed: 400,
      autoplayTimeout: 3000,
      autoplayButtonOutput: false
    });
  </script>
</body>

</html>
