

<?php $__env->startSection('title', 'FAQ Sualını Redaktə Et - İdarə Paneli'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">FAQ Sualını Redaktə Et</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.faq-items.index')); ?>">FAQ Sualları</a></li>
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
                        <h4 class="card-title">FAQ Sualı Məlumatlarını Redaktə Et</h4>
                        <p class="card-title-desc">Mövcud FAQ sualı və cavabı üçün məlumatları yeniləyin.</p>
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

                        <form action="<?php echo e(route('admin.faq-items.update', $faqItem->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <!-- Kateqoriya Seçimi -->
                                    <div class="mb-4">
                                        <label for="faq_category_id" class="form-label">Kateqoriya <span class="text-danger">*</span></label>
                                        <select class="form-select <?php $__errorArgs = ['faq_category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="faq_category_id" name="faq_category_id">
                                            <option value="">Kateqoriya Seçin</option>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($category->id); ?>" <?php echo e(old('faq_category_id', $faqItem->faq_category_id) == $category->id ? 'selected' : ''); ?>><?php echo e($category->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php $__errorArgs = ['faq_category_id'];
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
                                               id="order" name="order" value="<?php echo e(old('order', $faqItem->order)); ?>" min="0">
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
                                        <div class="form-text">Sualın göstərilmə sırası. 0 = avtomatik.</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Sual Mətni -->
                            <div class="mb-4">
                                <label for="question" class="form-label">Sual Mətni <span class="text-danger">*</span></label>
                                <input type="text" class="form-control <?php $__errorArgs = ['question'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                       id="question" name="question" value="<?php echo e(old('question', $faqItem->question)); ?>" 
                                       placeholder="Məsələn: Lizinq prosesi necə işləyir?">
                                <?php $__errorArgs = ['question'];
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

                            <!-- Cavab Hissəsi -->
                            <div class="mb-4">
                                <label class="form-label">Cavab İçəriyi <span class="text-danger">*</span></label>
                                <div id="answer-container" class="border p-3 rounded bg-light" style="min-height: 200px;">
                                    <!-- Dynamic answer blocks will be inserted here -->
                                </div>
                                <div class="d-flex gap-2 mt-3">
                                    <button type="button" class="btn btn-info btn-sm" onclick="addAnswerBlock('paragraph')">
                                        <i class="mdi mdi-text me-1"></i> Paraqraf
                                    </button>
                                    <button type="button" class="btn btn-info btn-sm" onclick="addAnswerBlock('list_ordered')">
                                        <i class="mdi mdi-format-list-numbered me-1"></i> Nömrəli Siyahı
                                    </button>
                                    <button type="button" class="btn btn-info btn-sm" onclick="addAnswerBlock('list_unordered')">
                                        <i class="mdi mdi-format-list-bulleted me-1"></i> Markerli Siyahı
                                    </button>
                                    <button type="button" class="btn btn-info btn-sm" onclick="addAnswerBlock('heading')">
                                        <i class="mdi mdi-format-title me-1"></i> Başlıq
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Status -->
                            <div class="mb-4">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" <?php echo e(old('is_active', $faqItem->is_active) ? 'checked' : ''); ?>>
                                    <label class="form-check-label" for="is_active">Aktiv</label>
                                </div>
                                <div class="form-text">Bu sualı aktiv edin/deaktiv edin.</div>
                            </div>

                            <!-- Düymələr -->
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="mdi mdi-content-save me-2"></i> Yenilə
                                </button>
                                <a href="<?php echo e(route('admin.faq-items.index')); ?>" class="btn btn-secondary">
                                    <i class="mdi mdi-cancel me-2"></i> İmtina Et
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
    let blockIndex = 0;

    function addAnswerBlock(type, content = '', level = 5, headers = [], rows = [], style = 'info', icon = 'fas fa-info-circle', message = '') {
        const container = document.getElementById('answer-container');
        const newBlock = document.createElement('div');
        newBlock.classList.add('answer-block', 'p-3', 'mb-3', 'border', 'rounded', 'bg-white');
        newBlock.setAttribute('data-block-index', blockIndex);
        let html = `
            <input type="hidden" name="answer_type[${blockIndex}]" value="${type}">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h6 class="mb-0">${getBlockTitle(type)}</h6>
                <button type="button" class="btn btn-danger btn-sm" onclick="removeAnswerBlock(this)">
                    <i class="mdi mdi-close"></i>
                </button>
            </div>
        `;

        if (type === 'paragraph' || type === 'custom_html') {
            html += `
                <textarea class="form-control mt-2" name="answer_content[${blockIndex}]" rows="3" placeholder="${type === 'paragraph' ? 'Paraqraf məzmununu daxil edin...' : 'Xüsusi HTML kodu daxil edin...'}">${content}</textarea>
            `;
        } else if (type === 'heading') {
            html += `
                <input type="text" class="form-control mt-2 mb-2" name="answer_content[${blockIndex}]" value="${content}" placeholder="Başlıq mətnini daxil edin...">
                <select class="form-select" name="answer_heading_level[${blockIndex}]">
                    <option value="1" ${level == 1 ? 'selected' : ''}>H1</option>
                    <option value="2" ${level == 2 ? 'selected' : ''}>H2</option>
                    <option value="3" ${level == 3 ? 'selected' : ''}>H3</option>
                    <option value="4" ${level == 4 ? 'selected' : ''}>H4</option>
                    <option value="5" ${level == 5 ? 'selected' : ''}>H5</option>
                    <option value="6" ${level == 6 ? 'selected' : ''}>H6</option>
                </select>
            `;
        } else if (type === 'list_ordered' || type === 'list_unordered') {
            html += `
                <div class="list-items-container mt-2" data-list-type="${type}">
                    <!-- List items will be added here -->
                </div>
                <button type="button" class="btn btn-primary btn-sm mt-2" onclick="addListItem(this, '${blockIndex}')"><i class="mdi mdi-plus"></i> Siyahı Elementi</button>
            `;
            newBlock.innerHTML = html;
            const listContainer = newBlock.querySelector('.list-items-container');
            (content.length > 0 ? content : ['']).forEach(item => {
                addListItem(null, blockIndex, item, listContainer);
            });
        } else if (type === 'table') {
            // Cədvəl funksionallığı silindi
        } else if (type === 'alert') {
            // Xəbərdarlıq funksionallığı silindi
        }

        if (!newBlock.innerHTML) {
            newBlock.innerHTML = html; // Yalnız dinamik hissələr üçün daxil etməyin qarşısını almaq üçün
        }
        container.appendChild(newBlock);
        blockIndex++;
    }

    function removeAnswerBlock(button) {
        button.closest('.answer-block').remove();
    }

    function getBlockTitle(type) {
        switch (type) {
            case 'paragraph': return 'Paraqraf';
            case 'list_ordered': return 'Nömrəli Siyahı';
            case 'list_unordered': return 'Markerli Siyahı';
            // case 'table': return 'Cədvəl';
            // case 'alert': return 'Xəbərdarlıq Mesajı';
            case 'custom_html': return 'Xüsusi HTML';
            case 'heading': return 'Başlıq';
            default: return 'Naməlum Blok';
        }
    }

    function addListItem(button, blockIdx, itemContent = '', listContainer = null) {
        const container = listContainer || button.closest('.answer-block').querySelector('.list-items-container');
        const listType = container.dataset.listType;
        const itemIndex = container.children.length; // Each item gets its own index within the block

        const listItemDiv = document.createElement('div');
        listItemDiv.classList.add('d-flex', 'align-items-center', 'mb-2', 'list-item');
        listItemDiv.innerHTML = `
            <input type="text" class="form-control me-2" name="answer_list[${blockIdx}][${itemIndex}]" value="${itemContent}" placeholder="Siyahı elementi...">
            <button type="button" class="btn btn-danger btn-sm" onclick="removeListItem(this)"><i class="mdi mdi-minus"></i></button>
        `;
        container.appendChild(listItemDiv);
    }

    function removeListItem(button) {
        button.closest('.list-item').remove();
    }

    // Cədvəl və Xəbərdarlıq funksionallığı silindi
    // let headerIndex = {};
    // function addTableHeader(button, blockIdx, headerText = '', headersContainer = null) { ... }
    // function removeTableHeader(button, blockIdx, headerKey) { ... }
    // let rowIndex = {};
    // function addTableRow(button, blockIdx, numColumns, rowsContainer = null, rowData = []) { ... }
    // function removeTableRow(button) { ... }

    document.addEventListener('DOMContentLoaded', function() {
        // Load existing data if any (for edit page)
        <?php if(old('answer_type')): ?>
            // Old input varsa, onu yüklə
            const oldAnswerTypes = <?php echo json_encode(old('answer_type')); ?>;
            const oldAnswerContents = <?php echo json_encode(old('answer_content')); ?>;
            const oldAnswerLists = <?php echo json_encode(old('answer_list')); ?>;
            // const oldAnswerTableHeaders = <?php echo json_encode(old('answer_table_headers')); ?>;
            // const oldAnswerTableRows = <?php echo json_encode(old('answer_table_rows')); ?>;
            // const oldAnswerAlertStyles = <?php echo json_encode(old('answer_alert_style')); ?>;
            // const oldAnswerAlertIcons = <?php echo json_encode(old('answer_alert_icon')); ?>;
            // const oldAnswerAlertMessages = <?php echo json_encode(old('answer_alert_message')); ?>;
            const oldAnswerHeadingLevels = <?php echo json_encode(old('answer_heading_level')); ?>;

            Object.keys(oldAnswerTypes).forEach(key => {
                const type = oldAnswerTypes[key];
                const content = oldAnswerContents ? oldAnswerContents[key] : '';
                const listContent = oldAnswerLists ? oldAnswerLists[key] : [];
                // const tableHeaders = oldAnswerTableHeaders ? oldAnswerTableHeaders[key] : [];
                // const tableRows = oldAnswerTableRows ? oldAnswerTableRows[key] : [];
                // const alertStyle = oldAnswerAlertStyles ? oldAnswerAlertStyles[key] : 'info';
                // const alertIcon = oldAnswerAlertIcons ? oldAnswerAlertIcons[key] : 'fas fa-info-circle';
                // const alertMessage = oldAnswerAlertMessages ? oldAnswerAlertMessages[key] : '';
                const headingLevel = oldAnswerHeadingLevels ? oldAnswerHeadingLevels[key] : 5;

                // blockIndex-i əl ilə artırırıq ki, sonra düzgün olsun
                blockIndex = parseInt(key) + 1;

                if (type === 'list_ordered' || type === 'list_unordered') {
                    addAnswerBlock(type, listContent);
                } // else if (type === 'table') {
                //     addAnswerBlock(type, content, headingLevel, tableHeaders, tableRows);
                // } else if (type === 'alert') {
                //     addAnswerBlock(type, content, headingLevel, [], [], alertStyle, alertIcon, alertMessage);
                // } 
                else if (type === 'heading') {
                    addAnswerBlock(type, content, headingLevel);
                } else {
                    addAnswerBlock(type, content);
                }
            });
        <?php endif; ?>

        <?php if(isset($faqItem) && $faqItem->answer): ?>
            const existingAnswerBlocks = <?php echo json_encode($faqItem->answer); ?>;
            existingAnswerBlocks.forEach((block, key) => {
                const type = block.type;
                const content = block.content || '';
                const level = block.level || 5;
                // const headers = block.headers || [];
                // const rows = block.rows || [];
                // const style = block.style || 'info';
                // const icon = block.icon || 'fas fa-info-circle';
                // const message = block.message || '';

                // blockIndex-i əl ilə artırırıq ki, sonra düzgün olsun
                blockIndex = parseInt(key);

                if (type === 'list_ordered' || type === 'list_unordered') {
                    addAnswerBlock(type, content);
                } // else if (type === 'table') {
                //     addAnswerBlock(type, '', 5, headers, rows);
                // } else if (type === 'alert') {
                //     addAnswerBlock(type, '', 5, [], [], style, icon, message);
                // } 
                else if (type === 'heading') {
                    addAnswerBlock(type, content, level);
                } else {
                    addAnswerBlock(type, content);
                }
            });
            blockIndex = existingAnswerBlocks.length; // blockIndex-i son blok sayına bərabər edirik
        <?php endif; ?>
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('back.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ModernLeasing\resources\views/back/pages/faq-item/edit.blade.php ENDPATH**/ ?>