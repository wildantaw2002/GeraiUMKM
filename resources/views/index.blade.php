@extends('layouts.header')
@section('content')

<!-- Hero Section -->
<section class="flex flex-col-reverse md:flex-row items-center justify-between max-w-7xl mx-auto px-8 py-20 md:py-24 space-y-8 md:space-y-0 min-h-screen mt-8">
  <div class="text-center md:text-left space-y-6 max-w-lg">
    <h1 class="text-5xl font-bold">
      Belajar dan <span class="text-teal-700">Berkembang</span> Tanpa Batas
    </h1>
    <p class="text-gray-600 text-lg">
      POSUMKM adalah sebuah bisnis sociopreneurship yang berfokus pada pemberdayaan pendidikan dan pertumbuhan UMKM. Kami menghubungkan mahasiswa, dosen, masyarakat, dan pelaku usaha menengah ke bawah untuk menciptakan solusi inovatif.
    </p>
    <button class="bg-teal-700 text-white px-8 py-3 rounded-full font-semibold text-lg">Explore More</button>
  </div>

  <div class="relative flex justify-center md:justify-end mb-8 md:mb-0">

    <!-- Mobile Image (Visible on small screens) -->
    <img src="{{ asset('assets/img/bannerMobile.png') }}" alt="Banner Mobile Image" class="block md:hidden w-96 rounded-lg">
    <img src="{{ asset('assets/img/bannerWeb.png') }}" alt="Banner Desktop Image" class="hidden md:block w-96 md:w-[500px] lg:w-[600px] rounded-lg">
  </div>
</section>

<!-- Trust Section -->
<section class="">
  <div class="container mx-auto text-center px-6 md:px-0">
    <div class="bg-teal-500 text-white py-8 px-10 rounded-lg shadow-lg max-w-5xl mx-auto">
      <h2 class="text-2xl md:text-3xl font-bold">Lebih Dari 100 UMKM Percaya Kepada Kami</h2>
      <p class="text-lg md:text-xl mt-4 text-white">Kami telah membantu lebih dari 100 UMKM untuk berkembang dan mencapai potensi maksimal mereka.</p>
    </div>
  </div>
</section>

<div class="product-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-3 mb-5 mb-lg-0 fade-in">
        <h2 class="mb-4 section-title">Temukan Project dengan mudah</h2>
        <p class="mb-4">Temukan berbagai proyek yang sesuai dengan minat dan keahlian Anda dengan mudah. Kami
          menyediakan platform yang memudahkan kolaborasi dan memberikan akses ke peluang terbaik.</p>
        <p><a href="{{ route('mahasiswa.pekerjaan') }}" class="btn btn-primary">Explore</a></p>
      </div>
      @foreach ($pekerjaan as $item)
      <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0 fade-in">
        <a class="product-item" href="{{ route('mahasiswa.pekerjaan.show', $item->id) }}"
          onclick="checkLogin(event)">
          <!-- Gambar pekerjaan -->
          <img src="{{ asset('images/complete.png') }}" class="img-fluid product-thumbnail"
            alt="{{ $item->posisi }}">
          <!-- Ubah link ke rute pekerjaan -->
          <h3 class="product-title">Posisi : {{ $item->posisi }}</h3>
          <p class="product-description">Deskripsi : {{ Str::limit($item->deskripsi, 100) }}</p>
          <p class="product-location">Tempat : {{ $item->tempat_bekerja }}</p>
          {{-- <p class="product-date">{{ \Carbon\Carbon::parse($item->tanggal)->format('d M, Y') }}</p> --}}
        </a>
      </div>
      @endforeach

    </div>
  </div>
</div>
<section>
  <!-- SECTION LOGO UMKM -->
  <div class="wrapper">
    @foreach ($umkm as $umkm)
        <div class="item w-[200px] h-[100px] bg-white rounded-lg shadow-lg flex items-center justify-center transition duration-300 ease-in-out hover:scale-105">
            <img src="{{ asset('storage/' . $umkm->foto_profil) }}" alt="{{ $umkm->nama_umkm }}" class="grayscale hover:grayscale-0 transition duration-300 ease-in-out">
        </div>
    @endforeach
</div>

</section>

<!-- Conditional Menu Section for Mahasiswa -->
@auth
@if(auth()->user()->role == 'mahasiswa')
<section class="text-center py-16">
  <h2 class="text-2xl font-bold mb-8">Menu</h2>
  <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto">
    <!-- Card Components for Menu Items -->
    <div class="w-full h-48 bg-blue-50 rounded-lg shadow-md flex flex-col items-center justify-center transform transition duration-200 hover:scale-105">
      <img src="{{ asset('assets/img/GaleriUMKM.png') }}" alt="Galeri UMKM" class="mb-4 h-16">
      <p class="text-teal-600 font-semibold">Galeri UMKM</p>
    </div>
    <div class="w-full h-48 bg-blue-50 rounded-lg shadow-md flex flex-col items-center justify-center transform transition duration-200 hover:scale-105">
      <img src="{{ asset('assets/img/KategoriUMKM.png') }}" alt="Kategori" class="mb-4 h-16">
      <p class="text-teal-600 font-semibold">Kategori</p>
    </div>
    <div class="w-full h-48 bg-blue-50 rounded-lg shadow-md flex flex-col items-center justify-center transform transition duration-200 hover:scale-105">
      <img src="{{ asset('assets/img/InformasiBisnis.png') }}" alt="Informasi Bisnis" class="mb-4 h-16">
      <p class="text-teal-600 font-semibold">Informasi Bisnis</p>
    </div>
    <div class="w-full h-48 bg-blue-50 rounded-lg shadow-md flex flex-col items-center justify-center transform transition duration-200 hover:scale-105">
      <img src="{{ asset('assets/img/ContactUs.png') }}" alt="Chat" class="mb-4 h-16">
      <p class="text-teal-600 font-semibold">Contact Us</p>
    </div>
    <div class="w-full h-48 bg-blue-50 rounded-lg shadow-md flex flex-col items-center justify-center transform transition duration-200 hover:scale-105">
      <img src="{{ asset('assets/img/ChatBot.png') }}" alt="ChatHub" class="mb-4 h-16">
      <p class="text-teal-600 font-semibold">ChatHub</p>
    </div>
    <div class="col-span-2 w-full h-48 bg-blue-50 rounded-lg shadow-md flex flex-col items-center justify-center transform transition duration-200 hover:scale-105">
      <img src="{{ asset('assets/img/Blog.png') }}" alt="Blog" class="mb-4 h-16">
      <p class="text-teal-600 font-semibold">Blog</p>
    </div>
    <div class="w-full h-48 bg-blue-50 rounded-lg shadow-md flex flex-col items-center justify-center transform transition duration-200 hover:scale-105">
      <img src="{{ asset('assets/img/ChatBot.png') }}" alt="ChatHub" class="mb-4 h-16">
      <p class="text-teal-600 font-semibold">ChatBot</p>
    </div>
  </div>
</section>
@endif
@endauth

<!-- About Section -->
<section class="max-w-7xl mx-auto px-6 py-16 flex flex-col md:flex-row items-center space-y-8 md:space-y-0 md:space-x-8">
  <div class="md:w-1/2 space-y-6">
    <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Tentang Kami</h2>
    <h3 class="text-2xl font-semibold text-green-600">Visi</h3>
    <p class="text-gray-600">
      Menjadi jembatan yang menghubungkan dunia pendidikan dan kewirausahaan, menciptakan ekosistem yang mendukung inovasi, pengembangan keterampilan, dan solusi nyata bagi tantangan yang dihadapi UMKM.
    </p>
    <h3 class="text-2xl font-semibold text-green-600">Misi</h3>
    <ul class="list-disc pl-6 space-y-2 text-gray-600">
      <li><span class="font-semibold text-teal-600">Memberikan Akses Edukasi Praktis:</span> Melibatkan mahasiswa dalam proyek-proyek UMKM untuk mengembangkan keterampilan kewirausahaan, manajemen, dan komunikasi.</li>
      <li><span class="font-semibold text-teal-600">Dukungan Teknologi dan Konsultasi bagi UMKM:</span> Membantu UMKM mengoptimalkan operasional bisnis dan meningkatkan daya saing di pasar melalui teknologi dan konsultasi.</li>
      <li><span class="font-semibold text-teal-600">Kolaborasi Berbasis Riset:</span> Mendorong kolaborasi antara akademisi dan UMKM untuk menghasilkan inovasi dan pengetahuan baru yang bermanfaat bagi pengembangan bisnis dan pendidikan.</li>
    </ul>
  </div>
  <div class="md:w-1/2 flex flex-col space-y-4">
    <div class="relative bg-gray-300 rounded-lg h-48 flex items-center justify-center">
    </div>
    <div class="bg-gray-300 rounded-lg h-32"></div>
  </div>
</section>

<!-- Main Benefits Section -->
<section class="max-w-7xl mx-auto px-6 py-16">

  <!-- Section Title -->
  <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">Manfaat untuk Pengguna</h2>

  <div class="md:flex md:space-x-12">

    <!-- Placeholder Image Grid -->
    <div class="grid grid-cols-2 gap-4 md:w-1/2 mb-8 md:mb-0">
      <div class="bg-gray-300 rounded-lg h-48"></div>
      <div class="bg-gray-300 rounded-lg h-48"></div>
      <div class="bg-gray-300 rounded-lg h-64 col-span-2"></div>
      <div class="bg-gray-300 rounded-lg h-32"></div>
      <div class="bg-gray-300 rounded-lg h-32"></div>
    </div>

    <!-- Benefits List Section -->
    <div class="md:w-1/2 flex flex-col justify-center space-y-8">

      <!-- Benefit 1 -->
      <div class="flex items-start space-x-4">
        <div class="p-3">
          <img src="{{ asset('assets/img/Mahasiswa.png') }}" alt="">
        </div>
        <div>
          <h3 class="text-xl font-semibold text-gray-900">Mahasiswa</h3>
          <p class="text-gray-600">✔️<span class="font-bold ">Kesempatan Belajar Praktis</span> POS UMKM memberi mahasiswa pengalaman langsung di lapangan melalui keterlibatan dalam proyek UMKM. Mereka bisa menerapkan teori dari kelas ke praktik nyata dan mendapatkan pengalaman berharga.</p>
          <p class="text-gray-600">✔️<span class="font-bold ">Pengembangan Keterampilan:</span> Melalui POS UMKM, mahasiswa dapat mengasah keterampilan kewirausahaan, komunikasi, dan manajemen proyek yang penting untuk karier masa depan.</p>
          <p class="text-gray-600">✔️<span class="font-bold ">Portfolio Pengalaman Nyata:</span> Proyek yang diikuti mahasiswa di POS UMKM bisa menambah nilai dalam portfolio mereka, berguna untuk melamar kerja atau memulai bisnis.</p>
        </div>
      </div>

      <!-- Benefit 2 -->
      <div class="flex items-start space-x-4">
        <div class="p-3">
          <img src="{{ asset('assets/img/UMKM.png') }}" alt="">
        </div>
        <div>
          <h3 class="text-xl font-semibold text-gray-900">UMKM</h3>
          <p class="text-gray-600">✔️<span class="font-bold ">Akses ke Teknologi dan Inovasi:</span> POS UMKM memudahkan pemilik UMKM untuk mengakses teknologi terkini, termasuk sistem POS yang mudah digunakan untuk pengelolaan usaha.</p>
          <p class="text-gray-600">✔️<span class="font-bold ">Bimbingan dan Konsultasi: </span> Pemilik usaha dapat berkonsultasi dengan mahasiswa, dosen, dan pakar di platform untuk mendapatkan wawasan baru, memperbaiki strategi, dan memperluas jaringan.</p>
        </div>
      </div>

      <!-- Benefit 3 -->
      <div class="flex items-start space-x-4">
        <div class="p-3">
          <img src="{{ asset('assets/img/Dosen.png') }}" alt="">
        </div>
        <div>
          <h3 class="text-xl font-semibold text-gray-900">Dosen</h3>
          <p class="text-gray-600">✔️ <span class="font-bold ">Platform Pengajaran Praktis: </span>POS UMKM menyediakan platform yang memungkinkan dosen melibatkan mahasiswa dalam proyek nyata, sehingga pembelajaran lebih mendalam.</p>
          <p class="text-gray-600">✔️ <span class="font-bold ">Kolaborasi dengan UMKM: </span>Pendidik dapat bekerja sama dengan UMKM untuk memberikan pengalaman belajar berbasis proyek dan memberikan dampak nyata bagi masyarakat.</p>
          <p class="text-gray-600">✔️ <span class="font-bold ">Riset dan Pengembangan:</span>Melalui proyek riset bersama mahasiswa dan UMKM, dosen dapat mendukung pengembangan UMKM dan berkontribusi pada ilmu kewirausahaan dan teknologi.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Section Kategori UMKM -->
<section class="py-10 px-6 md:px-16">
  <div class="flex justify-between items-center mb-8">
    <h2 class="text-xl font-semibold">Kategori UMKM</h2>
    <a href="#" class="text-teal-600 font-semibold hover:underline">Lihat Semua</a>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-6 gap-10 justify-items-center">
    <!-- Card Kategori -->
    <div class="flex flex-col items-center">
      <img src="{{ asset ('assets/img/logoFnB.png')}}" alt="F&B" class="w-20 h-20">
      <p class="mt-2 text-sm font-semibold">F&B</p>
    </div>

    <div class="flex flex-col items-center">
      <img src="{{ asset ('assets/img/logoRetail.png')}}" alt="Retail" class="w-20 h-20">
      <p class="mt-2 text-sm font-semibold">Retail</p>
    </div>

    <div class="flex flex-col items-center">
      <img src="{{ asset ('assets/img/logoJasa.png')}}" alt="Jasa" class="w-20 h-20">
      <p class="mt-2 text-sm font-semibold">Jasa</p>
    </div>

    <div class="flex flex-col items-center">
      <img src="{{ asset ('assets/img/logoProduksi.png')}}" alt="Produksi" class="w-20 h-20">
      <p class="mt-2 text-sm font-semibold">Produksi</p>
    </div>

    <div class="flex flex-col items-center">
      <img src="{{ asset ('assets/img/logoEdu.png')}}" alt="Pendidikan" class="w-20 h-20">
      <p class="mt-2 text-sm font-semibold">Pendidikan</p>
    </div>

    <div class="flex flex-col items-center">
      <img src="{{ asset ('assets/img/logoHealth.png')}}" alt="Kesehatan & Kecantikan" class="w-20 h-20">
      <p class="mt-2 text-sm font-semibold text-center">Kesehatan &<br>Kecantikan</p>
    </div>
  </div>
</section>




<!-- Artikel Terkini Section -->
<section class="py-10 px-6 md:px-16">
  <h2 class="text-2xl font-bold text-center mb-10">Artikel Terkini</h2>

  <div class="grid md:grid-cols-3 gap-10">
    @php
    // Select a random sample of 3 articles if there are more than 3, otherwise use all articles
    $items = $artikel->random(min(3, $artikel->count()));
    @endphp

    @foreach ($items as $item)
    @if ($item->foto)
    <!-- Article Card -->
    <div class="bg-white shadow-lg rounded-lg overflow-hidden hover-card transition-transform duration-200">
      <div class="relative">
        <!-- Article Image -->
        <img src="{{ Storage::url($item->foto) }}" alt="{{ $item->judul }}" class="w-full h-48 object-cover">

        <!-- Date Tag Section -->
        <div class="absolute top-4 left-4 bg-white p-2 rounded-lg shadow-lg">
          <div class="text-xs font-semibold text-gray-600">
            <span class="font-bold text-teal-600">{{ \Carbon\Carbon::parse($item->tanggal)->format('d') }}</span>
            {{ \Carbon\Carbon::parse($item->tanggal)->format('M Y') }}
          </div>
        </div>
      </div>

      <!-- Content Section -->
      <div class="p-6">
        <h3 class="font-semibold text-lg mb-2">
          <a href="{{ route('event.detail', $item->id) }}">{{ $item->judul }}</a>
        </h3>
        <p class="text-gray-600">{{ Str::limit($item->deskripsi, 100) }}</p>
        <div class="meta text-gray-500 mt-4">
          <span>by {{ $item->user->name ?? 'Unknown' }}</span>
        </div>
      </div>
    </div>
    @endif
    @endforeach
  </div>

  <!-- View All Button -->
  <div class="text-center mt-8">
    <a href="#" class="text-teal-600 border border-teal-600 px-4 py-2 rounded-full font-semibold hover:bg-teal-600 hover:text-white transition duration-200">
      Lihat Semua
    </a>
  </div>
</section>


<!-- JavaScript for login check and custom alert from Syntax 1 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/app.js')}}"

  @endsection