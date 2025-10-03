

<?php $__env->startSection('title', 'Hero Kartı Detalları - İdarə Paneli'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Hero Kartı Detalları</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.hero-features.index')); ?>">Hero Kartları</a></li>
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
                                <?php if($heroFeature->image): ?>
                                    <div class="avatar-sm">
                                        <img src="<?php echo e(asset('uploads/hero-features/' . $heroFeature->image)); ?>" 
                                             alt="<?php echo e($heroFeature->title); ?>" class="img-fluid rounded">
                                    </div>
                                <?php else: ?>
                                    <div class="avatar-sm">
                                        <div class="avatar-title rounded-circle bg-light text-secondary">
                                            <i class="bx bx-image font-size-18"></i>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="card-title mb-1"><?php echo e($heroFeature->title); ?></h5>
                                <p class="text-muted mb-0">Hero Kartı ID: #<?php echo e($heroFeature->id); ?></p>
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
                                <h6 class="font-size-15 mb-3">Başlıq</h6>
                                <p class="text-muted"><?php echo e($heroFeature->title); ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <h6 class="font-size-15 mb-3">Açıqlama</h6>
                                <p class="text-muted"><?php echo e($heroFeature->description); ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <h6 class="font-size-15 mb-3">Şəkil</h6>
                                <?php if($heroFeature->image): ?>
                                    <div class="text-center">
                                        <img src="<?php echo e(asset('uploads/hero-features/' . $heroFeature->image)); ?>" 
                                             alt="<?php echo e($heroFeature->title); ?>" class="img-fluid rounded" 
                                             style="max-width: 150px; max-height: 150px;">
                                        <p class="text-muted mt-2"><small>Şəkil</small></p>
                                    </div>
                                <?php else: ?>
                                    <p class="text-muted">Heç bir şəkil təyin edilməyib</p>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6 mb-4">
                                <h6 class="font-size-15 mb-3">Sıralama</h6>
                                <span class="badge badge-soft-info font-size-14"><?php echo e($heroFeature->order); ?></span>
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
                            <a href="<?php echo e(route('admin.hero-features.edit', $heroFeature->id)); ?>" class="btn btn-primary waves-effect waves-light">
                                <i class="mdi mdi-pencil me-1"></i> Redaktə Et
                            </a>
                            
                            <button type="button" class="btn btn-danger waves-effect waves-light" 
                                    onclick="deleteFeature(<?php echo e($heroFeature->id); ?>)">
                                <i class="mdi mdi-trash-can me-1"></i> Sil
                            </button>
                            
                            <a href="<?php echo e(route('admin.hero-features.index')); ?>" class="btn btn-secondary waves-effect">
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
                                        <td><?php echo e($heroFeature->created_at->format('d.m.Y H:i')); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Son Yeniləmə:</th>
                                        <td><?php echo e($heroFeature->updated_at->format('d.m.Y H:i')); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">ID:</th>
                                        <td>#<?php echo e($heroFeature->id); ?></td>
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

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Hero Kartı Sil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Bu hero kartını silmək istədiyinizə əminsiniz? Bu əməliyyat geri qaytarıla bilməz.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İmtina</button>
                <form id="deleteForm" method="POST" style="display: inline-block;">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-danger">Sil</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    function deleteFeature(id) {
        // Delete form action-unu güncelle
        const form = document.getElementById('deleteForm');
        form.action = `<?php echo e(route('admin.hero-features.index')); ?>/${id}`;
        
        // Modal-ı göster
        const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
        modal.show();
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ModernLeasing\resources\views/back/pages/hero-features/show.blade.php ENDPATH**/ ?>