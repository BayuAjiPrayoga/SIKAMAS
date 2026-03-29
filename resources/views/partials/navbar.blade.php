<nav class="navbar navbar-expand-lg fixed-top" id="mainNavbar">
    <div class="container">
        {{-- Brand Logo --}}
        <a class="navbar-brand d-flex align-items-center gap-2" href="#beranda">
            <div class="brand-icon">
                <i class="bi bi-cash-coin"></i>
            </div>
            <div class="brand-text">
                <span class="brand-name">SIKAMAS</span>
                <span class="brand-tagline">Kas Masjid Digital</span>
            </div>
        </a>

        {{-- Mobile Toggle --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu"
            aria-controls="navMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Nav Links --}}
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto align-items-center gap-1">
                <li class="nav-item">
                    <a class="nav-link" href="#beranda">
                        <i class="bi bi-house me-1"></i>Beranda
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#fitur">
                        <i class="bi bi-grid me-1"></i>Fitur
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#statistik">
                        <i class="bi bi-bar-chart me-1"></i>Statistik
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#pengurus">
                        <i class="bi bi-people me-1"></i>Pengurus
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#kontak">
                        <i class="bi bi-envelope me-1"></i>Kontak
                    </a>
                </li>
                <li class="nav-item ms-lg-3">
                    <a class="btn btn-navbar-cta" href="#login">
                        <i class="bi bi-box-arrow-in-right me-1"></i>Masuk Sistem
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
