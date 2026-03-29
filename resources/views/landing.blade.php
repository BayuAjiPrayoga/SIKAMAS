@extends('layouts.app')

@section('title', $appName . ' – ' . $appTagline)

@section('content')

{{-- ============================================================
     SECTION 1: HERO CAROUSEL / BANNER
     ============================================================ --}}
<section id="beranda" class="hero-section">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        {{-- Carousel Indicators --}}
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        {{-- Carousel Items --}}
        <div class="carousel-inner">

            {{-- Slide 1 --}}
            <div class="carousel-item active">
                <div class="hero-slide hero-slide-1">
                    <div class="hero-overlay"></div>
                    <div class="container h-100">
                        <div class="row h-100 align-items-center justify-content-center text-center">
                            <div class="col-lg-8">
                                <div class="hero-badge mb-3 fade-in">
                                    <i class="bi bi-moon-stars me-2"></i>Bismillahirrahmanirrahim
                                </div>
                                <h1 class="hero-title fade-in">
                                    Kelola Kas Masjid<br>
                                    <span class="hero-title-accent">Lebih Transparan</span>
                                </h1>
                                <p class="hero-subtitle fade-in">
                                    {{ $appDescription }}
                                </p>
                                <div class="hero-actions fade-in">
                                    <a href="#fitur" class="btn btn-hero-primary me-3">
                                        <i class="bi bi-grid-3x3-gap me-2"></i>Lihat Fitur
                                    </a>
                                    <a href="#login" class="btn btn-hero-secondary">
                                        <i class="bi bi-play-circle me-2"></i>Mulai Sekarang
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Slide 2 --}}
            <div class="carousel-item">
                <div class="hero-slide hero-slide-2">
                    <div class="hero-overlay"></div>
                    <div class="container h-100">
                        <div class="row h-100 align-items-center justify-content-center text-center">
                            <div class="col-lg-8">
                                <div class="hero-badge mb-3">
                                    <i class="bi bi-shield-check me-2"></i>Amanah & Terpercaya
                                </div>
                                <h1 class="hero-title">
                                    Laporan Keuangan<br>
                                    <span class="hero-title-accent">Real-Time & Akurat</span>
                                </h1>
                                <p class="hero-subtitle">
                                    Pantau setiap transaksi pemasukan dan pengeluaran secara langsung. Laporan otomatis tersedia kapan saja.
                                </p>
                                <div class="hero-actions">
                                    <a href="#statistik" class="btn btn-hero-primary me-3">
                                        <i class="bi bi-bar-chart me-2"></i>Lihat Statistik
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Slide 3 --}}
            <div class="carousel-item">
                <div class="hero-slide hero-slide-3">
                    <div class="hero-overlay"></div>
                    <div class="container h-100">
                        <div class="row h-100 align-items-center justify-content-center text-center">
                            <div class="col-lg-8">
                                <div class="hero-badge mb-3">
                                    <i class="bi bi-building me-2"></i>Untuk Semua Masjid
                                </div>
                                <h1 class="hero-title">
                                    Satu Sistem untuk<br>
                                    <span class="hero-title-accent">Semua Kebutuhan</span>
                                </h1>
                                <p class="hero-subtitle">
                                    Dari masjid kecil hingga masjid besar, {{ $appName }} hadir memberikan solusi pengelolaan keuangan yang cerdas.
                                </p>
                                <div class="hero-actions">
                                    <a href="#kontak" class="btn btn-hero-primary me-3">
                                        <i class="bi bi-telephone me-2"></i>Hubungi Kami
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- Carousel Controls --}}
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <div class="carousel-ctrl-btn">
                <i class="bi bi-chevron-left"></i>
            </div>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <div class="carousel-ctrl-btn">
                <i class="bi bi-chevron-right"></i>
            </div>
        </button>

    </div>

    {{-- Scroll Down Indicator --}}
    <div class="scroll-indicator">
        <div class="scroll-dot"></div>
        <span>Geser ke Bawah</span>
    </div>
</section>


{{-- ============================================================
     SECTION 2: STATISTIK SINGKAT (TICKER)
     ============================================================ --}}
<section class="stats-ticker">
    <div class="container">
        <div class="row g-0">
            @foreach ($stats as $stat)
            <div class="col-6 col-md-3">
                <div class="ticker-item fade-in">
                    <div class="ticker-icon">
                        <i class="bi {{ $stat['icon'] }}"></i>
                    </div>
                    <div class="ticker-value">
                        <span class="counter-num" data-target="{{ $stat['value'] }}">0</span>
                        <span class="ticker-suffix">{{ $stat['suffix'] }}</span>
                    </div>
                    <div class="ticker-label">{{ $stat['label'] }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


{{-- ============================================================
     SECTION 3: TENTANG / ABOUT
     ============================================================ --}}
<section class="about-section py-section" id="tentang">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-5 fade-in">
                <div class="about-visual">
                    <div class="about-card-main">
                        <div class="about-icon-wrap">
                            <i class="bi bi-cash-coin"></i>
                        </div>
                        <h3>{{ $masjidName }}</h3>
                        <p>{{ $masjidAddress }}</p>
                        <div class="about-divider"></div>
                        <div class="about-balance-label">Saldo Kas Saat Ini</div>
                        <div class="about-balance-value">Rp {{ number_format($kasBalance, 0, ',', '.') }}</div>
                    </div>
                    <div class="about-card-badge">
                        <i class="bi bi-patch-check-fill"></i>
                        <span>Terverifikasi</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 fade-in">
                <div class="section-label">Tentang {{ $appName }}</div>
                <h2 class="section-title">Digitalisasi Keuangan Masjid yang <span class="text-accent">Amanah</span></h2>
                <p class="section-text">
                    {{ $appName }} adalah sistem informasi berbasis web yang dirancang khusus untuk membantu
                    pengurus masjid mengelola keuangan secara digital, transparan, dan akuntabel.
                    Kami percaya bahwa setiap rupiah yang diamanahkan umat harus dikelola dengan penuh
                    tanggung jawab dan keterbukaan.
                </p>
                <p class="section-text">
                    Dengan {{ $appName }}, pengurus masjid dapat mencatat setiap transaksi, menghasilkan laporan
                    keuangan otomatis, dan memberikan akses informasi kepada jamaah kapan saja dan di mana saja.
                </p>
                <div class="row g-3 mt-2">
                    <div class="col-sm-6">
                        <div class="about-feature">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Pencatatan Real-Time</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="about-feature">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Laporan Otomatis PDF</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="about-feature">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Akses Multi-Pengguna</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="about-feature">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Keamanan Data Terjaga</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ============================================================
     SECTION 4: FITUR UTAMA
     ============================================================ --}}
<section id="fitur" class="features-section py-section">
    <div class="container">
        <div class="text-center mb-5 fade-in">
            <div class="section-label">Fitur Unggulan</div>
            <h2 class="section-title">Semua yang Anda Butuhkan<br>dalam <span class="text-accent">Satu Platform</span></h2>
            <p class="section-subtitle">Dirancang khusus untuk kebutuhan pengelolaan keuangan masjid modern</p>
        </div>

        <div class="row g-4">
            @foreach ($features as $feature)
            <div class="col-lg-4 col-md-6 fade-in">
                <div class="feature-card">
                    <div class="feature-icon-wrap" style="background: {{ $feature['color'] }}1a; color: {{ $feature['color'] }};">
                        <i class="bi {{ $feature['icon'] }}"></i>
                    </div>
                    <h4 class="feature-title">{{ $feature['title'] }}</h4>
                    <p class="feature-desc">{{ $feature['description'] }}</p>
                    <div class="feature-tag" style="background: {{ $feature['color'] }}1a; color: {{ $feature['color'] }};">
                        {{ $feature['tag'] }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


{{-- ============================================================
     SECTION 5: STATISTIK DETAIL
     ============================================================ --}}
<section id="statistik" class="stats-section py-section">
    <div class="stats-bg-pattern"></div>
    <div class="container position-relative">
        <div class="text-center mb-5 fade-in">
            <div class="section-label section-label-light">Pencapaian Kami</div>
            <h2 class="section-title text-white">Angka Berbicara tentang<br><span class="hero-title-accent">Kepercayaan Umat</span></h2>
        </div>
        <div class="row g-4 justify-content-center">
            @foreach ($achievements as $item)
            <div class="col-lg-3 col-md-6 col-sm-6 fade-in">
                <div class="achieve-card text-center">
                    <div class="achieve-icon"><i class="bi {{ $item['icon'] }}"></i></div>
                    <div class="achieve-number">
                        <span class="counter-num" data-target="{{ $item['value'] }}">0</span>
                        <span class="achieve-suffix">{{ $item['suffix'] }}</span>
                    </div>
                    <div class="achieve-label">{{ $item['label'] }}</div>
                    <div class="achieve-desc">{{ $item['description'] }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


{{-- ============================================================
     SECTION 6: ALUR PENGGUNAAN
     ============================================================ --}}
<section class="how-section py-section">
    <div class="container">
        <div class="text-center mb-5 fade-in">
            <div class="section-label">Cara Kerja</div>
            <h2 class="section-title">Mulai dalam <span class="text-accent">3 Langkah Mudah</span></h2>
        </div>
        <div class="row g-4 align-items-center">
            <div class="col-lg-4 fade-in">
                <div class="how-step">
                    <div class="how-step-number">01</div>
                    <div class="how-step-icon"><i class="bi bi-person-plus"></i></div>
                    <h4>Daftarkan Masjid</h4>
                    <p>Masukkan data profil masjid dan pengurus ke dalam sistem dengan mudah dan cepat.</p>
                </div>
            </div>
            <div class="col-lg-4 fade-in">
                <div class="how-step how-step-center">
                    <div class="how-step-number">02</div>
                    <div class="how-step-icon"><i class="bi bi-pencil-square"></i></div>
                    <h4>Catat Transaksi</h4>
                    <p>Input pemasukan dan pengeluaran secara rutin, sistem otomatis menghitung saldo kas.</p>
                </div>
            </div>
            <div class="col-lg-4 fade-in">
                <div class="how-step">
                    <div class="how-step-number">03</div>
                    <div class="how-step-icon"><i class="bi bi-file-earmark-bar-graph"></i></div>
                    <h4>Unduh Laporan</h4>
                    <p>Ekspor laporan keuangan lengkap dalam format PDF atau Excel setiap saat.</p>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ============================================================
     SECTION 7: PENGURUS MASJID
     ============================================================ --}}
<section id="pengurus" class="team-section py-section">
    <div class="container">
        <div class="text-center mb-5 fade-in">
            <div class="section-label">Tim Pengurus</div>
            <h2 class="section-title">Pengurus <span class="text-accent">{{ $masjidName }}</span></h2>
            <p class="section-subtitle">Dipilih oleh jamaah dan bertanggung jawab kepada Allah SWT</p>
        </div>
        <div class="row g-4 justify-content-center">
            @foreach ($pengurusList as $pengurus)
            <div class="col-lg-3 col-md-6 fade-in">
                <div class="team-card text-center">
                    <div class="team-avatar">
                        <i class="bi bi-person-circle"></i>
                        <div class="team-avatar-ring"></div>
                    </div>
                    <h5 class="team-name">{{ $pengurus['name'] }}</h5>
                    <div class="team-role">{{ $pengurus['role'] }}</div>
                    <div class="team-since">
                        <i class="bi bi-calendar3 me-1"></i>Sejak {{ $pengurus['since'] }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


{{-- ============================================================
     SECTION 8: CALL TO ACTION
     ============================================================ --}}
<section class="cta-section" id="login">
    <div class="cta-glow"></div>
    <div class="container position-relative text-center">
        <div class="cta-icon mb-4 fade-in">
            <i class="bi bi-cash-coin"></i>
        </div>
        <h2 class="cta-title fade-in">Siap Mengelola Keuangan Masjid<br>dengan Lebih Baik?</h2>
        <p class="cta-subtitle fade-in">
            Bergabunglah bersama puluhan masjid yang telah mempercayakan pengelolaan keuangannya kepada {{ $appName }}
        </p>
        <div class="cta-actions fade-in">
            <a href="#" class="btn btn-cta-primary me-3">
                <i class="bi bi-box-arrow-in-right me-2"></i>Masuk ke Sistem
            </a>
            <a href="#kontak" class="btn btn-cta-secondary">
                <i class="bi bi-headset me-2"></i>Hubungi Admin
            </a>
        </div>
        <div class="cta-note fade-in">
            <i class="bi bi-shield-lock me-2"></i>
            Data Anda aman dan terlindungi dengan enkripsi tingkat tinggi
        </div>
    </div>
</section>

@endsection
