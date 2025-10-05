

<?php $__env->startSection('title', 'Navbar Menyu Detalları - İdarə Paneli'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Navbar Menyu Detalları</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.navbar.index')); ?>">Navbar Menyu</a></li>
                            <li class="breadcrumb-item active">Detallar</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <?php if($navbar->icon): ?>
                                <div class="avatar-sm me-3">
                                    <span class="avatar-title bg-soft-primary text-primary rounded">
                                        <i class="<?php echo e($navbar->icon); ?> font-size-18"></i>
                                    </span>
                                </div>
                            <?php endif; ?>
                            <div class="flex-grow-1">
                                <h4 class="card-title mb-1"><?php echo e($navbar->title); ?></h4>
                                <p class="card-title-desc mb-0">Navbar menyu elementi detalları</p>
                            </div>
                            <div class="flex-shrink-0">
                                <span class="badge badge-soft-<?php echo e($navbar->is_active ? 'success' : 'danger'); ?> font-size-12">
                                    <?php echo e($navbar->is_active ? 'Aktiv' : 'Deaktiv'); ?>

                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card border shadow-none">
                                    <div class="card-header bg-transparent border-bottom">
                                        <h5 class="my-0">
                                            <i class="mdi mdi-information-outline me-2"></i>
                                            Əsas Məlumatlar
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-nowrap mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row" style="width: 50%;">Başlıq:</th>
                                                        <td><?php echo e($navbar->title); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Route Adı:</th>
                                                        <td>
                                                            <?php if($navbar->route_name): ?>
                                                                <span class="badge badge-soft-primary"><?php echo e($navbar->route_name); ?></span>
                                                            <?php else: ?>
                                                                <span class="text-muted">Təyin edilməyib</span>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">URL:</th>
                                                        <td>
                                                            <?php if($navbar->url_raw): ?>
                                                                <a href="<?php echo e($navbar->url_raw); ?>" target="_blank" class="text-primary">
                                                                    <?php echo e(Str::limit($navbar->url_raw, 40)); ?>

                                                                    <i class="mdi mdi-open-in-new ms-1"></i>
                                                                </a>
                                                            <?php else: ?>
                                                                <span class="text-muted">Direkt URL yoxdur</span>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Final URL:</th>
                                                        <td>
                                                            <a href="<?php echo e($navbar->url); ?>" target="_blank" class="text-success">
                                                                <?php echo e($navbar->url); ?>

                                                                <i class="mdi mdi-open-in-new ms-1"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Icon:</th>
                                                        <td>
                                                            <?php if($navbar->icon): ?>
                                                                <div class="d-flex align-items-center">
                                                                    <i class="<?php echo e($navbar->icon); ?> me-2 text-primary"></i>
                                                                    <code><?php echo e($navbar->icon); ?></code>
                                                                </div>
                                                            <?php else: ?>
                                                                <span class="text-muted">Icon təyin edilməyib</span>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Sıralama:</th>
                                                        <td>
                                                            <span class="badge badge-soft-info"><?php echo e($navbar->order); ?></span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card border shadow-none">
                                    <div class="card-header bg-transparent border-bottom">
                                        <h5 class="my-0">
                                            <i class="mdi mdi-cog-outline me-2"></i>
                                            Parametrlər
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-nowrap mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row" style="width: 50%;">Status:</th>
                                                        <td>
                                                            <span class="badge badge-soft-<?php echo e($navbar->is_active ? 'success' : 'danger'); ?>">
                                                                <?php echo e($navbar->is_active ? 'Aktiv' : 'Deaktiv'); ?>

                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Desktop'da Göstər:</th>
                                                        <td>
                                                            <span class="badge badge-soft-<?php echo e($navbar->show_desktop ? 'success' : 'danger'); ?>">
                                                                <?php echo e($navbar->show_desktop ? 'Bəli' : 'Xeyr'); ?>

                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Mobil'də Göstər:</th>
                                                        <td>
                                                            <span class="badge badge-soft-<?php echo e($navbar->show_mobile ? 'success' : 'danger'); ?>">
                                                                <?php echo e($navbar->show_mobile ? 'Bəli' : 'Xeyr'); ?>

                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Yaradılma Tarixi:</th>
                                                        <td><?php echo e($navbar->created_at->format('d.m.Y H:i')); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Son Yeniləmə:</th>
                                                        <td><?php echo e($navbar->updated_at->format('d.m.Y H:i')); ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <!-- Preview Card -->
                                <div class="card border shadow-none mt-3">
                                    <div class="card-header bg-transparent border-bottom">
                                        <h5 class="my-0">
                                            <i class="mdi mdi-eye-outline me-2"></i>
                                            Önizləmə
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <h6 class="font-size-14 mb-2">Desktop Navbar:</h6>
                                            <?php if($navbar->show_desktop): ?>
                                                <div class="p-2 bg-light rounded">
                                                    <a href="<?php echo e($navbar->url); ?>" class="text-decoration-none text-dark fw-medium">
                                                        <?php echo e($navbar->title); ?>

                                                    </a>
                                                </div>
                                            <?php else: ?>
                                                <div class="p-2 bg-light rounded text-muted">
                                                    Desktop'da göstərilmir
                                                </div>
                                            <?php endif; ?>
                                        </div>

                                        <div>
                                            <h6 class="font-size-14 mb-2">Mobil Navbar:</h6>
                                            <?php if($navbar->show_mobile): ?>
                                                <div class="p-2 bg-light rounded text-center" style="max-width: 120px;">
                                                    <div class="d-flex flex-column align-items-center">
                                                        <?php if($navbar->icon): ?>
                                                            <i class="<?php echo e($navbar->icon); ?> mb-1"></i>
                                                        <?php endif; ?>
                                                        <small class="text-dark"><?php echo e($navbar->title); ?></small>
                                                    </div>
                                                </div>
                                            <?php else: ?>
                                                <div class="p-2 bg-light rounded text-muted">
                                                    Mobil'də göstərilmir
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="mt-4 d-flex gap-2">
                            <a href="<?php echo e(route('admin.navbar.edit', $navbar->id)); ?>" class="btn btn-primary">
                                <i class="bx bx-edit me-2"></i> Redaktə Et
                            </a>
                            <a href="<?php echo e(route('admin.navbar.index')); ?>" class="btn btn-secondary">
                                <i class="bx bx-arrow-back me-2"></i> Geri Qayıt
                            </a>
                            <form action="<?php echo e(route('admin.navbar.toggle-status', $navbar->id)); ?>" method="POST" class="d-inline-block">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-<?php echo e($navbar->is_active ? 'warning' : 'success'); ?>">
                                    <i class="bx bx-<?php echo e($navbar->is_active ? 'hide' : 'show'); ?> me-2"></i>
                                    <?php echo e($navbar->is_active ? 'Deaktiv Et' : 'Aktiv Et'); ?>

                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container-fluid -->
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ModernLeasing\resources\views/back/pages/navbar/show.blade.php ENDPATH**/ ?>