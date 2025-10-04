@extends('back.layouts.master')

@section('title', 'Missiya/Məqsəd Redaktə Et - İdarə Paneli')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Missiya/Məqsəd Redaktə Et</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.mission-goals.index') }}">Missiya və Məqsədlər</a></li>
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
                        <h4 class="card-title">Missiya/Məqsəd Redaktə Et</h4>
                        <p class="card-title-desc">Ana səhifədə göstəriləcək Missiya/Məqsəd məlumatlarını yeniləyin</p>
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

                        <form action="{{ route('admin.mission-goals.update', $missionGoal->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="row">
                                <!-- Sol tərəf - Əsas məlumatlar -->
                                <div class="col-lg-8">
                                    <!-- Başlıq -->
                                    <div class="mb-4">
                                        <label for="title" class="form-label">Başlıq <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                               id="title" name="title" value="{{ old('title', $missionGoal->title) }}" 
                                               placeholder="Məsələn: Missiyamız">
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Təsvir -->
                                    <div class="mb-4">
                                        <label for="description" class="form-label">Təsvir <span class="text-danger">*</span></label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                                  id="description" name="description" rows="4" 
                                                  placeholder="Missiya/Məqsəd haqqında qısa təsvir yazın...">{{ old('description', $missionGoal->description) }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Sağ tərəf - Əlavə parametrlər -->
                                <div class="col-lg-4">
                                    <!-- Icon -->
                                    <div class="mb-4">
                                        <label for="icon" class="form-label">Icon <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('icon') is-invalid @enderror" 
                                               id="icon" name="icon" value="{{ old('icon', $missionGoal->icon) }}" 
                                               placeholder="fas fa-bullseye">
                                        @error('icon')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">
                                            FontAwesome icon class. Məsələn: fas fa-bullseye, fas fa-eye, fas fa-rocket
                                            <br><a href="https://fontawesome.com/icons" target="_blank">Icon axtarın</a>
                                        </div>
                                        
                                        <!-- Icon Preview -->
                                        <div class="mt-3" id="icon-preview">
                                            <label class="form-label">Icon Önizləmə:</label>
                                            <div class="p-3 border rounded text-center">
                                                <i id="icon-preview-element" class="{{ $missionGoal->icon_class }} text-primary" style="font-size: 2rem;"></i>
                                            </div>
                                        </div>
                                    </div>
                                        
                                        <!-- Üstünlük Şəkli -->
                                        <div class="mb-4">
                                            <label for="image" class="form-label">Şəkil (Opsional)</label>
                                            <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                                   id="image" name="image" accept="image/*">
                                            @error('image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <div class="form-text">PNG, JPG formatları qəbul edilir. Max: 2MB</div>
                                            
                                            @if($missionGoal->image)
                                                <div class="mt-3" id="current-image-container">
                                                    <label class="form-label">Hazırki Şəkil:</label>
                                                    <div class="current-image">
                                                        <img src="{{ $missionGoal->image_url }}" 
                                                             alt="{{ $missionGoal->title }}" 
                                                             style="max-height: 150px; max-width: 100%; object-fit: cover; border: 1px solid #dee2e6; border-radius: 4px;">
                                                        <div class="form-check mt-2">
                                                            <input class="form-check-input" type="checkbox" id="clear_image" name="clear_image">
                                                            <label class="form-check-label" for="clear_image">
                                                                Şəkli Sil
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            
                                            <!-- Yeni şəkil önizləmə -->
                                            <div class="mt-3" id="image-preview" style="display: none;">
                                                <label class="form-label">Yeni Şəkil Önizləməsi:</label>
                                                <div>
                                                    <img id="image-preview-img" src="" alt="Şəkil Önizləmə" 
                                                         style="max-height: 150px; max-width: 100%; object-fit: cover; border: 1px solid #dee2e6; border-radius: 4px;">
                                                </div>
                                            </div>
                                        </div>

                                    <!-- Sıra -->
                                    <div class="mb-4">
                                        <label for="order" class="form-label">Göstərilmə Sırası</label>
                                        <input type="number" class="form-control @error('order') is-invalid @enderror" 
                                               id="order" name="order" value="{{ old('order', $missionGoal->order) }}" min="0">
                                        @error('order')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">0 = avtomatik sıra</div>
                                    </div>

                                    <!-- Status -->
                                    <div class="mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" 
                                                   {{ old('is_active', $missionGoal->is_active) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_active">
                                                Aktiv Missiya/Məqsəd
                                            </label>
                                        </div>
                                        <div class="form-text">Bu elementi ana səhifədə göstər</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Önizləmə -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-4">
                                        <label class="form-label">Missiya/Məqsəd Kartı Önizləməsi:</label>
                                        <div class="preview-card" style="background: #1F1F1F; border: 1px solid #333; border-radius: 8px; padding: 20px; max-width: 500px;">
                                            <div class="d-flex align-items-start">
                                                <div class="mission-icon me-3" style="width: 50px; height: 50px; background: #2289FF; border-radius: 8px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                                    <i id="preview-icon" class="{{ $missionGoal->icon_class }} text-white" style="font-size: 1.2rem;"></i>
                                                </div>
                                                <div class="mission-content flex-grow-1">
                                                    <h5 id="preview-title" class="text-white mb-2">{{ $missionGoal->title }}</h5>
                                                    <p id="preview-description" class="text-light mb-0" style="font-size: 0.9rem;">{{ $missionGoal->description }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Düymələr -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex gap-2">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bx bx-save me-2"></i> Missiya/Məqsəd Yenilə
                                        </button>
                                        <a href="{{ route('admin.mission-goals.index') }}" class="btn btn-secondary">
                                            <i class="bx bx-x me-2"></i> İmtina Et
                                        </a>
                                    </div>
                                </div>
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
        // Form elementləri
        const iconInput = document.getElementById('icon');
        const iconPreviewElement = document.getElementById('icon-preview-element');
        const titleInput = document.getElementById('title');
        const descriptionInput = document.getElementById('description');
        
        // Önizləmə elementləri
        const previewIcon = document.getElementById('preview-icon');
        const previewTitle = document.getElementById('preview-title');
        const previewDescription = document.getElementById('preview-description');
        
        // Icon input'u dinlə
        iconInput.addEventListener('input', function() {
            const iconClass = this.value.trim();
            if (iconClass) {
                iconPreviewElement.className = iconClass + ' text-primary';
                previewIcon.className = iconClass + ' text-white';
            } else {
                iconPreviewElement.className = 'fas fa-question text-primary';
                previewIcon.className = 'fas fa-question text-white';
            }
        });
        
        // Title input'u dinlə
        titleInput.addEventListener('input', function() {
            previewTitle.textContent = this.value || 'Başlıq';
        });
        
        // Description input'u dinlə
        descriptionInput.addEventListener('input', function() {
            previewDescription.textContent = this.value || 'Təsvir...';
        });

        // Şəkil input'u dinlə
        const imageInput = document.getElementById('image');
        const imagePreviewImg = document.getElementById('image-preview-img');
        const imagePreview = document.getElementById('image-preview');
        const currentImageContainer = document.getElementById('current-image-container');
        const clearImageCheckbox = document.getElementById('clear_image');

        imageInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreviewImg.src = e.target.result;
                    imagePreview.style.display = 'block';
                    if (currentImageContainer) {
                        currentImageContainer.style.display = 'none'; // Hide current image when new one is selected
                    }
                };
                reader.readAsDataURL(file);
            } else {
                imagePreview.style.display = 'none';
                if (currentImageContainer) {
                    currentImageContainer.style.display = 'block'; // Show current image if no new one is selected
                }
            }
        });

        // Şəkli Sil checkboxunu dinlə
        if (clearImageCheckbox) {
            clearImageCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    imageInput.value = ''; // Clear selected file
                    imagePreview.style.display = 'none';
                    if (currentImageContainer) {
                        currentImageContainer.style.display = 'none';
                    }
                } else {
                    if (currentImageContainer) {
                        currentImageContainer.style.display = 'block';
                    }
                }
            });
        }
    });
</script>
@endpush
