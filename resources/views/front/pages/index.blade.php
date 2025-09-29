@extends('front.layouts.master')

@section('title', 'MODERN LİZİNQ - Ana Səhifə')
@section('description', 'MODERN LİZİNQ ilə texnika, avtomobil və əmlakınızı şərfəli lizinq şərtləri ilə əldə edin. Etibarlı xidmət və peşəkar dəstək.')
@section('keywords', 'lizinq, texnika lizinqi, avtomobil lizinqi, əmlak lizinqi, kənd təsərrüfatı, sənaye avadanlıqları, modern lizinq')

@section('header')
    @include('front.includes.header')
@endsection

@section('content')
    <!-- Service Categories Section -->
    <section class="section-padding bg-dark text-white" id="categories" style="background-color: var(--section-bg);">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="section-title text-white" data-aos="fade-up">Xidmət <span class="text-primary">Kateqoriyaları</span></h2>
                    <p class="section-subtitle text-light" data-aos="fade-up" data-aos-delay="200">
                        Kənd təsərrüfatından tutmuş sənaye avadanlıqlarına qədər geniş məhsul çeşidi
                    </p>
                </div>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="category-card">
                        <div class="category-icon">
                            <i class="fas fa-tractor"></i>
                        </div>
                        <h4 class="text-white">Kənd Təsərrüfatı Texnikası</h4>
                        <p class="text-light">Traktor, kombayn və digər kənd təsərrüfatı avadanlıqlarının lizinqi</p>
                        <ul class="category-features">
                            <li>• Traktor və kombaynlar</li>
                            <li>• Əkin-biçin avadanlıqları</li>
                            <li>• Suvarma sistemləri</li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="category-card">
                        <div class="category-icon">
                            <i class="fas fa-car"></i>
                        </div>
                        <h4 class="text-white">Avtomobillər</h4>
                        <p class="text-light">Şəxsi və kommersiya avtomobillərin əlverişli lizinq imkanları</p>
                        <ul class="category-features">
                            <li>• Şəxsi avtomobillər</li>
                            <li>• Kommersiya nəqliyyatı</li>
                            <li>• Lüks sinif avtomobillər</li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="category-card">
                        <div class="category-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <h4 class="text-white">Məişət Texnikası</h4>
                        <p class="text-light">Ev və mətbəx texnikalarının lizinq xidmətləri</p>
                        <ul class="category-features">
                            <li>• Mətbəx texnikası</li>
                            <li>• Ev elektronika</li>
                            <li>• Mebel və dekorasiya</li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                    <div class="category-card">
                        <div class="category-icon">
                            <i class="fas fa-building"></i>
                        </div>
                        <h4 class="text-white">Daşınmaz Əmlak</h4>
                        <p class="text-light">Ofis və yaşayış sahələrinin lizinq imkanları</p>
                        <ul class="category-features">
                            <li>• Ofis binaları</li>
                            <li>• Mənzil və villalar</li>
                            <li>• Ticarət mərkəzləri</li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="700">
                    <div class="category-card">
                        <div class="category-icon">
                            <i class="fas fa-industry"></i>
                        </div>
                        <h4 class="text-white">Sənaye Avadanlıqları</h4>
                        <p class="text-light">Müxtəlif sənaye sahələri üçün avadanlıq lizinqi</p>
                        <ul class="category-features">
                            <li>• İstehsal avadanlıqları</li>
                            <li>• Enerji sistemləri</li>
                            <li>• Texnoloji həllər</li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="800">
                    <div class="category-card">
                        <div class="category-icon">
                            <i class="fas fa-tools"></i>
                        </div>
                        <h4 class="text-white">Tikinti Texnikası</h4>
                        <p class="text-light">Tikinti və yol-inşaat texnikalarının lizinqi</p>
                        <ul class="category-features">
                            <li>• Ekskovator və bulldozerlər</li>
                            <li>• Kranlar və liftlər</li>
                            <li>• Yükdaşıma vasitələri</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Advantages Section -->
    <section class="section-padding text-white" id="advantages" style="background-color: var(--section-bg);">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="section-title text-white" data-aos="fade-up">Bizim <span class="text-primary">Üstünlüklərimiz</span></h2>
                    <p class="section-subtitle text-light" data-aos="fade-up" data-aos-delay="200">
                        Modern Lizinq olaraq müştərilərimizə təqdim etdiyimiz əsas üstünlüklər
                    </p>
                </div>
            </div>
            
            <div class="row g-5 align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="advantages-content">
                        <div class="advantage-item">
                            <div class="advantage-icon">
                                <i class="fas fa-percentage"></i>
                            </div>
                            <div class="advantage-content">
                                <h4 class="text-white">Ən Aşağı Faiz Dərəcələri</h4>
                                <p class="text-light">Bazarda ən əlverişli faiz dərəcələri ilə lizinq imkanı</p>
                            </div>
                        </div>
                        
                        <div class="advantage-item">
                            <div class="advantage-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="advantage-content">
                                <h4 class="text-white">Sürətli Baxış və Təsdiq</h4>
                                <p class="text-light">24 saat ərzində müraciətlərin baxılması və cavab verilməsi</p>
                            </div>
                        </div>
                        
                        <div class="advantage-item">
                            <div class="advantage-icon">
                                <i class="fas fa-handshake"></i>
                            </div>
                            <div class="advantage-content">
                                <h4 class="text-white">Çevik Ödəniş Imkanları</h4>
                                <p class="text-light">Müxtəlif ödəniş variantları və fərdi yanaşma</p>
                            </div>
                        </div>
                        
                        <div class="advantage-item">
                            <div class="advantage-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div class="advantage-content">
                                <h4 class="text-white">Tam Sığorta Dəstəyi</h4>
                                <p class="text-light">Bütün məhsullar üçün hərtərəfli sığorta təminatı</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="advantages-image">
                        <img src="https://images.unsplash.com/photo-1560472354-b33ff0c44a43?ixlib=rb-4.0.3&auto=format&fit=crop&w=1226&q=80" 
                             alt="Bizim üstünlüklərimiz" class="img-fluid" style="border-radius: 8px;">
                        
                        <div class="experience-badge">
                            <div class="badge-content">
                                <span class="badge-number">15+</span>
                                <span class="badge-text">İl<br>Təcrübə</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Goals Section -->
    <section class="section-padding text-white" id="mission" style="background-color: var(--section-bg);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="mission-image">
                        <img src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?ixlib=rb-4.0.3&auto=format&fit=crop&w=1740&q=80" 
                             alt="Bizim Missiyamız" class="img-fluid" style="border-radius: 8px;">
                        
                        <div class="play-button" data-bs-toggle="modal" data-bs-target="#videoModal">
                            <i class="fas fa-play"></i>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="mission-content">
                        <h2 class="section-title text-white">Bizim <span class="text-primary">Missiya və Məqsədlərimiz</span></h2>
                        <p class="section-subtitle text-light">
                            Müştəri yönümlü yanaşma ilə lizinq xidmətləri sahəsində lider mövqe tutaraq, 
                            rəqabətədavamlı həllər və yenilikçi texnologiyalarla müştərilərimizin rifah səviyyəsini artırmaq.
                        </p>
                        
                        <div class="mission-item" data-aos="fade-up" data-aos-delay="300">
                            <div class="mission-icon">
                                <i class="fas fa-bullseye"></i>
                            </div>
                            <div class="mission-text">
                                <h4 class="text-white">Missiyamız</h4>
                                <p class="text-light">Müştəri yönümlü yanaşma ilə keyfiyyətli, rəqabətli həllər təqdim etmək</p>
                            </div>
                        </div>
                        
                        <div class="mission-item" data-aos="fade-up" data-aos-delay="400">
                            <div class="mission-icon">
                                <i class="fas fa-eye"></i>
                            </div>
                            <div class="mission-text">
                                <h4 class="text-white">Strategji Məqsədlər</h4>
                                <p class="text-light">Məhsul çeşidi, xidmət keyfiyyəti, rəqamsal həllər və beynəlxalq nüfuz</p>
                            </div>
                        </div>
                        
                        <div class="mission-item" data-aos="fade-up" data-aos-delay="500">
                            <div class="mission-icon">
                                <i class="fas fa-rocket"></i>
                            </div>
                            <div class="mission-text">
                                <h4 class="text-white">Gələcək Planlarımız</h4>
                                <p class="text-light">Yeni sahələr, investor əməkdaşlığı, rəqamsal yeniliklər</p>
                            </div>
                        </div>
                        
                        <div class="mission-actions" data-aos="fade-up" data-aos-delay="600">
                            <button class="btn-primary-custom" data-bs-toggle="modal" data-bs-target="#applicationModal">
                                Bizimlə Əməkdaşlıq Edin
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section section-padding bg-primary text-white">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="stat-box">
                        <div class="stat-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3 class="animate-number" data-count="3500">0</h3>
                        <p>Məmnun Müştəri</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="stat-box">
                        <div class="stat-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <h3 class="animate-number" data-count="6800">0</h3>
                        <p>Yerinə Yetirilən Sifariş</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="stat-box">
                        <div class="stat-icon">
                            <i class="fas fa-globe"></i>
                        </div>
                        <h3 class="animate-number" data-count="25">0</h3>
                        <p>Beynəlxalq Tərəfdaş</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="stat-box">
                        <div class="stat-icon">
                            <i class="fas fa-award"></i>
                        </div>
                        <h3 class="animate-number" data-count="12">0</h3>
                        <p>Sənaye Mükafatı</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact CTA Section -->
    <section class="section-padding text-white" id="contact-cta" style="background-color: var(--section-bg);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center" data-aos="fade-up">
                    <div class="cta-content" style="background: rgba(255, 107, 53, 0.1); border: 1px solid rgba(255, 107, 53, 0.2); border-radius: 8px; padding: 4rem 2rem;">
                        <h2 class="section-title text-white">Şərfəli Lizinq İmkanları üçün Müraciət Edin!</h2>
                        <p class="section-subtitle text-light">
                            Lizinq ehtiyaclarınız üçün bizimlə əlaqə saxlayın. 
                            Mütəxəssis komandamız sizə ən uyğun maliyyələşmə seçənəyini təklif etməyə hazırdır.
                        </p>
                        
                        <div class="cta-actions">
                            <button class="btn-primary-custom me-3" data-bs-toggle="modal" data-bs-target="#applicationModal">
                                <i class="fas fa-file-alt me-2"></i>Müraciət Edin
                            </button>
                            <a href="tel:+994123456789" class="btn-outline-custom">
                                <i class="fas fa-phone me-2"></i>Dərhal Zəng Edin
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Partners Section -->
    <section class="section-padding" id="partners" style="background: #f8f9fa;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="section-title" data-aos="fade-up">Əməkdaşlıq və <span class="text-primary">Etibarlarımız</span></h2>
                    <p class="section-subtitle" data-aos="fade-up" data-aos-delay="200">
                        Beynəlxalq tərəfdaşlarımızla birlikdə keyfiyyətli xidmət təqdim edirik
                    </p>
                </div>
            </div>
            
            <div class="row align-items-center justify-content-center" data-aos="fade-up" data-aos-delay="400">
                <div class="col-lg-2 col-md-3 col-4 mb-4">
                    <div class="partner-logo">
                        <div class="partner-placeholder">
                            <i class="fas fa-building"></i>
                            <span>Partner 1</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-4 mb-4">
                    <div class="partner-logo">
                        <div class="partner-placeholder">
                            <i class="fas fa-industry"></i>
                            <span>Partner 2</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-4 mb-4">
                    <div class="partner-logo">
                        <div class="partner-placeholder">
                            <i class="fas fa-handshake"></i>
                            <span>Partner 3</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-4 mb-4">
                    <div class="partner-logo">
                        <div class="partner-placeholder">
                            <i class="fas fa-globe"></i>
                            <span>Partner 4</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-4 mb-4">
                    <div class="partner-logo">
                        <div class="partner-placeholder">
                            <i class="fas fa-city"></i>
                            <span>Partner 5</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-4 mb-4">
                    <div class="partner-logo">
                        <div class="partner-placeholder">
                            <i class="fas fa-landmark"></i>
                            <span>Partner 6</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
<style>
    /* Category Cards */
    .category-card {
        background: var(--card-bg);
        border-radius: 8px;
        padding: 2rem;
        height: 100%;
        transition: all 0.3s ease;
        border: 1px solid var(--border-color);
        position: relative;
        overflow: hidden;
    }
    
    .category-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(255, 107, 53, 0.2);
    }
    
    .category-icon {
        width: 80px;
        height: 80px;
        background: var(--primary-color);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 2rem;
        margin-bottom: 1.5rem;
    }
    
    .category-features {
        list-style: none;
        padding: 0;
        margin: 1rem 0 0 0;
    }
    
    .category-features li {
        color: var(--text-light);
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
    }
    
    /* Advantages Section */
    .advantage-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 2rem;
    }
    
    .advantage-icon {
        width: 60px;
        height: 60px;
        background: var(--primary-color);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        margin-right: 1.5rem;
        flex-shrink: 0;
        font-size: 1.5rem;
    }
    
    .advantage-content h4 {
        font-weight: 600;
        margin-bottom: 0.5rem;
    }
    
    .advantage-content p {
        margin: 0;
    }
    
    /* Mission Section */
    .mission-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 2rem;
    }
    
    .mission-icon {
        width: 50px;
        height: 50px;
        background: var(--primary-color);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        margin-right: 1rem;
        flex-shrink: 0;
    }
    
    .mission-text h4 {
        font-weight: 600;
        margin-bottom: 0.5rem;
    }
    
    .mission-text p {
        margin: 0;
    }
    
    /* Partners Section */
    .partner-logo {
        background: #fff;
        border-radius: 8px;
        padding: 1rem;
        text-align: center;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        height: 100px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .partner-logo:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }
    
    .partner-logo img {
        max-height: 60px;
        max-width: 100%;
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
        font-size: 0.9rem;
        font-weight: 600;
        opacity: 0.8;
    }
    
    .partner-logo:hover .partner-placeholder i {
        opacity: 1;
        transform: scale(1.1);
    }
    
    .partner-logo:hover .partner-placeholder {
        color: #333;
    }
    
    .about-image {
        position: relative;
    }
    
    .experience-badge {
        position: absolute;
        top: 20px;
        right: 20px;
        background: var(--primary-color);
        width: 100px;
        height: 100px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        box-shadow: 0 10px 30px rgba(255, 107, 53, 0.3);
    }
    
    .badge-content {
        text-align: center;
    }
    
    .badge-number {
        display: block;
        font-size: 1.5rem;
        font-weight: 700;
    }
    
    .badge-text {
        font-size: 0.8rem;
        line-height: 1.2;
    }
    
    /* Services Section */
    .service-features {
        list-style: none;
        padding: 0;
        margin: 1.5rem 0;
    }
    
    .service-features li {
        display: flex;
        align-items: center;
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
        color: var(--text-light);
    }
    
    .service-features li i {
        color: var(--primary-color);
        margin-right: 0.5rem;
        font-size: 0.8rem;
    }
    
    .service-link {
        color: var(--primary-color);
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .service-link:hover {
        color: var(--secondary-color);
        transform: translateX(5px);
    }
    
    /* Why Choose Us */
    .why-choose-image {
        position: relative;
    }
    
    .play-button {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 80px;
        height: 80px;
        background: rgba(255, 107, 53, 0.9);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 1.5rem;
        cursor: pointer;
        transition: all 0.3s ease;
        animation: pulse 2s infinite;
    }
    
    .play-button:hover {
        background: var(--primary-color);
        transform: translate(-50%, -50%) scale(1.1);
    }
    
    @keyframes pulse {
        0% {
            box-shadow: 0 0 0 0 rgba(255, 107, 53, 0.7);
        }
        70% {
            box-shadow: 0 0 0 20px rgba(255, 107, 53, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(255, 107, 53, 0);
        }
    }
    
    .progress-item {
        margin-bottom: 2rem;
    }
    
    .progress-header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 0.5rem;
        font-weight: 600;
        color: var(--secondary-color);
    }
    
    .progress {
        height: 8px;
        background: #e9ecef;
        border-radius: 4px;
        overflow: hidden;
    }
    
    .progress-bar {
        height: 100%;
        background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
        transition: width 2s ease-in-out;
    }
    
    /* Stats Section */
    .stats-section {
        background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
        position: relative;
        overflow: hidden;
    }
    
    .stats-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="2" fill="white" opacity="0.1"/><circle cx="80" cy="40" r="1.5" fill="white" opacity="0.1"/><circle cx="40" cy="80" r="1" fill="white" opacity="0.1"/></svg>');
        background-size: 100px 100px;
    }
    
    .stat-box {
        position: relative;
        z-index: 1;
    }
    
    .stat-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
        opacity: 0.9;
    }
    
    .stat-box h3 {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
    }
    
    .stat-box p {
        font-size: 1.1rem;
        opacity: 0.9;
    }
    
    /* CTA Section */
    .cta-content {
        background: linear-gradient(135deg, rgba(44, 62, 80, 0.05), rgba(255, 107, 53, 0.05));
        border-radius: 20px;
        padding: 4rem 3rem;
        border: 1px solid rgba(255, 107, 53, 0.1);
    }
    
    .cta-actions {
        margin-top: 2rem;
    }
    
    /* Responsive Design */
    @media (max-width: 768px) {
        .about-content {
            padding-right: 0;
            margin-bottom: 3rem;
        }
        
        .feature-item {
            margin-bottom: 1.5rem;
        }
        
        .experience-badge {
            width: 80px;
            height: 80px;
            top: 10px;
            right: 10px;
        }
        
        .badge-number {
            font-size: 1.2rem;
        }
        
        .badge-text {
            font-size: 0.7rem;
        }
        
        .cta-content {
            padding: 2rem 1.5rem;
        }
        
        .btn-primary-custom,
        .btn-outline-custom {
            display: block;
            margin: 0.5rem auto;
            width: 200px;
        }
    }
</style>
@endpush
