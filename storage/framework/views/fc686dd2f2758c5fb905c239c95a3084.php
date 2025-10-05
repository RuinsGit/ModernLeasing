<!-- Footer -->
<footer class="footer">
    <div class="container">
        <!-- Main Footer Content -->
        <div class="row">
            <!-- Company Info -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="footer-section">
                    <div class="footer-logo mb-4">
                        <?php if(isset($siteLogo) && $siteLogo->logo_image): ?>
                            <img src="<?php echo e($siteLogo->logo_url); ?>" alt="<?php echo e($siteLogo->site_name); ?>" height="45" class="mb-3">
                        <?php endif; ?>
                        <?php if(isset($siteLogo) && $siteLogo->site_name): ?>
                            <h4 class="text-white"><?php echo e($siteLogo->site_name); ?></h4>
                        <?php else: ?>
                            <h4 class="text-white">MODERN LİZİNQ</h4>
                        <?php endif; ?>
                    </div>
                    <p class="footer-description">
                        <?php if(isset($siteLogo) && $siteLogo->site_description): ?>
                            <?php echo e($siteLogo->site_description); ?>

                        <?php else: ?>
                            15 il təcrübəmizla Azərbaycanın aparıcı lizinq şirkəti olaraq 
                            fərdi və korporativ müştərilərimizə ən uyğun maliyyələşdirmə həllərini təqdim edirik.
                        <?php endif; ?>
                    </p>
                    
                    <!-- Social Media -->
                    <div class="social-media">
                        <h6 class="social-title">Bizi İzləyin</h6>
                        <div class="social-links">
                            <?php if(isset($socialfooters) && count($socialfooters) > 0): ?>
                                <?php $__currentLoopData = $socialfooters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($social->is_active): ?>
                                        <a href="<?php echo e($social->link); ?>" target="_blank" class="social-link">
                                            <?php echo $social->display_icon; ?>

                                        </a>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <!-- Default social media links -->
                                <a href="#" class="social-link">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="social-link">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="social-link">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#" class="social-link">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="#" class="social-link">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Quick Links -->
            <div class="col-lg-2 col-md-6 mb-4">
                <div class="footer-section">
                    <h5>Sürətli Keçidlər</h5>
                    <ul class="footer-links">
                        <?php if(isset($desktopNavbarItems) && $desktopNavbarItems->count() > 0): ?>
                            <?php $__currentLoopData = $desktopNavbarItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!$item->parent_id && $item->is_active && $item->show_desktop): ?>
                                    <li><a href="<?php echo e($item->link); ?>"><?php echo e($item->title); ?></a></li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <li><a href="<?php echo e(route('front.index')); ?>">Ana Səhifə</a></li>
                            <li><a href="<?php echo e(route('front.about')); ?>">Haqqımızda</a></li>
                            <li><a href="#services">Xidmətlər</a></li>
                            <li><a href="#investors">İnvestorlar</a></li>
                            <li><a href="<?php echo e(route('front.contact')); ?>">Əlaqə</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            
            <!-- Services -->
            <div class="col-lg-2 col-md-6 mb-4">
                <div class="footer-section">
                    <h5>Xidmətlər</h5>
                    <ul class="footer-links">
                        <?php if(isset($services) && $services->count() > 0): ?>
                            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($service->is_active): ?>
                                    <li><a href="<?php echo e(route('front.services')); ?>#<?php echo e(Str::slug($service->title)); ?>"><?php echo e($service->title); ?></a></li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <li><a href="#agricultural">Kənd Təsərrüfatı</a></li>
                            <li><a href="#automotive">Avtomobillər</a></li>
                            <li><a href="#household">Məişət Texnikası</a></li>
                            <li><a href="#realestate">Daşınmaz Əmlak</a></li>
                            <li><a href="#industrial">Sənaye Avadanlıqları</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            
            <!-- Contact Info -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="footer-section">
                    <h5>Əlaqə Məlumatları</h5>
                    
                    <?php if(isset($contactInfo) && $contactInfo->is_active): ?>
                        <!-- Address -->
                        <?php if($contactInfo->address): ?>
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-content">
                                <p><?php echo e($contactInfo->address); ?></p>
                            </div>
                        </div>
                        <?php endif; ?>
                        
                        <!-- Phone -->
                        <?php if($contactInfo->phone1 || $contactInfo->phone2): ?>
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="contact-content">
                                <p>
                                    <?php if($contactInfo->phone1): ?><a href="tel:<?php echo e($contactInfo->phone1); ?>"><?php echo e($contactInfo->phone1); ?></a><br><?php endif; ?>
                                    <?php if($contactInfo->phone2): ?><a href="tel:<?php echo e($contactInfo->phone2); ?>"><?php echo e($contactInfo->phone2); ?></a><?php endif; ?>
                                </p>
                            </div>
                        </div>
                        <?php endif; ?>
                        
                        <!-- Email -->
                        <?php if($contactInfo->email1 || $contactInfo->email2): ?>
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-content">
                                <p>
                                    <?php if($contactInfo->email1): ?><a href="mailto:<?php echo e($contactInfo->email1); ?>"><?php echo e($contactInfo->email1); ?></a><br><?php endif; ?>
                                    <?php if($contactInfo->email2): ?><a href="mailto:<?php echo e($contactInfo->email2); ?>"><?php echo e($contactInfo->email2); ?></a><?php endif; ?>
                                </p>
                            </div>
                        </div>
                        <?php endif; ?>
                        
                        <!-- Working Hours -->
                        <?php if($contactInfo->working_hours_weekdays || $contactInfo->working_hours_weekends): ?>
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="contact-content">
                                <p>
                                    <?php if($contactInfo->working_hours_weekdays): ?><?php echo e($contactInfo->working_hours_weekdays); ?><br><?php endif; ?>
                                    <?php if($contactInfo->working_hours_weekends): ?><?php echo e($contactInfo->working_hours_weekends); ?><?php endif; ?>
                                </p>
                            </div>
                        </div>
                        <?php endif; ?>
                    <?php else: ?>
                        <!-- Default static contact info -->
                        <!-- Address -->
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-content">
                                <p>28 May küç. 123<br>Bakı, Azərbaycan AZ1000</p>
                            </div>
                        </div>
                        
                        <!-- Phone -->
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="contact-content">
                                <p>
                                    <a href="tel:+994123456789">+994 12 345 67 89</a><br>
                                    <a href="tel:+994503456789">+994 50 345 67 89</a>
                                </p>
                            </div>
                        </div>
                        
                        <!-- Email -->
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-content">
                                <p>
                                    <a href="mailto:info@modernlizinq.az">info@modernlizinq.az</a><br>
                                    <a href="mailto:support@modernlizinq.az">support@modernlizinq.az</a>
                                </p>
                            </div>
                        </div>
                        
                        <!-- Working Hours -->
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="contact-content">
                                <p>
                                    Bazar ertəsi - Cümə: 09:00 - 18:00<br>
                                    Şənbə: 09:00 - 14:00<br>
                                    Bazar: Bağlı
                                </p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="copyright">
                        <p>&copy; <span id="currentYear"></span> MODERN LİZİNQ. Bütün hüquqlar qorunur.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="footer-bottom-links">
                        <a href="#privacy">Məxfilik Siyasəti</a>
                        <a href="#terms">İstifadə Şərtləri</a>
                        <a href="#cookies">Kukilər Siyasəti</a>
                        <a href="#sitemap">Sayt Xəritəsi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</footer>

<style>
    .footer {
        background: var(--dark-color);
        color: #fff;
        padding-top: 60px;
        padding-bottom: 0;
        position: relative;
        overflow: hidden;
    }
    
    .footer::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(34, 137, 255, 0.05), rgba(44, 62, 80, 0.1));
        z-index: 1;
    }
    
    .footer .container {
        position: relative;
        z-index: 2;
    }
    
    .footer-section h5 {
        color: var(--primary-color);
        margin-bottom: 1.5rem;
        font-weight: 600;
        font-size: 1.2rem;
    }
    
    .footer-section h4 {
        color: #fff;
        font-weight: 700;
    }
    
    .footer-description {
        color: #ccc;
        line-height: 1.7;
        margin-bottom: 2rem;
    }
    
    .footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .footer-links li {
        margin-bottom: 0.7rem;
    }
    
    .footer-links li a {
        color: #ccc;
        text-decoration: none;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
    }
    
    .footer-links li a:hover {
        color: var(--primary-color);
        transform: translateX(5px);
    }
    
    .footer-links li a::before {
        content: '→';
        margin-right: 0.5rem;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .footer-links li a:hover::before {
        opacity: 1;
    }
    
    /* Social Media */
    .social-title {
        color: var(--primary-color);
        font-size: 1rem;
        margin-bottom: 1rem;
        font-weight: 600;
    }
    
    .social-links {
        display: flex;
        gap: 0.7rem;
        flex-wrap: wrap;
    }
    
    .social-link {
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(34, 137, 255, 0.1);
        color: var(--primary-color);
        text-decoration: none;
        border-radius: 50%;
        transition: all 0.3s ease;
        border: 1px solid rgba(34, 137, 255, 0.2);
    }
    
    .social-link:hover {
        background: var(--primary-color);
        color: #fff;
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(34, 137, 255, 0.4);
    }
    
    .social-link img {
        width: 20px;
        height: 20px;
        object-fit: contain;
        filter: brightness(0) invert(1);
        transition: filter 0.3s ease;
    }
    
    .social-link:hover img {
        filter: none;
    }
    
    /* Contact Items */
    .contact-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 1.5rem;
    }
    
    .contact-icon {
        width: 45px;
        height: 45px;
        background: linear-gradient(135deg, var(--primary-color), #007bff);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        flex-shrink: 0;
        color: #fff;
    }
    
    .contact-content {
        flex: 1;
    }
    
    .contact-content p {
        margin: 0;
        color: #ccc;
        line-height: 1.6;
    }
    
    .contact-content a {
        color: #ccc;
        text-decoration: none;
        transition: color 0.3s ease;
    }
    
    .contact-content a:hover {
        color: var(--primary-color);
    }
    
    /* Footer Bottom */
    .footer-bottom {
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        padding: 1.5rem 0;
        margin-top: 2rem;
    }
    
    .copyright p {
        margin: 0;
        color: #ccc;
        font-size: 0.9rem;
    }
    
    .footer-bottom-links {
        text-align: right;
    }
    
    .footer-bottom-links a {
        color: #ccc;
        text-decoration: none;
        margin-left: 1.5rem;
        font-size: 0.9rem;
        transition: color 0.3s ease;
    }
    
    .footer-bottom-links a:hover {
        color: var(--primary-color);
    }
    
    /* Responsive Design */
    @media (max-width: 768px) {
        .footer {
            padding-top: 40px;
        }
        
        .footer-section {
            margin-bottom: 2rem;
        }
        
        .footer-bottom {
            text-align: center;
        }
        
        .footer-bottom-links {
            text-align: center;
            margin-top: 1rem;
        }
        
        .footer-bottom-links a {
            margin: 0 0.75rem;
            display: inline-block;
            margin-bottom: 0.5rem;
        }
        
        .contact-item {
            margin-bottom: 1rem;
        }
        
        .contact-icon {
            width: 40px;
            height: 40px;
        }
        
        .social-link {
            width: 40px;
            height: 40px;
        }
    }
</style>

<script>
    // Set current year
    document.getElementById('currentYear').textContent = new Date().getFullYear();
</script>
<?php /**PATH C:\xampp\htdocs\ModernLeasing\resources\views/front/includes/footer.blade.php ENDPATH**/ ?>