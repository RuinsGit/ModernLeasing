

<?php $__env->startSection('title', 'İnvestorlar - MODERN LİZİNQ'); ?>
<?php $__env->startSection('description', 'Modern Lizinq investorları və tərəfdaş imkanları. Şirkətimizlə əməkdaşlıq edən partner şirkətləri və investor seçimləri.'); ?>
<?php $__env->startSection('keywords', 'investor, tərəfdaş, əməkdaşlıq, partnerlik, investisiya imkanları, modern lizinq'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Page Header -->
    <section class="page-header" style="background: linear-gradient(135deg, #1F1F1F 0%, #2289FF 100%); padding: 150px 0 100px;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="page-title text-white" data-aos="fade-up">İnvestorlar</h1>
                    <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item">
                                <a href="<?php echo e(route('front.index')); ?>" class="text-light">Ana Səhifə</a>
                            </li>
                            <li class="breadcrumb-item active text-white" aria-current="page">İnvestorlar</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Partnership Opportunities -->
    <section class="section-padding bg-dark text-white" style="background-color: var(--section-bg);">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <?php if(isset($partnershipSection) && $partnershipSection->title): ?>
                        <h2 class="section-title text-white" data-aos="fade-up"><?php echo e($partnershipSection->title); ?></h2>
                    <?php else: ?>
                        <h2 class="section-title text-white" data-aos="fade-up">Tərəfdaşlıq <span class="text-primary">İmkanları</span></h2>
                    <?php endif; ?>
                    <?php if(isset($partnershipSection) && $partnershipSection->subtitle): ?>
                        <p class="section-subtitle text-light" data-aos="fade-up" data-aos-delay="200">
                            <?php echo e($partnershipSection->subtitle); ?>

                        </p>
                    <?php else: ?>
                        <p class="section-subtitle text-light" data-aos="fade-up" data-aos-delay="200">
                            Modern Lizinq olaraq güclü maliyyə strukturu və inkişaf strategiyamızla 
                            yeni investorları və tərəfdaşları dəvət edirik
                        </p>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="row g-4 align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="partnership-content">
                        <h3 class="text-white mb-4">Niyə Bizimlə Əməkdaşlıq Etməlisiniz?</h3>
                        <p class="text-light mb-4">
                            Azərbaycanda lizinq sahəsinin dinamik inkişafı və böyümə potensialından yararlanaraq, 
                            strategji tərəfdaşlarımızla birlikdə güclü investisiya imkanları yaradırıq.
                        </p>
                        
                        <div class="partnership-features">
                            <?php if(isset($partnershipFeatures) && $partnershipFeatures->count() > 0): ?>
                                <?php $__currentLoopData = $partnershipFeatures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="feature-item" data-id="<?php echo e($feature->id); ?>" data-image="<?php echo e($feature->image_url); ?>"
                                         data-stat1-number="<?php echo e($feature->stat_number_1); ?>" data-stat1-text="<?php echo e($feature->stat_text_1); ?>"
                                         data-stat2-number="<?php echo e($feature->stat_number_2); ?>" data-stat2-text="<?php echo e($feature->stat_text_2); ?>">
                                        <div class="feature-icon">
                                            <i class="<?php echo e($feature->icon_class); ?>"></i>
                                        </div>
                                        <div class="feature-content">
                                            <h5 class="text-white"><?php echo e($feature->title); ?></h5>
                                            <p class="text-light"><?php echo e($feature->description); ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <div class="feature-item">
                                    <div class="feature-icon">
                                        <i class="fas fa-chart-line"></i>
                                    </div>
                                    <div class="feature-content">
                                        <h5 class="text-white">Sabit Gəlir Artımı</h5>
                                        <p class="text-light">İllik ortalama 25% gəlir artımı və dayanıqlı maliyyə göstəriciləri</p>
                                    </div>
                                </div>
                                
                                <div class="feature-item">
                                    <div class="feature-icon">
                                        <i class="fas fa-handshake"></i>
                                    </div>
                                    <div class="feature-content">
                                        <h5 class="text-white">Güclü Tərəfdaşlıq</h5>
                                        <p class="text-light">25+ beynəlxalq tərəfdaş və geniş distributor şəbəkəsi</p>
                                    </div>
                                </div>
                                
                                <div class="feature-item">
                                    <div class="feature-icon">
                                        <i class="fas fa-shield-alt"></i>
                                    </div>
                                    <div class="feature-content">
                                        <h5 class="text-white">Risk İdarəetməsi</h5>
                                        <p class="text-light">Peşəkar risk analizi və tam sığorta təminatı</p>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="partnership-image">
                        <img id="dynamic-partnership-image" src="<?php echo e((isset($partnershipFeatures) && $partnershipFeatures->first() && $partnershipFeatures->first()->image_url) ? $partnershipFeatures->first()->image_url : 'https://images.unsplash.com/photo-1560472354-b33ff0c44a43?ixlib=rb-4.0.3&auto=format&fit=crop&w=1226&q=80'); ?>" 
                             alt="Tərəfdaşlıq" class="img-fluid" style="border-radius: 8px; object-fit: cover; width: 100%; height: 400px;">
                        
                        <!-- Stats Overlay -->
                        <div class="stats-overlay">
                            <div class="stat-item">
                                <div id="dynamic-stat1-number" class="stat-number"><?php echo e((isset($partnershipFeatures) && $partnershipFeatures->first() && $partnershipFeatures->first()->stat_number_1) ? $partnershipFeatures->first()->stat_number_1 : '3500+'); ?></div>
                                <div id="dynamic-stat1-label" class="stat-label"><?php echo e((isset($partnershipFeatures) && $partnershipFeatures->first() && $partnershipFeatures->first()->stat_text_1) ? $partnershipFeatures->first()->stat_text_1 : 'Məmnun Müştəri'); ?></div>
                            </div>
                            <div class="stat-item">
                                <div id="dynamic-stat2-number" class="stat-number"><?php echo e((isset($partnershipFeatures) && $partnershipFeatures->first() && $partnershipFeatures->first()->stat_number_2) ? $partnershipFeatures->first()->stat_number_2 : '25'); ?></div>
                                <div id="dynamic-stat2-label" class="stat-label"><?php echo e((isset($partnershipFeatures) && $partnershipFeatures->first() && $partnershipFeatures->first()->stat_text_2) ? $partnershipFeatures->first()->stat_text_2 : 'Beynəlxalq Tərəfdaş'); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Partnership Types -->
    <section class="section-padding text-white" style="background-color: var(--section-bg);">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title text-white" data-aos="fade-up">Tərəfdaşlıq <span class="text-primary">Növləri</span></h2>
                    <p class="section-subtitle text-light" data-aos="fade-up" data-aos-delay="200">
                        Müxtəlif tərəfdaşlıq modelləri və əməkdaşlıq imkanları
                    </p>
                </div>
            </div>
            
            <div class="row g-4">
                <?php if(isset($partnershipTypes) && $partnershipTypes->count() > 0): ?>
                    <?php $__currentLoopData = $partnershipTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?php echo e(300 + ($loop->index * 100)); ?>">
                            <div class="partnership-card">
                                <div class="card-icon">
                                    <i class="<?php echo e($type->icon_class); ?>"></i>
                                </div>
                                <h4 class="text-white"><?php echo e($type->title); ?></h4>
                                <p class="text-light"><?php echo e($type->description); ?></p>
                                <?php if(is_array($type->benefits) && count($type->benefits) > 0): ?>
                                    <ul class="partnership-benefits">
                                        <?php $__currentLoopData = $type->benefits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $benefit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($benefit); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="partnership-card">
                            <div class="card-icon">
                                <i class="fas fa-building"></i>
                            </div>
                            <h4 class="text-white">Korporativ Tərəfdaş</h4>
                            <p class="text-light">Böyük korporasiyalar üçün strateji əməkdaşlıq və joint venture imkanları</p>
                            <ul class="partnership-benefits">
                                <li>Birgə lizinq məhsulları</li>
                                <li>Çarpaz satış imkanları</li>
                                <li>Regional genişlənmə</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="partnership-card">
                            <div class="card-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <h4 class="text-white">Distributor Şəbəkəsi</h4>
                            <p class="text-light">Satış distributorarları və diler şəbəkəsi üçün əməkdaşlıq proqramları</p>
                            <ul class="partnership-benefits">
                                <li>Eksklüziv bölgə hüquqları</li>
                                <li>Marketing dəstəyi</li>
                                <li>Texniki təlim proqramları</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="partnership-card">
                            <div class="card-icon">
                                <i class="fas fa-globe"></i>
                            </div>
                            <h4 class="text-white">Beynəlxalq Tərəfdaş</h4>
                            <p class="text-light">Xarici investorlar və beynəlxalq maliyyə təşkilatları ilə əməkdaşlıq</p>
                            <ul class="partnership-benefits">
                                <li>Texnologiya transferi</li>
                                <li>Kapital investisiyası</li>
                                <li>Know-how paylaşımı</li>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Current Partners -->
    <section class="section-padding" style="background: #F0F2F4;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title text-dark" data-aos="fade-up">Hal-hazırda <span class="text-primary">Tərəfdaşlarımız</span></h2>
                    <p class="section-subtitle text-muted" data-aos="fade-up" data-aos-delay="200">
                        Güvənilir tərəfdaşlarımızla birlikdə keyfiyyətli xidmət təqdim edirik
                    </p>
                </div>
            </div>
            
            <div class="row align-items-center justify-content-center" data-aos="fade-up" data-aos-delay="400">
                <?php if(isset($partners) && $partners->count() > 0): ?>
                    <?php $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-2 col-md-3 col-4 mb-4" data-aos="fade-up" data-aos-delay="<?php echo e(300 + ($index * 100)); ?>">
                            <div class="partner-logo">
                                <?php if($partner->logo_url): ?>
                                    <img src="<?php echo e($partner->logo_url); ?>" alt="<?php echo e($partner->name); ?>" class="img-fluid">
                                <?php else: ?>
                                    <div class="partner-placeholder">
                                        <i class="fas fa-handshake"></i> 
                                        <span><?php echo e($partner->name); ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <div class="col-lg-2 col-md-3 col-4 mb-4">
                        <div class="partner-logo">
                            <div class="partner-placeholder">
                                <i class="fas fa-building"></i>
                                <span>Bank Partner</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-4 mb-4">
                        <div class="partner-logo">
                            <div class="partner-placeholder">
                                <i class="fas fa-industry"></i>
                                <span>Tech Partner</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-4 mb-4">
                        <div class="partner-logo">
                            <div class="partner-placeholder">
                                <i class="fas fa-handshake"></i>
                                <span>Finance Partner</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-4 mb-4">
                        <div class="partner-logo">
                            <div class="partner-placeholder">
                                <i class="fas fa-globe"></i>
                                <span>Global Partner</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-4 mb-4">
                        <div class="partner-logo">
                            <div class="partner-placeholder">
                                <i class="fas fa-car"></i>
                                <span>Auto Partner</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-4 mb-4">
                        <div class="partner-logo">
                            <div class="partner-placeholder">
                                <i class="fas fa-home"></i>
                                <span>Real Estate</span>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Contact CTA -->
    <section class="section-padding text-white" id="investor-contact" style="background-color: var(--section-bg);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center" data-aos="fade-up">
                    <div class="cta-content">
                        <?php if(isset($investorContactSection) && $investorContactSection->title): ?>
                            <h2 class="section-title text-white mb-4"><?php echo e($investorContactSection->title); ?></h2>
                        <?php else: ?>
                            <h2 class="section-title text-white mb-4">Bizimlə Tərəfdaşlığa Hazırsınız?</h2>
                        <?php endif; ?>
                        
                        <?php if(isset($investorContactSection) && $investorContactSection->subtitle): ?>
                            <p class="section-subtitle text-light mb-4">
                                <?php echo e($investorContactSection->subtitle); ?>

                            </p>
                        <?php else: ?>
                            <p class="section-subtitle text-light mb-4">
                                Lizinq sahəsində böyümə imkanlarından faydalanmaq və uğurlu tərəfdaşlıq qurmaq üçün 
                                bizimlə əlaqə saxlayın. Mütəxəssis komandamız sizə ən uyğun əməkdaşlıq modelini təklif edəcək.
                            </p>
                        <?php endif; ?>
                        
                        <div class="cta-actions">
                            <?php if(isset($investorContactSection) && $investorContactSection->button1_text && $investorContactSection->button1_link): ?>
                                <a href="<?php echo e($investorContactSection->button1_link); ?>" class="btn-primary-custom me-3">
                                    <i class="fas fa-envelope me-2"></i><?php echo e($investorContactSection->button1_text); ?>

                                </a>
                            <?php else: ?>
                                <a href="<?php echo e(route('front.contact')); ?>" class="btn-primary-custom me-3">
                                    <i class="fas fa-envelope me-2"></i>Əlaqə Saxlayın
                                </a>
                            <?php endif; ?>
                            
                            <?php if(isset($investorContactSection) && $investorContactSection->button2_text && $investorContactSection->button2_link): ?>
                                <a href="<?php echo e($investorContactSection->button2_link); ?>" class="btn-outline-custom">
                                    <i class="fas fa-phone me-2"></i><?php echo e($investorContactSection->button2_text); ?>

                                </a>
                            <?php else: ?>
                                <a href="tel:+994123456789" class="btn-outline-custom">
                                    <i class="fas fa-phone me-2"></i>+994 12 345 67 89
                                </a>
                            <?php endif; ?>
                        </div>
                        
                        <div class="contact-info mt-4">
                            <?php if(isset($investorContactSection) && $investorContactSection->email): ?>
                                <p class="text-light">
                                    <i class="fas fa-envelope text-primary me-2"></i>
                                    <?php echo e($investorContactSection->email); ?>

                                </p>
                            <?php else: ?>
                                <p class="text-light">
                                    <i class="fas fa-envelope text-primary me-2"></i>
                                    investor@modernlizinq.az
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
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
    
    .partnership-content {
        padding-right: 2rem;
    }
    
    .feature-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 2rem;
        padding: 1rem;
        border-radius: 8px;
        transition: background-color 0.3s ease, border-color 0.3s ease;
        cursor: pointer;
        border: 1px solid transparent;
    }

    .feature-item.active {
        background-color: rgba(34, 137, 255, 0.1);
        border-color: var(--primary-color);
    }

    .feature-item:hover {
        background-color: rgba(34, 137, 255, 0.05);
        border-color: rgba(34, 137, 255, 0.5);
    }
    
    .feature-icon {
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
    
    .feature-content h5 {
        margin: 0 0 0.5rem 0;
        font-size: 1.2rem;
        font-weight: 600;
    }
    
    .feature-content p {
        margin: 0;
        font-size: 0.95rem;
        line-height: 1.6;
    }
    
    .partnership-image {
        position: relative;
        border-radius: 8px;
        overflow: hidden;
    }
    
    .stats-overlay {
        position: absolute;
        top: 20px;
        right: 20px;
        background: rgba(0, 0, 0, 0.8);
        backdrop-filter: blur(10px);
        padding: 1.5rem;
        border-radius: 8px;
        min-width: 180px;
    }
    
    .stat-item {
        text-align: center;
        margin-bottom: 1rem;
    }
    
    .stat-item:last-child {
        margin-bottom: 0;
    }
    
    .stat-number {
        font-size: 1.8rem;
        font-weight: 800;
        color: var(--primary-color);
        display: block;
    }
    
    .stat-label {
        font-size: 0.8rem;
        color: #fff;
        margin-top: 0.25rem;
    }
    
    .partnership-card {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        padding: 2rem;
        text-align: center;
        height: 100%;
        transition: all 0.3s ease;
    }
    
    .partnership-card:hover {
        transform: translateY(-5px);
        border-color: var(--primary-color);
        background: rgba(255, 255, 255, 0.08);
    }
    
    .card-icon {
        width: 80px;
        height: 80px;
        background: var(--primary-color);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 2rem;
        margin: 0 auto 1.5rem;
    }
    
    .partnership-card h4 {
        margin-bottom: 1rem;
        font-size: 1.3rem;
        font-weight: 600;
    }
    
    .partnership-benefits {
        list-style: none;
        padding: 0;
        margin: 1.5rem 0 0 0;
        text-align: left;
    }
    
    .partnership-benefits li {
        color: rgba(255, 255, 255, 0.8);
        margin-bottom: 0.75rem;
        font-size: 0.9rem;
        position: relative;
        padding-left: 1.5rem;
    }
    
    .partnership-benefits li::before {
        content: '✓';
        position: absolute;
        left: 0;
        color: var(--primary-color);
        font-weight: bold;
    }
    
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
    
    .partner-placeholder {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100%;
        transition: all 0.3s ease;
    }
    
    .partner-placeholder i {
        font-size: 2rem;
        margin-bottom: 0.5rem;
        transition: all 0.3s ease;
    }
    
    .partner-placeholder span {
        font-size: 0.85rem;
        font-weight: 600;
        color: #666;
    }
    
    .partner-logo:hover .partner-placeholder i {
        transform: scale(1.1);
    }
    
    .cta-content {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        padding: 3rem 2rem;
    }
    
    .contact-info {
        padding-top: 1.5rem;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .btn-outline-custom {
        border: 2px solid var(--primary-color);
        color: var(--primary-color);
        padding: 12px 30px;
        border-radius: 10px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        transition: all 0.3s ease;
        background: transparent;
    }
    
    .btn-outline-custom:hover {
        background: var(--primary-color);
        color: white;
        transform: translateY(-2px);
    }
    
    @media (max-width: 768px) {
        .page-title {
            font-size: 2rem;
        }
        
        .partnership-content {
            padding-right: 0;
            margin-bottom: 2rem;
        }
        
        .feature-item {
            flex-direction: column;
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .feature-icon {
            margin-right: 0;
            margin-bottom: 1rem;
        }
        
        .stats-overlay {
            position: relative;
            top: auto;
            right: auto;
            margin-top: 1rem;
            width: 100%;
            display: flex;
            justify-content: space-around;
        }
        
        .stat-item {
            margin-bottom: 0;
        }
        
        .partnership-benefits {
            text-align: center;
        }
        
        .cta-content {
            padding: 2rem 1rem;
        }
        
        .btn-primary-custom,
        .btn-outline-custom {
            display: block;
            margin: 0.5rem auto;
            width: 250px;
            justify-content: center;
        }
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const featureItems = document.querySelectorAll('.partnership-features .feature-item');
        const dynamicImage = document.getElementById('dynamic-partnership-image');
        const dynamicStat1Number = document.getElementById('dynamic-stat1-number');
        const dynamicStat1Label = document.getElementById('dynamic-stat1-label');
        const dynamicStat2Number = document.getElementById('dynamic-stat2-number');
        const dynamicStat2Label = document.getElementById('dynamic-stat2-label');

        // İlk elementi aktiv et
        if (featureItems.length > 0) {
            featureItems[0].classList.add('active');
        }

        featureItems.forEach(item => {
            item.addEventListener('click', function() {
                // Bütün aktiv sinifləri sil
                featureItems.forEach(fi => fi.classList.remove('active'));

                // Cari elementə aktiv sinfi əlavə et
                this.classList.add('active');

                // Məlumatları götür
                const imageUrl = this.dataset.image;
                const stat1Number = this.dataset.stat1Number;
                const stat1Text = this.dataset.stat1Text;
                const stat2Number = this.dataset.stat2Number;
                const stat2Text = this.dataset.stat2Text;

                // Şəkli yenilə
                if (dynamicImage) {
                    dynamicImage.src = imageUrl;
                }

                // Statistikaları yenilə
                if (dynamicStat1Number) {
                    dynamicStat1Number.textContent = stat1Number;
                }
                if (dynamicStat1Label) {
                    dynamicStat1Label.textContent = stat1Text;
                }
                if (dynamicStat2Number) {
                    dynamicStat2Number.textContent = stat2Number;
                }
                if (dynamicStat2Label) {
                    dynamicStat2Label.textContent = stat2Text;
                }
            });
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ModernLeasing\resources\views/front/pages/investors.blade.php ENDPATH**/ ?>