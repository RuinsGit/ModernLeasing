

<?php $__env->startSection('title', 'Şirkət Tarixi Elementləri - İdarə Paneli'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Şirkət Tarixi Elementləri</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Ana Səhifə</a></li>
                            <li class="breadcrumb-item active">Şirkət Tarixi</li>
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
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h4 class="card-title">Şirkət Tarixi Elementləri</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2">
                                    <a href="<?php echo e(route('admin.company-history-items.create')); ?>" class="btn btn-primary">
                                        <i class="bx bx-plus me-1"></i> Yeni Element Əlavə Et
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        <?php if(session('success')): ?>
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    Swal.fire({
                                        position: "center",
                                        icon: "success",
                                        title: "<?php echo e(session('success')); ?>",
                                        showConfirmButton: true,
                                        confirmButtonText: 'Tamam',
                                        timer: 1500
                                    });
                                });
                            </script>
                        <?php endif; ?>

                        <?php if(session('error')): ?>
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    Swal.fire({
                                        position: "center",
                                        icon: "error",
                                        title: "<?php echo e(session('error')); ?>",
                                        showConfirmButton: true,
                                        confirmButtonText: 'Tamam',
                                        timer: 1500
                                    });
                                });
                            </script>
                        <?php endif; ?>

                        <?php if(session('info')): ?>
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    Swal.fire({
                                        position: "center",
                                        icon: "info",
                                        title: "<?php echo e(session('info')); ?>",
                                        showConfirmButton: true,
                                        confirmButtonText: 'Tamam',
                                        timer: 2500
                                    });
                                });
                            </script>
                        <?php endif; ?>

                        <?php if($historyItems->count() > 0): ?>
                            <div class="table-responsive">
                                <table class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>İl</th>
                                            <th>Başlıq</th>
                                            <th>İkon</th>
                                            <th>Sıra</th>
                                            <th>Status</th>
                                            <th>Əməliyyatlar</th>
                                        </tr>
                                    </thead>
                                    <tbody class="sortable" data-url="<?php echo e(route('admin.company-history-items.order')); ?>"> 
                                        <?php $__currentLoopData = $historyItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr id="order-<?php echo e($item->id); ?>">
                                                <td><?php echo e($item->id); ?></td>
                                                <td><?php echo e($item->year); ?></td>
                                                <td><?php echo e($item->title); ?></td>
                                                <td><i class="<?php echo e($item->icon_class); ?>"></i></td>
                                                <td><?php echo e($item->order); ?></td>
                                                <td>
                                                    <form action="<?php echo e(route('admin.company-history-items.toggle-status', $item->id)); ?>" method="POST" class="d-inline-block">
                                                        <?php echo csrf_field(); ?>
                                                        <button type="submit" class="btn btn-sm btn-<?php echo e($item->is_active ? 'success' : 'danger'); ?>">
                                                            <?php echo e($item->is_active ? 'Aktiv' : 'Deaktiv'); ?>

                                                        </button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <a href="<?php echo e(route('admin.company-history-items.show', $item->id)); ?>" class="btn btn-info btn-sm"><i class="bx bx-show"></i></a>
                                                    <a href="<?php echo e(route('admin.company-history-items.edit', $item->id)); ?>" class="btn btn-primary btn-sm"><i class="bx bx-edit"></i></a>
                                                    <form id="delete-form-<?php echo e($item->id); ?>" action="<?php echo e(route('admin.company-history-items.destroy', $item->id)); ?>" method="POST" class="d-inline-block">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteData(<?php echo e($item->id); ?>)">
                                                            <i class="bx bx-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-info text-center" role="alert">
                                Hələ ki heç bir şirkət tarixi elementi əlavə edilməyib. Yuxarıdakı düymədən yeni element əlavə edə bilərsiniz.
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container-fluid -->
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script>
    // Global deleteData function (mümkünsə bunu master layout'a köçürün)
    window.deleteData = function(id) {
        Swal.fire({
            title: 'Silmək istədiyinizdən əminsiniz?',
            text: "Bu əməliyyat geri alına bilməz!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Bəli, sil!',
            cancelButtonText: 'Xeyr'
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.getElementById('delete-form-' + id);
                if (form) {
                    form.submit();
                } else {
                    console.error('Form not found for ID:', id);
                }
            }
        });
    };
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('back.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ModernLeasing\resources\views/back/pages/company-history-items/index.blade.php ENDPATH**/ ?>