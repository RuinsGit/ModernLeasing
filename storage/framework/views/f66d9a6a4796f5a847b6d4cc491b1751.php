

<?php $__env->startSection('title', 'Navbar Menyu Redaktə Et - İdarə Paneli'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Navbar Menyu Redaktə Et</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.navbar.index')); ?>">Navbar Menyu</a></li>
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
                        <h4 class="card-title">Navbar Menyu Redaktə Et</h4>
                        <p class="card-title-desc">Navbar'da göstəriləcək menyu elementini yeniləyin</p>
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

                        <form action="<?php echo e(route('admin.navbar.update', $navbar->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            
                            <!-- Başlıq -->
                            <div class="mb-3">
                                <label for="title" class="form-label">Menyu Başlığı <span class="text-danger">*</span></label>
                                <input type="text" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                       id="title" name="title" value="<?php echo e(old('title', $navbar->title)); ?>" 
                                       placeholder="Məsələn: Ana Səhifə, Haqqımızda">
                                <?php $__errorArgs = ['title'];
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

                            <!-- Route və ya URL -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="route_name" class="form-label">Laravel Route Adı</label>
                                        <input type="text" class="form-control <?php $__errorArgs = ['route_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                               id="route_name" name="route_name" value="<?php echo e(old('route_name', $navbar->route_name)); ?>" 
                                               placeholder="Məsələn: front.index, front.about">
                                        <?php $__errorArgs = ['route_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        <div class="form-text">Laravel route adı (tövsiyə edilir)</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="url" class="form-label">Direkt URL</label>
                                        <input type="text" class="form-control <?php $__errorArgs = ['url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                               id="url" name="url" value="<?php echo e(old('url', $navbar->url_raw ?? '')); ?>" 
                                               placeholder="Məsələn: https://example.com">
                                        <?php $__errorArgs = ['url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        <div class="form-text">Route yoxdursa istifadə edin</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Icon və Sıra -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="icon" class="form-label">FontAwesome Icon</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control <?php $__errorArgs = ['icon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                   id="icon" name="icon" value="<?php echo e(old('icon', $navbar->icon)); ?>" 
                                                   placeholder="Məsələn: fas fa-home, fas fa-info-circle">
                                            <div class="input-group-text">
                                                <?php if($navbar->icon): ?>
                                                    <i class="<?php echo e($navbar->icon); ?>"></i>
                                                <?php else: ?>
                                                    <i class="fas fa-circle"></i>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <?php $__errorArgs = ['icon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        <div class="form-text">
                                            Mobil navbar üçün icon. 
                                            <a href="https://fontawesome.com/icons" target="_blank">FontAwesome iconları</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="order" class="form-label">Sıralama <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control <?php $__errorArgs = ['order'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                               id="order" name="order" value="<?php echo e(old('order', $navbar->order)); ?>" min="0"
                                               placeholder="0">
                                        <?php $__errorArgs = ['order'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        <div class="form-text">Menyu elementlərinin göstərilmə sırası</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Checkbox'lar -->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" 
                                                   <?php echo e(old('is_active', $navbar->is_active) ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="is_active">
                                                Aktiv
                                            </label>
                                        </div>
                                        <div class="form-text">Menyu elementini aktiv et</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="show_desktop" name="show_desktop" 
                                                   <?php echo e(old('show_desktop', $navbar->show_desktop) ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="show_desktop">
                                                Desktop'da Göstər
                                            </label>
                                        </div>
                                        <div class="form-text">Desktop navbar'da göstər</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="show_mobile" name="show_mobile" 
                                                   <?php echo e(old('show_mobile', $navbar->show_mobile) ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="show_mobile">
                                                Mobil'də Göstər
                                            </label>
                                        </div>
                                        <div class="form-text">Mobil navbar'da göstər</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Düymələr -->
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bx bx-save me-2"></i> Yenilə
                                </button>
                                <a href="<?php echo e(route('admin.navbar.index')); ?>" class="btn btn-secondary">
                                    <i class="bx bx-x me-2"></i> İmtina Et
                                </a>
                                <a href="<?php echo e(route('admin.navbar.show', $navbar->id)); ?>" class="btn btn-info">
                                    <i class="bx bx-show me-2"></i> Bax
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

<?php $__env->startPush('script'); ?>
<script>
    // Icon preview update
    document.getElementById('icon').addEventListener('input', function() {
        const iconPreview = document.querySelector('.input-group-text i');
        const iconValue = this.value.trim();
        
        if (iconValue) {
            iconPreview.className = iconValue;
        } else {
            iconPreview.className = 'fas fa-circle';
        }
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('back.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ModernLeasing\resources\views/back/pages/navbar/edit.blade.php ENDPATH**/ ?>