

<?php $__env->startSection('title', 'Mesaj Detalları - İdarə Paneli'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Mesaj Detalları</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.contact-messages.index')); ?>">Əlaqə Mesajları</a></li>
                            <li class="breadcrumb-item active">Detallar</li>
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
                        <h4 class="card-title"><?php echo e($contactMessage->name); ?> - Mesaj Detalları</h4>
                        <p class="card-title-desc">Göndərilən mesajın bütün detallarını nəzərdən keçirin.</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <h5 class="font-size-15">Göndərən Adı:</h5>
                                    <p><?php echo e($contactMessage->name); ?></p>
                                </div>
                                <div class="mb-3">
                                    <h5 class="font-size-15">Email:</h5>
                                    <p><a href="mailto:<?php echo e($contactMessage->email); ?>"><?php echo e($contactMessage->email); ?></a></p>
                                </div>
                                <div class="mb-3">
                                    <h5 class="font-size-15">Mövzu:</h5>
                                    <p><?php echo e($contactMessage->subject ?? '--'); ?></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <h5 class="font-size-15">Status:</h5>
                                    <p>
                                        <?php if($contactMessage->is_read): ?>
                                            <span class="badge bg-success">Oxunub</span>
                                        <?php else: ?>
                                            <span class="badge bg-warning text-dark">Oxunmayıb</span>
                                        <?php endif; ?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <h5 class="font-size-15">Göndərilmə Tarixi:</h5>
                                    <p><?php echo e($contactMessage->created_at->format('d M Y H:i')); ?></p>
                                </div>
                                <div class="mb-3">
                                    <h5 class="font-size-15">Son Yenilənmə Tarixi:</h5>
                                    <p><?php echo e($contactMessage->updated_at->format('d M Y H:i')); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <h5 class="font-size-15">Mesaj:</h5>
                            <p><?php echo e($contactMessage->message); ?></p>
                        </div>
                        <div class="d-flex gap-2 mt-4">
                            <?php if(!$contactMessage->is_read): ?>
                                <form action="<?php echo e(route('admin.contact-messages.mark-as-read', $contactMessage->id)); ?>" method="POST" class="d-inline-block">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn btn-success">
                                        <i class="bx bx-check me-2"></i> Oxundu kimi qeyd et
                                    </button>
                                </form>
                            <?php else: ?>
                                <form action="<?php echo e(route('admin.contact-messages.mark-as-unread', $contactMessage->id)); ?>" method="POST" class="d-inline-block">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn btn-warning">
                                        <i class="bx bx-x me-2"></i> Oxunmamış kimi qeyd et
                                    </button>
                                </form>
                            <?php endif; ?>
                            <a href="<?php echo e(route('admin.contact-messages.index')); ?>" class="btn btn-secondary">
                                <i class="bx bx-arrow-back me-2"></i> Geri Qayıt
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container-fluid -->
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ModernLeasing\resources\views/back/pages/contact-message/show.blade.php ENDPATH**/ ?>