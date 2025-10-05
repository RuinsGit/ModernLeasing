

<?php $__env->startSection('title', 'Tez-Tez Verilən Suallar - MODERN LİZİNQ'); ?>
<?php $__env->startSection('description', 'Modern Lizinq ilə bağlı ən çox verilən suallara cavablar. Lizinq prosesi, ödənişlər, sənədlər və s. haqqında məlumatlar.'); ?>
<?php $__env->startSection('keywords', 'faq, suallar, cavablar, lizinq sualları, ödəniş, sənədlər, modern lizinq'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Page Header -->
    <section class="page-header" style="background: linear-gradient(135deg, #1F1F1F 0%, #2289FF 100%); padding: 150px 0 100px;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="page-title text-white" data-aos="fade-up">Tez-Tez Verilən Suallar</h1>
                    <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item">
                                <a href="<?php echo e(route('front.index')); ?>" class="text-light">Ana Səhifə</a>
                            </li>
                            <li class="breadcrumb-item active text-white" aria-current="page">FAQ</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="section-padding bg-dark text-white" style="background-color: var(--section-bg);">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title text-white" data-aos="fade-up">Bizə Ən Çox Verilən <span class="text-primary">Suallar</span></h2>
                    <p class="section-subtitle text-light" data-aos="fade-up" data-aos-delay="200">
                        Lizinq prosesi, ödəniş şərtləri, sənədləşdirmə və digər mövzular haqqında bütün suallarınıza cavab tapın.
                    </p>
                </div>
            </div>
            
            <div class="row" data-aos="fade-up" data-aos-delay="300">
                <div class="col-lg-12">
                    <div class="faq-tabs">
                        <?php if($faqCategories->count() > 0): ?>
                            <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                                <?php $__currentLoopData = $faqCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link <?php echo e($loop->first ? 'active' : ''); ?>" id="pills-<?php echo e($category->slug); ?>-tab" data-bs-toggle="pill" 
                                                data-bs-target="#pills-<?php echo e($category->slug); ?>" type="button" role="tab" 
                                                aria-controls="pills-<?php echo e($category->slug); ?>" aria-selected="<?php echo e($loop->first ? 'true' : 'false'); ?>">
                                            <?php echo e($category->name); ?>

                                        </button>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <?php $__currentLoopData = $faqCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="tab-pane fade <?php echo e($loop->first ? 'show active' : ''); ?>" id="pills-<?php echo e($category->slug); ?>" role="tabpanel" aria-labelledby="pills-<?php echo e($category->slug); ?>-tab">
                                        <div class="accordion accordion-flush" id="faqAccordion-<?php echo e($category->slug); ?>">
                                            <?php if($category->faqItems->count() > 0): ?>
                                                <?php $__currentLoopData = $category->faqItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="heading-<?php echo e($item->id); ?>">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" 
                                                                    data-bs-target="#collapse-<?php echo e($item->id); ?>" aria-expanded="false" 
                                                                    aria-controls="collapse-<?php echo e($item->id); ?>">
                                                                <?php echo e($item->question); ?>

                                                            </button>
                                                        </h2>
                                                        <div id="collapse-<?php echo e($item->id); ?>" class="accordion-collapse collapse" 
                                                             aria-labelledby="heading-<?php echo e($item->id); ?>" data-bs-parent="#faqAccordion-<?php echo e($category->slug); ?>">
                                                            <div class="accordion-body">
                                                                <?php echo $item->rendered_answer; ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <div class="alert alert-info text-center" role="alert">
                                                    Bu kateqoriyada hələ ki heç bir sual yoxdur.
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-info text-center" role="alert">
                                Hələ ki heç bir FAQ kateqoriyası əlavə edilməyib.
                            </div>
                        <?php endif; ?>
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
    
    .faq-tabs .nav-pills .nav-link {
        color: #fff;
        background-color: rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        padding: 10px 20px;
        margin: 0 5px;
        transition: all 0.3s ease;
    }
    
    .faq-tabs .nav-pills .nav-link.active,
    .faq-tabs .nav-pills .nav-link:hover {
        color: #fff;
        background-color: var(--primary-color);
    }
    
    .accordion-item {
        background-color: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        margin-bottom: 10px;
        border-radius: 8px;
        overflow: hidden;
    }
    
    .accordion-button {
        background-color: transparent;
        color: #fff; /* Default olaraq ağ rəng */
        font-weight: 600;
        padding: 15px 20px;
        border: none;
        box-shadow: none;
        transition: all 0.3s ease;
    }
    
    .accordion-button:not(.collapsed) {
        color: var(--primary-color);
        background-color: rgba(34, 137, 255, 0.1);
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .accordion-button::after {
        filter: invert(1) grayscale(100%) brightness(200%);
    }
    
    .accordion-body {
        padding: 20px;
        background-color: rgba(255, 255, 255, 0.03);
        color: #ddd;
        line-height: 1.7;
        min-height: 50px;
        overflow: auto;
        display: block !important; /* Məcburən göstər */
        visibility: visible !important; /* Məcburən görünən et */
        height: auto !important; /* Hündürlüyü avtomatik tənzimlə */
    }

    .accordion-body p {
        color: #ddd !important; /* Mətni məcburən ağ rəngdə et */
        margin-bottom: 1rem !important;
        line-height: 1.6;
    }
    .accordion-body p:last-child {
        margin-bottom: 0;
    }

    .accordion-body ul, .accordion-body ol {
        margin-left: 20px !important;
        padding-left: 0 !important;
        margin-bottom: 1rem !important;
        list-style-position: inside !important;
    }

    .accordion-body ul {
        list-style-type: disc !important;
    }

    .accordion-body ol {
        list-style-type: decimal !important;
    }

    .accordion-body ul li::marker, .accordion-body ol li::marker {
        color: var(--primary-color) !important;
        font-weight: bold !important;
    }

    .accordion-body ul li, .accordion-body ol li {
        color: #ddd !important;
        margin-bottom: 8px !important;
        line-height: 1.5 !important;
    }

    .accordion-body .table-responsive {
        margin-bottom: 1rem !important;
        border-radius: 8px !important;
        overflow-x: auto !important;
        border: 1px solid rgba(255, 255, 255, 0.1) !important;
        display: block !important;
    }

    .accordion-body table {
        width: 100% !important;
        margin-bottom: 0 !important;
        color: #ddd !important;
        border-collapse: collapse !important;
        background-color: rgba(255, 255, 255, 0.05) !important;
        border-radius: 0 !important;
        overflow: hidden !important;
        border: none !important;
        display: table !important;
    }
    .accordion-body table th, .accordion-body table td {
        padding: 12px 15px !important;
        border: 1px solid rgba(255, 255, 255, 0.1) !important;
        text-align: left !important;
        color: #ddd !important;
    }
    .accordion-body table th {
        background-color: var(--primary-color) !important;
        color: white !important;
        font-weight: 600 !important;
    }
    .accordion-body table tr:nth-child(even) {
        background-color: rgba(255, 255, 255, 0.02) !important;
    }

    .accordion-body .alert {
        margin-top: 1.5rem !important;
        margin-bottom: 1.5rem !important;
        padding: 1.25rem 1.5rem !important;
        border-radius: 8px !important;
        font-size: 1rem !important;
        line-height: 1.6 !important;
        word-wrap: break-word !important;
        background-color: rgba(255, 255, 255, 0.1) !important;
        border: 1px solid rgba(255, 255, 255, 0.2) !important;
        color: #eee !important;
        display: block !important;
    }

    .accordion-body .alert.alert-info {
        background-color: rgba(34, 137, 255, 0.2) !important;
        border-color: var(--primary-color) !important;
        color: #cce5ff !important;
    }
    .accordion-body .alert.alert-warning {
        background-color: rgba(255, 193, 7, 0.2) !important;
        border-color: #ffc107 !important;
        color: #fff3cd !important;
    }
    .accordion-body .alert.alert-success {
        background-color: rgba(40, 167, 69, 0.2) !important;
        border-color: #28a745 !important;
        color: #d4edda !important;
    }
    .accordion-body .alert.alert-danger {
        background-color: rgba(220, 53, 69, 0.2) !important;
        border-color: #dc3545 !important;
        color: #f8d7da !important;
    }

    .accordion-body h1, .accordion-body h2, .accordion-body h3, .accordion-body h4, .accordion-body h5, .accordion-body h6 {
        color: var(--primary-color) !important;
        margin-top: 1.5rem !important;
        margin-bottom: 1rem !important;
        font-weight: 700 !important;
        line-height: 1.3 !important;
        word-wrap: break-word !important;
        display: block !important;
    }
    .accordion-body h1 {
        font-size: 2.2rem !important;
    }
    .accordion-body h2 {
        font-size: 1.8rem;
    }
    .accordion-body h3 {
        font-size: 1.5rem;
    }
    .accordion-body h4 {
        font-size: 1.3rem;
    }
    .accordion-body h5 {
        font-size: 1.1rem;
    }
    .accordion-body h6 {
        font-size: 1rem;
    }

    .accordion-body h1:first-child, .accordion-body h2:first-child, .accordion-body h3:first-child, .accordion-body h4:first-child, .accordion-body h5:first-child, .accordion-body h6:first-child {
        margin-top: 0;
    }

    @media (max-width: 768px) {
        .page-title {
            font-size: 2rem;
        }
        .faq-tabs .nav-pills {
            flex-wrap: nowrap;
            overflow-x: auto;
            justify-content: flex-start !important;
        }
        .faq-tabs .nav-pills .nav-item {
            flex-shrink: 0;
        }
        .faq-tabs .nav-pills .nav-link {
            margin: 0 5px 10px 0;
        }
    }
</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ModernLeasing\resources\views/front/pages/faq.blade.php ENDPATH**/ ?>