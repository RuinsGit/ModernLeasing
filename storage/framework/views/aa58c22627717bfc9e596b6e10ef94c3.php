

<?php $__env->startSection('title', 'Əlaqə Məlumatlarını Redaktə Et - İdarə Paneli'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Əlaqə Məlumatlarını Redaktə Et</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.contact-info.index')); ?>">Əlaqə Məlumatları</a></li>
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
                        <h4 class="card-title">Əlaqə Məlumatlarını Redaktə Et</h4>
                        <p class="card-title-desc">Saytın əlaqə məlumatlarını yeniləyin (footer və əlaqə səhifəsi üçün)</p>
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

                        <form action="<?php echo e(route('admin.contact-info.update', $contactInfo->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <!-- Ünvan -->
                                    <div class="mb-4">
                                        <label for="address" class="form-label">Ünvan</label>
                                        <input type="text" class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                               id="address" name="address" value="<?php echo e(old('address', $contactInfo->address)); ?>" 
                                               placeholder="Məsələn: 28 May küç. 123, Bakı, Azərbaycan AZ1000">
                                        <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <!-- Telefon 1 -->
                                    <div class="mb-4">
                                        <label for="phone1" class="form-label">Telefon 1</label>
                                        <input type="text" class="form-control <?php $__errorArgs = ['phone1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                               id="phone1" name="phone1" value="<?php echo e(old('phone1', $contactInfo->phone1)); ?>" 
                                               placeholder="Məsələn: +994 12 345 67 89">
                                        <?php $__errorArgs = ['phone1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <!-- Telefon 2 -->
                                    <div class="mb-4">
                                        <label for="phone2" class="form-label">Telefon 2</label>
                                        <input type="text" class="form-control <?php $__errorArgs = ['phone2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                               id="phone2" name="phone2" value="<?php echo e(old('phone2', $contactInfo->phone2)); ?>" 
                                               placeholder="Məsələn: +994 50 345 67 89 (Opsional)">
                                        <?php $__errorArgs = ['phone2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <!-- E-poçt 1 -->
                                    <div class="mb-4">
                                        <label for="email1" class="form-label">E-poçt 1</label>
                                        <input type="email" class="form-control <?php $__errorArgs = ['email1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                               id="email1" name="email1" value="<?php echo e(old('email1', $contactInfo->email1)); ?>" 
                                               placeholder="Məsələn: info@domain.com">
                                        <?php $__errorArgs = ['email1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <!-- E-poçt 2 -->
                                    <div class="mb-4">
                                        <label for="email2" class="form-label">E-poçt 2</label>
                                        <input type="email" class="form-control <?php $__errorArgs = ['email2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                               id="email2" name="email2" value="<?php echo e(old('email2', $contactInfo->email2)); ?>" 
                                               placeholder="Məsələn: support@domain.com (Opsional)">
                                        <?php $__errorArgs = ['email2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <!-- İş Saatları (Həftəiçi) -->
                                    <div class="mb-4">
                                        <label for="working_hours_weekdays" class="form-label">İş Saatları (Həftəiçi)</label>
                                        <textarea class="form-control <?php $__errorArgs = ['working_hours_weekdays'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                  id="working_hours_weekdays" name="working_hours_weekdays" rows="2" 
                                                  placeholder="Məsələn: Bazar ertəsi - Cümə: 09:00 - 18:00"><?php echo e(old('working_hours_weekdays', $contactInfo->working_hours_weekdays)); ?></textarea>
                                        <?php $__errorArgs = ['working_hours_weekdays'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <!-- İş Saatları (Həftəsonu) -->
                                    <div class="mb-4">
                                        <label for="working_hours_weekends" class="form-label">İş Saatları (Həftəsonu)</label>
                                        <textarea class="form-control <?php $__errorArgs = ['working_hours_weekends'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                  id="working_hours_weekends" name="working_hours_weekends" rows="2" 
                                                  placeholder="Məsələn: Şənbə: 09:00 - 14:00, Bazar: Bağlı"><?php echo e(old('working_hours_weekends', $contactInfo->working_hours_weekends)); ?></textarea>
                                        <?php $__errorArgs = ['working_hours_weekends'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <!-- Xəritə (Iframe) -->
                                    <div class="mb-4">
                                        <label for="map_iframe" class="form-label">Google Xəritə Iframe Kodu</label>
                                        <textarea class="form-control <?php $__errorArgs = ['map_iframe'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                  id="map_iframe" name="map_iframe" rows="5" 
                                                  placeholder="Google Xəritədən əldə etdiyiniz iframe kodunu bura yapışdırın."><?php echo e(old('map_iframe', $contactInfo->map_iframe)); ?></textarea>
                                        <?php $__errorArgs = ['map_iframe'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        <div class="form-text">Google Maps-dən "Embed a map" seçimi ilə əldə etdiyiniz iframe kodunu daxil edin.</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" 
                                           <?php echo e(old('is_active', $contactInfo->is_active) ? 'checked' : ''); ?>>
                                    <label class="form-check-label" for="is_active">
                                        Aktiv Əlaqə Məlumatları
                                    </label>
                                </div>
                                <div class="form-text">Bu məlumatları saytda göstər</div>
                            </div>

                            <!-- Düymələr -->
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bx bx-save me-2"></i> Əlaqə Məlumatlarını Yenilə
                                </button>
                                <a href="<?php echo e(route('admin.contact-info.index')); ?>" class="btn btn-secondary">
                                    <i class="bx bx-x me-2"></i> İmtina Et
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

<?php echo $__env->make('back.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ModernLeasing\resources\views/back/pages/contact-info/edit.blade.php ENDPATH**/ ?>