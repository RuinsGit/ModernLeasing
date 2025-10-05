

<?php $__env->startSection('title', 'Tərəfdaşlıq Növünü Redaktə Et - İdarə Paneli'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Tərəfdaşlıq Növünü Redaktə Et</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.partnership-types.index')); ?>">Tərəfdaşlıq Növləri</a></li>
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
                        <h4 class="card-title">Tərəfdaşlıq Növünü Redaktə Et</h4>
                        <p class="card-title-desc">İnvestorlar səhifəsində göstəriləcək tərəfdaşlıq növünün məlumatlarını yeniləyin.</p>
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

                        <form action="<?php echo e(route('admin.partnership-types.update', $partnershipType->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <!-- Başlıq -->
                                    <div class="mb-4">
                                        <label for="title" class="form-label">Başlıq <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                               id="title" name="title" value="<?php echo e(old('title', $partnershipType->title)); ?>" 
                                               placeholder="Məsələn: Korporativ Tərəfdaş">
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
                                    
                                    <!-- İkon Class -->
                                    <div class="mb-4">
                                        <label for="icon_class" class="form-label">İkon Class</label>
                                        <input type="text" class="form-control <?php $__errorArgs = ['icon_class'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                               id="icon_class" name="icon_class" value="<?php echo e(old('icon_class', $partnershipType->icon_class)); ?>" 
                                               placeholder="Məsələn: fas fa-building">
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
                                        <div class="form-text">FontAwesome ikon classı daxil edin. Məsələn: `fas fa-building`</div>
                                        <div class="mt-2">
                                            <i id="icon-preview" class="<?php echo e($partnershipType->icon_class); ?> font-size-24 text-primary"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <!-- Sıra -->
                                    <div class="mb-4">
                                        <label for="order" class="form-label">Sıra</label>
                                        <input type="number" class="form-control <?php $__errorArgs = ['order'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                               id="order" name="order" value="<?php echo e(old('order', $partnershipType->order)); ?>" min="0">
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
                                        <div class="form-text">0 daxil etsəniz, avtomatik təyin ediləcək.</div>
                                    </div>
                                    
                                    <!-- Status -->
                                    <div class="mb-4">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" <?php echo e(old('is_active', $partnershipType->is_active) ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="is_active">Aktiv</label>
                                        </div>
                                        <div class="form-text">Bu tərəfdaşlıq növünü aktiv edin/deaktiv edin.</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Təsvir -->
                            <div class="mb-4">
                                <label for="description" class="form-label">Təsvir</label>
                                <textarea class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                          id="description" name="description" rows="3" 
                                          placeholder="Tərəfdaşlıq növü haqqında qısa təsvir yazın..."><?php echo e(old('description', $partnershipType->description)); ?></textarea>
                                <?php $__errorArgs = ['description'];
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

                            <!-- Faydalar -->
                            <div class="mb-4">
                                <label class="form-label d-block">Faydalar</label>
                                <div id="benefits-container">
                                    <?php
                                        $oldBenefits = old('benefits', $partnershipType->benefits);
                                    ?>
                                    <?php if(is_array($oldBenefits) && count($oldBenefits) > 0): ?>
                                        <?php $__currentLoopData = $oldBenefits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $benefit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="input-group mb-2">
                                                <input type="text" class="form-control" name="benefits[]" value="<?php echo e($benefit); ?>" placeholder="Fayda mətni">
                                                <button type="button" class="btn btn-danger remove-benefit"><i class="bx bx-minus"></i></button>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" name="benefits[]" placeholder="Fayda mətni">
                                            <button type="button" class="btn btn-danger remove-benefit"><i class="bx bx-minus"></i></button>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <button type="button" id="add-benefit" class="btn btn-success btn-sm"><i class="mdi mdi-plus me-1"></i> Fayda Əlavə Et</button>
                            </div>
                            
                            <!-- Düymələr -->
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bx bx-save me-2"></i> Tərəfdaşlıq Növünü Yenilə
                                </button>
                                <a href="<?php echo e(route('admin.partnership-types.index')); ?>" class="btn btn-secondary">
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
        const iconClassInput = document.getElementById('icon_class');
        const iconPreview = document.getElementById('icon-preview');
        const benefitsContainer = document.getElementById('benefits-container');
        const addBenefitButton = document.getElementById('add-benefit');

        function updateIconPreview() {
            const iconClass = iconClassInput.value.trim();
            if (iconClass) {
                iconPreview.className = iconClass + ' font-size-24 text-primary';
            } else {
                iconPreview.className = 'fas fa-question-circle font-size-24 text-primary'; // Default icon
            }
        }

        iconClassInput.addEventListener('input', updateIconPreview);
        updateIconPreview(); // Initial update

        addBenefitButton.addEventListener('click', function() {
            const newBenefitInputGroup = document.createElement('div');
            newBenefitInputGroup.className = 'input-group mb-2';
            newBenefitInputGroup.innerHTML = `
                <input type="text" class="form-control" name="benefits[]" placeholder="Fayda mətni">
                <button type="button" class="btn btn-danger remove-benefit"><i class="mdi mdi-minus"></i></button>
            `;
            benefitsContainer.appendChild(newBenefitInputGroup);
        });

        benefitsContainer.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-benefit') || e.target.closest('.remove-benefit')) {
                let button = e.target.classList.contains('remove-benefit') ? e.target : e.target.closest('.remove-benefit');
                button.closest('.input-group').remove();
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('back.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ModernLeasing\resources\views/back/pages/partnership-type/edit.blade.php ENDPATH**/ ?>