<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Portal Resmi Pemerintah Kabupaten Karanganyar. Memberikan informasi layanan publik, berita terbaru, profil daerah, dan potensi terintegrasi di Kabupaten Karanganyar.">
    <title>@yield('title', 'Portal Resmi Pemerintah Kabupaten Karanganyar')</title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- Bootstrap 5 CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    {{-- Custom CSS --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('styles')
</head>

<body>

    {{-- ===== TOP BAR ===== --}}
    <div class="top-bar d-none d-lg-block">
        <div class="container d-flex justify-content-between align-items-center">
            <div>
                <a href="https://satudata.karanganyarkab.go.id/" target="_blank"><i class="bi bi-database me-1"></i>
                    Satudata</a>
                <a href="https://opendata.karanganyarkab.go.id/" target="_blank"><i class="bi bi-folder2-open me-1"></i>
                    Opendata</a>
                <a href="https://ppid.karanganyarkab.go.id/" target="_blank"><i class="bi bi-info-circle me-1"></i>
                    PPID</a>
                <a href="{{ url('/layanan-publik') }}"><i class="bi bi-headset me-1"></i> Layanan Publik</a>
            </div>
            <div class="top-bar-right">
                <a href="https://www.lapor.go.id/" target="_blank">SP4N Lapor</a>
                <a href="https://laporgub.jatengprov.go.id/" target="_blank">Laporgub</a>
            </div>
        </div>
    </div>

    {{-- ===== MAIN NAVBAR ===== --}}
    <nav class="navbar navbar-expand-lg navbar-main">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('images/logo-karanganyar.png') }}" alt="Logo Karanganyar"
                    onerror="this.style.display='none'">
                <div>
                    <div style="font-size:0.75rem;font-weight:500;color:var(--muted-text);line-height:1;">Pemerintah
                        Kabupaten</div>
                    <div style="font-size:1.1rem;line-height:1.2;">Karanganyar</div>
                </div>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                @php
                    $menuLinks = \App\Models\MenuLink::orderBy('order')->get()->groupBy('group');
                @endphp
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">Beranda</a>
                    </li>

                    {{-- Profil Dropdown --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Profil</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('/profil') }}">Profil Kabupaten</a></li>
                            @if(isset($menuLinks['Profil']))
                                @foreach($menuLinks['Profil'] as $link)
                                    <li><a class="dropdown-item" href="{{ $link->url }}" {{ $link->is_external ? 'target=_blank' : '' }}>{{ $link->label }}</a></li>
                                @endforeach
                            @endif
                        </ul>
                    </li>

                    {{-- Perangkat Daerah Dropdown --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Perangkat Daerah</a>
                        <ul class="dropdown-menu">
                            @if(isset($menuLinks['Perangkat Daerah']))
                                @foreach($menuLinks['Perangkat Daerah'] as $link)
                                    <li><a class="dropdown-item" href="{{ $link->url }}" {{ $link->is_external ? 'target=_blank' : '' }}>{{ $link->label }}</a></li>
                                @endforeach
                            @endif
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('berita*') ? 'active' : '' }}"
                            href="{{ url('/berita') }}">Berita</a>
                    </li>

                    {{-- Aduan Dropdown --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Aduan</a>
                        <ul class="dropdown-menu">
                            @if(isset($menuLinks['Aduan']))
                                @foreach($menuLinks['Aduan'] as $link)
                                    <li><a class="dropdown-item" href="{{ $link->url }}" {{ $link->is_external ? 'target=_blank' : '' }}>{{ $link->label }}</a></li>
                                @endforeach
                            @endif
                        </ul>
                    </li>

                    {{-- Data Dropdown --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Data</a>
                        <ul class="dropdown-menu">
                            @if(isset($menuLinks['Data']))
                                @foreach($menuLinks['Data'] as $link)
                                    <li><a class="dropdown-item" href="{{ $link->url }}" {{ $link->is_external ? 'target=_blank' : '' }}>{{ $link->label }}</a></li>
                                @endforeach
                            @endif
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- ===== MAIN CONTENT ===== --}}
    <main>
        @yield('content')
    </main>

    {{-- ===== FOOTER ===== --}}
    <footer class="footer-main">
        <div class="container">
            <div class="row g-4">
                {{-- Kolom 1: Tentang --}}
                <div class="col-lg-3 col-md-6">
                    <h5>Pemerintah Kabupaten Karanganyar</h5>
                    <p>Portal resmi Pemerintah Kabupaten Karanganyar, Provinsi Jawa Tengah. Menyediakan layanan
                        informasi publik, berita terkini, dan transparansi pemerintahan.</p>
                    <div class="d-flex gap-2 mt-3">
                        <a href="https://www.facebook.com/share/17XzLrbJzq/"
                            class="btn btn-sm btn-outline-light rounded-circle d-flex align-items-center justify-content-center"
                            style="width:36px;height:36px;"><i class="bi bi-facebook"></i></a>
                        <a href="https://x.com/karanganyarkab"
                            class="btn btn-sm btn-outline-light rounded-circle d-flex align-items-center justify-content-center"
                            style="width:36px;height:36px;"><i class="bi bi-twitter-x"></i></a>
                        <a href="https://www.instagram.com/kabupatenkaranganyar?igsh=eXdvenJrNXJ0ajJ6"
                            class="btn btn-sm btn-outline-light rounded-circle d-flex align-items-center justify-content-center"
                            style="width:36px;height:36px;"><i class="bi bi-instagram"></i></a>
                        <a href="https://youtube.com/@kabkaranganyar?si=_YGF24p294p3SlK9"
                            class="btn btn-sm btn-outline-light rounded-circle d-flex align-items-center justify-content-center"
                            style="width:36px;height:36px;"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>

                {{-- Kolom 2: Kontak --}}
                <div class="col-lg-3 col-md-6">
                    <h5>Kontak Kami</h5>
                    <div class="footer-contact-item">
                        <i class="bi bi-geo-alt-fill"></i>
                        <span>Jl. Lawu No. 385, Karanganyar, Jawa Tengah 57711</span>
                    </div>
                    <div class="footer-contact-item">
                        <i class="bi bi-telephone-fill"></i>
                        <span>(0271) 495025</span>
                    </div>
                    <div class="footer-contact-item">
                        <i class="bi bi-envelope-fill"></i>
                        <span>info@karanganyarkab.go.id</span>
                    </div>
                    <div class="footer-contact-item">
                        <i class="bi bi-clock-fill"></i>
                        <span>Senin - Jumat, 07:30 - 16:00 WIB</span>
                    </div>
                </div>

                {{-- Kolom 3: Link Terkait --}}
                <div class="col-lg-3 col-md-6">
                    <h5>Link Terkait</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="https://www.kemendagri.go.id" target="_blank"><i
                                    class="bi bi-chevron-right me-1"></i> Kementerian Dalam Negeri</a></li>
                        <li class="mb-2"><a href="https://jatengprov.go.id" target="_blank"><i
                                    class="bi bi-chevron-right me-1"></i> Pemprov Jawa Tengah</a></li>
                        <li class="mb-2"><a href="https://ppid.karanganyarkab.go.id/" target="_blank"><i
                                    class="bi bi-chevron-right me-1"></i> PPID Karanganyar</a></li>
                        <li class="mb-2"><a href="https://satudata.karanganyarkab.go.id/" target="_blank"><i
                                    class="bi bi-chevron-right me-1"></i> Satudata Karanganyar</a></li>
                        <li class="mb-2"><a href="https://opendata.karanganyarkab.go.id/" target="_blank"><i
                                    class="bi bi-chevron-right me-1"></i> Opendata Karanganyar</a></li>
                    </ul>
                </div>

                {{-- Kolom 4: GPR Kominfo Widget --}}
                <div class="col-lg-3 col-md-2">
                    <h5>GPR Kominfo</h5>
                    <div id="gpr-kominfo-widget-container" style="max-width:250px;"></div>
                </div>
            </div>
        </div>
        <div class="footer-bottom text-center">
            <div class="container">
                &copy; {{ date('Y') }} Pemerintah Kabupaten Karanganyar. Dikembangkan oleh Diskominfo Karanganyar.
            </div>
        </div>
    </footer>

    {{-- Scroll to Top --}}
    <button class="scroll-top" id="scrollTopBtn" onclick="window.scrollTo({top:0,behavior:'smooth'})">
        <i class="bi bi-chevron-up"></i>
    </button>

    {{-- Bootstrap 5 JS Bundle --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- GPR Kominfo Widget --}}
    <script type="text/javascript" src="https://widget.komdigi.go.id/gpr-widget-kominfo.min.js"></script>

    {{-- Scroll Top Visibility --}}
    <script>
        // Scroll Top Button Visibility
        window.addEventListener('scroll', function () {
            const btn = document.getElementById('scrollTopBtn');
            if (window.scrollY > 300) {
                btn.classList.add('visible');
            } else {
                btn.classList.remove('visible');
            }
        });

        // Fade-In Animation Observer
        document.addEventListener('DOMContentLoaded', function() {
            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.15
            };

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target); // Animate only once
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.fade-in-section').forEach((section) => {
                observer.observe(section);
            });

            // Mobile navbar fix: close other dropdowns when one opens
            if (window.innerWidth < 992) {
                document.querySelectorAll('.navbar-main .dropdown-toggle').forEach(toggle => {
                    toggle.addEventListener('click', function(e) {
                        // Close all other open dropdowns
                        document.querySelectorAll('.navbar-main .dropdown-menu.show').forEach(menu => {
                            if (menu !== this.nextElementSibling) {
                                menu.classList.remove('show');
                                menu.previousElementSibling.classList.remove('show');
                                menu.previousElementSibling.setAttribute('aria-expanded', 'false');
                            }
                        });
                    });
                });

                // Close navbar collapse when a dropdown item is clicked
                document.querySelectorAll('.navbar-main .dropdown-item').forEach(item => {
                    item.addEventListener('click', function() {
                        const navCollapse = document.getElementById('mainNav');
                        if (navCollapse && navCollapse.classList.contains('show')) {
                            const bsCollapse = bootstrap.Collapse.getInstance(navCollapse);
                            if (bsCollapse) bsCollapse.hide();
                        }
                    });
                });
            }

            // Auto-close navbar and dropdowns when user scrolls the page (Mobile & PC)
            let isScrolling;
            window.addEventListener('scroll', function() {
                // Clear timeout to prevent execution during fast scrolling
                window.clearTimeout(isScrolling);

                isScrolling = setTimeout(function() {
                    // Close mobile navbar collapse
                    const navCollapse = document.getElementById('mainNav');
                    if (navCollapse && navCollapse.classList.contains('show')) {
                        const bsCollapse = bootstrap.Collapse.getInstance(navCollapse);
                        if (bsCollapse) bsCollapse.hide();
                    }

                    // Close PC and Mobile dropdown menus
                    document.querySelectorAll('.navbar-main .dropdown-menu.show').forEach(menu => {
                        menu.classList.remove('show');
                        if (menu.previousElementSibling) {
                            menu.previousElementSibling.classList.remove('show');
                            menu.previousElementSibling.setAttribute('aria-expanded', 'false');
                        }
                    });
                }, 66); // Execute after 66ms of no scroll events (~15fps)
            }, { passive: true });
        });
    </script>

    @yield('scripts')
</body>

</html>