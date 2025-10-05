@extends('front.layouts.master')

@section('title', 'Xidmətlər - MODERN LİZİNQ')
@section('description', 'Modern Lizinq xidmətləri: kənd təsərrüfatı texnikası, avtomobil, məişət texnikası, daşınmaz əmlak, sənaye avadanlıqları və tikinti texnikası lizinqi.')
@section('keywords', 'lizinq xidmətləri, kənd təsərrüfatı lizinqi, avtomobil lizinqi, məişət texnikası, sənaye avadanlıqları')

@section('content')
    <!-- Page Header -->
    <section class="page-header" style="background: linear-gradient(135deg, #1F1F1F 0%, #2289FF 100%); padding: 150px 0 100px;">
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
                <div class="col-lg-12">
                    <div class="row g-4">
                        @if(isset($services) && $services->count() > 0)
                            @foreach($services as $index => $service)
                                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ 100 * ($index + 1) }}">
                                    <div class="service-card">
                                        <div class="card-icon">
                                            <i class="{{ $service->icon_class }}"></i>
                                        </div>
                                        <h4 class="card-title-service text-white">{{ $service->title }}</h4>
                                        <p class="card-description text-light">{{ $service->description }}</p>
                                        
                                        @if($service->features_list && count($service->features_list) > 0)
                                            <ul class="card-features">
                                                @foreach($service->features_list as $feature)
                                                    <li><i class="fas fa-check-circle text-primary me-2"></i>{{ $feature }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                        
                                        <div class="card-image-wrapper">
                                            @if($service->image)
                                                <img src="{{ $service->image_url }}"
                                                     alt="{{ $service->title }}" class="img-fluid card-image">
                                            @else
                                                <img src="https://images.unsplash.com/photo-1560472354-b33ff0c44a43?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80"
                                                     alt="{{ $service->title }}" class="img-fluid card-image">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <!-- Default static services if no data -->
                            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                                <div class="service-card">
                                    <div class="card-icon">
                                        <i class="fas fa-tractor"></i>
                                    </div>
                                    <h4 class="card-title-service text-white">Kənd Təsərrüfatı Texnikası</h4>
                                    <p class="card-description text-light">Traktor, kombayn və digər kənd təsərrüfatı avadanlıqlarının lizinqi</p>
                                    <ul class="card-features">
                                        <li><i class="fas fa-check-circle text-primary me-2"></i>Traktor və kombaynlar</li>
                                        <li><i class="fas fa-check-circle text-primary me-2"></i>Əkin-biçin avadanlıqları</li>
                                        <li><i class="fas fa-check-circle text-primary me-2"></i>Suvarma sistemləri</li>
                                    </ul>
                                    <div class="card-image-wrapper">
                                        <img src="https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80"
                                             alt="Kənd Təsərrüfatı Texnikası" class="img-fluid card-image">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                                <div class="service-card">
                                    <div class="card-icon">
                                        <i class="fas fa-car"></i>
                                    </div>
                                    <h4 class="card-title-service text-white">Avtomobillər</h4>
                                    <p class="card-description text-light">Şəxsi və kommersiya avtomobillərin əlverişli lizinq imkanları</p>
                                    <ul class="card-features">
                                        <li><i class="fas fa-check-circle text-primary me-2"></i>Şəxsi avtomobillər</li>
                                        <li><i class="fas fa-check-circle text-primary me-2"></i>Kommersiya nəqliyyatı</li>
                                        <li><i class="fas fa-check-circle text-primary me-2"></i>Lüks sinif avtomobillər</li>
                                    </ul>
                                    <div class="card-image-wrapper">
                                        <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80"
                                             alt="Avtomobillər" class="img-fluid card-image">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                                <div class="service-card">
                                    <div class="card-icon">
                                        <i class="fas fa-home"></i>
                                    </div>
                                    <h4 class="card-title-service text-white">Məişət Texnikası</h4>
                                    <p class="card-description text-light">Ev və mətbəx texnikalarının lizinq xidmətləri</p>
                                    <ul class="card-features">
                                        <li><i class="fas fa-check-circle text-primary me-2"></i>Mətbəx texnikası</li>
                                        <li><i class="fas fa-check-circle text-primary me-2"></i>Ev elektronikası</li>
                                        <li><i class="fas fa-check-circle text-primary me-2"></i>Mebel və dekorasiya</li>
                                    </ul>
                                    <div class="card-image-wrapper">
                                        <img src="https://images.unsplash.com/photo-1588856557005-24b5d271927c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80"
                                             alt="Məişət Texnikası" class="img-fluid card-image">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                                <div class="service-card">
                                    <div class="card-icon">
                                        <i class="fas fa-building"></i>
                                    </div>
                                    <h4 class="card-title-service text-white">Daşınmaz Əmlak</h4>
                                    <p class="card-description text-light">Ofis və yaşayış sahələrinin lizinq imkanları</p>
                                    <ul class="card-features">
                                        <li><i class="fas fa-check-circle text-primary me-2"></i>Ofis binaları</li>
                                        <li><i class="fas fa-check-circle text-primary me-2"></i>Mənzil və villalar</li>
                                        <li><i class="fas fa-check-circle text-primary me-2"></i>Ticarət mərkəzləri</li>
                                    </ul>
                                    <div class="card-image-wrapper">
                                        <img src="https://images.unsplash.com/photo-1549517070-5b5b5b5b5b5b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80"
                                             alt="Daşınmaz Əmlak" class="img-fluid card-image">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                                <div class="service-card">
                                    <div class="card-icon">
                                        <i class="fas fa-industry"></i>
                                    </div>
                                    <h4 class="card-title-service text-white">Sənaye Avadanlıqları</h4>
                                    <p class="card-description text-light">Müxtəlif sənaye sahələri üçün avadanlıq lizinqi</p>
                                    <ul class="card-features">
                                        <li><i class="fas fa-check-circle text-primary me-2"></i>İstehsal avadanlıqları</li>
                                        <li><i class="fas fa-check-circle text-primary me-2"></i>Enerji sistemləri</li>
                                        <li><i class="fas fa-check-circle text-primary me-2"></i>Texnoloji həllər</li>
                                    </ul>
                                    <div class="card-image-wrapper">
                                        <img src="https://images.unsplash.com/photo-1522204523234-87295a78f2e2?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80"
                                             alt="Sənaye Avadanlıqları" class="img-fluid card-image">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                                <div class="service-card">
                                    <div class="card-icon">
                                        <i class="fas fa-tools"></i>
                                    </div>
                                    <h4 class="card-title-service text-white">Tikinti Texnikası</h4>
                                    <p class="card-description text-light">Tikinti və yol-inşaat texnikalarının lizinqi</p>
                                    <ul class="card-features">
                                        <li><i class="fas fa-check-circle text-primary me-2"></i>Ekskovator və bulldozerlər</li>
                                        <li><i class="fas fa-check-circle text-primary me-2"></i>Kranlar və liftlər</li>
                                        <li><i class="fas fa-check-circle text-primary me-2"></i>Yükdaşıma vasitələri</li>
                                    </ul>
                                    <div class="card-image-wrapper">
                                        <img src="https://images.unsplash.com/photo-1506478954751-2d7c0f1b2b2b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80"
                                             alt="Tikinti Texnikası" class="img-fluid card-image">
                                    </div>
                                </div>
                            </div>
                        @endif
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
    
    .service-card {
        background: #1e1e1e; /* Tünd arxa plan */
        border: 1px solid rgba(255, 255, 255, 0.1); /* Yüngül haşiyə */
        border-radius: 12px;
        padding: 2.5rem;
        color: #fff;
        height: 100%;
        display: flex;
        flex-direction: column;
        transition: all 0.3s ease-in-out;
        overflow: hidden; /* Şəkil kənarlarından daşmasın */
    }
    
    .service-card:hover {
        transform: translateY(-8px); /* Üzərinə gələndə yuxarı qalxsın */
        border-color: var(--primary-color);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3); /* Kölgə effekti */
    }
    
    .card-icon {
        width: 70px;
        height: 70px;
        background-color: var(--primary-color);
        border-radius: 8px; /* Şəkildəki kimi küncləri bir az yumru */
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.2rem;
        margin-bottom: 1.5rem; /* İkon ilə başlıq arasında boşluq */
        color: white; /* İkon rəngi */
    }
    
    .card-title-service {
        font-size: 1.6rem;
        font-weight: 700;
        margin-bottom: 1rem;
        line-height: 1.3;
    }
    
    .card-description {
        font-size: 0.95rem;
        line-height: 1.6;
        margin-bottom: 1.5rem;
        color: rgba(255, 255, 255, 0.8);
    }
    
    .card-features {
        list-style: none;
        padding: 0;
        margin: 0;
        margin-bottom: 2rem;
    }
    
    .card-features li {
        display: flex;
        align-items: center;
        margin-bottom: 0.75rem;
        font-size: 0.9rem;
        color: rgba(255, 255, 255, 0.9);
    }
    
    .card-features li i {
        color: var(--primary-color);
        margin-right: 10px;
    }
    
    .card-image-wrapper {
        margin-top: auto; /* Şəkli həmişə aşağı itələyin */
        width: calc(100% + 5rem); /* Padding-i də nəzərə alaraq kənardan kənara */
        margin-left: -2.5rem; /* Sol padding-i kompensasiya edin */
        margin-right: -2.5rem; /* Sağ padding-i kompensasiya edin */
        margin-bottom: -2.5rem; /* Alt padding-i kompensasiya edin */
        border-bottom-left-radius: 10px; /* Kartın alt künclərinə uyğunlaşdırın */
        border-bottom-right-radius: 10px; /* Kartın alt künclərinə uyğunlaşdırın */
        overflow: hidden; /* Şəkil kənarlarından daşmasın */
    }
    
    .card-image {
        width: 100%;
        height: 200px; /* Şəkilin sabit hündürlüyü */
        object-fit: cover; /* Şəklin konteynerə sığmasını təmin edin */
        display: block; /* Altda boşluqları aradan qaldırın */
    }
    
    /* Responsive stillər */
    @media (max-width: 991.98px) {
        .service-card {
            padding: 2rem;
        }
        .card-image-wrapper {
            width: calc(100% + 4rem); 
            margin-left: -2rem;
            margin-right: -2rem;
            margin-bottom: -2rem;
        }
        .card-icon {
            width: 60px;
            height: 60px;
            font-size: 1.8rem;
            margin-bottom: 1rem;
        }
        .card-title-service {
            font-size: 1.4rem;
        }
        .card-description,
        .card-features li {
            font-size: 0.875rem;
        }
        .card-image {
            height: 180px;
        }
    }
    
    @media (max-width: 767.98px) {
        .page-title {
            font-size: 2rem;
        }
        .service-card {
            padding: 1.5rem;
        }
        .card-icon {
            width: 50px;
            height: 50px;
            font-size: 1.5rem;
            margin-bottom: 0.75rem;
        }
        .card-title-service {
            font-size: 1.25rem;
        }
        .card-description,
        .card-features li {
            font-size: 0.8rem;
        }
        .card-image-wrapper {
            width: calc(100% + 3rem); 
            margin-left: -1.5rem;
            margin-right: -1.5rem;
            margin-bottom: -1.5rem;
        }
        .card-image {
            height: 150px;
        }
    }
</style>
@endpush
