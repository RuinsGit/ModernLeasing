

<?php $__env->startSection('title', 'Komanda Üzvləri - İdarə Paneli'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Komanda Üzvləri</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active">Komanda Üzvləri</li>
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
                        <div class="d-flex align-items-center justify-content-between">
                            <h4 class="card-title">Komanda Üzvləri Siyahısı</h4>
                            <a href="<?php echo e(route('admin.team-members.create')); ?>" class="btn btn-primary">
                                <i class="bx bx-plus me-1"></i> Yeni Üzv Əlavə Et
                            </a>
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

                        <?php if($teamMembers->count() > 0): ?>
                            <div class="table-responsive">
                                <table class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Şəkil</th>
                                            <th>Ad</th>
                                            <th>Vəzifə</th>
                                            <th>Sıra</th>
                                            <th>Status</th>
                                            <th>Əməliyyatlar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $teamMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($member->id); ?></td>
                                                <td>
                                                    <?php if($member->image): ?>
                                                        <img src="<?php echo e($member->image_url); ?>" alt="<?php echo e($member->name); ?>" class="rounded-circle avatar-sm">
                                                    <?php else: ?>
                                                        <i class="bx bx-user avatar-sm d-flex align-items-center justify-content-center text-secondary" style="font-size: 20px;"></i>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo e($member->name); ?></td>
                                                <td><?php echo e($member->position); ?></td>
                                                <td><?php echo e($member->order); ?></td>
                                                <td>
                                                    <form action="<?php echo e(route('admin.team-members.toggle-status', $member->id)); ?>" method="POST" class="d-inline-block">
                                                        <?php echo csrf_field(); ?>
                                                        <button type="submit" class="btn btn-sm btn-<?php echo e($member->is_active ? 'success' : 'danger'); ?>">
                                                            <?php echo e($member->is_active ? 'Aktiv' : 'Deaktiv'); ?>

                                                        </button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <a href="<?php echo e(route('admin.team-members.show', $member->id)); ?>" class="btn btn-info btn-sm"><i class="bx bx-show"></i></a>
                                                    <a href="<?php echo e(route('admin.team-members.edit', $member->id)); ?>" class="btn btn-primary btn-sm"><i class="bx bx-edit"></i></a>
                                                    <form id="delete-form-<?php echo e($member->id); ?>" action="<?php echo e(route('admin.team-members.destroy', $member->id)); ?>" method="POST" class="d-inline-block">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteData(<?php echo e($member->id); ?>)">
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
                                Hələ ki heç bir Komanda Üzvü əlavə edilməyib. Yuxarıdakı düymədən yeni üzv əlavə edə bilərsiniz.
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
    // SweetAlert üçün global deleteData funksiyası (əgər master layout-da yoxdursa)
    if (typeof window.deleteData === 'undefined') {
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
    }
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('back.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ModernLeasing\resources\views/back/pages/team-member/index.blade.php ENDPATH**/ ?>