<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="SIKAMAS – Sistem Informasi Kas Masjid. Platform digital pengelolaan keuangan masjid yang transparan, amanah, dan mudah digunakan.">
    <meta name="keywords" content="kas masjid, sistem informasi masjid, keuangan masjid, SIKAMAS">
    <meta name="author" content="SIKAMAS Team">

    <title>@yield('title', 'SIKAMAS – Sistem Informasi Kas Masjid')</title>

    {{-- Bootstrap 5 CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Amiri:wght@400;700&display=swap" rel="stylesheet">

    {{-- Custom CSS --}}
    <link href="{{ asset('css/sikamas.css') }}" rel="stylesheet">

    @yield('styles')
</head>
<body>

    {{-- Navbar Component --}}
    @include('partials.navbar')

    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer Component --}}
    @include('partials.footer')

    {{-- Bootstrap 5 JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Custom JS --}}
    @yield('scripts')

    <script>
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });

        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            const navbar = document.getElementById('mainNavbar');
            if (window.scrollY > 50) {
                navbar.classList.add('navbar-scrolled');
            } else {
                navbar.classList.remove('navbar-scrolled');
            }
        });

        // Counter animation
        function animateCounter(el) {
            const target = parseInt(el.getAttribute('data-target'));
            const duration = 2000;
            const step = target / (duration / 16);
            let current = 0;
            const timer = setInterval(() => {
                current += step;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                el.textContent = Math.floor(current).toLocaleString('id-ID');
            }, 16);
        }

        // Trigger counter when in viewport
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !entry.target.dataset.animated) {
                    entry.target.dataset.animated = 'true';
                    animateCounter(entry.target);
                }
            });
        }, { threshold: 0.5 });

        document.querySelectorAll('.counter-num').forEach(el => observer.observe(el));

        // Fade-in on scroll
        const fadeObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.fade-in').forEach(el => fadeObserver.observe(el));
    </script>

</body>
</html>
