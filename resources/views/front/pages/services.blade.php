@extends('front.layouts.master')

@section('title', 'Xidmətlər - MODERN LİZİNQ')
@section('description', 'Modern Lizinq xidmətləri: kənd təsərrüfatı texnikası, avtomobil, məişət texnikası, daşınmaz əmlak, sənaye avadanlıqları və tikinti texnikası lizinqi.')
@section('keywords', 'lizinq xidmətləri, kənd təsərrüfatı lizinqi, avtomobil lizinqi, məişət texnikası, sənaye avadanlıqları')

@section('content')
    <!-- Page Header -->
    <section class="page-header" style="background: linear-gradient(135deg, #1a1a1a 0%, #ff6b35 100%); padding: 150px 0 100px;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="page-title text-white" data-aos="fade-up">Xidmətlər</h1>
                    <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item">
                                <a href="{{ route('front.index') }}" class="text-light">Ana Səhifə</a>
                            </li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Xidmətlər</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Introduction -->
    <section class="section-padding bg-dark text-white" style="background-color: var(--section-bg);">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="section-title text-white" data-aos="fade-up">Bizim <span class="text-primary">Xidmətlərimiz</span></h2>
                    <p class="section-subtitle text-light" data-aos="fade-up" data-aos-delay="200">
                        Hər biri ayrıca alt sahifə və ya "accordion" strukturunda təqdim olunur
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Accordion -->
    <section class="section-padding text-white" style="background-color: var(--section-bg);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="services-accordion" data-aos="fade-up">
                        
                        <!-- Kənd Təsərrüfatı Texnikası -->
                        <div class="service-accordion-item">
                            <div class="service-accordion-header" data-bs-toggle="collapse" data-bs-target="#agricultural" aria-expanded="false">
                                <div class="service-icon">
                                    <i class="fas fa-tractor"></i>
                                </div>
                                <div class="service-title">
                                    <h3>Kənd Təsərrüfatı Texnikası Lizinqi</h3>
                                    <p>Traktor, kombayn və digər kənd təsərrüfatı avadanlıqları</p>
                                </div>
                                <div class="service-arrow">
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                            <div class="collapse service-accordion-content" id="agricultural">
                                <div class="service-content-body">
                                    <div class="row g-4">
                                        <div class="col-md-6">
                                            <h5>Giriş təsviri</h5>
                                            <p>Kənd təsərrüfatı sahəsində ən müasir texnikalar və avadanlıqların lizinqi xidmətləri təqdim edirik.</p>
                                            
                                            <h6>Faydalar və şərtlər (bullet points)</h6>
                                            <ul class="service-features">
                                                <li><i class="fas fa-check text-primary me-2"></i>24 aya qədər ödəniş müddəti</li>
                                                <li><i class="fas fa-check text-primary me-2"></i>İlkin ödəniş 10%-dən başlayır</li>
                                                <li><i class="fas fa-check text-primary me-2"></i>Sənədləşmə 48 saat ərzində</li>
                                                <li><i class="fas fa-check text-primary me-2"></i>Texniki dəstək və xidmət</li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="service-image">
                                                <img src="https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" 
                                                     alt="Kənd Təsərrüfatı" class="img-fluid" style="border-radius: 8px;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-12 text-center">
                                            <button class="btn btn-primary-custom" data-bs-toggle="modal" data-bs-target="#applicationModal">
                                                Müştəri üçün üstünlüklər
                                            </button>
                                            <a href="#" class="btn btn-outline ms-3">CTA: "Müraciət et"</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Məişət Texnikası -->
                        <div class="service-accordion-item">
                            <div class="service-accordion-header" data-bs-toggle="collapse" data-bs-target="#household" aria-expanded="false">
                                <div class="service-icon">
                                    <i class="fas fa-home"></i>
                                </div>
                                <div class="service-title">
                                    <h3>Məişət Texnikası Lizinqi</h3>
                                    <p>Ev və mətbəx texnikası, elektron cihazlar</p>
                                </div>
                                <div class="service-arrow">
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                            <div class="collapse service-accordion-content" id="household">
                                <div class="service-content-body">
                                    <div class="row g-4">
                                        <div class="col-md-6">
                                            <h5>Giriş təsviri</h5>
                                            <p>Ev və mətbəx üçün lazım olan bütün elektron və texniki avadanlıqların əlverişli lizinq seçimləri.</p>
                                            
                                            <h6>Faydalar və şərtlər (bullet points)</h6>
                                            <ul class="service-features">
                                                <li><i class="fas fa-check text-primary me-2"></i>12-36 ay ödəniş planı</li>
                                                <li><i class="fas fa-check text-primary me-2"></i>Sıfır faiz kampaniyaları</li>
                                                <li><i class="fas fa-check text-primary me-2"></i>Pulsuz çatdırılma və quraşdırma</li>
                                                <li><i class="fas fa-check text-primary me-2"></i>Zəmanət müddətində servis</li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="service-image">
                                                <img src="https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" 
                                                     alt="Məişət Texnikası" class="img-fluid" style="border-radius: 8px;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-12 text-center">
                                            <button class="btn btn-primary-custom" data-bs-toggle="modal" data-bs-target="#applicationModal">
                                                Məişət Üçün Üstünlüklər
                                            </button>
                                            <a href="#" class="btn btn-outline ms-3">CTA: "Müraciət et"</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Minik avtomobillərinin lizinqi -->
                        <div class="service-accordion-item">
                            <div class="service-accordion-header" data-bs-toggle="collapse" data-bs-target="#automotive" aria-expanded="false">
                                <div class="service-icon">
                                    <i class="fas fa-car"></i>
                                </div>
                                <div class="service-title">
                                    <h3>Minik Avtomobillərin Lizinqi</h3>
                                    <p>Şəxsi və ailə avtomobillərinin lizinq seçimləri</p>
                                </div>
                                <div class="service-arrow">
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                            <div class="collapse service-accordion-content" id="automotive">
                                <div class="service-content-body">
                                    <div class="row g-4">
                                        <div class="col-md-6">
                                            <h5>Giriş təsviri</h5>
                                            <p>Yeni və ikinci əl avtomobillərin ən əlverişli şərtlərlə lizinq imkanlarını təqdim edirik.</p>
                                            
                                            <h6>Faydalar və şərtlər (bullet points)</h6>
                                            <ul class="service-features">
                                                <li><i class="fas fa-check text-primary me-2"></i>60 aya qədər ödəniş müddəti</li>
                                                <li><i class="fas fa-check text-primary me-2"></i>İlkin ödəniş 15%-dən başlayır</li>
                                                <li><i class="fas fa-check text-primary me-2"></i>Tam sığorta paketi daxil</li>
                                                <li><i class="fas fa-check text-primary me-2"></i>Texniki yoxlama və baxım</li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="service-image">
                                                <img src="https://images.unsplash.com/photo-1549399743-3e3eb5b92ed3?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" 
                                                     alt="Minik Avtomobil" class="img-fluid" style="border-radius: 8px;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-12 text-center">
                                            <button class="btn btn-primary-custom" data-bs-toggle="modal" data-bs-target="#applicationModal">
                                                Avtomobil Üstünlükləri
                                            </button>
                                            <a href="#" class="btn btn-outline ms-3">CTA: "Müraciət et"</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Daşınmaz əmlak lizinqi -->
                        <div class="service-accordion-item">
                            <div class="service-accordion-header" data-bs-toggle="collapse" data-bs-target="#realestate" aria-expanded="false">
                                <div class="service-icon">
                                    <i class="fas fa-building"></i>
                                </div>
                                <div class="service-title">
                                    <h3>Daşınmaz Əmlak Lizinqi</h3>
                                    <p>Ofis, mənzil və kommersiya sahələrinin lizinqi</p>
                                </div>
                                <div class="service-arrow">
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                            <div class="collapse service-accordion-content" id="realestate">
                                <div class="service-content-body">
                                    <div class="row g-4">
                                        <div class="col-md-6">
                                            <h5>Giriş təsviri</h5>
                                            <p>Kommersiya və yaşayış sahələrinin uzun müddətli lizinq seçimləri ilə əmlak sahipliyi.</p>
                                            
                                            <h6>Faydalar və şərtlər (bullet points)</h6>
                                            <ul class="service-features">
                                                <li><i class="fas fa-check text-primary me-2"></i>240 aya qədər ödəniş müddəti</li>
                                                <li><i class="fas fa-check text-primary me-2"></i>İlkin ödəniş 20%-dən başlayır</li>
                                                <li><i class="fas fa-check text-primary me-2"></i>Qiymətləndirmə xidməti pulsuz</li>
                                                <li><i class="fas fa-check text-primary me-2"></i>Sənəd hazırlığı daxil</li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="service-image">
                                                <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" 
                                                     alt="Daşınmaz Əmlak" class="img-fluid" style="border-radius: 8px;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-12 text-center">
                                            <button class="btn btn-primary-custom" data-bs-toggle="modal" data-bs-target="#applicationModal">
                                                Əmlak Üstünlükləri
                                            </button>
                                            <a href="#" class="btn btn-outline ms-3">CTA: "Müraciət et"</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Sənaye avadanlıqları lizinqi -->
                        <div class="service-accordion-item">
                            <div class="service-accordion-header" data-bs-toggle="collapse" data-bs-target="#industrial" aria-expanded="false">
                                <div class="service-icon">
                                    <i class="fas fa-industry"></i>
                                </div>
                                <div class="service-title">
                                    <h3>Sənaye Avadanlıqları Lizinqi</h3>
                                    <p>İstehsal və sənaye avadanlıqlarının lizinqi</p>
                                </div>
                                <div class="service-arrow">
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                            <div class="collapse service-accordion-content" id="industrial">
                                <div class="service-content-body">
                                    <div class="row g-4">
                                        <div class="col-md-6">
                                            <h5>Giriş təsviri</h5>
                                            <p>Sənaye müəssisələri üçün istehsal avadanlıqlarının müxtəlif lizinq variantları.</p>
                                            
                                            <h6>Faydalar və şərtlər (bullet points)</h6>
                                            <ul class="service-features">
                                                <li><i class="fas fa-check text-primary me-2"></i>84 aya qədər ödəniş imkanı</li>
                                                <li><i class="fas fa-check text-primary me-2"></i>İlkin ödəniş 25%-dən başlayır</li>
                                                <li><i class="fas fa-check text-primary me-2"></i>Texniki dəstək və təlim</li>
                                                <li><i class="fas fa-check text-primary me-2"></i>Servis və ehtiyat hissələri</li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="service-image">
                                                <img src="https://images.unsplash.com/photo-1581094288338-2314dddb7ece?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" 
                                                     alt="Sənaye Avadanlıqları" class="img-fluid" style="border-radius: 8px;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-12 text-center">
                                            <button class="btn btn-primary-custom" data-bs-toggle="modal" data-bs-target="#applicationModal">
                                                Sənaye Üstünlükləri
                                            </button>
                                            <a href="#" class="btn btn-outline ms-3">CTA: "Müraciət et"</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tikinti texnikası lizinqi -->
                        <div class="service-accordion-item">
                            <div class="service-accordion-header" data-bs-toggle="collapse" data-bs-target="#construction" aria-expanded="false">
                                <div class="service-icon">
                                    <i class="fas fa-tools"></i>
                                </div>
                                <div class="service-title">
                                    <h3>Tikinti Texnikası Lizinqi</h3>
                                    <p>İnşaat və tikinti texnikalarının lizinq xidmətləri</p>
                                </div>
                                <div class="service-arrow">
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                            <div class="collapse service-accordion-content" id="construction">
                                <div class="service-content-body">
                                    <div class="row g-4">
                                        <div class="col-md-6">
                                            <h5>Giriş təsviri</h5>
                                            <p>İnşaat sahəsi üçün ekskotvator, buldozer və digər ağır texnikaların lizinq imkanları.</p>
                                            
                                            <h6>Faydalar və şərtlər (bullet points)</h6>
                                            <ul class="service-features">
                                                <li><i class="fas fa-check text-primary me-2"></i>60 aya qədər ödəniş müddəti</li>
                                                <li><i class="fas fa-check text-primary me-2"></i>İlkin ödəniş 30%-dən başlayır</li>
                                                <li><i class="fas fa-check text-primary me-2"></i>24/7 texniki dəstək</li>
                                                <li><i class="fas fa-check text-primary me-2"></i>Operator təlimi daxil</li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="service-image">
                                                <img src="https://images.unsplash.com/photo-1581244277943-fe4a9c777189?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" 
                                                     alt="Tikinti Texnikası" class="img-fluid" style="border-radius: 8px;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-12 text-center">
                                            <button class="btn btn-primary-custom" data-bs-toggle="modal" data-bs-target="#applicationModal">
                                                Tikinti Üstünlükləri
                                            </button>
                                            <a href="#" class="btn btn-outline ms-3">CTA: "Müraciət et"</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Yükdaşıma və kommersiya obyektlərinin lizinqi -->
                        <div class="service-accordion-item">
                            <div class="service-accordion-header" data-bs-toggle="collapse" data-bs-target="#commercial" aria-expanded="false">
                                <div class="service-icon">
                                    <i class="fas fa-truck"></i>
                                </div>
                                <div class="service-title">
                                    <h3>Yükdaşıma və Kommersiya Obyektlərinin Lizinqi</h3>
                                    <p>Kommersiya nəqliyyatı və logistika avadanlıqları</p>
                                </div>
                                <div class="service-arrow">
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                            <div class="collapse service-accordion-content" id="commercial">
                                <div class="service-content-body">
                                    <div class="row g-4">
                                        <div class="col-md-6">
                                            <h5>Giriş təsviri</h5>
                                            <p>Logistika və yükdaşıma şirkətləri üçün xüsusi hazırlanmış kommersiya nəqliyyatının lizinqi.</p>
                                            
                                            <h6>Faydalar və şərtlər (bullet points)</h6>
                                            <ul class="service-features">
                                                <li><i class="fas fa-check text-primary me-2"></i>72 aya qədər ödəniş planı</li>
                                                <li><i class="fas fa-check text-primary me-2"></i>İlkin ödəniş 20%-dən başlayır</li>
                                                <li><i class="fas fa-check text-primary me-2"></i>GPS izləmə sistemi daxil</li>
                                                <li><i class="fas fa-check text-primary me-2"></i>Filo idarəetmə xidmətləri</li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="service-image">
                                                <img src="https://images.unsplash.com/photo-1601584115197-04ecc0da31d7?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" 
                                                     alt="Kommersiya Nəqliyyatı" class="img-fluid" style="border-radius: 8px;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-12 text-center">
                                            <button class="btn btn-primary-custom" data-bs-toggle="modal" data-bs-target="#applicationModal">
                                                Kommersiya Üstünlükləri
                                            </button>
                                            <a href="#" class="btn btn-outline ms-3">CTA: "Müraciət et"</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Service Features Summary -->
            <div class="row mt-5">
                <div class="col-12 text-center">
                    <h3 class="text-white mb-4">Hər Xidmət Sahəsi</h3>
                    <div class="row g-4">
                        <div class="col-lg-3 col-md-6">
                            <div class="service-summary-card">
                                <i class="fas fa-image text-primary mb-3"></i>
                                <h6 class="text-white">Giriş təsviri</h6>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="service-summary-card">
                                <i class="fas fa-list text-primary mb-3"></i>
                                <h6 class="text-white">Faydalar və şərtlər (bullet points)</h6>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="service-summary-card">
                                <i class="fas fa-users text-primary mb-3"></i>
                                <h6 class="text-white">Müştəri üçün üstünlüklər</h6>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="service-summary-card">
                                <i class="fas fa-mouse-pointer text-primary mb-3"></i>
                                <h6 class="text-white">CTA: "Müraciət et"</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

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
    
    .services-accordion {
        max-width: 100%;
    }
    
    .service-accordion-item {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        margin-bottom: 1rem;
        overflow: hidden;
        transition: all 0.3s ease;
    }
    
    .service-accordion-item:hover {
        border-color: var(--primary-color);
    }
    
    .service-accordion-header {
        display: flex;
        align-items: center;
        padding: 1.5rem;
        cursor: pointer;
        position: relative;
        transition: all 0.3s ease;
    }
    
    .service-accordion-header:hover {
        background: rgba(255, 107, 53, 0.1);
    }
    
    .service-icon {
        width: 60px;
        height: 60px;
        background: var(--primary-color);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
        margin-right: 1.5rem;
        flex-shrink: 0;
    }
    
    .service-title {
        flex: 1;
    }
    
    .service-title h3 {
        color: white;
        margin: 0 0 0.5rem 0;
        font-size: 1.25rem;
        font-weight: 600;
    }
    
    .service-title p {
        margin: 0;
        color: rgba(255, 255, 255, 0.8);
        font-size: 0.9rem;
    }
    
    .service-arrow {
        margin-left: 1rem;
        color: var(--primary-color);
        font-size: 1.2rem;
        transition: transform 0.3s ease;
    }
    
    .service-accordion-header[aria-expanded="true"] .service-arrow {
        transform: rotate(180deg);
    }
    
    .service-accordion-content {
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .service-content-body {
        padding: 2rem 1.5rem;
    }
    
    .service-content-body h5 {
        color: var(--primary-color);
        margin-bottom: 1rem;
        font-weight: 600;
    }
    
    .service-content-body h6 {
        color: white;
        margin-bottom: 1rem;
        margin-top: 1.5rem;
    }
    
    .service-features {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .service-features li {
        display: flex;
        align-items: center;
        margin-bottom: 0.75rem;
        color: rgba(255, 255, 255, 0.9);
        font-size: 0.95rem;
    }
    
    .service-image img {
        width: 100%;
        height: 250px;
        object-fit: cover;
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
    
    .service-summary-card {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        padding: 1.5rem;
        text-align: center;
        height: 100%;
        transition: all 0.3s ease;
    }
    
    .service-summary-card:hover {
        transform: translateY(-5px);
        border-color: var(--primary-color);
    }
    
    .service-summary-card i {
        font-size: 2rem;
        display: block;
    }
    
    @media (max-width: 768px) {
        .page-title {
            font-size: 2rem;
        }
        
        .service-accordion-header {
            padding: 1rem;
        }
        
        .service-icon {
            width: 50px;
            height: 50px;
            margin-right: 1rem;
        }
        
        .service-title h3 {
            font-size: 1.1rem;
        }
        
        .service-content-body {
            padding: 1.5rem 1rem;
        }
        
        .btn-primary-custom,
        .btn-outline {
            display: block;
            width: 100%;
            margin-bottom: 1rem;
        }
    }
</style>
@endpush
