<!-- Hero Section -->
<section class="hero-section" id="heroSection">
    <div class="container">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-8">
                <div class="hero-content" data-aos="fade-up" data-aos-delay="300">
                    <h1 class="hero-title">
                        @if($heroSection && $heroSection->title)
                            {!! nl2br(e($heroSection->title)) !!}
                        @else
                            TEXNİKA, AVTOMOBİL VƏ<br>
                            <span class="text-primary">ƏMLAKINIIZI SƏRFƏLI LEASING ŞƏRTLƏRİ İLƏ ƏLDƏ EDİN</span>
                        @endif
                    </h1>
                    
                    @if($heroSection && $heroSection->subtitle)
                        <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="500">
                            {{ $heroSection->subtitle }}
                        </p>
                    @else
                        <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="500">
                            Modern Leasing ilə texnika, avtomobil və əmlakınızı ən əlverişli şərtlərlə əldə edin. 
                            Çevik ödəniş imkanları, geniş məhsul seçimi və peşəkar komandamızla 
                            sizə xüsusi həllər təqdim edirik.
                        </p>
                    @endif
                    
                    <div class="hero-actions" data-aos="fade-up" data-aos-delay="700">
                        @if($heroSection)
                            <a href="{{ $heroSection->primary_button_link ?? '#' }}" class="btn-primary-custom me-3">
                                <i class="fas fa-file-alt me-2"></i>{{ $heroSection->primary_button_text }}
                            </a>
                            
                            <a href="{{ $heroSection->secondary_button_link ?? '#contact' }}" class="btn-outline-custom">
                                <i class="fas fa-phone me-2"></i>{{ $heroSection->secondary_button_text }}
                            </a>
                        @else
                            <a href="#" class="btn-primary-custom me-3">
                                <i class="fas fa-file-alt me-2"></i>Leasingə Müraciət Et
                            </a>
                            
                            <a href="#contact" class="btn-outline-custom">
                                <i class="fas fa-phone me-2"></i>Əlaqə Saxla
                            </a>
                        @endif
                    </div>
                    
                    <!-- Stats -->
                    <div class="hero-stats mt-5" data-aos="fade-up" data-aos-delay="900">
                        <div class="row">
                            <div class="col-md-3 col-6 mb-3">
                                <div class="stat-item">
                                    <div class="stat-number animate-number" data-count="{{ $heroSection->happy_customers ?? 3500 }}">0</div>
                                    <div class="stat-label">Məmnun Müştəri</div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 mb-3">
                                <div class="stat-item">
                                    <div class="stat-number animate-number" data-count="{{ $heroSection->delivered_equipment ?? 6800 }}">0</div>
                                    <div class="stat-label">Təhvil Verilən Texnika</div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 mb-3">
                                <div class="stat-item">
                                    <div class="stat-number animate-number" data-count="{{ $heroSection->international_partners ?? 25 }}">0</div>
                                    <div class="stat-label">Beynəlxalq Tərəfdaş</div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 mb-3">
                                <div class="stat-item">
                                    <div class="stat-number animate-number" data-count="{{ $heroSection->years_experience ?? 15 }}">0</div>
                                    <div class="stat-label">İl Təcrübə</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 d-none d-lg-block">
                <div class="hero-image d-none d-lg-block" data-aos="fade-left" data-aos-delay="400">
                    @if($heroFeatures && $heroFeatures->count() > 0)
                        @foreach($heroFeatures as $index => $feature)
                            <div class="hero-card floating" style="animation-delay: {{ $index }}s;">
                                <div class="card-icon">
                                    @if($feature->image)
                                        <img src="{{ asset('uploads/hero-features/' . $feature->image) }}" 
                                             alt="{{ $feature->title }}" 
                                             style="width: 60px; height: 60px; object-fit: cover; border-radius: 50%;">
                                    @else
                                        <i class="fas fa-star"></i>
                                    @endif
                                </div>
                                <div class="card-content">
                                    <h4>{{ $feature->title }}</h4>
                                    <p>{{ $feature->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <!-- Default cards if no features in database -->
                        <div class="hero-card floating">
                            <div class="card-icon">
                                <i class="fas fa-handshake"></i>
                            </div>
                            <div class="card-content">
                                <h4>Sürətli Razılaşma</h4>
                                <p>24 saat ərzində leasing razılaşması</p>
                            </div>
                        </div>
                        
                        <div class="hero-card floating" style="animation-delay: 1s;">
                            <div class="card-icon">
                                <i class="fas fa-percentage"></i>
                            </div>
                            <div class="card-content">
                                <h4>Əlverişli Faizlər</h4>
                                <p>Bazarda ən aşağı faiz dərəcələri</p>
                            </div>
                        </div>
                        
                        <div class="hero-card floating" style="animation-delay: 2s;">
                            <div class="card-icon">
                                <i class="fas fa-headset"></i>
                            </div>
                            <div class="card-content">
                                <h4>7/24 Dəstək</h4>
                                <p>Həftənin 7 günü müştəri xidmətləri</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    <!-- Scroll indicator -->
    <div class="scroll-indicator" data-aos="fade-up" data-aos-delay="1200">
        <a href="#about" class="scroll-down">
            <span>Scroll Down</span>
            <i class="fas fa-chevron-down"></i>
        </a>
    </div>
    
   
</section>

<!-- Video Modal -->
<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-header border-0">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <div class="ratio ratio-16x9">
                    <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="Company Video" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Hero Section Specific Styles */
    .hero-section {
        position: relative;
        min-height: 100vh;
        background: linear-gradient(135deg, rgba(31, 31, 31, 0.95), rgba(34, 137, 255, 0.85)),
                    url('https://images.unsplash.com/photo-1566576912006-a6d4c86b0d8d?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        display: flex;
        align-items: center;
        overflow: hidden;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle at 30% 20%, rgba(34, 137, 255, 0.1) 0%, transparent 50%),
                    radial-gradient(circle at 70% 80%, rgba(31, 31, 31, 0.1) 0%, transparent 50%);
        animation: backgroundShift 20s ease-in-out infinite;
    }

    @keyframes backgroundShift {
        0%, 100% { opacity: 0.3; }
        50% { opacity: 0.7; }
    }

    .hero-content {
        position: relative;
        z-index: 2;
    }

    .hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        color: #fff;
        line-height: 1.2;
        margin-bottom: 1.5rem;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    .hero-title .text-primary {
        color: var(--primary-color) !important;
        display: inline-block;
        position: relative;
    }

    .hero-title .text-primary::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 0;
        width: 100%;
        height: 3px;
        background: var(--primary-color);
        animation: underlineGrow 2s ease-out 1.5s both;
    }

    @keyframes underlineGrow {
        from { width: 0; }
        to { width: 100%; }
    }

    .hero-subtitle {
        font-size: 1.2rem;
        color: rgba(255, 255, 255, 0.9);
        line-height: 1.8;
        margin-bottom: 2.5rem;
        max-width: 600px;
    }

    .hero-actions {
        margin-bottom: 3rem;
    }

    /* Hero Stats */
    .hero-stats {
        border-top: 1px solid rgba(255, 255, 255, 0.2);
        padding-top: 2rem;
    }

    .stat-item {
        text-align: left;
        color: #fff;
    }

    .stat-number {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--primary-color);
        display: block;
        line-height: 1;
    }

    .stat-label {
        font-size: 0.9rem;
        color: rgba(255, 255, 255, 0.8);
        margin-top: 0.5rem;
    }

    /* Hero Cards */
    .hero-image {
        position: relative;
        height: 500px;
    }

    .hero-card {
        position: absolute;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 15px;
        padding: 1.5rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        max-width: 250px;
        transition: transform 0.3s ease;
    }

    .hero-card:nth-child(1) {
        top: 50px;
        left: 0;
    }

    .hero-card:nth-child(2) {
        top: 200px;
        right: 20px;
    }

    .hero-card:nth-child(3) {
        bottom: 50px;
        left: 50px;
    }

    .hero-card:hover {
        transform: translateY(-5px);
    }

    .hero-card .card-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1rem;
        color: #fff;
        font-size: 1.5rem;
        overflow: hidden;
        position: relative;
    }

    .hero-card .card-icon img {
        border-radius: 50%;
        object-fit: cover;
    }

    .hero-card h4 {
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 0.5rem;
    }

    .hero-card p {
        color: var(--text-light);
        margin: 0;
        font-size: 0.9rem;
    }

    .floating {
        animation: floating 3s ease-in-out infinite;
    }

    @keyframes floating {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
    }

    /* Scroll Indicator */
    .scroll-indicator {
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 2;
    }
    
    @media (max-width: 991.98px) {
        .scroll-indicator {
            bottom: 15px;
        }
        
        .scroll-down {
            font-size: 0.8rem;
        }
    }

    .scroll-down {
        display: flex;
        flex-direction: column;
        align-items: center;
        color: #fff;
        text-decoration: none;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .scroll-down:hover {
        color: var(--primary-color);
        transform: translateY(-5px);
    }

    .scroll-down span {
        margin-bottom: 0.5rem;
    }

    .scroll-down i {
        animation: bounce 2s infinite;
    }

    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
        40% { transform: translateY(-10px); }
        60% { transform: translateY(-5px); }
    }

    /* Slide Navigation */
    .slide-navigation {
        position: absolute;
        right: 30px;
        bottom: 50%;
        transform: translateY(50%);
        flex-direction: column;
        align-items: center;
        gap: 1rem;
        z-index: 2;
    }

    .slide-nav-item {
        color: #fff;
        font-weight: 600;
    }

    .slide-nav-item.active .slide-number {
        color: var(--primary-color);
    }

    .slide-nav-controls {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .slide-prev,
    .slide-next {
        width: 40px;
        height: 40px;
        background: rgba(255, 255, 255, 0.2);
        border: none;
        border-radius: 50%;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .slide-prev:hover,
    .slide-next:hover {
        background: var(--primary-color);
        transform: scale(1.1);
    }

    /* Responsive Design - Hero Section */
    @media (max-width: 991.98px) {
        .hero-section {
            background-attachment: scroll;
            padding: 2rem 0 !important;
            min-height: auto !important;
        }
        
        .hero-section .container {
            max-width: 100% !important;
            padding-left: 1rem !important;
            padding-right: 1rem !important;
        }
        
        .hero-section .row {
            margin-left: 0 !important;
            margin-right: 0 !important;
            min-height: auto !important;
        }
        
        .hero-section .min-vh-100 {
            min-height: auto !important;
        }
        
        .hero-section [class*="col-"] {
            padding-left: 0 !important;
            padding-right: 0 !important;
        }
        
        /* Hero cards və yan elementləri mobilde gizlə */
        .hero-image,
        .hero-card,
        .slide-navigation {
            display: none !important;
        }
        
        .hero-content {
            padding: 1rem 0 !important;
            text-align: center;
        }
        
        .hero-title {
            font-size: 2rem !important;
            line-height: 1.3 !important;
            margin-bottom: 1rem !important;
        }
        
        .hero-subtitle {
            font-size: 0.95rem !important;
            margin-bottom: 1.5rem !important;
            padding: 0 1rem;
        }
        
        .hero-actions {
            display: flex !important;
            flex-direction: column !important;
            align-items: center !important;
            gap: 0.75rem !important;
            margin-bottom: 2rem !important;
            padding: 0 1rem;
        }
        
        .btn-primary-custom,
        .btn-outline-custom {
            width: 100% !important;
            max-width: 280px !important;
            padding: 0.75rem 1.5rem !important;
            font-size: 0.9rem !important;
            margin: 0 !important;
            text-align: center;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            white-space: nowrap;
        }
        
        .hero-stats {
            margin-top: 1.5rem !important;
            padding: 0 1rem;
        }
        
        .stat-item {
            text-align: center;
            margin-bottom: 1rem;
        }
        
        .stat-number {
            font-size: 1.8rem !important;
        }
        
        .stat-label {
            font-size: 0.85rem !important;
        }
    }

    @media (max-width: 575.98px) {
        .hero-title {
            font-size: 1.7rem !important;
            line-height: 1.4 !important;
        }
        
        .hero-subtitle {
            font-size: 0.9rem !important;
            line-height: 1.6 !important;
        }
        
        .btn-primary-custom,
        .btn-outline-custom {
            font-size: 0.85rem !important;
            padding: 0.7rem 1.2rem !important;
            max-width: 250px !important;
        }
        
        .stat-number {
            font-size: 1.5rem !important;
        }
        
        .stat-label {
            font-size: 0.8rem !important;
            line-height: 1.3 !important;
        }
        
        .hero-content {
            padding: 0.5rem 0 !important;
        }
    }

    @media (max-width: 374px) {
        .hero-title {
            font-size: 1.5rem !important;
        }
        
        .hero-subtitle {
            font-size: 0.85rem !important;
        }
        
        .btn-primary-custom,
        .btn-outline-custom {
            font-size: 0.8rem !important;
            padding: 0.65rem 1rem !important;
            max-width: 220px !important;
        }
    }
</style>
