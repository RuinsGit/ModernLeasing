

<?php $__env->startSection('title', 'İş Saatlarını Redaktə Et - İdarə Paneli'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">İş Saatlarını Redaktə Et</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.business-hours.index')); ?>">İş Saatları</a></li>
                            <li class="breadcrumb-item active">Redaktə Et</li>
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
                        <h4 class="card-title">İş Saatlarını Redaktə Et</h4>
                        <p class="card-title-desc">Mövcud iş saatlarını yeniləyin.</p>
                    </div>
                    <div class="card-body">
                        
                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <form action="<?php echo e(route('admin.business-hours.update', $businessHour->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            
                            <!-- Həftə İçi İş Saatları -->
                            <div class="mb-4">
                                <label for="weekday_hours" class="form-label">Həftə İçi İş Saatları</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['weekday_hours'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                       id="weekday_hours" name="weekday_hours" value="<?php echo e(old('weekday_hours', $businessHour->weekday_hours)); ?>" 
                                       placeholder="Məsələn: Bazar ertəsi - Cümə: 09:00 - 18:00">
                                <?php $__errorArgs = ['weekday_hours'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <div class="form-text">Həftə içi iş saatlarını daxil edin.</div>
                            </div>

                            <!-- Həftə Sonu İş Saatları -->
                            <div class="mb-4">
                                <label for="weekend_hours" class="form-label">Həftə Sonu İş Saatları</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['weekend_hours'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                       id="weekend_hours" name="weekend_hours" value="<?php echo e(old('weekend_hours', $businessHour->weekend_hours)); ?>" 
                                       placeholder="Məsələn: Şənbə: 09:00 - 14:00, Bazar: Bağlı">
                                <?php $__errorArgs = ['weekend_hours'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <div class="form-text">Həftə sonu iş saatlarını daxil edin.</div>
                            </div>

                            <!-- Status -->
                            <div class="mb-4">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" <?php echo e(old('is_active', $businessHour->is_active) ? 'checked' : ''); ?>>
                                    <label class="form-check-label" for="is_active">Aktiv</label>
                                </div>
                                <div class="form-text">Bu iş saatları qeydini aktiv et.</div>
                            </div>

                            <!-- Düymələr -->
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bx bx-save me-2"></i> Yenilə
                                </button>
                                <a href="<?php echo e(route('admin.business-hours.index')); ?>" class="btn btn-secondary">
                                    <i class="bx bx-x me-2"></i> Ləğv Et
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container-fluid -->
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ModernLeasing\resources\views/back/pages/business-hour/edit.blade.php ENDPATH**/ ?>