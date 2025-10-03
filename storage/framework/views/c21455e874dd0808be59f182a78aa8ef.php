<header id="page-topbar" style="background-color:rgb(37, 37, 37); border-bottom: 2px solid rgb(54, 50, 50);">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="<?php echo e(asset('back/assets/images/logo.png')); ?>" alt="logo-sm" height="25">
                    </span>
                    <span class="logo-lg">
                        <img src="<?php echo e(asset('back/assets/images/logo.png')); ?>" alt="logo-dark" height="50">
                    </span>
                </a>

                <a href="<?php echo e(route('admin.dashboard')); ?>" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="<?php echo e(asset('back/assets/images/logo.png')); ?>" alt="logo-sm-light"
                            height="25">
                    </span>
                    <span class="logo-lg">
                        <img src="<?php echo e(asset('back/assets/images/logo.png')); ?>" alt="logo-light" height="50">
                    </span>
                </a>
            </div>
            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn" style="color: white;">
                <i class="ri-menu-2-line align-middle"></i>
            </button>
        </div>

        <div class="d-flex">
            <div class="dropdown d-inline-block user-dropdown">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <!-- <img width="80" src="<?php echo e(asset('back/assets/images/logo.png')); ?>" alt="Header Avatar"> -->
                    <span class="d-none d-xl-inline-block ms-1" style="color: white;"><?php echo e(auth()->guard('admin')->user()->name); ?></span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block" style="color: white;"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- <a class="dropdown-item" href="<?php echo e(route('admin.profile')); ?>"><i class="ri-user-line align-middle me-1"></i> Profil</a> -->
                    <form action="<?php echo e(route('admin.logout')); ?>" method="POST" style="display: inline;">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="dropdown-item text-danger" style="color: red;"><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</header>
<?php /**PATH C:\xampp\htdocs\ModernLeasing\resources\views/back/includes/header.blade.php ENDPATH**/ ?>