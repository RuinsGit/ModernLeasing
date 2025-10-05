<!doctype html>
<html lang="en">


<!-- Mirrored from themesdesign.in/upcube/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Oct 2023 05:29:29 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Buy Brand Tools | Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Buy Brand Tools Admin" name="description" />
    <meta content="Buy Brand Tools Admin" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo e(asset('back/assets/')); ?>/images/logoblog.svg">

    <!-- jquery.vectormap css -->
    <link href="<?php echo e(asset('back/assets/')); ?>/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css"
        rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="<?php echo e(asset('back/assets/')); ?>/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="<?php echo e(asset('back/assets/')); ?>/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="<?php echo e(asset('back/assets/')); ?>/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="<?php echo e(asset('back/assets/')); ?>/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome CDN əlavə edildi -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- App Css-->
    <link href="<?php echo e(asset('back/assets/')); ?>/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <?php echo $__env->yieldPushContent('css'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
</head>

<body data-topbar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <?php echo $__env->make('back.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('back.includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Begin page -->
    <div id="layout-wrapper">

        <div class="main-content">
            <?php echo $__env->yieldContent('content'); ?>
            <?php echo $__env->make('back.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="<?php echo e(asset('back/assets/')); ?>/libs/jquery/jquery.min.js"></script>
    <script src="<?php echo e(asset('back/assets/')); ?>/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo e(asset('back/assets/')); ?>/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?php echo e(asset('back/assets/')); ?>/libs/simplebar/simplebar.min.js"></script>
    <script src="<?php echo e(asset('back/assets/')); ?>/libs/node-waves/waves.min.js"></script>


    <!-- apexcharts -->
    <script src="<?php echo e(asset('back/assets/')); ?>/libs/apexcharts/apexcharts.min.js"></script>

    <!-- jquery.vectormap map -->
    <script src="<?php echo e(asset('back/assets/')); ?>/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js">
    </script>
    <script src="<?php echo e(asset('back/assets/')); ?>/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js">
    </script>

    <!-- Required datatable js -->
    <script src="<?php echo e(asset('back/assets/')); ?>/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo e(asset('back/assets/')); ?>/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

    <!-- Responsive examples -->
    <script src="<?php echo e(asset('back/assets/')); ?>/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo e(asset('back/assets/')); ?>/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <?php echo $__env->yieldPushContent('dashboard-scripts'); ?>

    <!-- App js -->
    <script src="<?php echo e(asset('back/assets/')); ?>/js/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // AJAX için CSRF token ayarı
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <?php echo $__env->yieldPushContent('js'); ?>
    <?php echo $__env->yieldPushContent('script'); ?>
</body>


<!-- Mirrored from themesdesign.in/upcube/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Oct 2023 05:30:06 GMT -->

</html>
<?php /**PATH C:\xampp\htdocs\ModernLeasing\resources\views/back/layouts/master.blade.php ENDPATH**/ ?>