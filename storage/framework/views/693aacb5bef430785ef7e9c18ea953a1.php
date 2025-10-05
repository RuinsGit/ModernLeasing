

<?php $__env->startSection('title', 'FAQ Kateqoriyaları - İdarə Paneli'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">FAQ Kateqoriyaları İdarəetməsi</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">FAQ Bölmələri</a></li>
                            <li class="breadcrumb-item active">Kateqoriyalar</li>
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
                                <h4 class="card-title">FAQ Kateqoriyaları Siyahısı</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2">
                                    <a href="<?php echo e(route('admin.faq-categories.create')); ?>" class="btn btn-primary">
                                        <i class="mdi mdi-plus me-1"></i> Yeni Kateqoriya Əlavə Et
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

                        <?php if($categories->count() > 0): ?>
                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap table-check">
                                    <thead class="table-light">
                                        <tr>
                                            <th style="width: 20px;" class="align-middle">
                                                <div class="form-check font-size-16">
                                                    <input class="form-check-input" type="checkbox" id="checkAll">
                                                    <label class="form-check-label" for="checkAll"></label>
                                                </div>
                                            </th>
                                            <th class="align-middle">ID</th>
                                            <th class="align-middle">Kateqoriya Adı</th>
                                            <th class="align-middle">Slug</th>
                                            <th class="align-middle">Sıra</th>
                                            <th class="align-middle">Status</th>
                                            <th class="align-middle">Əməliyyatlar</th>
                                        </tr>
                                    </thead>
                                    <tbody class="sortable" data-url="<?php echo e(route('admin.faq-categories.order')); ?>">
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr id="order-<?php echo e($category->id); ?>">
                                                <td>
                                                    <div class="form-check font-size-16">
                                                        <input class="form-check-input" type="checkbox" id="categorycheck<?php echo e($category->id); ?>">
                                                        <label class="form-check-label" for="categorycheck<?php echo e($category->id); ?>"></label>
                                                    </div>
                                                </td>
                                                <td><?php echo e($category->id); ?></td>
                                                <td><?php echo e($category->name); ?></td>
                                                <td><?php echo e($category->slug); ?></td>
                                                <td><?php echo e($category->order); ?></td>
                                                <td>
                                                    <form action="<?php echo e(route('admin.faq-categories.toggle-status', $category->id)); ?>" method="POST" class="d-inline-block">
                                                        <?php echo csrf_field(); ?>
                                                        <button type="submit" class="btn btn-sm btn-<?php echo e($category->is_active ? 'success' : 'danger'); ?>">
                                                            <?php echo e($category->is_active ? 'Aktiv' : 'Deaktiv'); ?>

                                                        </button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <div class="d-flex gap-3">
                                                        <a href="<?php echo e(route('admin.faq-categories.edit', $category->id)); ?>" class="text-success">
                                                            <i class="mdi mdi-pencil font-size-18"></i>
                                                        </a>
                                                        <form id="delete-form-<?php echo e($category->id); ?>" action="<?php echo e(route('admin.faq-categories.destroy', $category->id)); ?>" method="POST" class="d-inline-block">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('DELETE'); ?>
                                                            <button type="button" class="btn btn-link text-danger p-0" onclick="deleteData(<?php echo e($category->id); ?>)">
                                                                <i class="mdi mdi-delete font-size-18"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-info text-center" role="alert">
                                Hələ ki heç bir FAQ kateqoriyası əlavə edilməyib. Yuxarıdakı düymədən yeni kateqoriya əlavə edə bilərsiniz.
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div> <!-- container-fluid -->
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.14.0/Sortable.min.js"></script>
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

    // SortableJS integration
    document.addEventListener('DOMContentLoaded', function() {
        const sortableList = document.querySelector('.sortable');
        if (sortableList) {
            new Sortable(sortableList, {
                animation: 150,
                ghostClass: 'sortable-ghost',
                onEnd: function(evt) {
                    const order = [];
                    sortableList.querySelectorAll('tr').forEach((row, index) => {
                        order[row.id.replace('order-', '')] = index + 1;
                    });

                    fetch(sortableList.dataset.url, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({ order: order })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            Swal.fire('Uğurlu!', data.message, 'success');
                        } else {
                            Swal.fire('Xəta!', data.message, 'error');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire('Xəta!', 'Sıralama yenilənərkən xəta baş verdi.', 'error');
                    });
                }
            });
        }
    });

    // Check all functionality
    document.addEventListener('DOMContentLoaded', function() {
        const checkAllElement = document.getElementById('checkAll');
        if (checkAllElement) {
            checkAllElement.addEventListener('change', function() {
                const checkboxes = document.querySelectorAll('tbody input[type="checkbox"]');
                checkboxes.forEach(checkbox => {
                    checkbox.checked = this.checked;
                });
            });
        }
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('back.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ModernLeasing\resources\views/back/pages/faq-category/index.blade.php ENDPATH**/ ?>