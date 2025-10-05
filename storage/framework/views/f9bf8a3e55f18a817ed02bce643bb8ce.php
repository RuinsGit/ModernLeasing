

<?php $__env->startSection('title', 'İnvestor Əlaqə Bölməsi - İdarə Paneli'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">İnvestor Əlaqə Bölməsi Məlumatları</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active">İnvestor Əlaqə Bölməsi</li>
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
                                <h4 class="card-title">İnvestor Əlaqə Bölməsi Detalları</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2">
                                    <?php if($sectionData): ?>
                                    <a href="<?php echo e(route('admin.investor-contact-section.edit', $sectionData->id)); ?>" class="btn btn-primary">
                                        <i class="mdi mdi-pencil me-1"></i> Redaktə Et
                                    </a>
                                    <?php else: ?>
                                    <a href="<?php echo e(route('admin.investor-contact-section.create')); ?>" class="btn btn-success">
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

                        <?php if($sectionData): ?>
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <tbody>
                                    <tr>
                                        <th scope="row" style="width: 250px;">Başlıq</th>
                                        <td><?php echo e($sectionData->title); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Alt Başlıq</th>
                                        <td><?php echo e($sectionData->subtitle); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">1-ci Düymə Mətni</th>
                                        <td><?php echo e($sectionData->button1_text); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">1-ci Düymə Linki</th>
                                        <td><a href="<?php echo e($sectionData->button1_link); ?>" target="_blank"><?php echo e($sectionData->button1_link); ?></a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2-ci Düymə Mətni</th>
                                        <td><?php echo e($sectionData->button2_text); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2-ci Düymə Linki</th>
                                        <td><a href="<?php echo e($sectionData->button2_link); ?>" target="_blank"><?php echo e($sectionData->button2_link); ?></a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Əlaqə Email</th>
                                        <td><?php echo e($sectionData->email); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Status</th>
                                        <td>
                                            <span class="badge bg-<?php echo e($sectionData->is_active ? 'success' : 'danger'); ?> font-size-12">
                                                <?php echo e($sectionData->is_active ? 'Aktiv' : 'Deaktiv'); ?>

                                            </span>
                                            <form action="<?php echo e(route('admin.investor-contact-section.toggle-status', $sectionData->id)); ?>" method="POST" class="d-inline-block ms-2">
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" class="btn btn-sm btn-outline-secondary">
                                                    <?php echo e($sectionData->is_active ? 'Deaktiv Et' : 'Aktiv Et'); ?>

                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Yaradılma Tarixi</th>
                                        <td><?php echo e($sectionData->created_at->format('d M, Y H:i')); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Son Yenilənmə</th>
                                        <td><?php echo e($sectionData->updated_at->format('d M, Y H:i')); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <?php else: ?>
                        <div class="alert alert-info text-center" role="alert">
                            Hələ ki heç bir investor əlaqə bölməsi məlumatı əlavə edilməyib. Yuxarıdakı düymədən yeni məlumat əlavə edə bilərsiniz.
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
    document.addEventListener('DOMContentLoaded', function() {
        <?php if(session('success') || session('error') || session('info')): ?>
            // SweetAlert2 mesajları əvvəlcədən daxil edildiyi üçün burada təkrar etmirik
        <?php endif; ?>
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('back.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ModernLeasing\resources\views/back/pages/investor-contact-section/index.blade.php ENDPATH**/ ?>