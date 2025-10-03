

<?php $__env->startSection('title', 'Hero Section Detalları - İdarə Paneli'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Hero Section Detalları</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.hero.index')); ?>">Hero Section</a></li>
                            <li class="breadcrumb-item active">Detallar</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar-sm">
                                    <div class="avatar-title rounded-circle bg-light text-primary">
                                        <i class="mdi mdi-home font-size-18"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="card-title mb-1"><?php echo e($hero->title); ?></h5>
                                <p class="text-muted mb-0">Hero Section ID: #<?php echo e($hero->id); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        <?php if(session('success')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo e(session('success')); ?>

                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <h6 class="font-size-15 mb-3">Ana Başlıq</h6>
                                <p class="text-muted"><?php echo e($hero->title); ?></p>
                            </div>
                        </div>

                        <?php if($hero->subtitle): ?>
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <h6 class="font-size-15 mb-3">Alt Başlıq</h6>
                                    <p class="text-muted"><?php echo e($hero->subtitle); ?></p>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <h6 class="font-size-15 mb-3">Əsas Düymə</h6>
                                <p class="text-muted mb-1"><strong>Mətn:</strong> <?php echo e($hero->primary_button_text); ?></p>
                                <p class="text-muted"><strong>Link:</strong> <?php echo e($hero->primary_button_link); ?></p>
                            </div>
                            <div class="col-md-6 mb-4">
                                <h6 class="font-size-15 mb-3">İkinci Düymə</h6>
                                <p class="text-muted mb-1"><strong>Mətn:</strong> <?php echo e($hero->secondary_button_text); ?></p>
                                <p class="text-muted"><strong>Link:</strong> <?php echo e($hero->secondary_button_link); ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <h6 class="font-size-15 mb-3">İstatistik Məlumatları</h6>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <div class="card border border-primary">
                                    <div class="card-body text-center">
                                        <div class="avatar-sm mx-auto mb-3">
                                            <span class="avatar-title rounded-circle bg-primary font-size-16">
                                                <i class="mdi mdi-account-group"></i>
                                            </span>
                                        </div>
                                        <h5 class="font-size-15"><?php echo e(number_format($hero->happy_customers)); ?></h5>
                                        <p class="text-muted mb-0">Məmnun Müştəri</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="card border border-success">
                                    <div class="card-body text-center">
                                        <div class="avatar-sm mx-auto mb-3">
                                            <span class="avatar-title rounded-circle bg-success font-size-16">
                                                <i class="mdi mdi-truck"></i>
                                            </span>
                                        </div>
                                        <h5 class="font-size-15"><?php echo e(number_format($hero->delivered_equipment)); ?></h5>
                                        <p class="text-muted mb-0">Təhvil Verilən Texnika</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="card border border-info">
                                    <div class="card-body text-center">
                                        <div class="avatar-sm mx-auto mb-3">
                                            <span class="avatar-title rounded-circle bg-info font-size-16">
                                                <i class="mdi mdi-earth"></i>
                                            </span>
                                        </div>
                                        <h5 class="font-size-15"><?php echo e(number_format($hero->international_partners)); ?></h5>
                                        <p class="text-muted mb-0">Beynəlxalq Tərəfdaş</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="card border border-warning">
                                    <div class="card-body text-center">
                                        <div class="avatar-sm mx-auto mb-3">
                                            <span class="avatar-title rounded-circle bg-warning font-size-16">
                                                <i class="mdi mdi-calendar-clock"></i>
                                            </span>
                                        </div>
                                        <h5 class="font-size-15"><?php echo e(number_format($hero->years_experience)); ?></h5>
                                        <p class="text-muted mb-0">İl Təcrübə</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Əməliyyatlar</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <a href="<?php echo e(route('admin.hero.edit', $hero->id)); ?>" class="btn btn-primary waves-effect waves-light">
                                <i class="mdi mdi-pencil me-1"></i> Redaktə Et
                            </a>
                            
                            <a href="<?php echo e(route('admin.hero.index')); ?>" class="btn btn-secondary waves-effect">
                                <i class="mdi mdi-arrow-left me-1"></i> Geri Qayıt
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Məlumat</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-nowrap mb-0">
                                <tbody>
                                    <tr>
                                        <th scope="row">Yaradılma Tarixi:</th>
                                        <td><?php echo e($hero->created_at->format('d.m.Y H:i')); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Son Yeniləmə:</th>
                                        <td><?php echo e($hero->updated_at->format('d.m.Y H:i')); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">ID:</th>
                                        <td>#<?php echo e($hero->id); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container-fluid -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('back.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ModernLeasing\resources\views/back/pages/hero/show.blade.php ENDPATH**/ ?>