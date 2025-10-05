@extends('back.layouts.master')

@section('title', 'Xəbəri Redaktə Et - İdarə Paneli')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Xəbəri Redaktə Et</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.news-items.index') }}">Xəbərlər</a></li>
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
                        <h4 class="card-title">Xəbəri Redaktə Et</h4>
                        <p class="card-title-desc">Xəbərin məlumatlarını yeniləyin.</p>
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

                        <form action="{{ route('admin.news-items.update', $newsItem->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <!-- Başlıq -->
                                    <div class="mb-4">
                                        <label for="title" class="form-label">Başlıq <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                               id="title" name="title" value="{{ old('title', $newsItem->title) }}" 
                                               placeholder="Məsələn: Yeni Rəqəmsal Platformamız">
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <!-- Şəkil -->
                                    <div class="mb-4">
                                        <label for="image" class="form-label">Şəkil (Opsional)</label>
                                        <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                               id="image" name="image" accept="image/*">
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">PNG, JPG formatları qəbul edilir. Max: 2MB</div>
                                        
                                        @if($newsItem->image)
                                            <div class="mt-3" id="current-image-wrapper">
                                                <label class="form-label">Hazırki Şəkil:</label>
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ $newsItem->image_url }}" alt="{{ $newsItem->title }}" 
                                                         style="max-height: 150px; max-width: 100%; object-fit: cover; border: 1px solid #dee2e6; border-radius: 4px; margin-right: 15px;">
                                                    <button type="button" id="remove-image-btn" class="btn btn-danger btn-sm"><i class="mdi mdi-close"></i> Sil</button>
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
                                        <input type="hidden" name="remove_image" id="remove-image-hidden" value="0">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <!-- Tarix -->
                                    <div class="mb-4">
                                        <label for="news_date" class="form-label">Tarix <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control @error('news_date') is-invalid @enderror" 
                                               id="news_date" name="news_date" value="{{ old('news_date', $newsItem->news_date->format('Y-m-d')) }}">
                                        @error('news_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Qısa Təsvir -->
                            <div class="mb-4">
                                <label for="short_description" class="form-label">Qısa Təsvir <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('short_description') is-invalid @enderror" 
                                          id="short_description" name="short_description" rows="3" 
                                          placeholder="Xəbər haqqında qısa məlumat...">{{ old('short_description', $newsItem->short_description) }}</textarea>
                                @error('short_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Tam Təsvir -->
                            <div class="mb-4">
                                <label for="description" class="form-label">Tam Təsvir <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('description') is-invalid @enderror" 
                                          id="description" name="description" rows="6" 
                                          placeholder="Xəbər haqqında tam məlumat...">{{ old('description', $newsItem->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Sıra -->
                            <div class="mb-4">
                                <label for="order" class="form-label">Sıra <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('order') is-invalid @enderror" 
                                       id="order" name="order" value="{{ old('order', $newsItem->order) }}" 
                                       min="0" placeholder="Məsələn: 1">
                                @error('order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Xəbərin səhifədəki göstərilmə sırası. 0 olarsa, avtomatik təyin ediləcək.</div>
                            </div>

                            <!-- Status -->
                            <div class="mb-4">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" {{ old('is_active', $newsItem->is_active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">Aktiv</label>
                                </div>
                                <div class="form-text">Bu xəbəri səhifədə göstər.</div>
                            </div>

                            <!-- Düymələr -->
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="mdi mdi-content-save me-2"></i> Yenilə
                                </button>
                                <a href="{{ route('admin.news-items.index') }}" class="btn btn-secondary">
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
        const imageInput = document.getElementById('image');
        const imagePreview = document.getElementById('image-preview');
        const imagePreviewImg = document.getElementById('image-preview-img');
        const currentImageWrapper = document.getElementById('current-image-wrapper');
        const removeImageBtn = document.getElementById('remove-image-btn');
        const removeImageHidden = document.getElementById('remove-image-hidden');

        imageInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreviewImg.src = e.target.result;
                    imagePreview.style.display = 'block';
                    if (currentImageWrapper) {
                        currentImageWrapper.style.display = 'none'; // Hide current image when new one is selected
                    }
                    removeImageHidden.value = "0"; // Yeni şəkil seçildikdə silmə əməliyyatını ləğv et
                };
                reader.readAsDataURL(file);
            } else {
                imagePreview.style.display = 'none';
                if (currentImageWrapper) {
                    currentImageWrapper.style.display = 'block'; // Show current image if no new one is selected
                }
            }
        });

        if (removeImageBtn) {
            removeImageBtn.addEventListener('click', function() {
                Swal.fire({
                    title: 'Şəkli silmək istədiyinizdən əminsiniz?',
                    text: "Bu əməliyyat geri alına bilməz!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Bəli, sil!',
                    cancelButtonText: 'Xeyr'
                }).then((result) => {
                    if (result.isConfirmed) {
                        if (currentImageWrapper) {
                            currentImageWrapper.style.display = 'none';
                        }
                        imageInput.value = ''; // Inputu təmizlə
                        removeImageHidden.value = "1"; // Şəkli silmək üçün flag təyin et
                        Swal.fire(
                            'Silindi!',
                            'Şəkil uğurla silindi kimi qeyd edildi.',
                            'success'
                        );
                    }
                });
            });
        }
    });
</script>
@endpush
