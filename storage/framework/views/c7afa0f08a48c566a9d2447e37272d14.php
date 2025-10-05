
<?php $__env->startSection('title', 'Sosial Media Redaktə'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Sosial Media Redaktə</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?php echo e(route('back.pages.socialfooter.update', $socialfooter->id)); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label" for="image">Şəkil (Loqo)</label>
                                        <input type="file" class="form-control <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="image" name="image" accept="image/*">
                                        <?php $__errorArgs = ['image'];
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
                                        
                                        <?php if($socialfooter->image): ?>
                                            <div class="mt-2 d-flex align-items-center">
                                                <img src="<?php echo e(asset('uploads/socialfooters/' . $socialfooter->image)); ?>" alt="Cari Şəkil" style="max-height: 80px; border: 1px solid #ddd; padding: 5px; border-radius: 5px; margin-right: 10px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="clear_image" name="clear_image" value="1">
                                                    <label class="form-check-label" for="clear_image">Şəkli Sil</label>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <div class="mt-2" id="image-preview" style="display: none;">
                                            <img src="#" alt="Yeni Şəkil Önizləmə" style="max-height: 80px; border: 1px solid #ddd; padding: 5px; border-radius: 5px;">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label" for="icon_class">İkon Class (Şəkil yoxdursa)</label>
                                        <input type="text" class="form-control <?php $__errorArgs = ['icon_class'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="icon_class" name="icon_class" value="<?php echo e(old('icon_class', $socialfooter->icon_class)); ?>" placeholder="Məsələn: fab fa-facebook">
                                        <?php $__errorArgs = ['icon_class'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        <div class="form-text">FontAwesome və ya digər ikon kitabxanalarından ikon class daxil edin.</div>
                                        <?php if($socialfooter->icon_class): ?>
                                            <div class="mt-2" style="font-size: 2rem;"><i class="<?php echo e($socialfooter->icon_class); ?>"></i></div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label" for="link">Link</label>
                                        <input type="url" class="form-control <?php $__errorArgs = ['link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="link" name="link" value="<?php echo e(old('link', $socialfooter->link)); ?>" required>
                                        <?php $__errorArgs = ['link'];
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

                                    <div class="col-md-6">
                                        <label class="form-label" for="order">Sıra</label>
                                        <input type="number" class="form-control <?php $__errorArgs = ['order'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="order" name="order" value="<?php echo e(old('order', $socialfooter->order)); ?>" min="0" required>
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
                                        <div class="form-text">Elementin göstərilmə sırası. 0 olarsa, avtomatik təyin ediləcək.</div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" <?php echo e(old('is_active', $socialfooter->is_active) ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="is_active">Aktiv</label>
                                        </div>
                                        <div class="form-text">Sosial media linkini saytda göstər.</div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Yadda saxla</button>
                                        <a href="<?php echo e(route('back.pages.socialfooter.index')); ?>" class="btn btn-secondary">Geri qayıt</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $__env->startPush('script'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const imageInput = document.getElementById('image');
            const iconClassInput = document.getElementById('icon_class');
            const imagePreview = document.querySelector('#image-preview img');
            const imagePreviewDiv = document.getElementById('image-preview');
            const clearImageCheckbox = document.getElementById('clear_image');

            function updateInputVisibility() {
                const hasImage = imageInput.files.length > 0 || (imagePreviewDiv.previousElementSibling && !clearImageCheckbox.checked);
                
                if (hasImage) {
                    iconClassInput.value = '';
                    iconClassInput.setAttribute('disabled', 'disabled');
                } else {
                    iconClassInput.removeAttribute('disabled');
                }

                if (iconClassInput.value.trim() !== '') {
                    imageInput.value = '';
                    imageInput.setAttribute('disabled', 'disabled');
                    imagePreviewDiv.style.display = 'none';
                    if (clearImageCheckbox) clearImageCheckbox.checked = false;
                } else {
                    imageInput.removeAttribute('disabled');
                    if (!hasImage && !clearImageCheckbox.checked) {
                        imagePreviewDiv.style.display = 'none';
                    } else if (hasImage) {
                        imagePreviewDiv.style.display = 'block';
                    }
                }
            }

            imageInput.addEventListener('change', function(event) {
                if (event.target.files && event.target.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        imagePreview.src = e.target.result;
                        imagePreviewDiv.style.display = 'block';
                    };
                    reader.readAsDataURL(event.target.files[0]);
                    if (clearImageCheckbox) clearImageCheckbox.checked = false;
                } else {
                    if (!clearImageCheckbox || clearImageCheckbox.checked) {
                        imagePreviewDiv.style.display = 'none';
                    }
                }
                updateInputVisibility();
            });

            iconClassInput.addEventListener('input', updateInputVisibility);
            if (clearImageCheckbox) {
                clearImageCheckbox.addEventListener('change', function() {
                    if (this.checked) {
                        imageInput.value = '';
                        imagePreviewDiv.style.display = 'none';
                    }
                    updateInputVisibility();
                });
            }

            // Səhifə yüklənəndə ilkin vəziyyəti təyin et
            updateInputVisibility();
        });
    </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('back.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ModernLeasing\resources\views/back/admin/socialfooter/edit.blade.php ENDPATH**/ ?>