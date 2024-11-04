<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between w-100">
        <a href="{{ route('index') }}" class="logo d-flex align-items-center">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" style="height: 40px;"> <!-- Set height for better appearance -->
            <span class="d-none d-lg-block ms-2">UMKM</span> <!-- Added margin for spacing -->
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-flex align-items-center" style="margin-left: auto;">
            @csrf
            <button type="submit" class="btn btn-danger ms-3" style="margin-right: 20px;">Logout</button> <!-- Added margin for spacing -->
        </form>
    </div>
</header>
