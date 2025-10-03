<!-- DESKTOP NAVBAR ONLY -->
<nav class="desktop-navbar d-none d-lg-block" id="desktopNavbar">
    <div class="container">
        <div class="navbar-content">
            <!-- Logo -->
            <div class="navbar-brand">
                <a href="<?php echo e(route('front.index')); ?>">
                    <?php if(isset($siteLogo) && $siteLogo): ?>
                        <?php if($siteLogo->shouldShowLogo()): ?>
                            <img src="<?php echo e($siteLogo->logo_url); ?>" alt="<?php echo e($siteLogo->site_name); ?>" style="height: 60px !important; max-height: 60px !important; width: auto !important;">
                        <?php endif; ?>
                        <?php if($siteLogo->shouldShowText()): ?>
                            <span><?php echo e($siteLogo->site_name); ?></span>
                        <?php endif; ?>
                    <?php else: ?>
                        <!-- Default logo və mətn -->
                        <img src="<?php echo e(asset('uploads/logos/logo.png')); ?>" alt="MODERN LİZİNQ" style="height: 60px !important; max-height: 60px !important; width: auto !important;">
                        <span>MODERN LİZİNQ</span>
                    <?php endif; ?>
                </a>
            </div>

            <!-- Menu Links -->
            <div class="navbar-menu">
                <ul class="menu-list">
                    <?php if(isset($desktopNavbarItems) && $desktopNavbarItems->count() > 0): ?>
                        <?php $__currentLoopData = $desktopNavbarItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a href="<?php echo e($item->url); ?>" class="<?php echo e($item->isActive() ? 'active' : ''); ?>">
                                    <?php echo e($item->title); ?>

                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <!-- Default menu items if no data in database -->
                        <li><a href="<?php echo e(route('front.index')); ?>" class="<?php echo e(request()->routeIs('front.index') ? 'active' : ''); ?>">Ana Səhifə</a></li>
                        <li><a href="<?php echo e(route('front.about')); ?>" class="<?php echo e(request()->routeIs('front.about') ? 'active' : ''); ?>">Haqqımızda</a></li>
                        <li><a href="<?php echo e(route('front.services')); ?>" class="<?php echo e(request()->routeIs('front.services') ? 'active' : ''); ?>">Xidmətlər</a></li>
                        <li><a href="<?php echo e(route('front.investors')); ?>" class="<?php echo e(request()->routeIs('front.investors') ? 'active' : ''); ?>">İnvestorlar</a></li>
                        <li><a href="<?php echo e(route('front.faq')); ?>" class="<?php echo e(request()->routeIs('front.faq') ? 'active' : ''); ?>">FAQ</a></li>
                        <li><a href="<?php echo e(route('front.contact')); ?>" class="<?php echo e(request()->routeIs('front.contact') ? 'active' : ''); ?>">Əlaqə</a></li>
                    <?php endif; ?>
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
    background: rgba(240, 242, 244, 0.9); /* Yeni ana background şəffaf */
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    z-index: 1000;
    padding: 1.25rem 0;
    transition: all 0.3s ease;
}

.desktop-navbar.scrolled {
    background: rgba(240, 242, 244, 0.95);
    padding: 1.25rem 0;
}

.navbar-content {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    gap: 4rem;
    padding: 0 15px;
}

/* Logo */
.navbar-brand a {
    display: flex;
    align-items: center;
    color: #1F1F1F;
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
    color: rgba(31, 31, 31, 0.8);
    text-decoration: none;
    font-weight: 500;
    padding: 0.5rem 1rem;
    border-radius: 25px;
    transition: all 0.3s ease;
    position: relative;
}

.menu-list a:hover,
.menu-list a.active {
    color: #2289FF;
    background: rgba(34, 137, 255, 0.1);
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
</script><?php /**PATH C:\xampp\htdocs\ModernLeasing\resources\views/front/includes/navbar.blade.php ENDPATH**/ ?>