<!-- DESKTOP NAVBAR ONLY -->
<nav class="desktop-navbar d-none d-lg-block" id="desktopNavbar">
    <div class="container">
        <div class="navbar-content">
            <!-- Logo -->
            <div class="navbar-brand">
                <a href="{{ route('front.index') }}">
                    <img src="{{ asset('uploads/logos/logo.png') }}" alt="MODERN LİZİNQ" style="height: 60px !important; max-height: 60px !important; width: auto !important;">
                    <span>MODERN LİZİNQ</span>
                </a>
            </div>

            <!-- Menu Links -->
            <div class="navbar-menu">
                <ul class="menu-list">
                    <li><a href="{{ route('front.index') }}" class="{{ request()->routeIs('front.index') ? 'active' : '' }}">Ana Səhifə</a></li>
                    <li><a href="{{ route('front.about') }}" class="{{ request()->routeIs('front.about') ? 'active' : '' }}">Haqqımızda</a></li>
                    <li><a href="{{ route('front.services') }}" class="{{ request()->routeIs('front.services') ? 'active' : '' }}">Xidmətlər</a></li>
                    <li><a href="{{ route('front.investors') }}" class="{{ request()->routeIs('front.investors') ? 'active' : '' }}">İnvestorlar</a></li>
                    <li><a href="{{ route('front.faq') }}" class="{{ request()->routeIs('front.faq') ? 'active' : '' }}">FAQ</a></li>
                    <li><a href="{{ route('front.contact') }}" class="{{ request()->routeIs('front.contact') ? 'active' : '' }}">Əlaqə</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<style>
/* ===== DESKTOP NAVBAR ONLY ===== */
.desktop-navbar {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    background: rgba(255, 255, 255, 0.4); /* Daha şeffaf beyaz */
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    z-index: 1000;
    padding: 1.25rem 0;
    transition: all 0.3s ease;
}

.desktop-navbar.scrolled {
    background: rgba(255, 255, 255, 0.5);
    padding: 1.25rem 0;
}

.navbar-content {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    gap: 4rem;
}

/* Logo */
.navbar-brand a {
    display: flex;
    align-items: center;
    color: #000;
    text-decoration: none;
    font-weight: 800;
    font-size: 1.5rem;
}

.navbar-brand img {
    margin-right: 0.75rem;
    height: 60px !important;
    max-height: 60px !important;
    width: auto !important;
}

/* Menu */
.navbar-menu {
    display: flex;
}

.menu-list {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
    gap: 2rem;
}

.menu-list a {
    color: rgba(0, 0, 0, 0.8);
    text-decoration: none;
    font-weight: 500;
    padding: 0.5rem 1rem;
    border-radius: 25px;
    transition: all 0.3s ease;
    position: relative;
}

.menu-list a:hover,
.menu-list a.active {
    color: #ff6b35;
    background: rgba(255, 107, 53, 0.1);
    transform: translateY(-2px);
}

/* Body və content padding - Navbar overlay */
body {
    padding-top: 0 !important;
    margin-top: 0 !important;
}

.main-content {
    margin-top: 0 !important;
    padding-top: 0 !important;
}

.hero-section {
    margin-top: 0 !important;
    padding-top: 0 !important;
}

@media (max-width: 991.98px) {
    body {
        padding-top: 0 !important;
        padding-bottom: 80px;
    }
}

/* Smooth scrolling */
html {
    scroll-behavior: smooth;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Navbar scroll effect (only for desktop)
    const desktopNavbar = document.getElementById('desktopNavbar');
    if (desktopNavbar) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                desktopNavbar.classList.add('scrolled');
            } else {
                desktopNavbar.classList.remove('scrolled');
            }
        });
    }
});
</script>