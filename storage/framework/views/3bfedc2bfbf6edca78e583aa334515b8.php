<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu" style="background-color: rgb(34, 33, 33);">

    <div data-simplebar class="h-100">

        <!-- User details -->
        <div class="user-profile text-center mt-3">
           
            <div class="mt-3">
                <h4 class="font-size-16 mb-1" style="color: white;">
                    <?php echo e(auth()->guard('admin')->user()->name ?? 'Administrator'); ?>

                </h4>
                <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i>
                    Online</span>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu" >
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu" style="color: white; " >
                <li class="menu-title">İDARƏ PANELİ</li>

                <li>
                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-home-line"></i>
                        <span>Ana Səhifə</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo e(route('admin.hero.index')); ?>">Hero Section</a></li>
                        <li><a href="<?php echo e(route('admin.hero-features.index')); ?>">Hero Kartları</a></li>
                        <li><a href="<?php echo e(route('admin.navbar.index')); ?>">Navbar Menyu</a></li>
                        <li><a href="<?php echo e(route('admin.site-logo.index')); ?>">Logo İdarəetməsi</a></li>
                        <li><a href="<?php echo e(route('admin.services.index')); ?>">Xidmətlər</a></li>
                        <li><a href="<?php echo e(route('admin.advantages.index')); ?>">Üstünlüklər</a></li>
                        <li><a href="<?php echo e(route('admin.mission-goals.index')); ?>">Missiya və Məqsədlər</a></li>
                        
                    </ul>
                </li>

                <li class="menu-title">Xəbərlər</li>
                <li>
                    <a href="<?php echo e(route('admin.news-items.index')); ?>" class="waves-effect">
                        <i class="ri-newspaper-line"></i>
                        <span>Son Xəbərlər</span>
                    </a>
                </li>

                <li class="menu-title">Haqqımızda Səhifəsi</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-file-info-line"></i>
                        <span>Haqqımızda Bölmələri</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo e(route('admin.about-mission-section.index')); ?>">Ümumi Missiya Bölməsi</a></li>
                        <li><a href="<?php echo e(route('admin.about-mission-card.index')); ?>">Missiya Kartları</a></li>
                        <li><a href="<?php echo e(route('admin.company-history-items.index')); ?>">Şirkət Tarixi</a></li>
                    </ul>
                </li>

                <li class="menu-title">Komandamız</li>
                <li>
                    <a href="<?php echo e(route('admin.team-members.index')); ?>" class="waves-effect">
                        <i class="ri-team-line"></i>
                        <span>Komanda Üzvləri</span>
                    </a>
                </li>

                <li class="menu-title">Statistika</li>
                <li>
                    <a href="<?php echo e(route('admin.stat-items.index')); ?>" class="waves-effect">
                        <i class="ri-line-chart-line"></i>
                        <span>Statistikalar</span>
                    </a>
                </li>

                <li class="menu-title">Əməkdaşlıq</li>
                <li>
                    <a href="<?php echo e(route('admin.partners.index')); ?>" class="waves-effect">
                        <i class="ri-handshake-line"></i>
                        <span>Tərəfdaşlar</span>
                    </a>
                </li>

                <li class="menu-title">Sayt Məlumatları</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-settings-4-line"></i>
                        <span>Əsas Parametrlər</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo e(route('admin.site-logo.index')); ?>">Logo & Sayt Adı</a></li>
                        <li><a href="<?php echo e(route('admin.contact-info.index')); ?>">Əlaqə Məlumatları</a></li>
                        <li><a href="<?php echo e(route('back.pages.socialfooter.index')); ?>">Sosial Media</a></li>
                        <li><a href="<?php echo e(route('admin.contact-messages.index')); ?>">Əlaqə Mesajları</a></li>
                        <li><a href="<?php echo e(route('admin.business-hours.index')); ?>">İş Saatları</a></li>
                        
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
<?php /**PATH C:\xampp\htdocs\ModernLeasing\resources\views/back/includes/sidebar.blade.php ENDPATH**/ ?>