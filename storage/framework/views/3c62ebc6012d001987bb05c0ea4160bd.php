

<?php $__env->startSection('title', 'Tərəfdaşlıq Bölməsi - İdarə Paneli'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Tərəfdaşlıq Bölməsi Məlumatları</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tərəfdaşlıq Bölməsi</li>
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
                                <h4 class="card-title">Tərəfdaşlıq Bölməsi Detalları</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2">
                                    <?php if($partnershipSection): ?>
                                    <a href="<?php echo e(route('admin.partnership-section.edit', $partnershipSection->id)); ?>" class="btn btn-primary">
                                        <i class="mdi mdi-pencil me-1"></i> Redaktə Et
                                    </a>
                                    <?php else: ?>
                                    <a href="<?php echo e(route('admin.partnership-section.create')); ?>" class="btn btn-success">
                                        <i class="mdi mdi-plus me-1"></i> Yeni Yarat
                                    </a>
                                    <?php endif; ?>
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

                        <?php if($partnershipSection): ?>
                        <div class="table-responsive">
                            <table class="table table-bordered dt-responsive nowrap w-100">
                                <tbody>
                                    <tr>
                                        <th>Başlıq</th>
                                        <td><?php echo e($partnershipSection->title); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Alt Başlıq</th>
                                        <td><?php echo e($partnershipSection->subtitle); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Yaradılma Tarixi</th>
                                        <td><?php echo e($partnershipSection->created_at->format('d M, Y H:i')); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Son Yenilənmə</th>
                                        <td><?php echo e($partnershipSection->updated_at->format('d M, Y H:i')); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <?php else: ?>
                        <div class="alert alert-info text-center" role="alert">
                            Hələ ki heç bir tərəfdaşlıq bölməsi məlumatı əlavə edilməyib. Yuxarıdakı düymədən yeni məlumat əlavə edə bilərsiniz.
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container-fluid -->
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ModernLeasing\resources\views/back/pages/partnership-section/index.blade.php ENDPATH**/ ?>