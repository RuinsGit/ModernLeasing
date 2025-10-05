@extends('front.layouts.master')

@section('title', 'Haqqımızda - MODERN LİZİNQ')
@section('description', 'Modern Lizinq haqqında ətraflı məlumat. Şirkətimizin tarixi, missiyası, strategji məqsədləri və gələcək planları.')
@section('keywords', 'haqqımızda, modern lizinq, şirkət tarixi, missiya, strateji məqsədlər, gələcək planlar')

@section('content')
    <!-- Page Header -->
    <section class="page-header" style="background: linear-gradient(135deg, #1F1F1F 0%, #2289FF 100%); padding: 150px 0 100px;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="page-title text-white" data-aos="fade-up">Haqqımızda</h1>
                    <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item">
                                <a href="{{ route('front.index') }}" class="text-light">Ana Səhifə</a>
                            </li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Haqqımızda</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Company History Section -->
    <section class="section-padding bg-dark text-white" style="background-color: var(--section-bg);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="about-content">
                        @if(isset($siteLogo) && $siteLogo->about_title)
                            <h2 class="section-title text-white">{{ $siteLogo->about_title }} <span class="text-primary">Haqqında</span></h2>
                        @else
                            <h2 class="section-title text-white">Şirkət <span class="text-primary">Haqqında</span></h2>
                        @endif

                        @if(isset($siteLogo) && $siteLogo->about_subtitle)
                            <p class="section-subtitle text-light">
                                {{ $siteLogo->about_subtitle }}
                            </p>
                        @else
                            <p class="section-subtitle text-light">
                                Yaranma tarixi (2023), investorlar və peşəkar komanda ilə lizinq sahəsində güclü addımlar atırıq.
                            </p>
                        @endif
                        
                        <div class="timeline">
                            @if(isset($companyHistoryItems) && $companyHistoryItems->count() > 0)
                                @foreach($companyHistoryItems as $item)
                                    <div class="timeline-item" data-aos="fade-up" data-aos-delay="{{ 300 + ($loop->index * 100) }}">
                                        <div class="timeline-icon">
                                            <i class="{{ $item->icon_class }}"></i>
                                        </div>
                                        <div class="timeline-content">
                                            <h5 class="text-primary">{{ $item->year }}</h5>
                                            <h6 class="text-white">{{ $item->title }}</h6>
                                            <p class="text-light">{{ $item->description }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="timeline-item" data-aos="fade-up" data-aos-delay="300">
                                    <div class="timeline-icon">
                                        <i class="fas fa-calendar-alt"></i>
                                    </div>
                                    <div class="timeline-content">
                                        <h5 class="text-primary">2023</h5>
                                        <h6 class="text-white">Şirkətin Yaradılması</h6>
                                        <p class="text-light">Modern Lizinq şirkəti olaraq fəaliyyətə başladıq və ilk müştərilərimizlə işə başladıq.</p>
                                    </div>
                                </div>
                                
                                <div class="timeline-item" data-aos="fade-up" data-aos-delay="400">
                                    <div class="timeline-icon">
                                        <i class="fas fa-handshake"></i>
                                    </div>
                                    <div class="timeline-content">
                                        <h5 class="text-primary">2024</h5>
                                        <h6 class="text-white">Beynəlxalq Əməkdaşlıq</h6>
                                        <p class="text-light">25+ beynəlxalq tərəfdaşla müqavilələr imzaladıq və xidmət çeşidimizi genişləndirdik.</p>
                                    </div>
                                </div>
                                
                                <div class="timeline-item" data-aos="fade-up" data-aos-delay="500">
                                    <div class="timeline-icon">
                                        <i class="fas fa-rocket"></i>
                                    </div>
                                    <div class="timeline-content">
                                        <h5 class="text-primary">2025</h5>
                                        <h6 class="text-white">Gələcək Planları</h6>
                                        <p class="text-light">Rəqəmsal texnologiyalar və yeni sahələrə genişlənmə planlarımız var.</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="about-image">
                        @if(isset($siteLogo) && $siteLogo->about_image)
                            <img src="{{ $siteLogo->about_image_url }}" 
                                 alt="Şirkət Haqqında" class="img-fluid" style="border-radius: 8px; object-fit: cover; width: 100%; height: 400px;">
                        @else
                            <img src="https://images.unsplash.com/photo-1560472354-b33ff0c44a43?ixlib=rb-4.0.3&auto=format&fit=crop&w=1226&q=80" 
                                 alt="Şirkət Haqqında" class="img-fluid" style="border-radius: 8px; object-fit: cover; width: 100%; height: 400px;">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="section-padding text-white" style="background-color: var(--section-bg);">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    @if(isset($aboutMissionSection) && $aboutMissionSection->title)
                        <h2 class="section-title text-white" data-aos="fade-up">{{ $aboutMissionSection->title }}</h2>
                    @else
                        <h2 class="section-title text-white" data-aos="fade-up">Bizim <span class="text-primary">Missiyamız</span></h2>
                    @endif
                    @if(isset($aboutMissionSection) && $aboutMissionSection->subtitle)
                        <p class="section-subtitle text-light" data-aos="fade-up" data-aos-delay="200">
                            {{ $aboutMissionSection->subtitle }}
                        </p>
                    @else
                        <p class="section-subtitle text-light" data-aos="fade-up" data-aos-delay="200">
                            Müştəri yönümlü yanaşma ilə keyfiyyətli və rəqabətli həllər təqdim etmək
                        </p>
                    @endif
                </div>
            </div>
            
            <div class="row g-4">
                @if(isset($aboutMissionCards) && $aboutMissionCards->count() > 0)
                    @foreach($aboutMissionCards as $card)
                        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="{{ 300 + ($loop->index * 100) }}">
                            <div class="mission-card">
                                <div class="mission-icon">
                                    <i class="{{ $card->icon_class }}"></i>
                                </div>
                                <h4 class="text-white">{{ $card->title }}</h4>
                                <p class="text-light">{{ $card->description }}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="mission-card">
                            <div class="mission-icon">
                                <i class="fas fa-bullseye"></i>
                            </div>
                            <h4 class="text-white">Missiya</h4>
                            <p class="text-light">Müştəri yönümlü yanaşma və keyfiyyətli həllərlə lizinq sahəsində güclü mövqeyə nail olmaq</p>
                        </div>
                    </div>
                    
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="mission-card">
                            <div class="mission-icon">
                                <i class="fas fa-eye"></i>
                            </div>
                            <h4 class="text-white">Vizyon</h4>
                            <p class="text-light">Azərbaycanın aparıcı lizinq şirkəti olaraq beynəlxalq bazarda tanınmaq</p>
                        </div>
                    </div>
                    
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="500">
                        <div class="mission-card">
                            <div class="mission-icon">
                                <i class="fas fa-heart"></i>
                            </div>
                            <h4 class="text-white">Dəyərlərimiz</h4>
                            <p class="text-light">Şəffaflıq, etibarlılıq, yenilikçilik və müştəri məmnuniyyəti</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="section-padding text-white" style="background-color: var(--section-bg);">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="section-title text-white" data-aos="fade-up">Bizim <span class="text-primary">Komandamız</span></h2>
                    <p class="section-subtitle text-light" data-aos="fade-up" data-aos-delay="200">
                        Peşəkar və təcrübəli komanda üzvlərimizlə güclü xidmət təqdim edirik
                    </p>
                </div>
            </div>
            
            <div class="row g-4">
                @if(isset($teamMembers) && $teamMembers->count() > 0)
                    @foreach($teamMembers as $member)
                        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ 300 + ($loop->index * 100) }}">
                            <div class="team-card">
                                <div class="team-image">
                                    @if($member->image_url)
                                        <img src="{{ $member->image_url }}" 
                                             alt="{{ $member->name }}" class="img-fluid" style="border-radius: 8px; object-fit: cover; width: 120px; height: 120px;">
                                    @else
                                        <img src="https://via.placeholder.com/120" 
                                             alt="{{ $member->name }}" class="img-fluid" style="border-radius: 8px; object-fit: cover; width: 120px; height: 120px;">
                                    @endif
                                </div>
                                <div class="team-info">
                                    <h5 class="text-white">{{ $member->name }}</h5>
                                    <p class="text-primary">{{ $member->position }}</p>
                                    <p class="text-light">{{ $member->description }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="team-card">
                            <div class="team-image">
                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                                     alt="Rəhbər" class="img-fluid" style="border-radius: 8px;">
                            </div>
                            <div class="team-info">
                                <h5 class="text-white">Rəhbər</h5>
                                <p class="text-primary">İcraçı Direktor</p>
                                <p class="text-light">15 illik lizinq sahəsində təcrübə</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="team-card">
                            <div class="team-image">
                                <img src="https://images.unsplash.com/photo-1494790108755-2616c95345b4?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                                     alt="Maliyyə Direktoru" class="img-fluid" style="border-radius: 8px;">
                            </div>
                            <div class="team-info">
                                <h5 class="text-white">Maliyyə Direktoru</h5>
                                <p class="text-primary">CFO</p>
                                <p class="text-light">Maliyyə sahəsində 12 il təcrübə</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="team-card">
                            <div class="team-image">
                                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                                     alt="Satış Direktoru" class="img-fluid" style="border-radius: 8px;">
                            </div>
                            <div class="team-info">
                                <h5 class="text-white">Satış Direktoru</h5>
                                <p class="text-primary">Satış Rəhbəri</p>
                                <p class="text-light">10 il müştəri əlaqələri təcrübəsi</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="600">
                        <div class="team-card">
                            <div class="team-image">
                                <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                                     alt="Texnologiya Direktoru" class="img-fluid" style="border-radius: 8px;">
                            </div>
                            <div class="team-info">
                                <h5 class="text-white">Texnologiya Direktoru</h5>
                                <p class="text-primary">CTO</p>
                                <p class="text-light">IT və texnologiya sahəsində 8 il</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section class="section-padding text-white" style="background-color: var(--section-bg);">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="section-title text-white" data-aos="fade-up">Son <span class="text-primary">Xəbərlər</span></h2>
                    <p class="section-subtitle text-light" data-aos="fade-up" data-aos-delay="200">
                        Şirkətimizin ən son yeniliklərindən və nailiyyətlərindən xəbərdar olun
                    </p>
                </div>
            </div>
            
            <div class="row g-4">
                @if(isset($newsItems) && $newsItems->count() > 0)
                    @foreach($newsItems as $item)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ 300 + ($loop->index * 100) }}">
                            <article class="news-card">
                                @if($item->image_url)
                                <div class="news-card-image-wrapper">
                                    <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="news-card-image">
                                </div>
                                @endif
                                <div class="news-date">
                                    <span class="day">{{ $item->news_date->format('d') }}</span>
                                    <span class="month">{{ $item->news_date->translatedFormat('F Y') }}</span>
                                </div>
                                <div class="news-content">
                                    <h5 class="news-title text-white">{{ $item->title }}</h5>
                                    <p class="news-excerpt text-light">
                                        {{ $item->short_description }}
                                    </p>
                                    <a href="javascript:void(0)" class="news-link text-primary" 
                                       onclick="showNewsDetails(event, '{{ $item->title }}', '{{ $item->description }}')">
                                        <i class="fas fa-arrow-right me-2"></i>Ətraflı oxu
                                    </a>
                                </div>
                            </article>
                        </div>
                    @endforeach
                @else
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <article class="news-card">
                            <div class="news-card-image-wrapper">
                                <img src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Xəbər Şəkli" class="news-card-image">
                            </div>
                            <div class="news-date">
                                <span class="day">15</span>
                                <span class="month">Dekabr 2024</span>
                            </div>
                            <div class="news-content">
                                <h5 class="news-title text-white">Yeni Rəqəmsal Platformamız İstifadəyə Verildi</h5>
                                <p class="news-excerpt text-light">
                                    Müştərilərimizin rahatlığı üçün hazırladığımız yeni online lizinq platforması artıq fəaliyyətdədir. Bu platforma ilə siz...
                                </p>
                                <a href="javascript:void(0)" class="news-link text-primary">
                                    <i class="fas fa-arrow-right me-2"></i>Ətraflı oxu
                                </a>
                            </div>
                        </article>
                    </div>
                    
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <article class="news-card">
                            <div class="news-card-image-wrapper">
                                <img src="https://images.unsplash.com/photo-1549923746-c50d60c23a7e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Xəbər Şəkli" class="news-card-image">
                            </div>
                            <div class="news-date">
                                <span class="day">02</span>
                                <span class="month">Dekabr 2024</span>
                            </div>
                            <div class="news-content">
                                <h5 class="news-title text-white">25+ Yeni Tərəfdaşlıq Müqaviləsi İmzalandı</h5>
                                <p class="news-excerpt text-light">
                                    Bu il ərzində beynəlxalq 25-dən çox şirkətlə əməkdaşlıq müqavilələri imzaladıq. Bu tərəfdaşlıqlar bizə daha geniş...
                                </p>
                                <a href="javascript:void(0)" class="news-link text-primary">
                                    <i class="fas fa-arrow-right me-2"></i>Ətraflı oxu
                                </a>
                            </div>
                        </article>
                    </div>
                    
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                        <article class="news-card">
                            <div class="news-card-image-wrapper">
                                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Xəbər Şəkli" class="news-card-image">
                            </div>
                            <div class="news-date">
                                <span class="day">28</span>
                                <span class="month">Noyabr 2024</span>
                            </div>
                            <div class="news-content">
                                <h5 class="news-title text-white">Avtomobl Lizinqi İnkişaf Edir</h5>
                                <p class="news-excerpt text-light">
                                    2024-cü ildə avtomobl lizinqi sahəsində 40% artım qeydə alınıb. Yeni model avtomobillər və sərfəli şərtlərlə...
                                </p>
                                <a href="javascript:void(0)" class="news-link text-primary">
                                    <i class="fas fa-arrow-right me-2"></i>Ətraflı oxu
                                </a>
                            </div>
                        </article>
                    </div>
                @endif
            </div>
            
            <div class="row mt-5">
                <div class="col-12 text-center">
                    <a href="#" class="btn btn-primary" style="background-color: var(--primary-color); border-color: var(--primary-color); border-radius: 10px; padding: 12px 30px;" data-aos="fade-up">
                        <i class="fas fa-newspaper me-2"></i>Bütün Xəbərləri Gör
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    function showNewsDetails(event, title, description) {
        event.preventDefault(); // Default link davranışını dayandırır
        Swal.fire({
            title: title,
            html: '<p style="text-align: left;">' + description + '</p>',
            showCloseButton: true,
            showConfirmButton: false,
            focusConfirm: false,
            customClass: {
                popup: 'swal2-news-popup',
                title: 'swal2-news-title',
                htmlContainer: 'swal2-news-html-container'
            }
        });
    }
</script>
@endpush

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
    
    .timeline {
        position: relative;
        padding-left: 2rem;
    }
    
    .timeline-item {
        position: relative;
        margin-bottom: 2.5rem; /* Hissələr arasındakı boşluğu artırırıq */
    }
    
    .timeline-icon {
        position: absolute;
        left: calc(1.2rem - 24px); /* İkonu xəttin üzərində mərkəzləşdir */
        top: 0;
        width: 48px; /* İkon ölçüsünü artırırıq */
        height: 48px; /* İkon ölçüsünü artırırıq */
        background: var(--primary-color);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.2rem; /* İkonun ölçüsünü tənzimləyirik */
        box-shadow: 0 4px 10px rgba(34, 137, 255, 0.4); /* Kölgə əlavə edirik */
        z-index: 1;
    }
    
    .timeline-content {
        padding-left: 3.5rem; /* Mətni ikondan sonra düzgün boşluqla başlat */
    }

    .timeline-content h5 {
        font-weight: 700; /* İl başlığının font ağırlığını artırırıq */
        margin-bottom: 0.2rem;
    }

    .timeline-content h6 {
        font-weight: 600; /* Məzmun başlığının font ağırlığını artırırıq */
        margin-bottom: 0.5rem;
    }
    
    .section-title {
        word-wrap: break-word; /* Uzun sözlərin daşmasını əngəlləmək üçün */
        font-size: 2.5rem; /* Başlıq ölçüsünü bir qədər kiçildirik */
        font-weight: 700;
        line-height: 1.2;
    }

    .section-subtitle {
        word-wrap: break-word; /* Uzun sözlərin daşmasını əngəlləmək üçün */
    }

    /* Haqqımızda səhifəsi üçün xüsusi stillər */
    .about-content, .about-image {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .about-image img {
        border-radius: 8px;
        object-fit: cover;
        width: 100%;
        height: 400px;
    }
    
    .mission-card, .team-card {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        padding: 2rem;
        text-align: center;
        height: 100%;
        transition: all 0.3s ease;
    }
    
    .mission-card:hover, .team-card:hover {
        transform: translateY(-5px);
        border-color: var(--primary-color);
    }
    
    .mission-icon {
        width: 80px;
        height: 80px;
        background: var(--primary-color);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 2rem;
        margin: 0 auto 1.5rem;
    }
    
    .team-image {
        margin-bottom: 1.5rem;
    }
    
    .team-image img {
        width: 120px;
        height: 120px;
        object-fit: cover;
        margin: 0 auto;
    }
    
    .news-card {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 12px;
        padding: 0;
        height: 100%;
        transition: all 0.3s ease;
        overflow: hidden;
        position: relative;
        display: flex; /* Flexbox əlavə edildi */
        flex-direction: column; /* Şaquli nizamlanma */
    }
    
    .news-card:hover {
        transform: translateY(-5px);
        border-color: var(--primary-color);
        box-shadow: 0 10px 30px rgba(34, 137, 255, 0.2);
    }
    
    .news-card-image-wrapper {
        width: 100%;
        height: 200px; /* Şəkil üçün sabit hündürlük */
        overflow: hidden;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .news-card-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .news-card:hover .news-card-image {
        transform: scale(1.05);
    }
    
    .news-date {
        background: var(--primary-color);
        color: white;
        text-align: center;
        padding: 15px;
        position: relative;
    }
    
    .news-date .day {
        display: block;
        font-size: 2rem;
        font-weight: 800;
        line-height: 1;
    }
    
    .news-date .month {
        display: block;
        font-size: 0.9rem;
        margin-top: 5px;
        opacity: 0.9;
    }
    
    .news-content {
        padding: 1.5rem;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    
    .news-title {
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 1rem;
        line-height: 1.4;
    }
    
    .news-excerpt {
        font-size: 0.9rem;
        line-height: 1.6;
        margin-bottom: 1.5rem;
        flex: 1;
        opacity: 0.8;
    }
    
    .news-link {
        text-decoration: none;
        font-weight: 500;
        font-size: 0.9rem;
        display: inline-flex;
        align-items: center;
        transition: all 0.3s ease;
        margin-top: auto;
    }
    
    .news-link:hover {
        color: var(--primary-color) !important;
        transform: translateX(5px);
    }

    /* SweetAlert üçün xüsusi stillər */
    .swal2-news-popup {
        background-color: #343a40 !important; /* Arxa fon rəngi */
        color: white !important;
    }

    .swal2-news-title {
        color: white !important;
    }

    .swal2-close {
        color: white !important;
    }

    .swal2-html-container {
        color: #cccccc !important;
    }
    
    @media (max-width: 768px) {
        .page-title {
            font-size: 2rem;
        }
        
        .timeline {
            padding-left: 1rem;
        }
        
        .timeline-content {
            padding-left: 1rem;
        }
        
        .section-title {
            font-size: 1.8rem; /* Mobil görünüşdə başlıq ölçüsü */
        }

        .section-subtitle {
            font-size: 0.9rem; /* Mobil görünüşdə alt başlıq ölçüsü */
        }
        
        .news-date .day {
            font-size: 1.5rem;
        }
        
        .news-date .month {
            font-size: 0.8rem;
        }
        
        .news-content {
            padding: 1rem;
        }
        
        .news-title {
            font-size: 1rem;
        }
        
        .news-excerpt {
            font-size: 0.85rem;
        }
    }
</style>
@endpush
