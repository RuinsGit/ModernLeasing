@extends('back.layouts.master')

@section('title', 'Tərəfdaşlıq Xüsusiyyətini Redaktə Et - İdarə Paneli')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Tərəfdaşlıq Xüsusiyyətini Redaktə Et</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.partnership-features.index') }}">Tərəfdaşlıq Xüsusiyyətləri</a></li>
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
                        <h4 class="card-title">Tərəfdaşlıq Xüsusiyyətini Redaktə Et</h4>
                        <p class="card-title-desc">İnvestorlar səhifəsi üçün mövcud tərəfdaşlıq xüsusiyyətini yeniləyin.</p>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('admin.partnership-features.update', $partnershipFeature->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="row">
                                <div class="col-lg-8">
                                    <!-- Başlıq -->
                                    <div class="mb-4">
                                        <label for="title" class="form-label">Başlıq <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                               id="title" name="title" value="{{ old('title', $partnershipFeature->title) }}" 
                                               placeholder="Məsələn: Sabit Gəlir Artımı">
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Təsvir -->
                                    <div class="mb-4">
                                        <label for="description" class="form-label">Təsvir <span class="text-danger">*</span></label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                                  id="description" name="description" rows="4" 
                                                  placeholder="Xüsusiyyət haqqında qısa təsvir...">{{ old('description', $partnershipFeature->description) }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Statistika 1 Rəqəm -->
                                    <div class="mb-4">
                                        <label for="stat_number_1" class="form-label">Statistika 1 Rəqəm</label>
                                        <input type="text" class="form-control @error('stat_number_1') is-invalid @enderror" 
                                               id="stat_number_1" name="stat_number_1" value="{{ old('stat_number_1', $partnershipFeature->stat_number_1) }}" 
                                               placeholder="Məsələn: 3500+">
                                        @error('stat_number_1')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">Sağ tərəfdə göstəriləcək birinci statistik rəqəm.</div>
                                    </div>

                                    <!-- Statistika 1 Mətn -->
                                    <div class="mb-4">
                                        <label for="stat_text_1" class="form-label">Statistika 1 Mətn</label>
                                        <input type="text" class="form-control @error('stat_text_1') is-invalid @enderror" 
                                               id="stat_text_1" name="stat_text_1" value="{{ old('stat_text_1', $partnershipFeature->stat_text_1) }}" 
                                               placeholder="Məsələn: Məmnun Müştəri">
                                        @error('stat_text_1')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">Sağ tərəfdə göstəriləcək birinci statistik mətn.</div>
                                    </div>

                                    <!-- Statistika 2 Rəqəm -->
                                    <div class="mb-4">
                                        <label for="stat_number_2" class="form-label">Statistika 2 Rəqəm</label>
                                        <input type="text" class="form-control @error('stat_number_2') is-invalid @enderror" 
                                               id="stat_number_2" name="stat_number_2" value="{{ old('stat_number_2', $partnershipFeature->stat_number_2) }}" 
                                               placeholder="Məsələn: 25">
                                        @error('stat_number_2')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">Sağ tərəfdə göstəriləcək ikinci statistik rəqəm.</div>
                                    </div>

                                    <!-- Statistika 2 Mətn -->
                                    <div class="mb-4">
                                        <label for="stat_text_2" class="form-label">Statistika 2 Mətn</label>
                                        <input type="text" class="form-control @error('stat_text_2') is-invalid @enderror" 
                                               id="stat_text_2" name="stat_text_2" value="{{ old('stat_text_2', $partnershipFeature->stat_text_2) }}" 
                                               placeholder="Məsələn: Beynəlxalq Tərəfdaş">
                                        @error('stat_text_2')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">Sağ tərəfdə göstəriləcək ikinci statistik mətn.</div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <!-- İkon Class -->
                                    <div class="mb-4">
                                        <label for="icon_class" class="form-label">İkon Class</label>
                                        <input type="text" class="form-control @error('icon_class') is-invalid @enderror" 
                                               id="icon_class" name="icon_class" value="{{ old('icon_class', $partnershipFeature->icon_class) }}" 
                                               placeholder="Məsələn: fas fa-chart-line">
                                        @error('icon_class')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">FontAwesome ikon classı daxil edin. Məsələn: `fas fa-chart-line`</div>
                                        <div class="mt-3" id="icon-preview">
                                            <label class="form-label">İkon Önizləmə:</label>
                                            <div class="p-3 border rounded text-center">
                                                <i id="icon-preview-element" class="{{ $partnershipFeature->icon_class }} text-primary" style="font-size: 2rem;"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Şəkil -->
                                    <div class="mb-4">
                                        <label for="image" class="form-label">Şəkil (Tərəfdaşlıq Şəkli)</label>
                                        <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                               id="image" name="image" accept="image/*">
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">PNG, JPG, SVG formatları qəbul edilir. Max: 2MB. Bu şəkil sağ tərəfdə göstəriləcək.</div>
                                        
                                        @if($partnershipFeature->image)
                                            <div class="mt-3" id="current-image">
                                                <label class="form-label">Hazırki Şəkil:</label>
                                                <div class="current-image">
                                                    <img src="{{ $partnershipFeature->image_url }}" 
                                                         alt="{{ $partnershipFeature->title }}" 
                                                         style="max-height: 150px; max-width: 100%; object-fit: cover; border: 1px solid #dee2e6; border-radius: 4px;">
                                                    <div class="form-check mt-2">
                                                        <input class="form-check-input" type="checkbox" id="remove_image" name="remove_image" value="1">
                                                        <label class="form-check-label" for="remove_image">Şəkli sil</label>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="mt-3" id="image-preview" style="display: none;">
                                            <label class="form-label">Yeni Şəkil Önizləmə:</label>
                                            <div>
                                                <img id="image-preview-img" src="" alt="Şəkil Önizləmə" 
                                                     style="max-height: 150px; max-width: 100%; object-fit: cover; border: 1px solid #dee2e6; border-radius: 4px;">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Sıra -->
                                    <div class="mb-4">
                                        <label for="order" class="form-label">Sıra</label>
                                        <input type="number" class="form-control @error('order') is-invalid @enderror" 
                                               id="order" name="order" value="{{ old('order', $partnershipFeature->order) }}" min="0">
                                        @error('order')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">Elementin göstərilmə sırası. 0 olarsa, avtomatik təyin ediləcək.</div>
                                    </div>

                                    <!-- Status -->
                                    <div class="mb-4">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" {{ old('is_active', $partnershipFeature->is_active) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_active">Aktiv</label>
                                        </div>
                                        <div class="form-text">Bu xüsusiyyəti investorlar səhifəsində göstər.</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Düymələr -->
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bx bx-save me-2"></i> Xüsusiyyəti Yenilə
                                </button>
                                <a href="{{ route('admin.partnership-features.index') }}" class="btn btn-secondary">
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
@endsection

@push('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const iconInput = document.getElementById('icon_class');
        const iconPreview = document.getElementById('icon-preview');
        const iconPreviewElement = document.getElementById('icon-preview-element');
        const imageInput = document.getElementById('image');
        const imagePreview = document.getElementById('image-preview');
        const imagePreviewImg = document.getElementById('image-preview-img');
        const currentImage = document.getElementById('current-image');
        const removeImageCheckbox = document.getElementById('remove_image');

        function updateIconPreview() {
            const iconClass = iconInput.value.trim();
            if (iconClass) {
                iconPreviewElement.className = iconClass + ' text-primary';
                iconPreview.style.display = 'block';
            } else {
                iconPreviewElement.className = '';
                iconPreview.style.display = 'none';
            }
        }

        iconInput.addEventListener('input', updateIconPreview);
        updateIconPreview(); // Səhifə yüklənəndə ilkin göstərilmə üçün

        imageInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreviewImg.src = e.target.result;
                    imagePreview.style.display = 'block';
                    if (currentImage) currentImage.style.display = 'none';
                };
                reader.readAsDataURL(file);
            } else {
                imagePreview.style.display = 'none';
                imagePreviewImg.src = '';
                if (currentImage) currentImage.style.display = 'block';
            }
        });

        if (removeImageCheckbox) {
            removeImageCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    imageInput.value = ''; // Clear file input
                    if (imagePreview) imagePreview.style.display = 'none';
                    if (currentImage) currentImage.style.display = 'none';
                } else {
                    if (currentImage) currentImage.style.display = 'block';
                }
            });
        }

        // Əgər səhifə yenilənəndə artıq şəkil yüklənibsə, 'remove_image' checkbox-u unchecked olsun
        if (currentImage && removeImageCheckbox && !removeImageCheckbox.checked) {
            currentImage.style.display = 'block';
        }
    });
</script>
@endpush
