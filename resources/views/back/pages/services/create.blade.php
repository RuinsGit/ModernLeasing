@extends('back.layouts.master')

@section('title', 'Yeni Xidmət Əlavə Et - İdarə Paneli')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Yeni Xidmət Əlavə Et</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.services.index') }}">Xidmətlər</a></li>
                            <li class="breadcrumb-item active">Yeni Xidmət</li>
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
                        <h4 class="card-title">Yeni Xidmət Əlavə Et</h4>
                        <p class="card-title-desc">Ana səhifədə göstəriləcək xidmət məlumatlarını daxil edin</p>
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

                        <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="row">
                                <!-- Sol tərəf - Əsas məlumatlar -->
                                <div class="col-lg-8">
                                    <!-- Xidmət Başlığı -->
                                    <div class="mb-4">
                                        <label for="title" class="form-label">Xidmət Başlığı <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                               id="title" name="title" value="{{ old('title') }}" 
                                               placeholder="Məsələn: Kənd Təsərrüfatı Texnikası">
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Xidmət Təsviri -->
                                    <div class="mb-4">
                                        <label for="description" class="form-label">Xidmət Təsviri <span class="text-danger">*</span></label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                                  id="description" name="description" rows="4" 
                                                  placeholder="Xidmət haqqında qısa təsvir yazın...">{{ old('description') }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Xidmət Xüsusiyyətləri -->
                                    <div class="mb-4">
                                        <label for="features" class="form-label">Xidmət Xüsusiyyətləri</label>
                                        <textarea class="form-control @error('features') is-invalid @enderror" 
                                                  id="features" name="features" rows="6" 
                                                  placeholder="Hər sətirdə bir xüsusiyyət yazın:&#10;24 aya qədər ödəniş müddəti&#10;İlkin ödəniş 10%-dən başlayır&#10;Sənədləşmə 48 saat ərzində">{{ old('features') }}</textarea>
                                        @error('features')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">Hər sətirdə bir xüsusiyyət yazın. Boş sətirlər nəzərə alınmayacaq.</div>
                                    </div>
                                </div>

                                <!-- Sağ tərəf - Əlavə parametrlər -->
                                <div class="col-lg-4">
                                    <!-- Icon -->
                                    <div class="mb-4">
                                        <label for="icon" class="form-label">Icon <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('icon') is-invalid @enderror" 
                                               id="icon" name="icon" value="{{ old('icon') }}" 
                                               placeholder="fas fa-tractor">
                                        @error('icon')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">
                                            FontAwesome icon class. Məsələn: fas fa-tractor, fas fa-car, fas fa-home
                                            <br><a href="https://fontawesome.com/icons" target="_blank">Icon axtarın</a>
                                        </div>
                                        
                                        <!-- Icon Preview -->
                                        <div class="mt-3" id="icon-preview" style="display: none;">
                                            <label class="form-label">Icon Önizləmə:</label>
                                            <div class="p-3 border rounded text-center">
                                                <i id="icon-preview-element" class="text-primary" style="font-size: 2rem;"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Xidmət Şəkli -->
                                    <div class="mb-4">
                                        <label for="image" class="form-label">Xidmət Şəkli</label>
                                        <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                               id="image" name="image" accept="image/*">
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">PNG, JPG formatları qəbul edilir. Max: 2MB</div>
                                        
                                        <!-- Şəkil önizləmə -->
                                        <div class="mt-3" id="image-preview" style="display: none;">
                                            <label class="form-label">Şəkil Önizləməsi:</label>
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
                                               id="order" name="order" value="{{ old('order', 0) }}" min="0">
                                        @error('order')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">0 = avtomatik sıra</div>
                                    </div>

                                    <!-- Status -->
                                    <div class="mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" 
                                                   {{ old('is_active', true) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_active">
                                                Aktiv Xidmət
                                            </label>
                                        </div>
                                        <div class="form-text">Bu xidməti ana səhifədə göstər</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Önizləmə -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-4">
                                        <label class="form-label">Xidmət Kartı Önizləməsi:</label>
                                        <div class="preview-card" style="background: #f8f9fa; border: 1px solid #dee2e6; border-radius: 8px; padding: 20px; max-width: 400px;">
                                            <div class="text-center">
                                                <div class="mb-3">
                                                    <i id="preview-icon" class="fas fa-question text-primary" style="font-size: 3rem;"></i>
                                                </div>
                                                <h5 id="preview-title" class="text-dark">Xidmət Başlığı</h5>
                                                <p id="preview-description" class="text-muted" style="font-size: 0.9rem;">Xidmət təsviri...</p>
                                                <div id="preview-features"></div>
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
                                            <i class="bx bx-plus me-2"></i> Xidmət Əlavə Et
                                        </button>
                                        <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">
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
        const iconPreview = document.getElementById('icon-preview');
        const iconPreviewElement = document.getElementById('icon-preview-element');
        const titleInput = document.getElementById('title');
        const descriptionInput = document.getElementById('description');
        const featuresInput = document.getElementById('features');
        const imageInput = document.getElementById('image');
        const imagePreview = document.getElementById('image-preview');
        const imagePreviewImg = document.getElementById('image-preview-img');
        
        // Önizləmə elementləri
        const previewIcon = document.getElementById('preview-icon');
        const previewTitle = document.getElementById('preview-title');
        const previewDescription = document.getElementById('preview-description');
        const previewFeatures = document.getElementById('preview-features');
        
        // Icon input'u dinlə
        iconInput.addEventListener('input', function() {
            const iconClass = this.value.trim();
            if (iconClass) {
                iconPreviewElement.className = iconClass + ' text-primary';
                iconPreview.style.display = 'block';
                previewIcon.className = iconClass + ' text-primary';
            } else {
                iconPreview.style.display = 'none';
                previewIcon.className = 'fas fa-question text-primary';
            }
        });
        
        // Title input'u dinlə
        titleInput.addEventListener('input', function() {
            previewTitle.textContent = this.value || 'Xidmət Başlığı';
        });
        
        // Description input'u dinlə
        descriptionInput.addEventListener('input', function() {
            previewDescription.textContent = this.value || 'Xidmət təsviri...';
        });
        
        // Features input'u dinlə
        featuresInput.addEventListener('input', function() {
            const features = this.value.split('\n').filter(line => line.trim() !== '');
            if (features.length > 0) {
                let featuresHtml = '<ul class="list-unstyled text-start" style="font-size: 0.85rem;">';
                features.forEach(feature => {
                    featuresHtml += `<li class="mb-1">• ${feature.trim()}</li>`;
                });
                featuresHtml += '</ul>';
                previewFeatures.innerHTML = featuresHtml;
            } else {
                previewFeatures.innerHTML = '';
            }
        });
        
        // İlk yükləmədə icon'u yoxla
        if (iconInput.value.trim()) {
            iconPreviewElement.className = iconInput.value.trim() + ' text-primary';
            iconPreview.style.display = 'block';
            previewIcon.className = iconInput.value.trim() + ' text-primary';
        }
        
        // Şəkil input'u dinlə
        imageInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreviewImg.src = e.target.result;
                    imagePreview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                imagePreview.style.display = 'none';
            }
        });
    });
</script>
@endpush
