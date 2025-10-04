

<?php $__env->startSection('title', 'İş Saatları İdarəetməsi - İdarə Paneli'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">İş Saatları İdarəetməsi</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active">İş Saatları</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="card-title">İş Saatları</h4>
                            <?php if(!$businessHour): ?>
                                <a href="<?php echo e(route('admin.business-hours.create')); ?>" class="btn btn-primary">
                                    <i class="bx bx-plus me-1"></i> Yeni İş Saatı Əlavə Et
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="card-body">

                        <?php if(session('success')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="mdi mdi-check-all me-2"></i>
                                <?php echo e(session('success')); ?>

                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <?php if(session('error')): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="mdi mdi-block-helper me-2"></i>
                                <?php echo e(session('error')); ?>

                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <?php if(session('info')): ?>
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                <i class="mdi mdi-information me-2"></i>
                                <?php echo e(session('info')); ?>

                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <?php if($businessHour): ?>
                            <div class="table-responsive">
                                <table class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Həftə İçi Saatları</th>
                                            <th>Həftə Sonu Saatları</th>
                                            <th>Status</th>
                                            <th>Əməliyyatlar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo e($businessHour->id); ?></td>
                                            <td><?php echo e($businessHour->weekday_hours ?? 'Təyin edilməyib'); ?></td>
                                            <td><?php echo e($businessHour->weekend_hours ?? 'Təyin edilməyib'); ?></td>
                                            <td>
                                                <form action="<?php echo e(route('admin.business-hours.toggle-status', $businessHour->id)); ?>" method="POST" class="d-inline-block">
                                                    <?php echo csrf_field(); ?>
                                                    <button type="submit" class="btn btn-sm btn-<?php echo e($businessHour->is_active ? 'success' : 'danger'); ?>">
                                                        <?php echo e($businessHour->is_active ? 'Aktiv' : 'Deaktiv'); ?>

                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <a href="<?php echo e(route('admin.business-hours.edit', $businessHour->id)); ?>" class="btn btn-primary btn-sm"><i class="bx bx-edit"></i> Redaktə Et</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-info text-center" role="alert">
                                Hələ ki, heç bir iş saatı qeydi əlavə edilməyib. Yuxarıdakı düymədən yeni iş saatları əlavə edə bilərsiniz.
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container-fluid -->
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ModernLeasing\resources\views/back/pages/business-hour/index.blade.php ENDPATH**/ ?>