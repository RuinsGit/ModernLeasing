@extends('front.layouts.master')

@section('title', 'İnvestorlar - MODERN LİZİNQ')
@section('description', 'Modern Lizinq investorları və tərəfdaş imkanları. Şirkətimizlə əməkdaşlıq edən partner şirkətləri və investor seçimləri.')
@section('keywords', 'investor, tərəfdaş, əməkdaşlıq, partnerlik, investisiya imkanları, modern lizinq')

@section('content')
    <!-- Page Header -->
    <section class="page-header" style="background: linear-gradient(135deg, #1a1a1a 0%, #ff6b35 100%); padding: 150px 0 100px;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="page-title text-white" data-aos="fade-up">İnvestorlar</h1>
                    <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item">
                                <a href="{{ route('front.index') }}" class="text-light">Ana Səhifə</a>
                            </li>
                            <li class="breadcrumb-item active text-white" aria-current="page">İnvestorlar</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Investor Opportunities Section - 1-ci Bölmə: Tərəfdaşlıq İmkanları -->
    <section class="section-padding bg-dark text-white" style="background-color: var(--section-bg);">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="section-title text-white" data-aos="fade-up">Tərəfdaşlıq <span class="text-primary">İmkanları</span></h2>
                    <p class="section-subtitle text-light" data-aos="fade-up" data-aos-delay="200">
                        Modern Lizinq olaraq güclü maliyyə strukturu və inkişaf strategiyamızla 
                        yeni investorları və tərəfdaşları dəvət edirik
                    </p>
                </div>
            </div>
            
            <div class="row g-5 align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="investor-content">
                        <h3 class="text-white mb-4">Başlıq</h3>
                        <p class="text-light mb-4">
                            Azərbaycanda lizinq sahəsinin dinamik inkişafı və böyümə potensialından yararlanaraq, 
                            strategji tərəfdaşlarımızla birlikdə güclü investisiya imkanları yaradırıq.
                        </p>
                        
                        <div class="investor-features">
                            <div class="feature-item mb-4">
                                <div class="feature-icon">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <div class="feature-content">
                                    <h5 class="text-white">Yüksək Gəlirlilik</h5>
                                    <p class="text-light">Lizinq sahəsində 15-25% illik gəlir potensialı</p>
                                </div>
                            </div>
                            
                            <div class="feature-item mb-4">
                                <div class="feature-icon">
                                    <i class="fas fa-shield-alt"></i>
                                </div>
                                <div class="feature-content">
                                    <h5 class="text-white">Təhlükəsizlik</h5>
                                    <p class="text-light">Diversifikasiya edilmiş portfel və risk idarəetməsi</p>
                                </div>
                            </div>
                            
                            <div class="feature-item mb-4">
                                <div class="feature-icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="feature-content">
                                    <h5 class="text-white">Təcrübəli Komanda</h5>
                                    <p class="text-light">15+ il təcrübəyə malik mütəxəssis heyət</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="investor-actions mt-4">
                            <button class="btn btn-primary-custom me-3" data-bs-toggle="modal" data-bs-target="#investorModal">
                                <i class="fas fa-handshake me-2"></i>İnvestor Ol
                            </button>
                            <a href="#partners" class="btn btn-outline">
                                <i class="fas fa-users me-2"></i>Tərəfdaşları Gör
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="investor-stats">
                        <div class="stats-grid">
                            <div class="stat-item">
                                <div class="stat-icon">
                                    <i class="fas fa-dollar-sign"></i>
                                </div>
                                <h4 class="text-primary">$25M+</h4>
                                <p class="text-light">Toplam Portfel Dəyəri</p>
                            </div>
                            
                            <div class="stat-item">
                                <div class="stat-icon">
                                    <i class="fas fa-trending-up"></i>
                                </div>
                                <h4 class="text-primary">35%</h4>
                                <p class="text-light">İllik Artım Dərəcəsi</p>
                            </div>
                            
                            <div class="stat-item">
                                <div class="stat-icon">
                                    <i class="fas fa-handshake"></i>
                                </div>
                                <h4 class="text-primary">25+</h4>
                                <p class="text-light">Beynəlxalq Tərəfdaş</p>
                            </div>
                            
                            <div class="stat-item">
                                <div class="stat-icon">
                                    <i class="fas fa-award"></i>
                                </div>
                                <h4 class="text-primary">AAA</h4>
                                <p class="text-light">Kredit Reytinqi</p>
                            </div>
                        </div>
                        
                        <div class="growth-chart mt-5">
                            <h5 class="text-white text-center mb-3">Şirkət Böyümə Dinamikası</h5>
                            <div class="chart-placeholder">
                                <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" 
                                     alt="Böyümə Qrafiki" class="img-fluid" style="border-radius: 8px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Investment Plans Section -->
    <section class="section-padding text-white" style="background-color: var(--section-bg);">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="section-title text-white" data-aos="fade-up">İnvestisiya <span class="text-primary">Planları</span></h2>
                    <p class="section-subtitle text-light" data-aos="fade-up" data-aos-delay="200">
                        Açıqlama (Description - CKEditor) formatında təfərrüatlı məlumat
                    </p>
                </div>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="investment-plan">
                        <div class="plan-header">
                            <h4 class="text-white">Başlanğıc Plan</h4>
                            <div class="plan-price">
                                <span class="currency">$</span>
                                <span class="amount">10,000</span>
                                <span class="period">/ minimum</span>
                            </div>
                        </div>
                        <div class="plan-features">
                            <ul class="features-list">
                                <li><i class="fas fa-check text-primary me-2"></i>12% illik gəlir</li>
                                <li><i class="fas fa-check text-primary me-2"></i>Aylıq hesabat</li>
                                <li><i class="fas fa-check text-primary me-2"></i>Online izləmə</li>
                                <li><i class="fas fa-check text-primary me-2"></i>24/7 dəstək</li>
                            </ul>
                        </div>
                        <div class="plan-action">
                            <button class="btn btn-outline w-100" data-bs-toggle="modal" data-bs-target="#investorModal">
                                Bu Plana Başla
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="investment-plan featured">
                        <div class="plan-badge">Populyar</div>
                        <div class="plan-header">
                            <h4 class="text-white">Premium Plan</h4>
                            <div class="plan-price">
                                <span class="currency">$</span>
                                <span class="amount">50,000</span>
                                <span class="period">/ minimum</span>
                            </div>
                        </div>
                        <div class="plan-features">
                            <ul class="features-list">
                                <li><i class="fas fa-check text-primary me-2"></i>18% illik gəlir</li>
                                <li><i class="fas fa-check text-primary me-2"></i>Həftəlik hesabat</li>
                                <li><i class="fas fa-check text-primary me-2"></i>Prioritet dəstək</li>
                                <li><i class="fas fa-check text-primary me-2"></i>İdarəetmə paneli</li>
                                <li><i class="fas fa-check text-primary me-2"></i>Risk sığortası</li>
                            </ul>
                        </div>
                        <div class="plan-action">
                            <button class="btn btn-primary-custom w-100" data-bs-toggle="modal" data-bs-target="#investorModal">
                                Bu Plana Başla
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="500">
                    <div class="investment-plan">
                        <div class="plan-header">
                            <h4 class="text-white">VIP Plan</h4>
                            <div class="plan-price">
                                <span class="currency">$</span>
                                <span class="amount">200,000</span>
                                <span class="period">/ minimum</span>
                            </div>
                        </div>
                        <div class="plan-features">
                            <ul class="features-list">
                                <li><i class="fas fa-check text-primary me-2"></i>25% illik gəlir</li>
                                <li><i class="fas fa-check text-primary me-2"></i>Günlük hesabat</li>
                                <li><i class="fas fa-check text-primary me-2"></i>Şəxsi meneger</li>
                                <li><i class="fas fa-check text-primary me-2"></i>Tam nəzarət hüququ</li>
                                <li><i class="fas fa-check text-primary me-2"></i>Maksimum sığorta</li>
                                <li><i class="fas fa-check text-primary me-2"></i>Prioritet çıxış</li>
                            </ul>
                        </div>
                        <div class="plan-action">
                            <button class="btn btn-outline w-100" data-bs-toggle="modal" data-bs-target="#investorModal">
                                Bu Plana Başla
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Partners Section - 2-ci Bölmə: Tərəfdaşlar Siyahısı -->
    <section class="section-padding" id="partners" style="background: #f8f9fa;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="section-title" data-aos="fade-up">Bizim <span class="text-primary">Tərəfdaşlarımız</span></h2>
                    <p class="section-subtitle" data-aos="fade-up" data-aos-delay="200">
                        Tərəfdaşların loqoları (Slider formatında)
                    </p>
                </div>
            </div>
            
            <!-- Partners Slider -->
            <div class="partners-slider" data-aos="fade-up" data-aos-delay="400">
                <div class="swiper partners-swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="partner-logo">
                                <div class="partner-placeholder">
                                    <i class="fas fa-building"></i>
                                    <span>Bank Partner</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="partner-logo">
                                <div class="partner-placeholder">
                                    <i class="fas fa-industry"></i>
                                    <span>Industrial Group</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="partner-logo">
                                <div class="partner-placeholder">
                                    <i class="fas fa-car"></i>
                                    <span>Auto Dealer</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="partner-logo">
                                <div class="partner-placeholder">
                                    <i class="fas fa-tractor"></i>
                                    <span>Agri Equipment</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="partner-logo">
                                <div class="partner-placeholder">
                                    <i class="fas fa-tools"></i>
                                    <span>Construction Co</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="partner-logo">
                                <div class="partner-placeholder">
                                    <i class="fas fa-home"></i>
                                    <span>Real Estate</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="partner-logo">
                                <div class="partner-placeholder">
                                    <i class="fas fa-globe"></i>
                                    <span>International</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="partner-logo">
                                <div class="partner-placeholder">
                                    <i class="fas fa-handshake"></i>
                                    <span>Strategic Partner</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Navigation -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    
                    <!-- Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact CTA -->
    <section class="section-padding text-white" style="background-color: var(--section-bg);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h3 class="text-white mb-4">İnvestor Olmağa Hazırsınız?</h3>
                    <p class="text-light mb-4">Bizim güclü komanda və dinamik böyümə strategiyamıza qoşulun</p>
                    <div class="cta-actions">
                        <button class="btn btn-primary-custom me-3" data-bs-toggle="modal" data-bs-target="#investorModal">
                            <i class="fas fa-chart-line me-2"></i>İnvestisiya Et
                        </button>
                        <a href="{{ route('front.contact') }}" class="btn btn-outline">
                            <i class="fas fa-envelope me-2"></i>Məlumat Al
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<!-- Investor Modal -->
<div class="modal fade" id="investorModal" tabindex="-1" aria-labelledby="investorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header border-secondary">
                <h5 class="modal-title text-primary" id="investorModalLabel">
                    <i class="fas fa-chart-line me-2"></i>İnvestor Qeydiyyatı
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="investorForm">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="investorName" class="form-label">Ad və Soyad</label>
                            <input type="text" class="form-control bg-secondary border-0 text-white" 
                                   id="investorName" placeholder="Tam adınız" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="investorEmail" class="form-label">E-poçt</label>
                            <input type="email" class="form-control bg-secondary border-0 text-white" 
                                   id="investorEmail" placeholder="emailiniz@example.com" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="investorPhone" class="form-label">Telefon</label>
                            <input type="tel" class="form-control bg-secondary border-0 text-white" 
                                   id="investorPhone" placeholder="+994 XX XXX XX XX" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="investmentAmount" class="form-label">İnvestisiya Məbləği</label>
                            <select class="form-control bg-secondary border-0 text-white" id="investmentAmount" required>
                                <option value="">Seçin...</option>
                                <option value="10000">$10,000 - $49,999</option>
                                <option value="50000">$50,000 - $199,999</option>
                                <option value="200000">$200,000+</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="investorMessage" class="form-label">Əlavə Məlumat</label>
                        <textarea class="form-control bg-secondary border-0 text-white" 
                                  id="investorMessage" rows="3" 
                                  placeholder="İnvestisiya məqsədləriniz və suallarınız..."></textarea>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary-custom">
                            <i class="fas fa-paper-plane me-2"></i>Müraciəti Göndər
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .page-header {
        position: relative;
        overflow: hidden;
    }
    
    .page-title {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 1rem;
    }
    
    .breadcrumb {
        background: none;
        padding: 0;
        margin: 0;
    }
    
    .breadcrumb-item + .breadcrumb-item::before {
        content: ">";
        color: rgba(255, 255, 255, 0.7);
    }
    
    .feature-item {
        display: flex;
        align-items: flex-start;
    }
    
    .feature-icon {
        width: 50px;
        height: 50px;
        background: var(--primary-color);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        margin-right: 1rem;
        flex-shrink: 0;
    }
    
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 2rem;
        margin-bottom: 2rem;
    }
    
    .stat-item {
        text-align: center;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        padding: 1.5rem;
        transition: all 0.3s ease;
    }
    
    .stat-item:hover {
        transform: translateY(-5px);
        border-color: var(--primary-color);
    }
    
    .stat-icon {
        width: 60px;
        height: 60px;
        background: var(--primary-color);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        margin: 0 auto 1rem;
        font-size: 1.5rem;
    }
    
    .investment-plan {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        padding: 2rem;
        height: 100%;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .investment-plan:hover {
        transform: translateY(-5px);
        border-color: var(--primary-color);
    }
    
    .investment-plan.featured {
        border-color: var(--primary-color);
        transform: scale(1.05);
    }
    
    .plan-badge {
        position: absolute;
        top: -10px;
        right: 20px;
        background: var(--primary-color);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 0 0 8px 8px;
        font-size: 0.8rem;
        font-weight: 600;
    }
    
    .plan-header {
        text-align: center;
        margin-bottom: 2rem;
    }
    
    .plan-price {
        margin-top: 1rem;
    }
    
    .plan-price .currency {
        font-size: 1.5rem;
        color: var(--primary-color);
    }
    
    .plan-price .amount {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--primary-color);
    }
    
    .plan-price .period {
        font-size: 0.9rem;
        color: rgba(255, 255, 255, 0.7);
    }
    
    .features-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .features-list li {
        display: flex;
        align-items: center;
        margin-bottom: 1rem;
        color: rgba(255, 255, 255, 0.9);
    }
    
    .btn-outline {
        background: transparent;
        border: 2px solid var(--primary-color);
        color: var(--primary-color);
        padding: 12px 30px;
        border-radius: 8px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        transition: all 0.3s ease;
    }
    
    .btn-outline:hover {
        background: var(--primary-color);
        color: white;
        transform: translateY(-2px);
    }
    
    /* Partners Slider */
    .partners-slider {
        margin-top: 3rem;
    }
    
    .partners-swiper .swiper-slide {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1rem;
    }
    
    .partner-logo {
        background: white;
        border-radius: 8px;
        padding: 1.5rem;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        width: 200px;
        height: 120px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .partner-logo:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }
    
    .partner-logo img {
        max-width: 100%;
        max-height: 80px;
        filter: grayscale(100%);
        transition: filter 0.3s ease;
    }
    
    .partner-logo:hover img {
        filter: grayscale(0%);
    }
    
    .partner-placeholder {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100%;
        color: #666;
        transition: all 0.3s ease;
    }
    
    .partner-placeholder i {
        font-size: 2rem;
        margin-bottom: 0.5rem;
        color: var(--primary-color);
        opacity: 0.7;
        transition: all 0.3s ease;
    }
    
    .partner-placeholder span {
        font-size: 0.8rem;
        font-weight: 600;
        opacity: 0.8;
        text-align: center;
        line-height: 1.2;
    }
    
    .partner-logo:hover .partner-placeholder i {
        opacity: 1;
        transform: scale(1.1);
    }
    
    .partner-logo:hover .partner-placeholder {
        color: #333;
    }
    
    .partners-swiper .swiper-button-next,
    .partners-swiper .swiper-button-prev {
        color: var(--primary-color);
    }
    
    .partners-swiper .swiper-pagination-bullet {
        background: var(--primary-color);
    }
    
    @media (max-width: 768px) {
        .page-title {
            font-size: 2rem;
        }
        
        .stats-grid {
            grid-template-columns: 1fr;
            gap: 1rem;
        }
        
        .investment-plan.featured {
            transform: none;
        }
        
        .plan-price .amount {
            font-size: 2rem;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    // Partners Swiper
    document.addEventListener('DOMContentLoaded', function() {
        new Swiper('.partners-swiper', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                },
                992: {
                    slidesPerView: 3,
                },
                1200: {
                    slidesPerView: 4,
                }
            }
        });
    });
    
    // Investor Form
    document.getElementById('investorForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        
        // Show loading
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Göndərilir...';
        submitBtn.disabled = true;
        
        // Simulate API call
        setTimeout(() => {
            submitBtn.innerHTML = '<i class="fas fa-check me-2"></i>Uğurla Göndərildi!';
            submitBtn.classList.remove('btn-primary-custom');
            submitBtn.classList.add('btn-success');
            
            // Reset
            setTimeout(() => {
                this.reset();
                submitBtn.innerHTML = originalText;
                submitBtn.classList.remove('btn-success');
                submitBtn.classList.add('btn-primary-custom');
                submitBtn.disabled = false;
                
                // Close modal
                bootstrap.Modal.getInstance(document.getElementById('investorModal')).hide();
            }, 2000);
        }, 1500);
    });
</script>
@endpush
