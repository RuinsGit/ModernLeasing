

<?php $__env->startSection('title', 'Tərəfdaşlıq Növləri - İdarə Paneli'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Tərəfdaşlıq Növləri</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.partnership-section.index')); ?>">İnvestorlar Səhifəsi</a></li>
                            <li class="breadcrumb-item active">Tərəfdaşlıq Növləri</li>
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
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="card-title">Tərəfdaşlıq Növlərinin Siyahısı</h4>
                            <a href="<?php echo e(route('admin.partnership-types.create')); ?>" class="btn btn-primary"><i class="bx bx-plus me-1"></i> Yeni Növ Əlavə Et</a>
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

                        <?php if($partnershipTypes->count() > 0): ?>
                            <div class="table-responsive">
                                <table class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Icon</th>
                                            <th>Başlıq</th>
                                            <th>Təsvir</th>
                                            <th>Faydalar</th>
                                            <th>Sıra</th>
                                            <th>Status</th>
                                            <th>Əməliyyatlar</th>
                                        </tr>
                                    </thead>
                                    <tbody class="sortable" data-url="<?php echo e(route('admin.partnership-types.order')); ?>">
                                        <?php $__currentLoopData = $partnershipTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr id="order-<?php echo e($type->id); ?>">
                                                <td><?php echo e($type->id); ?></td>
                                                <td><i class="<?php echo e($type->icon_class); ?>"></i></td>
                                                <td><?php echo e($type->title); ?></td>
                                                <td><?php echo e(Str::limit($type->description, 50)); ?></td>
                                                <td>
                                                    <?php if(is_array($type->benefits) && count($type->benefits) > 0): ?>
                                                        <ul class="list-unstyled mb-0">
                                                            <?php $__currentLoopData = $type->benefits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $benefit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li><i class="ri-check-line align-middle me-1"></i> <?php echo e($benefit); ?></li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    <?php else: ?>
                                                        Yoxdur
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo e($type->order); ?></td>
                                                <td>
                                                    <form action="<?php echo e(route('admin.partnership-types.toggle-status', $type->id)); ?>" method="POST" class="d-inline-block">
                                                        <?php echo csrf_field(); ?>
                                                        <button type="submit" class="btn btn-sm btn-<?php echo e($type->is_active ? 'success' : 'danger'); ?>">
                                                            <?php echo e($type->is_active ? 'Aktiv' : 'Deaktiv'); ?>

                                                        </button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <a href="<?php echo e(route('admin.partnership-types.show', $type->id)); ?>" class="btn btn-info btn-sm"><i class="mdi mdi-eye font-size-18"></i></a>
                                                    <a href="<?php echo e(route('admin.partnership-types.edit', $type->id)); ?>" class="btn btn-primary btn-sm"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                    <form id="delete-form-<?php echo e($type->id); ?>" action="<?php echo e(route('admin.partnership-types.destroy', $type->id)); ?>" method="POST" class="d-inline-block">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteData(<?php echo e($type->id); ?>)">
                                                            <i class="mdi mdi-delete font-size-18"></i>
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
                                Hələ ki heç bir tərəfdaşlıq növü əlavə edilməyib. Yuxarıdakı düymədən yeni növ əlavə edə bilərsiniz.
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
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.14.0/Sortable.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Global deleteData function
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

    document.addEventListener('DOMContentLoaded', function() {
        var el = document.querySelector('.sortable');
        if (el) {
            var sortable = Sortable.create(el, {
                animation: 150,
                ghostClass: 'sortable-ghost',
                onEnd: function (evt) {
                    var order = sortable.toArray().map((id, index) => ({ id: id.replace('order-', ''), order: index + 1 }));
                    fetch(el.dataset.url, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                        },
                        body: JSON.stringify({ order: Object.fromEntries(order.map(item => [item.id, item.order])) })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: data.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                            // Səhifəni yeniləmədən order sütununu yeniləyin
                            order.forEach(item => {
                                const row = document.getElementById('order-' + item.id);
                                if (row) {
                                    const orderCell = row.querySelector('td:nth-child(6)'); // Sıra sütunu 6-cıdır
                                    if (orderCell) {
                                        orderCell.textContent = item.order;
                                    }
                                }
                            });
                        } else {
                            Swal.fire({
                                position: "center",
                                icon: "error",
                                title: data.message,
                                showConfirmButton: true,
                                confirmButtonText: 'Tamam'
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire({
                            position: "center",
                            icon: "error",
                            title: 'Sıralama yenilənərkən xəta baş verdi!',
                            showConfirmButton: true,
                            confirmButtonText: 'Tamam'
                        });
                    });
                }
            });
        }
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('back.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ModernLeasing\resources\views/back/pages/partnership-type/index.blade.php ENDPATH**/ ?>