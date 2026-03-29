# 🕌 SIKAMAS — Sistem Informasi Kas Masjid

> **Landing Page Statis** berbasis **Laravel 12** dengan **Blade Template Engine**
>
> **23552011194 — Bayu Ajji Prayoga — TIF RP-23 CNS A**

---

## 📋 Deskripsi Proyek

**SIKAMAS** (*Sistem Informasi Kas Masjid*) adalah sebuah landing page statis yang dibangun menggunakan **Laravel 12** dan memanfaatkan **Blade Template Engine** secara penuh. Proyek ini bertujuan untuk mempresentasikan sistem informasi pengelolaan keuangan masjid secara digital, transparan, dan akuntabel.

Halaman ini bersifat **statis tanpa database** — seluruh data ditampilkan melalui variabel yang dioper langsung dari Route ke View menggunakan fungsi `compact()`.

---

## 🛠️ Teknologi yang Digunakan

| Teknologi | Versi | Kegunaan |
|---|---|---|
| **PHP** | ^8.2 | Backend server-side |
| **Laravel** | 12.x | Framework utama |
| **Blade** | (bawaan Laravel) | Template engine untuk tampilan |
| **Bootstrap** | 5.3.3 | Framework CSS responsif |
| **Bootstrap Icons** | 1.11.3 | Ikon vektor |
| **Google Fonts** | Plus Jakarta Sans | Tipografi modern |

---

## 🚀 Cara Menjalankan Proyek

### Prasyarat
- PHP >= 8.2
- Composer
- Laragon / XAMPP / WAMP (opsional, untuk hosting lokal)

### Langkah Instalasi

```bash
# 1. Clone atau masuk ke direktori proyek
cd c:\laragon\www\SIKAMAS\SIKAMAS

# 2. Install dependensi PHP
composer install

# 3. Salin file environment
cp .env.example .env

# 4. Generate application key
php artisan key:generate

# 5. Jalankan development server
php artisan serve
```

### Akses Aplikasi
Buka browser dan kunjungi: **http://127.0.0.1:8000**

---

## 📁 Struktur Direktori Proyek

```
SIKAMAS/
├── app/                        ← Logika aplikasi Laravel (tidak dimodifikasi)
├── bootstrap/                  ← Bootstrap Laravel framework
├── config/                     ← File konfigurasi aplikasi
├── database/                   ← Migrasi & seeder (tidak digunakan)
├── public/
│   ├── css/
│   │   └── sikamas.css         ← ✅ CSS custom utama SIKAMAS
│   └── index.php               ← Entry point aplikasi web
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php   ← ✅ Master layout (template induk)
│       ├── partials/
│       │   ├── navbar.blade.php ← ✅ Komponen navbar
│       │   └── footer.blade.php ← ✅ Komponen footer
│       └── landing.blade.php   ← ✅ Halaman landing page utama
├── routes/
│   └── web.php                 ← ✅ File route & data dinamis
├── .env                        ← Konfigurasi environment
└── README.md                   ← Dokumentasi proyek ini
```

---

## 📄 Penjelasan Per File

---

### 1. `routes/web.php` — Route & Data Dinamis

**Lokasi:** `routes/web.php`

File ini mendefinisikan semua route HTTP aplikasi. Pada proyek SIKAMAS, satu route `GET /` menangani halaman utama sekaligus menyiapkan semua **data dinamis** yang akan dikirim ke view.

```php
Route::get('/', function () {

    // Variabel tunggal — data aplikasi & masjid
    $appName     = 'SIKAMAS';
    $appTagline  = 'Sistem Informasi Kas Masjid';
    $kasBalance  = 18750000;

    // Array — ditampilkan dengan @foreach di view
    $features = [
        [
            'icon'        => 'bi-graph-up-arrow',
            'title'       => 'Pencatatan Pemasukan',
            'description' => 'Catat setiap pemasukan ...',
            'color'       => '#1a6b4a',
            'tag'         => 'Keuangan',
        ],
        // ... fitur lainnya
    ];

    // compact() mengubah nama variabel menjadi array asosiatif
    // dan mengirimkannya ke view 'landing'
    return view('landing', compact(
        'appName', 'appTagline', 'kasBalance',
        'stats', 'features', 'achievements', 'pengurusList'
    ));
});
```

**Konsep Blade yang digunakan:**
- `compact()` → Mengemas variabel PHP menjadi array untuk dikirim ke Blade view
- Data diterima sebagai variabel langsung di view: `$appName`, `$features`, dll.

---

### 2. `resources/views/layouts/app.blade.php` — Master Layout (Template Induk)

**Lokasi:** `resources/views/layouts/app.blade.php`

Ini adalah **template induk** yang mendefinisikan kerangka HTML dasar untuk seluruh halaman. Menggunakan directive `@yield` sebagai *placeholder* yang akan diisi oleh template anak.

```blade
<!DOCTYPE html>
<html lang="id">
<head>
    <title>@yield('title', 'SIKAMAS – Sistem Informasi Kas Masjid')</title>
    {{-- ↑ @yield('title') = slot judul halaman. Nilai kedua = default jika slot kosong --}}

    <link href="{{ asset('css/sikamas.css') }}" rel="stylesheet">
    {{-- ↑ asset() = helper Laravel untuk menghasilkan URL aset publik --}}

    @yield('styles')
    {{-- ↑ Slot untuk CSS tambahan yang spesifik per halaman --}}
</head>
<body>

    @include('partials.navbar')
    {{-- ↑ Menyisipkan file navbar.blade.php ke posisi ini --}}

    <main>
        @yield('content')
        {{-- ↑ Slot UTAMA: konten halaman yang berbeda-beda akan masuk di sini --}}
    </main>

    @include('partials.footer')
    {{-- ↑ Menyisipkan file footer.blade.php ke posisi ini --}}

    @yield('scripts')
    {{-- ↑ Slot untuk JavaScript tambahan per halaman --}}
</body>
</html>
```

**Directive Blade yang digunakan:**

| Directive | Fungsi |
|---|---|
| `@yield('nama')` | Mendefinisikan slot yang dapat diisi oleh template anak |
| `@yield('nama', 'default')` | Slot dengan nilai default jika tidak diisi |
| `@include('path.file')` | Menyisipkan (include) file Blade lain |
| `{{ asset('path') }}` | Helper URL untuk aset dalam folder `public/` |
| `{{-- komentar --}}` | Komentar Blade (tidak dirender ke HTML) |

---

### 3. `resources/views/partials/navbar.blade.php` — Komponen Navbar

**Lokasi:** `resources/views/partials/navbar.blade.php`

File ini adalah **komponen partial** yang berisi kode HTML navbar navigasi. Dipanggil menggunakan `@include('partials.navbar')` dari master layout.

```blade
<nav class="navbar navbar-expand-lg fixed-top" id="mainNavbar">
    <div class="container">

        {{-- Logo & Brand --}}
        <a class="navbar-brand" href="#beranda">
            <div class="brand-icon">
                <i class="bi bi-cash-coin"></i>  {{-- Bootstrap Icons --}}
            </div>
            <span class="brand-name">SIKAMAS</span>
        </a>

        {{-- Tombol toggle untuk mobile --}}
        <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navMenu">
        </button>

        {{-- Menu navigasi --}}
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#beranda">Beranda</a>
                </li>
                {{-- ... navigasi lainnya --}}
                <li class="nav-item">
                    <a class="btn btn-navbar-cta" href="#login">Masuk Sistem</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
```

**Fitur teknis:**
- `fixed-top` → Navbar tetap di atas saat scroll (Bootstrap class)
- `navbar-expand-lg` → Responsif: collapsed pada layar < lg, expanded pada ≥ lg
- `data-bs-toggle="collapse"` → Atribut Bootstrap 5 untuk toggle menu mobile
- Efek scroll ditangani JavaScript di `app.blade.php`: menambah class `navbar-scrolled`

---

### 4. `resources/views/partials/footer.blade.php` — Komponen Footer

**Lokasi:** `resources/views/partials/footer.blade.php`

Komponen partial untuk bagian bawah halaman. Berisi 4 kolom: brand, navigasi, fitur, dan kontak.

```blade
<footer class="site-footer" id="kontak">

    {{-- Footer utama: 4 kolom --}}
    <div class="footer-main">
        <div class="row g-5">

            {{-- Kolom 1: Brand & Deskripsi --}}
            <div class="col-lg-4 col-md-6">
                <div class="footer-brand-name">SIKAMAS</div>
                <p class="footer-desc">Platform digital pengelolaan...</p>
                <div class="footer-social">
                    <a href="#" class="social-btn"><i class="bi bi-facebook"></i></a>
                    {{-- ... ikon sosial media lainnya --}}
                </div>
            </div>

            {{-- Kolom 2: Link Navigasi --}}
            {{-- Kolom 3: Daftar Fitur --}}
            {{-- Kolom 4: Info Kontak --}}

        </div>
    </div>

    {{-- Footer bottom: copyright & identitas --}}
    <div class="footer-bottom">
        <div class="row">
            <div class="col-md-6">
                <p>&copy; {{ date('Y') }} <strong>SIKAMAS</strong>. Hak Cipta Dilindungi.</p>
                {{-- ↑ date('Y') = fungsi PHP untuk tahun saat ini, dirender via Blade {{ }} --}}
            </div>
            <div class="col-md-6">
                <p class="footer-made-with">
                    <i class="bi bi-person-badge"></i>
                    23552011194_Bayu Ajji Prayoga_TIF RP-23 CNS A
                </p>
            </div>
        </div>
    </div>

</footer>
```

**Directive & syntax Blade:**
- `{{ date('Y') }}` → Sintaks echo Blade, menampilkan output PHP (tahun saat ini)
- `{{-- komentar --}}` → Komentar Blade yang tidak muncul di HTML output

---

### 5. `resources/views/landing.blade.php` — Halaman Landing Page Utama

**Lokasi:** `resources/views/landing.blade.php`

Ini adalah **template anak** yang mewarisi master layout dan mengisi seluruh konten landing page. File ini menggunakan hampir semua fitur utama Blade.

```blade
{{-- 1. Mewarisi master layout --}}
@extends('layouts.app')

{{-- 2. Mengisi slot @yield('title') di layout --}}
@section('title', $appName . ' – ' . $appTagline)

{{-- 3. Mengisi slot @yield('content') dengan konten halaman --}}
@section('content')

    {{-- ═══ SECTION 1: HERO CAROUSEL ═══ --}}
    <section id="beranda" class="hero-section">
        <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">

            {{-- Indikator titik carousel --}}
            <div class="carousel-indicators">
                <button data-bs-slide-to="0" class="active"></button>
                <button data-bs-slide-to="1"></button>
                <button data-bs-slide-to="2"></button>
            </div>

            {{-- Isi slide carousel --}}
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <h1 class="hero-title">
                        Kelola Kas Masjid<br>
                        <span class="hero-title-accent">Lebih Transparan</span>
                    </h1>
                    {{-- Menampilkan variabel dari route --}}
                    <p>{{ $appDescription }}</p>
                </div>
                {{-- Slide 2 & 3... --}}
            </div>
        </div>
    </section>

    {{-- ═══ SECTION 2: STATISTIK TICKER ═══ --}}
    {{-- @foreach = perulangan pada array $stats dari route --}}
    @foreach ($stats as $stat)
        <div class="ticker-item">
            <i class="bi {{ $stat['icon'] }}"></i>
            <span class="counter-num" data-target="{{ $stat['value'] }}">0</span>
            <span>{{ $stat['suffix'] }}</span>
            <div>{{ $stat['label'] }}</div>
        </div>
    @endforeach

    {{-- ═══ SECTION 3: ABOUT — Menampilkan data masjid ═══ --}}
    <section>
        <h3>{{ $masjidName }}</h3>
        <p>{{ $masjidAddress }}</p>
        {{-- number_format() = format angka ribuan dengan titik (Indonesia) --}}
        <div>Rp {{ number_format($kasBalance, 0, ',', '.') }}</div>
    </section>

    {{-- ═══ SECTION 4: FITUR UNGGULAN ═══ --}}
    @foreach ($features as $feature)
        <div class="feature-card">
            {{-- Warna ikon berbeda tiap fitur, diambil dari array --}}
            <div class="feature-icon-wrap"
                 style="background: {{ $feature['color'] }}1a; color: {{ $feature['color'] }};">
                <i class="bi {{ $feature['icon'] }}"></i>
            </div>
            <h4>{{ $feature['title'] }}</h4>
            <p>{{ $feature['description'] }}</p>
            <span class="feature-tag">{{ $feature['tag'] }}</span>
        </div>
    @endforeach

    {{-- ═══ SECTION 5: PENCAPAIAN ═══ --}}
    @foreach ($achievements as $item)
        <span class="counter-num" data-target="{{ $item['value'] }}">0</span>
        <span>{{ $item['suffix'] }}</span>
        <div>{{ $item['label'] }}</div>
    @endforeach

    {{-- ═══ SECTION 6: PENGURUS MASJID ═══ --}}
    @foreach ($pengurusList as $pengurus)
        <div class="team-card">
            <h5>{{ $pengurus['name'] }}</h5>
            <div>{{ $pengurus['role'] }}</div>
            <div>Sejak {{ $pengurus['since'] }}</div>
        </div>
    @endforeach

@endsection
{{-- ↑ Menutup @section('content') --}}
```

**Semua Directive Blade yang digunakan:**

| Directive | Keterangan |
|---|---|
| `@extends('layouts.app')` | Mewarisi master layout `layouts/app.blade.php` |
| `@section('nama', 'nilai')` | Mengisi slot pendek (satu baris) |
| `@section('nama') ... @endsection` | Mengisi slot panjang (multi-baris) |
| `{{ $variabel }}` | Echo/cetak nilai variabel (auto-escaped) |
| `{{ $arr['key'] }}` | Echo nilai dari array asosiatif |
| `@foreach ($array as $item)` | Perulangan array |
| `@endforeach` | Penutup perulangan |
| `{{-- komentar --}}` | Komentar Blade (tidak dirender) |

---

### 6. `public/css/sikamas.css` — Custom CSS

**Lokasi:** `public/css/sikamas.css`

File stylesheet kustom yang mendefinisikan seluruh tampilan visual SIKAMAS.

#### Sistem Warna (CSS Variables)
```css
:root {
    --primary:       #1a6b4a;   /* Hijau islami utama */
    --primary-light: #2a8f63;   /* Hijau lebih terang */
    --primary-dark:  #0f4a32;   /* Hijau sangat gelap */
    --secondary:     #d4a017;   /* Emas / kuning keemasan */
    --dark:          #0d1b12;   /* Latar gelap */
    --transition:    all 0.35s cubic-bezier(0.4, 0, 0.2, 1); /* Animasi halus */
}
```

#### Fitur CSS Utama

**1. Fade-in Scroll Animation**
```css
/* Awalnya tersembunyi & geser ke bawah */
.fade-in {
    opacity: 0;
    transform: translateY(28px);
    transition: opacity 0.7s ease, transform 0.7s ease;
}
/* Muncul saat elemen masuk viewport (ditrigger JS IntersectionObserver) */
.fade-in.visible {
    opacity: 1;
    transform: translateY(0);
}
```

**2. Navbar Scroll Effect**
```css
/* Transparan saat di atas halaman */
#mainNavbar {
    background: rgba(13, 27, 18, 0.1);
    backdrop-filter: blur(12px); /* glassmorphism */
}
/* Solid saat di-scroll */
#mainNavbar.navbar-scrolled {
    background: rgba(13, 27, 18, 0.97);
    box-shadow: 0 4px 30px rgba(0,0,0,0.3);
}
```

**3. Feature Card Hover + Underline Tumbuh**
```css
.feature-card::after {
    content: '';
    position: absolute; bottom: 0; left: 0; right: 0;
    height: 3px;
    background: linear-gradient(90deg, var(--primary), var(--secondary));
    transform: scaleX(0);           /* Awalnya tidak terlihat */
    transition: transform 0.4s ease;
}
.feature-card:hover::after {
    transform: scaleX(1);           /* Tumbuh dari kiri saat hover */
}
```

**4. Counter Animation (JavaScript)**
```javascript
// Di app.blade.php — Counters naik dari 0 saat terlihat di layar
function animateCounter(el) {
    const target = parseInt(el.getAttribute('data-target'));
    let current = 0;
    const timer = setInterval(() => {
        current += target / 125;        // 2000ms / 16ms per frame ≈ 125 step
        if (current >= target) { current = target; clearInterval(timer); }
        el.textContent = Math.floor(current).toLocaleString('id-ID');
    }, 16);
}
// IntersectionObserver: trigger counter saat masuk viewport
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting && !entry.target.dataset.animated) {
            entry.target.dataset.animated = 'true';
            animateCounter(entry.target);
        }
    });
}, { threshold: 0.5 });
```

---

### 7. `.env` — Konfigurasi Environment

File konfigurasi lingkungan aplikasi. Konfigurasi penting untuk proyek statis ini:

```dotenv
APP_NAME=SIKAMAS          # Nama aplikasi
APP_ENV=local             # Lingkungan: local / production
APP_DEBUG=true            # Tampilkan error detail (nonaktifkan di production)
APP_URL=http://localhost

SESSION_DRIVER=file       # ✅ Gunakan file (bukan database) — agar berjalan tanpa SQLite
CACHE_STORE=file          # ✅ Gunakan file cache
QUEUE_CONNECTION=sync     # ✅ Proses antrian secara sinkron (tanpa database)
```

> **Catatan:** Secara default Laravel 12 menggunakan `SESSION_DRIVER=database` dan `CACHE_STORE=database` yang membutuhkan SQLite/MySQL. Untuk proyek statis ini, ketiga nilai diubah ke `file` agar berjalan tanpa database.

---

## 🎨 Fitur & Bagian Landing Page

| # | Section | Deskripsi |
|---|---|---|
| 1 | **Hero Carousel** | Banner 3 slide full-screen dengan Bootstrap Carousel & fade effect |
| 2 | **Stats Ticker** | 4 angka statistik pada bar hijau (masjid, transaksi, donatur, laporan) |
| 3 | **Tentang** | Penjelasan sistem + kartu info saldo kas masjid |
| 4 | **Fitur Unggulan** | Grid 6 kartu fitur dengan ikon dan warna berbeda |
| 5 | **Pencapaian** | Counter animasi dengan latar hijau gelap |
| 6 | **Cara Kerja** | 3 langkah penggunaan sistem |
| 7 | **Pengurus Masjid** | Profil 4 pengurus dengan avatar beranimasi |
| 8 | **Call to Action** | Ajakan masuk sistem dengan tombol |
| 9 | **Footer** | 4 kolom: brand, navigasi, fitur, kontak |

---

## 🧩 Konsep Blade yang Diimplementasikan

```
@extends        → landing.blade.php mewarisi layouts/app.blade.php
@section        → Mendefinisikan konten untuk slot @yield
@yield          → Slot placeholder di master layout
@include        → Menyisipkan navbar dan footer ke layout
@foreach        → Iterasi array fitur, statistik, pengurus
{{ $variabel }} → Echo variabel dinamis dari route
{{ date('Y') }} → Echo ekspresi PHP
{{-- ... --}}   → Komentar Blade
```

---

## 👨‍💻 Informasi Pengembang

| | |
|---|---|
| **NIM** | 23552011194 |
| **Nama** | Bayu Ajji Prayoga |
| **Program Studi** | Teknik Informatika (TIF) |
| **Kelas** | RP-23 CNS A |
| **Mata Kuliah** | Pemrograman Web / Framework Web |

---

## 📜 Lisensi

Proyek ini dibuat untuk keperluan **tugas akademik**. Seluruh hak cipta desain dan kode milik pengembang.

&copy; 2026 SIKAMAS — Sistem Informasi Kas Masjid
#   S I K A M A S  
 