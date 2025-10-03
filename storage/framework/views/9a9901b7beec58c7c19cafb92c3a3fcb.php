<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    
    <title><?php echo $__env->yieldContent('title', 'MODERN LİZİNQ - Texnika, Avtomobil və Əmlak Lizinqi'); ?></title>
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="<?php echo $__env->yieldContent('description', 'MODERN LİZİNQ - Texnika, avtomobil və əmlakınızı şərfəli lizinq şərtləri ilə əldə edin. Peşəkar xidmət və etibarlı həllər.'); ?>">
    <meta name="keywords" content="<?php echo $__env->yieldContent('keywords', 'lizinq, texnika lizinqi, avtomobil lizinqi, əmlak lizinqi, kənd təsərrüfatı, sənaye avadanlıqları'); ?>">
    <meta name="author" content="MODERN LİZİNQ">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="<?php echo $__env->yieldContent('og_title', 'MODERN LİZİNQ - Texnika və Avtomobil Lizinqi'); ?>">
    <meta property="og:description" content="<?php echo $__env->yieldContent('og_description', 'Texnika, avtomobil və əmlakınızı şərfəli lizinq şərtləri ilə əldə edin.'); ?>"
    <meta property="og:image" content="<?php echo $__env->yieldContent('og_image', asset('assets/images/og-image.jpg')); ?>">
    <meta property="og:url" content="<?php echo e(url()->current()); ?>">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('assets/images/favicon.ico')); ?>">
    
    <!-- Styles -->
    <?php echo $__env->make('front.includes.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body class="antialiased">
    <!-- Navbar -->
    <?php echo $__env->make('front.includes.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <!-- Mobile Navbar -->
    <?php echo $__env->make('front.includes.mobile-navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <!-- Header -->
    <?php echo $__env->yieldContent('header'); ?>
    
    <!-- Main Content -->
    <main class="main-content">
        <?php echo $__env->yieldContent('content'); ?>
    </main>
    
    <!-- Footer -->
    <?php echo $__env->make('front.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <!-- Scripts -->
    <?php echo $__env->make('front.includes.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\ModernLeasing\resources\views/front/layouts/master.blade.php ENDPATH**/ ?>