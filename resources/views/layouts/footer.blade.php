<footer class="footer-section">
    <div class="container relative">
        <div class="sofa-img text-center mb-4">
            {{-- <img src="{{ asset('images/logorevv.png') }}" alt="Image" class="img-fluid"> --}}
        </div>
        <div class="row g-5 mb-5">
            <div class="col-lg-4 col-md-6">
                <div class="mb-4 footer-logo-wrap">
                    <a href="#" class="footer-logo">POS UMKM<span>.</span></a>
                </div>
                <p class="mb-4">
                    Temukan berbagai proyek yang sesuai dengan minat dan keahlian Anda dengan mudah. Kami menyediakan
                    platform yang memudahkan kolaborasi dan memberikan akses ke peluang terbaik. Mulai eksplorasi Anda
                    sekarang dan wujudkan ide menjadi kenyataan.
                </p>
                <ul class="list-unstyled custom-social d-flex justify-content-center">
                    {{-- <li><a href="#" class="me-2"><span class="fa fa-brands fa-facebook-f"></span></a></li> --}}
                    {{-- <li><a href="#" class="me-2"><span class="fa fa-brands fa-twitter"></span></a></li> --}}
                    <li><a href="https://www.instagram.com/posumkm.id/" class="me-2"><span class="fa fa-brands fa-instagram"></span></a></li>
                    {{-- <li><a href="#" class="me-2"><span class="fa fa-brands fa-linkedin"></span></a></li> --}}
                </ul>
            </div>
            <div class="col-lg-8 col-md-6">
                <div class="row links-wrap">
                    <div class="col-6 col-sm-6 col-md-3">
                        <ul class="list-unstyled mt-3">
                            <li><a href="{{ route('event') }}">Blog</a></li>
                            <li><a href="https://api.whatsapp.com/send?phone=6287857263135">Contact us</a></li>
                            <li><a href="{{ route('mahasiswa.chat') }}">Live chat</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-top copyright">
            <div class="row pt-4">
                <div class="col-lg-6 col-md-12 text-center text-lg-start">
                    <p class="mb-2">
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script>. All Rights Reserved. &mdash; Designed by <a
                            href="https://untreco">Jesica and team</a> Distributed By <a
                            href="https://themewgon.com">Team Pos UMKM</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <style>
        /* Menghilangkan gambar di layar mobile */
        @media (max-width: 768px) {
            .sofa-img {
                display: none;
            }
        }
    </style>
</footer>
