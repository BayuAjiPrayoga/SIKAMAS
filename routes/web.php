<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    // ── Data Aplikasi ──────────────────────────────────────────────────
    $appName        = 'SIKAMAS';
    $appTagline     = 'Sistem Informasi Kas Masjid';
    $appDescription = 'SIKAMAS hadir sebagai solusi digital pengelolaan keuangan masjid yang transparan, amanah, dan akuntabel untuk seluruh jamaah.';
    $appVersion     = '1.0.0';

    // ── Data Masjid ────────────────────────────────────────────────────
    $masjidName    = 'Masjid Al-Ikhlas';
    $masjidAddress = 'Jl. Masjid Raya No. 1, Kota Islam, Indonesia';
    $kasBalance    = 18750000; // dalam Rupiah

    // ── Statistik Ticker ───────────────────────────────────────────────
    $stats = [
        ['label' => 'Masjid Terdaftar',   'value' => 48,   'suffix' => '+', 'icon' => 'bi-building'],
        ['label' => 'Total Transaksi',     'value' => 3200, 'suffix' => '+', 'icon' => 'bi-arrow-left-right'],
        ['label' => 'Donatur Aktif',       'value' => 870,  'suffix' => '+', 'icon' => 'bi-people-fill'],
        ['label' => 'Laporan Diunduh',     'value' => 620,  'suffix' => '+', 'icon' => 'bi-file-earmark-arrow-down'],
    ];

    // ── Fitur Unggulan ─────────────────────────────────────────────────
    $features = [
        [
            'icon'        => 'bi-graph-up-arrow',
            'title'       => 'Pencatatan Pemasukan',
            'description' => 'Catat setiap pemasukan kas masjid dari infak Jumat, donasi, zakat, dan sumber lainnya secara real-time dan terstruktur.',
            'color'       => '#1a6b4a',
            'tag'         => 'Keuangan',
        ],
        [
            'icon'        => 'bi-receipt-cutoff',
            'title'       => 'Pencatatan Pengeluaran',
            'description' => 'Dokumentasikan seluruh pengeluaran operasional, renovasi, dan kegiatan masjid dengan kategori yang jelas dan terorganisir.',
            'color'       => '#c0392b',
            'tag'         => 'Pengeluaran',
        ],
        [
            'icon'        => 'bi-file-earmark-bar-graph',
            'title'       => 'Laporan Keuangan',
            'description' => 'Generate laporan keuangan bulanan dan tahunan secara otomatis. Ekspor ke format PDF atau Excel dalam hitungan detik.',
            'color'       => '#2980b9',
            'tag'         => 'Laporan',
        ],
        [
            'icon'        => 'bi-people',
            'title'       => 'Manajemen Donatur',
            'description' => 'Kelola data donatur masjid dengan lengkap, pantau riwayat donasi, dan kirim ucapan terima kasih secara otomatis.',
            'color'       => '#8e44ad',
            'tag'         => 'Donatur',
        ],
        [
            'icon'        => 'bi-shield-lock',
            'title'       => 'Keamanan Data',
            'description' => 'Data keuangan masjid dilindungi dengan sistem enkripsi dan kontrol akses berbasis peran pengguna yang ketat.',
            'color'       => '#d4a017',
            'tag'         => 'Keamanan',
        ],
        [
            'icon'        => 'bi-phone',
            'title'       => 'Akses Mobile Friendly',
            'description' => 'Tampilan responsif yang dapat diakses dari smartphone, tablet, maupun komputer tanpa perlu mengunduh aplikasi tambahan.',
            'color'       => '#16a085',
            'tag'         => 'Akses',
        ],
    ];

    // ── Pencapaian / Achievements ──────────────────────────────────────
    $achievements = [
        ['icon' => 'bi-building',              'value' => 48,   'suffix' => '+', 'label' => 'Masjid Aktif',     'description' => 'Di seluruh Indonesia'],
        ['icon' => 'bi-currency-dollar',       'value' => 500,  'suffix' => 'Jt+', 'label' => 'Dana Dikelola', 'description' => 'Total seluruh masjid'],
        ['icon' => 'bi-person-check',          'value' => 870,  'suffix' => '+', 'label' => 'Donatur Aktif',    'description' => 'Terdata di sistem'],
        ['icon' => 'bi-file-earmark-check',    'value' => 620,  'suffix' => '+', 'label' => 'Laporan Dibuat',  'description' => 'Sejak diluncurkan'],
    ];

    // ── Pengurus Masjid ────────────────────────────────────────────────
    $pengurusList = [
        ['name' => 'H. Ahmad Fauzi, S.Ag',  'role' => 'Ketua Ta\'mir',       'since' => '2022'],
        ['name' => 'Drs. Muhamad Rizki',     'role' => 'Bendahara',           'since' => '2022'],
        ['name' => 'Ustaz Hasan Basri',      'role' => 'Sekretaris',          'since' => '2023'],
        ['name' => 'Ir. Budi Santoso',       'role' => 'Koordinator Imarah',  'since' => '2022'],
    ];

    return view('landing', compact(
        'appName',
        'appTagline',
        'appDescription',
        'appVersion',
        'masjidName',
        'masjidAddress',
        'kasBalance',
        'stats',
        'features',
        'achievements',
        'pengurusList'
    ));
});
