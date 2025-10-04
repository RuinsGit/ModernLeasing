

<?php $__env->startSection('title', 'Əlaqə - MODERN LİZİNQ'); ?>
<?php $__env->startSection('description', 'Modern Lizinq ilə əlaqə saxlayın. Ünvan, telefon, email məlumatları və müraciət formu. Bizim ofisimizdə ziyarət edin və ya online əlaqə quruj.'); ?>
<?php $__env->startSection('keywords', 'əlaqə, telefon, email, ünvan, müraciət formu, iş saatları, modern lizinq'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Page Header -->
    <section class="page-header" style="background: linear-gradient(135deg, #1F1F1F 0%, #2289FF 100%); padding: 150px 0 100px;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="page-title text-white" data-aos="fade-up">Əlaqə</h1>
                    <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item">
                                <a href="<?php echo e(route('front.index')); ?>" class="text-light">Ana Səhifə</a>
                            </li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Əlaqə</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Information -->
    <section class="section-padding bg-dark text-white" style="background-color: var(--section-bg);">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title text-white" data-aos="fade-up">Bizimlə <span class="text-primary">Əlaqə Saxlayın</span></h2>
                    <p class="section-subtitle text-light" data-aos="fade-up" data-aos-delay="200">
                        Əlaqə formu (ad, telefon, email, xidmət seçimi), ünvan, xəritə inteqrasiyası, 
                        telefon, email, WhatsApp düymələri və iş saatları
                    </p>
                </div>
            </div>
            
            <div class="row g-4">
                <!-- Contact Form -->
                <div class="col-lg-8" data-aos="fade-right">
                    <div class="contact-form-container">
                        <h3 class="text-white mb-4">Əlaqə Formu</h3>
                        <form id="contactForm" class="contact-form" action="<?php echo e(route('front.contact.store')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <!-- Ad və Soyad - Tam genişlik -->
                            <div class="mb-4">
                                <label for="contactName" class="form-label">Ad və Soyad</label>
                                <input type="text" class="form-control" id="contactName" name="name"
                                       placeholder="Adınızı və soyadınızı daxil edin" required>
                                <div class="invalid-feedback">Ad və soyad sahəsi mütləqdir.</div>
                            </div>
                            
                            <!-- Telefon və Email - Yan-yana -->
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="contactPhone" class="form-label">Telefon</label>
                                    <input type="tel" class="form-control" id="contactPhone" name="phone"
                                           placeholder="+994 XX XXX XX XX" required>
                                    <div class="invalid-feedback">Telefon nömrəsi düzgün formatda daxil edin.</div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="contactEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="contactEmail" name="email"
                                           placeholder="emailiniz@example.com" required>
                                    <div class="invalid-feedback">Düzgün email ünvanı daxil edin.</div>
                                </div>
                            </div>

                            <!-- Mövzu - Tam genişlik -->
                            <div class="mb-4">
                                <label for="contactSubject" class="form-label">Mövzu</label>
                                <input type="text" class="form-control" id="contactSubject" name="subject"
                                       placeholder="Mesajınızın mövzusu (isteğe bağlı)">
                            </div>
                            
                            <!-- Mesaj - Tam genişlik -->
                            <div class="mb-4">
                                <label for="contactMessage" class="form-label">Mesaj</label>
                                <textarea class="form-control" id="contactMessage" name="message" rows="6" 
                                          placeholder="Mesajınızı və suallarınızı yazın..." required></textarea>
                                <div class="invalid-feedback">Mesaj sahəsi mütləqdir.</div>
                            </div>
                            
                            <!-- Submit Button -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary-custom btn-lg">
                                    <i class="fas fa-paper-plane me-2"></i>Mesaj Göndər
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <!-- Contact Information Sidebar -->
                <div class="col-lg-4" data-aos="fade-left">
                    <div class="contact-info-sidebar">
                        <!-- Office Info -->
                        <div class="contact-info-card">
                            <div class="contact-card-header">
                                <h4 class="text-white">Ofis Məlumatları</h4>
                            </div>
                            <div class="contact-card-body">
                                <div class="contact-item">
                                    <div class="contact-icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div class="contact-content">
                                        <h6 class="text-primary">Ünvan</h6>
                                        <p class="text-light"><?php echo e($contactInfo->address ?? 'Təyin edilməyib'); ?></p>
                                    </div>
                                </div>
                                
                                <div class="contact-item">
                                    <div class="contact-icon">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <div class="contact-content">
                                        <h6 class="text-primary">Telefon</h6>
                                        <p class="text-light">
                                            <?php if($contactInfo->phone1): ?>
                                                <a href="tel:<?php echo e($contactInfo->phone1); ?>" class="text-light"><?php echo e($contactInfo->phone1); ?></a><br>
                                            <?php endif; ?>
                                            <?php if($contactInfo->phone2): ?>
                                                <a href="tel:<?php echo e($contactInfo->phone2); ?>" class="text-light"><?php echo e($contactInfo->phone2); ?></a>
                                            <?php endif; ?>
                                            <?php if(!$contactInfo->phone1 && !$contactInfo->phone2): ?>
                                                Təyin edilməyib
                                            <?php endif; ?>
                                        </p>
                                    </div>
                                </div>
                                
                                <div class="contact-item">
                                    <div class="contact-icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <div class="contact-content">
                                        <h6 class="text-primary">E-poçt</h6>
                                        <p class="text-light">
                                            <?php if($contactInfo->email1): ?>
                                                <a href="mailto:<?php echo e($contactInfo->email1); ?>" class="text-light"><?php echo e($contactInfo->email1); ?></a><br>
                                            <?php endif; ?>
                                            <?php if($contactInfo->email2): ?>
                                                <a href="mailto:<?php echo e($contactInfo->email2); ?>" class="text-light"><?php echo e($contactInfo->email2); ?></a>
                                            <?php endif; ?>
                                            <?php if(!$contactInfo->email1 && !$contactInfo->email2): ?>
                                                Təyin edilməyib
                                            <?php endif; ?>
                                        </p>
                                    </div>
                                </div>
                                
                                <div class="contact-item">
                                    <div class="contact-icon">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <div class="contact-content">
                                        <h6 class="text-primary">İş Saatları</h6>
                                        <p class="text-light">
                                            <?php if(isset($businessHours) && $businessHours->is_active): ?>
                                                <span class="d-block">Həftə İçi: <?php echo e($businessHours->weekday_hours ?? 'Təyin edilməyib'); ?></span>
                                                <span class="d-block">Həftə Sonu: <?php echo e($businessHours->weekend_hours ?? 'Təyin edilməyib'); ?></span>
                                            <?php else: ?>
                                                Təyin edilməyib
                                            <?php endif; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Quick Contact Buttons -->
                        <div class="quick-contact-buttons">
                            <?php if(isset($contactInfo) && $contactInfo->phone1): ?>
                                <a href="tel:<?php echo e($contactInfo->phone1); ?>" class="quick-contact-btn phone-btn">
                                    <i class="fas fa-phone"></i>
                                    <span>Zəng Et</span>
                                </a>
                            <?php endif; ?>
                            <?php if(isset($contactInfo) && $contactInfo->email1): ?>
                                <a href="mailto:<?php echo e($contactInfo->email1); ?>" class="quick-contact-btn email-btn">
                                    <i class="fas fa-envelope"></i>
                                    <span>Email Göndər</span>
                                </a>
                            <?php endif; ?>
                            <?php if(isset($contactInfo) && $contactInfo->phone2): ?> 
                                <a href="https://wa.me/<?php echo e(preg_replace('/[^0-9]/m', '', $contactInfo->phone2)); ?>" target="_blank" class="quick-contact-btn whatsapp-btn">
                                    <i class="fab fa-whatsapp"></i>
                                    <span>WhatsApp</span>
                                </a>
                            <?php endif; ?>
                        </div>
                        
                        <!-- Business Hours Card -->
                        <div class="business-hours-card">
                            <h5 class="text-white mb-3">İş Saatları</h5>
                            <div class="hours-list">
                                <?php if(isset($businessHours) && $businessHours->is_active): ?>
                                    <div class="hours-item">
                                        <span class="day">Həftə İçi</span>
                                        <span class="time text-primary"><?php echo e($businessHours->weekday_hours); ?></span>
                                    </div>
                                    <div class="hours-item">
                                        <span class="day">Həftə Sonu</span>
                                        <span class="time text-primary"><?php echo e($businessHours->weekend_hours); ?></span>
                                    </div>
                                <?php else: ?>
                                    <div class="hours-item">
                                        <span class="day">Həftə İçi</span>
                                        <span class="time text-primary">09:00 - 18:00</span>
                                    </div>
                                    <div class="hours-item">
                                        <span class="day">Həftə Sonu</span>
                                        <span class="time text-primary">09:00 - 14:00, Bazar: Bağlı</span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="map-section">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-12">
                    <div class="map-container" data-aos="fade-up">
                        <div class="map-overlay">
                            <div class="map-info">
                                <h4 class="text-white">Modern Lizinq Mərkəzi Ofis</h4>
                                <p class="text-light"><?php echo e($contactInfo->address ?? 'Təyin edilməyib'); ?></p>
                                <a href="https://maps.google.com/?q=<?php echo e(urlencode($contactInfo->address ?? 'Bakı, Azərbaycan')); ?>" target="_blank" class="btn btn-primary-custom btn-sm">
                                    <i class="fas fa-directions me-2"></i>Yol Tarifləri Al
                                </a>
                            </div>
                        </div>
                        <!-- Map Placeholder - Gerçək xəritə inteqrasiyası üçün Google Maps və ya digər xidmət -->
                        <div class="map-placeholder">
                            <?php if(isset($contactInfo) && $contactInfo->map_iframe): ?>
                                <div class="responsive-map-iframe-wrapper">
                                    <?php echo $contactInfo->map_iframe; ?>

                                </div>
                            <?php else: ?>
                                <div class="responsive-map-iframe-wrapper">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3039.175385327671!2d49.8671!3d40.4093!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDDCsDI0JzMzLjU!SBOIDQ5wrDuyUyNTInMDEuNiJF!5e0!3m2!1sen!2saz!4v1620000000000!5m2!1sen!2saz" 
                                            width="100%" height="400" style="border:0;" allowfullscreen="" 
                                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact CTA -->
    <section class="section-padding text-white" style="background-color: var(--section-bg);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <!-- <div class="contact-cta">
                        <h3 class="text-white mb-3">24/7 Müştəri Dəstəyi</h3>
                        <p class="text-light mb-4">
                            Bizim mütəxəssis komanda həftənin 7 günü sizin xidmətinizdədir. 
                            İstənilən sualınız varsa, bizimlə əlaqə saxlamaqdan çəkinməyin.
                        </p>
                        <div class="support-features">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="support-feature">
                                        <i class="fas fa-headset text-primary"></i>
                                        <h6 class="text-white">Online Dəstək</h6>
                                        <p class="text-light">Chat və telefon dəstəyi</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="support-feature">
                                        <i class="fas fa-clock text-primary"></i>
                                        <h6 class="text-white">Sürətli Cavab</h6>
                                        <p class="text-light">1 saat ərzində cavab</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="support-feature">
                                        <i class="fas fa-user-tie text-primary"></i>
                                        <h6 class="text-white">Şəxsi Mütəxəssis</h6>
                                        <p class="text-light">Təcrübəli məsləhətçilər</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
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
    
    .contact-form-container {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 15px;
        padding: 3rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }
    
    .contact-form .form-control {
        background: rgba(255, 255, 255, 0.08);
        border: 2px solid rgba(255, 255, 255, 0.15);
        color: white;
        border-radius: 10px;
        padding: 15px 20px;
        font-size: 1rem;
        transition: all 0.3s ease;
    }
    
    .contact-form .form-control::placeholder {
        color: rgba(255, 255, 255, 0.6);
    }
    
    .contact-form .form-control:focus {
        background: rgba(255, 255, 255, 0.12);
        border-color: var(--primary-color);
        color: white;
        box-shadow: 0 0 0 0.25rem rgba(34, 137, 255, 0.25);
        transform: translateY(-2px);
    }
    
    .contact-form .form-label {
        color: rgba(255, 255, 255, 0.95);
        font-weight: 600;
        margin-bottom: 0.75rem;
        font-size: 1.05rem;
    }
    
    .contact-form .form-check-input:checked {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }
    
    .contact-form .invalid-feedback {
        display: none;
        font-size: 0.875rem;
        color: #ff6b6b;
        margin-top: 0.25rem;
    }
    
    .contact-form .form-control.is-invalid + .invalid-feedback,
    .contact-form .form-control.is-invalid ~ .invalid-feedback {
        display: block;
    }
    
    .contact-form .form-control.is-invalid {
        border-color: #ff6b6b !important;
        background: rgba(255, 107, 107, 0.1) !important;
        color: white;
        box-shadow: 0 0 0 0.25rem rgba(255, 107, 107, 0.25) !important;
    }
    
    .contact-info-sidebar {
        position: sticky;
        top: 100px;
    }
    
    .contact-info-card {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        margin-bottom: 1.5rem;
        overflow: hidden;
    }
    
    .contact-card-header {
        background: var(--primary-color);
        padding: 1rem;
    }
    
    .contact-card-header h4 {
        margin: 0;
        font-size: 1.25rem;
    }
    
    .contact-card-body {
        padding: 1.5rem;
    }
    
    .contact-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 1.5rem;
    }
    
    .contact-item:last-child {
        margin-bottom: 0;
    }
    
    .contact-icon {
        width: 45px;
        height: 45px;
        background: var(--primary-color);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        margin-right: 1rem;
        flex-shrink: 0;
    }
    
    .contact-content h6 {
        margin: 0 0 0.5rem 0;
        font-size: 0.9rem;
    }
    
    .contact-content p {
        margin: 0;
        font-size: 0.95rem;
        line-height: 1.6;
    }
    
    .contact-content a {
        color: inherit;
        text-decoration: none;
        transition: color 0.3s ease;
    }
    
    .contact-content a:hover {
        color: var(--primary-color);
    }
    
    .quick-contact-buttons {
        display: flex;
        gap: 0.5rem;
        margin-bottom: 1.5rem;
    }
    
    .quick-contact-btn {
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 1rem 0.5rem;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        text-decoration: none;
        color: white;
        transition: all 0.3s ease;
    }
    
    .quick-contact-btn:hover {
        transform: translateY(-3px);
        color: white;
        border-color: var(--primary-color);
    }
    
    .quick-contact-btn i {
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
    }
    
    .quick-contact-btn span {
        font-size: 0.85rem;
        font-weight: 500;
    }
    
    .phone-btn:hover {
        background: rgba(34, 139, 34, 0.2);
        border-color: #228b22;
    }
    
    .phone-btn:hover i {
        color: #228b22;
    }
    
    .email-btn:hover {
        background: rgba(220, 53, 69, 0.2);
        border-color: #dc3545;
    }
    
    .email-btn:hover i {
        color: #dc3545;
    }
    
    .whatsapp-btn:hover {
        background: rgba(37, 211, 102, 0.2);
        border-color: #25d366;
    }
    
    .whatsapp-btn:hover i {
        color: #25d366;
    }
    
    .business-hours-card {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        padding: 1.5rem;
    }
    
    .hours-list {
        margin-top: 1rem;
    }
    
    .hours-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.5rem 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .hours-item:last-child {
        border-bottom: none;
    }
    
    .day {
        color: rgba(255, 255, 255, 0.9);
        font-size: 0.9rem;
    }
    
    .time {
        font-weight: 600;
        font-size: 0.9rem;
    }
    
    .map-section {
        position: relative;
    }
    
    .map-container {
        position: relative;
        height: 400px;
        overflow: hidden;
        border-radius: 0;
    }
    
    .map-overlay {
        position: absolute;
        top: 20px;
        left: 20px;
        background: rgba(0, 0, 0, 0.8);
        backdrop-filter: blur(10px);
        padding: 1.5rem;
        border-radius: 8px;
        z-index: 10;
        max-width: 300px;
    }
    
    .map-info h4 {
        margin: 0 0 0.5rem 0;
        font-size: 1.1rem;
    }
    
    .map-info p {
        margin: 0 0 1rem 0;
        font-size: 0.9rem;
    }
    
    .map-placeholder iframe {
        filter: grayscale(20%);
        transition: filter 0.3s ease;
    }
    
    .map-placeholder:hover iframe {
        filter: grayscale(0%);
    }

    .responsive-map-iframe-wrapper {
        position: relative;
        padding-bottom: 56.25%; /* 16:9 aspekt nisbəti (hündürlük / genişlik) */
        height: 0;
        overflow: hidden;
    }

    .responsive-map-iframe-wrapper iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: 0;
    }
    
    .contact-cta {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        padding: 3rem 2rem;
    }
    
    .support-feature {
        text-align: center;
        padding: 1rem;
    }
    
    .support-feature i {
        font-size: 2.5rem;
        margin-bottom: 1rem;
    }
    
    .support-feature h6 {
        margin: 0 0 0.5rem 0;
    }
    
    .support-feature p {
        margin: 0;
        font-size: 0.9rem;
    }
    
    @media (max-width: 768px) {
        .page-title {
            font-size: 2rem;
        }
        
        .contact-form-container {
            padding: 2rem 1.5rem;
            border-radius: 10px;
        }
        
        .contact-form .form-control {
            padding: 12px 15px;
            font-size: 0.95rem;
        }
        
        .contact-info-sidebar {
            position: static;
            margin-top: 2rem;
        }
        
        .quick-contact-buttons {
            flex-direction: column;
        }
        
        .quick-contact-btn {
            flex-direction: row;
            justify-content: center;
            align-items: center;
            padding: 1rem;
        }
        
        .quick-contact-btn i {
            margin-right: 0.5rem;
            margin-bottom: 0;
        }
        
        .map-overlay {
            position: relative;
            top: 0;
            left: 0;
            margin: 1rem;
            max-width: none;
        }
        
        .map-container {
            height: 300px;
        }
        
        .contact-cta {
            padding: 2rem 1rem;
        }
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Contact Form Validation and Submission
        const contactForm = document.getElementById('contactForm');
        
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Clear previous validation
            document.querySelectorAll('.is-invalid').forEach(el => {
                el.classList.remove('is-invalid');
            });
            
            let isValid = true;
            
            // Validate required fields
            const requiredFields = ['contactName', 'contactPhone', 'contactEmail', 'contactMessage'];
            requiredFields.forEach(fieldId => {
                const field = document.getElementById(fieldId);
                if (!field.value.trim()) {
                    field.classList.add('is-invalid');
                    isValid = false;
                }
            });
            
            // Email validation
            const email = document.getElementById('contactEmail');
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (email.value && !emailRegex.test(email.value)) {
                email.classList.add('is-invalid');
                isValid = false;
            }
            
            // Phone validation (basic)
            const phone = document.getElementById('contactPhone');
            const phoneRegex = /^\+994\s?\d{2}\s?\d{3}\s?\d{2}\s?\d{2}$/;
            if (phone.value && !phoneRegex.test(phone.value)) {
                phone.classList.add('is-invalid');
                isValid = false;
            }
            
            if (isValid) {
                const submitBtn = this.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;
                const formData = new FormData(this); // Form datalarını götür

                // Show loading state
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Göndərilir...';
                submitBtn.disabled = true;
                
                // Real API call using Fetch API
                fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        submitBtn.innerHTML = '<i class="fas fa-check me-2"></i>Uğurla Göndərildi!';
                        submitBtn.classList.remove('btn-primary-custom');
                        submitBtn.classList.add('btn-success');
                        
                        Swal.fire({
                            icon: 'success',
                            title: 'Uğurlu!',
                            text: data.message || 'Mesajınız uğurla göndərildi! Tezliklə sizinlə əlaqə saxlayacağıq.',
                            showConfirmButton: false,
                            timer: 2000
                        });
                        
                        setTimeout(() => {
                            this.reset();
                            submitBtn.innerHTML = originalText;
                            submitBtn.classList.remove('btn-success');
                            submitBtn.classList.add('btn-primary-custom');
                            submitBtn.disabled = false;
                        }, 2000);
                    } else {
                        // Handle validation errors or other errors from backend
                        submitBtn.innerHTML = originalText;
                        submitBtn.disabled = false;
                        Swal.fire({
                            icon: 'error',
                            title: 'Xəta Baş Verdi!',
                            text: data.message || 'Mesaj göndərilərkən bir xəta baş verdi. Zəhmət olmasa, yenidən cəhd edin.'
                        });
                        if (data.errors) {
                            for (const fieldName in data.errors) {
                                const fieldElement = document.querySelector(`[name="${fieldName}"]`);
                                if (fieldElement) {
                                    fieldElement.classList.add('is-invalid');
                                    const feedbackElement = fieldElement.nextElementSibling;
                                    if (feedbackElement && feedbackElement.classList.contains('invalid-feedback')) {
                                        feedbackElement.textContent = data.errors[fieldName][0];
                                    }
                                }
                            }
                        }
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                    Swal.fire({
                        icon: 'error',
                        title: 'Şəbəkə Xətası!',
                        text: 'Mesaj göndərilərkən şəbəkə xətası baş verdi. İnternet bağlantınızı yoxlayın.'
                    });
                });
            }
        });
        
        // Real-time validation feedback (unchanged)
        document.getElementById('contactEmail').addEventListener('input', function() {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (this.value && !emailRegex.test(this.value)) {
                this.classList.add('is-invalid');
            } else {
                this.classList.remove('is-invalid');
            }
        });
        
        document.getElementById('contactPhone').addEventListener('input', function() {
            // Format phone number as user types (unchanged)
            let value = this.value.replace(/\D/g, '');
            if (value.length > 0 && !value.startsWith('994')) {
                value = '994' + value;
            }
            if (value.length > 3) {
                value = value.slice(0, 3) + ' ' + value.slice(3);
            }
            if (value.length > 6) {
                value = value.slice(0, 6) + ' ' + value.slice(6);
            }
            if (value.length > 10) {
                value = value.slice(0, 10) + ' ' + value.slice(10);
            }
            if (value.length > 13) {
                value = value.slice(0, 13) + ' ' + value.slice(13);
            }
            this.value = '+' + value;
            
            // Validate (unchanged)
            const phoneRegex = /^\+994\s?\d{2}\s?\d{3}\s?\d{2}\s?\d{2}$/;
            if (this.value && !phoneRegex.test(this.value)) {
                this.classList.add('is-invalid');
            } else {
                this.classList.remove('is-invalid');
            }
        });
        
        // Current time display for business hours (unchanged)
        // function updateCurrentTime() {
        //     const now = new Date();
        //     const days = ['Bazar', 'Bazar ertəsi', 'Çərşənbə axşamı', 'Çərşənbə', 'Cümə axşamı', 'Cümə', 'Şənbə'];
        //     const currentDay = days[now.getDay()];
        //     const currentHour = now.getHours();
            
        //     // Highlight current day
        //     document.querySelectorAll('.hours-item').forEach(item => {
        //         const daySpan = item.querySelector('.day');
        //         if (daySpan && daySpan.textContent === currentDay) {
        //             item.style.background = 'rgba(255, 107, 53, 0.1)';
        //             item.style.borderRadius = '4px';
                    
        //             // Check if currently open
        //             const isOpen = (currentDay !== 'Bazar') && 
        //                           ((currentDay === 'Şənbə' && currentHour >= 9 && currentHour < 14) || 
        //                            (currentDay !== 'Şənbə' && currentHour >= 9 && currentHour < 18));
                    
        //             if (isOpen) {
        //                 const statusSpan = document.createElement('span');
        //                 statusSpan.className = 'badge bg-success ms-2';
        //                 statusSpan.textContent = 'AÇIQ';
        //                 daySpan.appendChild(statusSpan);
        //             }
        //         }
        //     });
        // }
        
        // updateCurrentTime();
        
        // setInterval(updateCurrentTime, 60000);
        
        // Real-time blur validation - sahədən çıxanda yoxla (unchanged)
        const formFields = ['contactName', 'contactPhone', 'contactEmail', 'contactMessage'];
        formFields.forEach(fieldId => {
            const field = document.getElementById(fieldId);
            if (field) {
                field.addEventListener('blur', function() {
                    // Sahə boşdursa və istifadəçi ona toxunubsa
                    if (this.value.trim() === '' && this.hasAttribute('data-touched')) {
                        this.classList.add('is-invalid');
                    } else {
                        this.classList.remove('is-invalid');
                        
                        // Email xüsusi yoxlanması
                        if (fieldId === 'contactEmail' && this.value.trim() !== '') {
                            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                            if (!emailRegex.test(this.value)) {
                                this.classList.add('is-invalid');
                            }
                        }
                        
                        // Telefon xüsusi yoxlanması
                        if (fieldId === 'contactPhone' && this.value.trim() !== '') {
                            const phoneRegex = /^\+994\s?\d{2}\s?\d{3}\s?\d{2}\s?\d{2}$/;
                            if (!phoneRegex.test(this.value)) {
                                this.classList.add('is-invalid');
                            }
                        }
                    }
                });
                
                // İstifadəçi sahəyə toxunduğunu işarələ
                field.addEventListener('focus', function() {
                    this.setAttribute('data-touched', 'true');
                });
                
                // İstifadəçi yazanda xətanı sil
                field.addEventListener('input', function() {
                    if (this.value.trim() !== '') {
                        this.classList.remove('is-invalid');
                    }
                });
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ModernLeasing\resources\views/front/pages/contact.blade.php ENDPATH**/ ?>