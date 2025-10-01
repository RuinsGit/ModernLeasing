<!-- MOBILE BOTTOM NAVIGATION ONLY -->
<div class="mobile-bottom-nav d-lg-none">
    <div class="mobile-nav-container">
        <a href="{{ route('front.index') }}" class="mobile-nav-item {{ request()->routeIs('front.index') ? 'active' : '' }}">
            <i class="fas fa-home"></i>
            <span>Ana Səhifə</span>
        </a>
        
        <a href="{{ route('front.about') }}" class="mobile-nav-item {{ request()->routeIs('front.about') ? 'active' : '' }}">
            <i class="fas fa-info-circle"></i>
            <span>Haqqımızda</span>
        </a>
        
        <a href="{{ route('front.services') }}" class="mobile-nav-item {{ request()->routeIs('front.services') ? 'active' : '' }}">
            <i class="fas fa-cogs"></i>
            <span>Xidmətlər</span>
        </a>
        
        <a href="{{ route('front.contact') }}" class="mobile-nav-item {{ request()->routeIs('front.contact') ? 'active' : '' }}">
            <i class="fas fa-envelope"></i>
            <span>Əlaqə</span>
        </a>
        
        <a href="{{ route('front.faq') }}" class="mobile-nav-item {{ request()->routeIs('front.faq') ? 'active' : '' }}">
            <i class="fas fa-question-circle"></i>
            <span>FAQ</span>
        </a>
    </div>
</div>

<style>
/* ===== MOBILE BOTTOM NAVIGATION ONLY ===== */
.mobile-bottom-nav {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(240, 242, 244, 0.9);
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
    border-top: 1px solid rgba(0, 0, 0, 0.1);
    box-shadow: 0 -5px 20px rgba(0, 0, 0, 0.1);
    z-index: 1000;
    padding: 0.75rem 0;
}

.mobile-nav-container {
    display: flex;
    justify-content: space-around;
    align-items: center;
    max-width: 100%;
    padding: 0 1rem;
}

.mobile-nav-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-decoration: none;
    color: rgba(31, 31, 31, 0.7);
    font-size: 0.75rem;
    font-weight: 500;
    padding: 0.5rem;
    border-radius: 8px;
    transition: all 0.3s ease;
    background: none;
    border: none;
    min-width: 60px;
    text-align: center;
}

.mobile-nav-item i {
    font-size: 1.3rem;
    margin-bottom: 0.25rem;
    transition: all 0.3s ease;
}

.mobile-nav-item span {
    font-size: 0.7rem;
    font-weight: 600;
    line-height: 1.2;
}

.mobile-nav-item:hover,
.mobile-nav-item.active {
    color: #2289FF;
    background: rgba(34, 137, 255, 0.1);
    transform: translateY(-2px);
}

.mobile-nav-item.active i {
    transform: scale(1.1);
}

/* Hide on desktop */
@media (min-width: 992px) {
    .mobile-bottom-nav {
        display: none !important;
    }
}

/* Responsive adjustments */
@media (max-width: 480px) {
    .mobile-nav-item {
        min-width: 50px;
        padding: 0.4rem;
    }
    
    .mobile-nav-item i {
        font-size: 1.2rem;
    }
    
    .mobile-nav-item span {
        font-size: 0.65rem;
    }
    
    .mobile-nav-container {
        padding: 0 0.5rem;
    }
}

/* Extra small devices - reduce text further */
@media (max-width: 360px) {
    .mobile-nav-item span {
        font-size: 0.6rem;
    }
    
    .mobile-nav-item i {
        font-size: 1.1rem;
    }
}

/* Force full width on mobile */
@media (max-width: 991.98px) {
    html, body {
        width: 100% !important;
        max-width: 100vw !important;
        overflow-x: hidden !important;
    }
    
    .mobile-bottom-nav {
        width: 100% !important;
        max-width: 100vw !important;
        left: 0 !important;
        right: 0 !important;
    }
    
    .mobile-nav-container {
        width: 100% !important;
        max-width: 100% !important;
    }
}
</style>