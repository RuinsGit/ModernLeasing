@extends('front.layouts.master')

@section('title', 'Tez-Tez Verilən Suallar - MODERN LİZİNQ')
@section('description', 'Modern Lizinq haqqında tez-tez verilən suallar və cavablar. Lizinq prosesi, ödəniş şərtləri, sənədlər və digər vacib məlumatlar.')
@section('keywords', 'FAQ, tez-tez verilən suallar, lizinq prosesi, ödəniş şərtləri, sənədlər, modern lizinq')

@section('content')
    <!-- Page Header -->
    <section class="page-header" style="background: linear-gradient(135deg, #1F1F1F 0%, #2289FF 100%); padding: 150px 0 100px;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="page-title text-white" data-aos="fade-up">Tez-Tez Verilən Suallar</h1>
                    <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item">
                                <a href="{{ route('front.index') }}" class="text-light">Ana Səhifə</a>
                            </li>
                            <li class="breadcrumb-item active text-white" aria-current="page">FAQ</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Introduction -->
    <section class="section-padding bg-dark text-white" style="background-color: var(--section-bg);">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="section-title text-white" data-aos="fade-up">Sizin <span class="text-primary">Suallarınız</span></h2>
                    <p class="section-subtitle text-light" data-aos="fade-up" data-aos-delay="200">
                        Lizinq xidmətlərimiz haqqında ən çox verilən suallar və ətraflı cavablar
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="section-padding text-white" style="background-color: var(--section-bg);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    
                    <!-- FAQ Categories -->
                    <div class="faq-categories mb-5" data-aos="fade-up">
                        <div class="row g-3">
                            <div class="col-md-3">
                                <button class="btn category-btn active" data-category="general">
                                    <i class="fas fa-question-circle me-2"></i>Ümumi Suallar
                                </button>
                            </div>
                            <div class="col-md-3">
                                <button class="btn category-btn" data-category="process">
                                    <i class="fas fa-cogs me-2"></i>Proses
                                </button>
                            </div>
                            <div class="col-md-3">
                                <button class="btn category-btn" data-category="documents">
                                    <i class="fas fa-file-alt me-2"></i>Sənədlər
                                </button>
                            </div>
                            <div class="col-md-3">
                                <button class="btn category-btn" data-category="payment">
                                    <i class="fas fa-credit-card me-2"></i>Ödəniş
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- FAQ Items -->
                    <div class="faq-container" data-aos="fade-up" data-aos-delay="300">
                        
                        <!-- General Questions -->
                        <div class="faq-category active" id="general">
                            <div class="faq-item">
                                <div class="faq-question" data-bs-toggle="collapse" data-bs-target="#faq1" aria-expanded="false">
                                    <h5>Lizinq prosesi necə işləyir?</h5>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                                <div class="collapse faq-answer" id="faq1">
                                    <div class="faq-answer-content">
                                        <p>Lizinq prosesi aşağıdakı addımlardan ibarətdir:</p>
                                        <ol class="text-light">
                                            <li><strong>Müraciət:</strong> Online və ya ofisimizə gələrək müraciət edin</li>
                                            <li><strong>Sənəd təqdimi:</strong> Lazım olan sənədləri təqdim edin</li>
                                            <li><strong>Qiymətləndirmə:</strong> 24-48 saat ərzində müraciətiniz qiymətləndirilir</li>
                                            <li><strong>Təsdiq:</strong> Lizinq müqaviləsi təsdiqlənir</li>
                                            <li><strong>İmzalama:</strong> Müqavilə imzalanır və ilkin ödəniş edilir</li>
                                            <li><strong>Təhvil:</strong> Məhsul/xidmət sizə təhvil verilir</li>
                                        </ol>
                                        <p class="text-primary">Bütün proses orta hesabla 3-5 iş günü çəkir.</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="faq-item">
                                <div class="faq-question" data-bs-toggle="collapse" data-bs-target="#faq2" aria-expanded="false">
                                    <h5>Modern Lizinq-in üstünlükləri nələrdir?</h5>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                                <div class="collapse faq-answer" id="faq2">
                                    <div class="faq-answer-content">
                                        <ul class="text-light">
                                            <li><i class="fas fa-check text-primary me-2"></i>Ən aşağı faiz dərəcələri (12%-dən başlayır)</li>
                                            <li><i class="fas fa-check text-primary me-2"></i>Sürətli qərar vermə (24 saat)</li>
                                            <li><i class="fas fa-check text-primary me-2"></i>Çevik ödəniş planları</li>
                                            <li><i class="fas fa-check text-primary me-2"></i>Tam sığorta dəstəyi</li>
                                            <li><i class="fas fa-check text-primary me-2"></i>24/7 müştəri dəstəyi</li>
                                            <li><i class="fas fa-check text-primary me-2"></i>15 il bazarda təcrübə</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="faq-item">
                                <div class="faq-question" data-bs-toggle="collapse" data-bs-target="#faq3" aria-expanded="false">
                                    <h5>Hansı məhsulları lizinq etmək olar?</h5>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                                <div class="collapse faq-answer" id="faq3">
                                    <div class="faq-answer-content">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h6 class="text-primary">Texnika və Avadanlıq:</h6>
                                                <ul class="text-light">
                                                    <li>Kənd təsərrüfatı texnikası</li>
                                                    <li>Sənaye avadanlıqları</li>
                                                    <li>Tikinti texnikası</li>
                                                    <li>Məişət texnikası</li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="text-primary">Nəqliyyat və Əmlak:</h6>
                                                <ul class="text-light">
                                                    <li>Şəxsi avtomobillər</li>
                                                    <li>Kommersiya nəqliyyatı</li>
                                                    <li>Daşınmaz əmlak</li>
                                                    <li>Ofis avadanlıqları</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Process Questions -->
                        <div class="faq-category" id="process">
                            <div class="faq-item">
                                <div class="faq-question" data-bs-toggle="collapse" data-bs-target="#faq4" aria-expanded="false">
                                    <h5>Müraciət etməyin ən sürətli yolu hansıdır?</h5>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                                <div class="collapse faq-answer" id="faq4">
                                    <div class="faq-answer-content">
                                        <p>Müraciət etməyin 3 əsas yolu var:</p>
                                        <div class="method-card">
                                            <div class="method-icon">
                                                <i class="fas fa-laptop"></i>
                                            </div>
                                            <div class="method-content">
                                                <h6 class="text-primary">Online Müraciət</h6>
                                                <p class="text-light">Saytımızdakı müraciət formu ilə 5 dəqiqə ərzində</p>
                                            </div>
                                        </div>
                                        <div class="method-card">
                                            <div class="method-icon">
                                                <i class="fas fa-phone"></i>
                                            </div>
                                            <div class="method-content">
                                                <h6 class="text-primary">Telefon</h6>
                                                <p class="text-light">+994 12 345 67 89 nömrəsinə zəng edin</p>
                                            </div>
                                        </div>
                                        <div class="method-card">
                                            <div class="method-icon">
                                                <i class="fas fa-building"></i>
                                            </div>
                                            <div class="method-content">
                                                <h6 class="text-primary">Ofis Ziyarəti</h6>
                                                <p class="text-light">28 May küç. 123, Bakı ünvanına gəlin</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="faq-item">
                                <div class="faq-question" data-bs-toggle="collapse" data-bs-target="#faq5" aria-expanded="false">
                                    <h5>Qərar vermə müddəti nə qədərdir?</h5>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                                <div class="collapse faq-answer" id="faq5">
                                    <div class="faq-answer-content">
                                        <div class="timeline-faq">
                                            <div class="timeline-item-faq">
                                                <div class="timeline-time">1 saat</div>
                                                <div class="timeline-desc">İlkin cavab və sənəd tələbi</div>
                                            </div>
                                            <div class="timeline-item-faq">
                                                <div class="timeline-time">24 saat</div>
                                                <div class="timeline-desc">Sənədlərin yoxlanması və qiymətləndirmə</div>
                                            </div>
                                            <div class="timeline-item-faq">
                                                <div class="timeline-time">48 saat</div>
                                                <div class="timeline-desc">Yekun qərar və müqavilə təqdimi</div>
                                            </div>
                                        </div>
                                        <p class="text-primary mt-3">VIP müştərilər üçün bu müddət 12 saata qədər azaldılır.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Documents Questions -->
                        <div class="faq-category" id="documents">
                            <div class="faq-item">
                                <div class="faq-question" data-bs-toggle="collapse" data-bs-target="#faq6" aria-expanded="false">
                                    <h5>Sənədlər hansılardır?</h5>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                                <div class="collapse faq-answer" id="faq6">
                                    <div class="faq-answer-content">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h6 class="text-primary">Fərdi Müştərilər üçün:</h6>
                                                <ul class="document-list">
                                                    <li><i class="fas fa-id-card text-primary me-2"></i>Şəxsiyyət vəsiqəsi</li>
                                                    <li><i class="fas fa-file-invoice text-primary me-2"></i>Gəlir arayışı</li>
                                                    <li><i class="fas fa-home text-primary me-2"></i>Yaşayış yeri haqqında məlumat</li>
                                                    <li><i class="fas fa-phone text-primary me-2"></i>Əlaqə məlumatları</li>
                                                    <li><i class="fas fa-users text-primary me-2"></i>Zamin məlumatları</li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="text-primary">Korporativ Müştərilər üçün:</h6>
                                                <ul class="document-list">
                                                    <li><i class="fas fa-building text-primary me-2"></i>Dövlət qeydiyyatı sənədi</li>
                                                    <li><i class="fas fa-chart-bar text-primary me-2"></i>Maliyyə hesabatları</li>
                                                    <li><i class="fas fa-stamp text-primary me-2"></i>Vergi şəhadətnaməsi</li>
                                                    <li><i class="fas fa-user-tie text-primary me-2"></i>Rəhbər məlumatları</li>
                                                    <li><i class="fas fa-handshake text-primary me-2"></i>Bank arayışları</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="alert alert-info mt-3">
                                            <i class="fas fa-info-circle me-2"></i>
                                            Bütün sənədlər elektron formatda da qəbul edilir.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="faq-item">
                                <div class="faq-question" data-bs-toggle="collapse" data-bs-target="#faq7" aria-expanded="false">
                                    <h5>Avtomobil / əmlak sənədləşməsi necə aparılır?</h5>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                                <div class="collapse faq-answer" id="faq7">
                                    <div class="faq-answer-content">
                                        <div class="process-steps">
                                            <div class="step-item">
                                                <div class="step-number">1</div>
                                                <div class="step-content">
                                                    <h6 class="text-primary">Seçim və Qiymətləndirmə</h6>
                                                    <p class="text-light">İstədiyiniz avtomobil/əmlakı seçin və ekspert qiymətləndirməsi aparılır</p>
                                                </div>
                                            </div>
                                            <div class="step-item">
                                                <div class="step-number">2</div>
                                                <div class="step-content">
                                                    <h6 class="text-primary">Hüquqi Yoxlama</h6>
                                                    <p class="text-light">Avtomobil/əmlakın hüquqi vəziyyəti yoxlanılır</p>
                                                </div>
                                            </div>
                                            <div class="step-item">
                                                <div class="step-number">3</div>
                                                <div class="step-content">
                                                    <h6 class="text-primary">Sığorta və Rəsmiyyət</h6>
                                                    <p class="text-light">Sığorta siyasəti və lazımi rəsmi sənədlər hazırlanır</p>
                                                </div>
                                            </div>
                                            <div class="step-item">
                                                <div class="step-number">4</div>
                                                <div class="step-content">
                                                    <h6 class="text-primary">Qeydiyyat və Təhvil</h6>
                                                    <p class="text-light">Rəsmi qeydiyyat aparılır və məhsul təhvil verilir</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="alert alert-success mt-3">
                                            <i class="fas fa-shield-alt me-2"></i>
                                            Bütün hüquqi proseslər bizim tərəfimizdən idarə olunur.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Payment Questions -->
                        <div class="faq-category" id="payment">
                            <div class="faq-item">
                                <div class="faq-question" data-bs-toggle="collapse" data-bs-target="#faq8" aria-expanded="false">
                                    <h5>İlkin ödəniş minimum nə qədərdir?</h5>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                                <div class="collapse faq-answer" id="faq8">
                                    <div class="faq-answer-content">
                                        <div class="payment-table">
                                            <div class="table-responsive">
                                                <table class="table table-dark table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Məhsul Kateqoriyası</th>
                                                            <th>Minimum İlkin Ödəniş</th>
                                                            <th>Maksimum Müddət</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><i class="fas fa-car text-primary me-2"></i>Avtomobil</td>
                                                            <td>15%</td>
                                                            <td>60 ay</td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fas fa-home text-primary me-2"></i>Məişət Texnikası</td>
                                                            <td>10%</td>
                                                            <td>36 ay</td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fas fa-tractor text-primary me-2"></i>Kənd Təsərrüfatı</td>
                                                            <td>10%</td>
                                                            <td>24 ay</td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fas fa-building text-primary me-2"></i>Daşınmaz Əmlak</td>
                                                            <td>20%</td>
                                                            <td>240 ay</td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fas fa-industry text-primary me-2"></i>Sənaye Avadanlığı</td>
                                                            <td>25%</td>
                                                            <td>84 ay</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="alert alert-warning mt-3">
                                            <i class="fas fa-calculator me-2"></i>
                                            Faiz dərəcələri məhsul növünə və müddətə görə 12%-25% arasında dəyişir.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="faq-item">
                                <div class="faq-question" data-bs-toggle="collapse" data-bs-target="#faq9" aria-expanded="false">
                                    <h5>Ödəniş metodları hansılardır?</h5>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                                <div class="collapse faq-answer" id="faq9">
                                    <div class="faq-answer-content">
                                        <div class="row g-3">
                                            <div class="col-md-4">
                                                <div class="payment-method">
                                                    <i class="fas fa-university text-primary"></i>
                                                    <h6>Bank Köçürməsi</h6>
                                                    <p>Bütün bankların kartları</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="payment-method">
                                                    <i class="fas fa-credit-card text-primary"></i>
                                                    <h6>Kart Ödənişi</h6>
                                                    <p>Visa, MasterCard</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="payment-method">
                                                    <i class="fas fa-money-bill-wave text-primary"></i>
                                                    <h6>Nəğd Ödəniş</h6>
                                                    <p>Ofisimizdə birbaşa</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="payment-method">
                                                    <i class="fas fa-mobile-alt text-primary"></i>
                                                    <h6>Mobil Ödəniş</h6>
                                                    <p>BirBank, KapitalBank</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="payment-method">
                                                    <i class="fas fa-calendar-check text-primary"></i>
                                                    <h6>Avtomatik Ödəniş</h6>
                                                    <p>Aylıq avtomatik çıxım</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="payment-method">
                                                    <i class="fas fa-store text-primary"></i>
                                                    <h6>Ödəniş Terminalı</h6>
                                                    <p>Şəhərdəki terminallar</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            
            <!-- Contact CTA -->
            <div class="row mt-5">
                <div class="col-12 text-center">
                    <div class="faq-cta">
                        <h4 class="text-white mb-3">Cavabınızı tapmadınız?</h4>
                        <p class="text-light mb-4">Bizim mütəxəssis komanda üzvləri sizə kömək etməyə hazırlar</p>
                        <div class="cta-actions">
                            <a href="{{ route('front.contact') }}" class="btn btn-primary-custom me-3">
                                <i class="fas fa-envelope me-2"></i>Bizimlə Əlaqə Saxlayın
                            </a>
                            <a href="tel:+994123456789" class="btn btn-outline">
                                <i class="fas fa-phone me-2"></i>+994 12 345 67 89
                            </a>
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
    
    .category-btn {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: rgba(255, 255, 255, 0.8);
        border-radius: 8px;
        padding: 12px 20px;
        width: 100%;
        transition: all 0.3s ease;
        font-weight: 500;
    }
    
    .category-btn:hover,
    .category-btn.active {
        background: var(--primary-color);
        border-color: var(--primary-color);
        color: white;
        transform: translateY(-2px);
    }
    
    .faq-category {
        display: none;
    }
    
    .faq-category.active {
        display: block;
    }
    
    .faq-item {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        margin-bottom: 1rem;
        overflow: hidden;
        transition: all 0.3s ease;
    }
    
    .faq-item:hover {
        border-color: var(--primary-color);
    }
    
    .faq-question {
        padding: 1.5rem;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: all 0.3s ease;
    }
    
    .faq-question:hover {
        background: rgba(255, 107, 53, 0.1);
    }
    
    .faq-question h5 {
        margin: 0;
        color: white;
        font-size: 1.1rem;
        font-weight: 600;
    }
    
    .faq-question i {
        color: var(--primary-color);
        transition: transform 0.3s ease;
        font-size: 1.2rem;
    }
    
    .faq-question[aria-expanded="true"] i {
        transform: rotate(180deg);
    }
    
    .faq-answer {
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .faq-answer-content {
        padding: 1.5rem;
    }
    
    .method-card {
        display: flex;
        align-items: center;
        background: rgba(255, 255, 255, 0.03);
        padding: 1rem;
        border-radius: 8px;
        margin-bottom: 1rem;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .method-icon {
        width: 50px;
        height: 50px;
        background: var(--primary-color);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        margin-right: 1rem;
        flex-shrink: 0;
    }
    
    .method-content h6 {
        margin: 0 0 0.5rem 0;
    }
    
    .method-content p {
        margin: 0;
        font-size: 0.9rem;
    }
    
    .timeline-faq {
        position: relative;
        padding: 1rem 0;
    }
    
    .timeline-item-faq {
        display: flex;
        align-items: center;
        margin-bottom: 1.5rem;
        position: relative;
    }
    
    .timeline-item-faq:not(:last-child)::after {
        content: '';
        position: absolute;
        left: 60px;
        top: 30px;
        width: 2px;
        height: 30px;
        background: var(--primary-color);
    }
    
    .timeline-time {
        background: var(--primary-color);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-weight: 600;
        min-width: 100px;
        text-align: center;
        margin-right: 1.5rem;
    }
    
    .timeline-desc {
        color: rgba(255, 255, 255, 0.9);
    }
    
    .document-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .document-list li {
        display: flex;
        align-items: center;
        margin-bottom: 0.75rem;
        color: rgba(255, 255, 255, 0.9);
        font-size: 0.95rem;
    }
    
    .process-steps {
        position: relative;
    }
    
    .step-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 2rem;
        position: relative;
    }
    
    .step-item:not(:last-child)::after {
        content: '';
        position: absolute;
        left: 20px;
        top: 45px;
        width: 2px;
        height: 50px;
        background: var(--primary-color);
    }
    
    .step-number {
        width: 40px;
        height: 40px;
        background: var(--primary-color);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        margin-right: 1.5rem;
        flex-shrink: 0;
    }
    
    .step-content h6 {
        margin: 0 0 0.5rem 0;
    }
    
    .step-content p {
        margin: 0;
        font-size: 0.9rem;
    }
    
    .payment-table {
        background: rgba(255, 255, 255, 0.05);
        border-radius: 8px;
        padding: 1rem;
    }
    
    .table-dark {
        --bs-table-bg: transparent;
        --bs-table-striped-bg: rgba(255, 255, 255, 0.05);
    }
    
    .payment-method {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        padding: 1.5rem;
        text-align: center;
        height: 100%;
        transition: all 0.3s ease;
    }
    
    .payment-method:hover {
        transform: translateY(-5px);
        border-color: var(--primary-color);
    }
    
    .payment-method i {
        font-size: 2rem;
        margin-bottom: 1rem;
        display: block;
    }
    
    .payment-method h6 {
        color: white;
        margin-bottom: 0.5rem;
    }
    
    .payment-method p {
        margin: 0;
        color: rgba(255, 255, 255, 0.8);
        font-size: 0.9rem;
    }
    
    .faq-cta {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        padding: 3rem 2rem;
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
    
    .alert {
        border-radius: 8px;
        border: none;
    }
    
    .alert-info {
        background: rgba(13, 202, 240, 0.1);
        color: #0dcaf0;
        border-left: 4px solid #0dcaf0;
    }
    
    .alert-success {
        background: rgba(25, 135, 84, 0.1);
        color: #198754;
        border-left: 4px solid #198754;
    }
    
    .alert-warning {
        background: rgba(255, 193, 7, 0.1);
        color: #ffc107;
        border-left: 4px solid #ffc107;
    }
    
    @media (max-width: 768px) {
        .page-title {
            font-size: 2rem;
        }
        
        .category-btn {
            margin-bottom: 0.5rem;
        }
        
        .faq-question {
            padding: 1rem;
        }
        
        .faq-answer-content {
            padding: 1rem;
        }
        
        .method-card {
            flex-direction: column;
            text-align: center;
        }
        
        .method-icon {
            margin-right: 0;
            margin-bottom: 1rem;
        }
        
        .timeline-item-faq {
            flex-direction: column;
            text-align: center;
        }
        
        .timeline-time {
            margin-right: 0;
            margin-bottom: 1rem;
        }
        
        .step-item {
            flex-direction: column;
            text-align: center;
        }
        
        .step-number {
            margin-right: 0;
            margin-bottom: 1rem;
        }
        
        .step-item::after {
            display: none;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // FAQ Category Switching
        const categoryBtns = document.querySelectorAll('.category-btn');
        const faqCategories = document.querySelectorAll('.faq-category');
        
        categoryBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                // Remove active class from all buttons and categories
                categoryBtns.forEach(b => b.classList.remove('active'));
                faqCategories.forEach(cat => cat.classList.remove('active'));
                
                // Add active class to clicked button
                this.classList.add('active');
                
                // Show corresponding category
                const category = this.dataset.category;
                document.getElementById(category).classList.add('active');
                
                // Close all open FAQs
                document.querySelectorAll('.faq-answer.show').forEach(answer => {
                    answer.classList.remove('show');
                });
            });
        });
        
        // FAQ Accordion Enhancement
        document.querySelectorAll('.faq-question').forEach(question => {
            question.addEventListener('click', function() {
                const target = this.getAttribute('data-bs-target');
                const targetElement = document.querySelector(target);
                
                // Close other FAQs in the same category
                const currentCategory = this.closest('.faq-category');
                currentCategory.querySelectorAll('.faq-answer.show').forEach(answer => {
                    if (answer !== targetElement) {
                        answer.classList.remove('show');
                        document.querySelector(`[data-bs-target="#${answer.id}"]`).setAttribute('aria-expanded', 'false');
                    }
                });
            });
        });
    });
</script>
@endpush
