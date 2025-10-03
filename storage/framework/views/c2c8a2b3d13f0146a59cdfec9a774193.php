

<?php $__env->startSection('title', 'Logo Redaktə Et - İdarə Paneli'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Logo Redaktə Et</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.site-logo.index')); ?>">Logo İdarəetməsi</a></li>
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
                        <h4 class="card-title">Logo Redaktə Et</h4>
                        <p class="card-title-desc">Sayt logosu və adını yeniləyin</p>
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

                        <form action="<?php echo e(route('admin.site-logo.update', $siteLogo->id)); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            
                            <!-- Sayt Adı -->
                            <div class="mb-4">
                                <label for="site_name" class="form-label">Sayt Adı <span class="text-danger">*</span></label>
                                <input type="text" class="form-control <?php $__errorArgs = ['site_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                       id="site_name" name="site_name" value="<?php echo e(old('site_name', $siteLogo->site_name)); ?>" 
                                       placeholder="Məsələn: MODERN LİZİNQ">
                                <?php $__errorArgs = ['site_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <div class="form-text">Bu ad navbar'da göstəriləcək</div>
                            </div>

                            <!-- Logo Şəkli -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="logo_image" class="form-label">Logo Şəkli</label>
                                        <input type="file" class="form-control <?php $__errorArgs = ['logo_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                               id="logo_image" name="logo_image" accept="image/*">
                                        <?php $__errorArgs = ['logo_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        <div class="form-text">PNG, JPG, SVG formatları qəbul edilir. Max: 2MB</div>
                                        
                                        <?php if($siteLogo->logo_image): ?>
                                            <div class="mt-3">
                                                <label class="form-label">Hazırki Logo:</label>
                                                <div class="current-logo">
                                                    <img src="<?php echo e($siteLogo->logo_url); ?>" 
                                                         alt="<?php echo e($siteLogo->site_name); ?>" 
                                                         style="max-height: 80px; max-width: 200px; object-fit: contain; border: 1px solid #dee2e6; border-radius: 4px; padding: 10px; background: #f8f9fa;">
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="favicon" class="form-label">Favicon</label>
                                        <input type="file" class="form-control <?php $__errorArgs = ['favicon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                               id="favicon" name="favicon" accept="image/*,.ico">
                                        <?php $__errorArgs = ['favicon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        <div class="form-text">ICO, PNG formatları qəbul edilir. Max: 1MB</div>
                                        
                                        <?php if($siteLogo->favicon): ?>
                                            <div class="mt-3">
                                                <label class="form-label">Hazırki Favicon:</label>
                                                <div class="current-favicon">
                                                    <img src="<?php echo e($siteLogo->favicon_url); ?>" 
                                                         alt="Favicon" 
                                                         style="width: 32px; height: 32px; object-fit: contain; border: 1px solid #dee2e6; border-radius: 4px; padding: 2px; background: #f8f9fa;">
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Parametrlər -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="show_text" name="show_text" 
                                                   <?php echo e(old('show_text', $siteLogo->show_text) ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="show_text">
                                                Logo Yazısını Göstər
                                            </label>
                                        </div>
                                        <div class="form-text">Navbar'da sayt adını mətn olaraq göstər</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" 
                                                   <?php echo e(old('is_active', $siteLogo->is_active) ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="is_active">
                                                Aktiv Logo
                                            </label>
                                        </div>
                                        <div class="form-text">Bu logoyu saytda istifadə et</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Önizləmə -->
                            <div class="mb-4">
                                <label class="form-label">Navbar Önizləməsi:</label>
                                <div class="preview-navbar" style="background: #f8f9fa; border: 1px solid #dee2e6; border-radius: 8px; padding: 20px;">
                                    <div class="d-flex align-items-center">
                                        <?php if($siteLogo->shouldShowLogo()): ?>
                                            <img src="<?php echo e($siteLogo->logo_url); ?>" 
                                                 alt="<?php echo e($siteLogo->site_name); ?>" 
                                                 style="height: 40px; margin-right: 10px; object-fit: contain;">
                                        <?php endif; ?>
                                        <?php if($siteLogo->shouldShowText()): ?>
                                            <span style="font-weight: 600; font-size: 1.2rem; color: #333;"><?php echo e($siteLogo->site_name); ?></span>
                                        <?php endif; ?>
                                        <?php if(!$siteLogo->shouldShowLogo() && !$siteLogo->shouldShowText()): ?>
                                            <span style="color: #6c757d; font-style: italic;">Logo və ya mətn seçin</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Düymələr -->
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bx bx-save me-2"></i> Yenilə
                                </button>
                                <a href="<?php echo e(route('admin.site-logo.index')); ?>" class="btn btn-secondary">
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

<?php $__env->startPush('script'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Logo və mətn checkbox'larını dinlə
        const showTextCheckbox = document.getElementById('show_text');
        const logoInput = document.getElementById('logo_image');
        const siteNameInput = document.getElementById('site_name');
        
        // Önizləməni yenilə
        function updatePreview() {
            const previewContainer = document.querySelector('.preview-navbar .d-flex');
            const showText = showTextCheckbox.checked;
            const siteName = siteNameInput.value || '<?php echo e($siteLogo->site_name); ?>';
            
            let previewHTML = '';
            
            // Logo göstər (hazırki logo)
            <?php if($siteLogo->shouldShowLogo()): ?>
                previewHTML += '<img src="<?php echo e($siteLogo->logo_url); ?>" alt="' + siteName + '" style="height: 40px; margin-right: 10px; object-fit: contain;">';
            <?php endif; ?>
            
            // Mətn göstər
            if (showText) {
                previewHTML += '<span style="font-weight: 600; font-size: 1.2rem; color: #333;">' + siteName + '</span>';
            }
            
            // Heç nə seçilməyibsə
            if (!previewHTML) {
                previewHTML = '<span style="color: #6c757d; font-style: italic;">Logo və ya mətn seçin</span>';
            }
            
            previewContainer.innerHTML = previewHTML;
        }
        
        // Event listener'lar
        showTextCheckbox.addEventListener('change', updatePreview);
        siteNameInput.addEventListener('input', updatePreview);
        
        // İlk yükləmədə önizləməni yenilə
        updatePreview();
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('back.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ModernLeasing\resources\views/back/pages/site-logo/edit.blade.php ENDPATH**/ ?>