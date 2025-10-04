@extends('back.layouts.master')

@section('title', 'Tərəfdaş Redaktə Et - İdarə Paneli')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Tərəfdaş Redaktə Et</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.partners.index') }}">Tərəfdaşlar</a></li>
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
                        <h4 class="card-title">Tərəfdaş Redaktə Et</h4>
                        <p class="card-title-desc">Tərəfdaşın məlumatlarını yeniləyin</p>
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

                        <form action="{{ route('admin.partners.update', $partner->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="row">
                                <!-- Sol tərəf - Əsas məlumatlar -->
                                <div class="col-lg-8">
                                    <!-- Ad -->
                                    <div class="mb-4">
                                        <label for="name" class="form-label">Tərəfdaş Adı <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                               id="name" name="name" value="{{ old('name', $partner->name) }}" 
                                               placeholder="Məsələn: Company A">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Sıra -->
                                    <div class="mb-4">
                                        <label for="order" class="form-label">Göstərilmə Sırası</label>
                                        <input type="number" class="form-control @error('order') is-invalid @enderror" 
                                               id="order" name="order" value="{{ old('order', $partner->order) }}" min="0">
                                        @error('order')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">0 = avtomatik sıra</div>
                                    </div>
                                </div>

                                <!-- Sağ tərəf - Əlavə parametrlər -->
                                <div class="col-lg-4">
                                    <!-- Loqo Şəkli -->
                                    <div class="mb-4">
                                        <label for="logo" class="form-label">Loqo Şəkli (Opsional)</label>
                                        <input type="file" class="form-control @error('logo') is-invalid @enderror" 
                                               id="logo" name="logo" accept="image/*">
                                        @error('logo')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">PNG, JPG, SVG formatları qəbul edilir. Max: 2MB</div>
                                        
                                        @if($partner->logo)
                                            <div class="mt-3" id="current-logo-container">
                                                <label class="form-label">Hazırki Loqo:</label>
                                                <div class="current-logo">
                                                    <img src="{{ $partner->logo_url }}" 
                                                         alt="{{ $partner->name }}" 
                                                         style="max-height: 100px; max-width: 100%; object-fit: contain; border: 1px solid #dee2e6; border-radius: 4px; padding: 5px;">
                                                    <div class="form-check mt-2">
                                                        <input class="form-check-input" type="checkbox" id="clear_logo" name="clear_logo">
                                                        <label class="form-check-label" for="clear_logo">
                                                            Loqonu Sil
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        
                                        <!-- Yeni loqo önizləmə -->
                                        <div class="mt-3" id="logo-preview" style="display: none;">
                                            <label class="form-label">Yeni Loqo Önizləməsi:</label>
                                            <div>
                                                <img id="logo-preview-img" src="" alt="Loqo Önizləmə" 
                                                     style="max-height: 100px; max-width: 100%; object-fit: contain; border: 1px solid #dee2e6; border-radius: 4px; padding: 5px;">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Status -->
                                    <div class="mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" 
                                                   {{ old('is_active', $partner->is_active) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_active">
                                                Aktiv Tərəfdaş
                                            </label>
                                        </div>
                                        <div class="form-text">Bu tərəfdaşı ana səhifədə göstər</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Düymələr -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex gap-2">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bx bx-save me-2"></i> Tərəfdaşı Yenilə
                                        </button>
                                        <a href="{{ route('admin.partners.index') }}" class="btn btn-secondary">
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
        const nameInput = document.getElementById('name');
        const logoInput = document.getElementById('logo');
        const logoPreview = document.getElementById('logo-preview');
        const logoPreviewImg = document.getElementById('logo-preview-img');
        const currentLogoContainer = document.getElementById('current-logo-container');
        const clearLogoCheckbox = document.getElementById('clear_logo');
        
        // Loqo input'u dinlə
        logoInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    logoPreviewImg.src = e.target.result;
                    logoPreview.style.display = 'block';
                    if (currentLogoContainer) {
                        currentLogoContainer.style.display = 'none'; // Hide current logo when new one is selected
                    }
                };
                reader.readAsDataURL(file);
            } else {
                logoPreview.style.display = 'none';
                if (currentLogoContainer) {
                    currentLogoContainer.style.display = 'block'; // Show current logo if no new one is selected
                }
            }
        });

        // Loqonu Sil checkboxunu dinlə
        if (clearLogoCheckbox) {
            clearLogoCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    logoInput.value = ''; // Clear selected file
                    logoPreview.style.display = 'none';
                    if (currentLogoContainer) {
                        currentLogoContainer.style.display = 'none';
                    }
                } else {
                    if (currentLogoContainer) {
                        currentLogoContainer.style.display = 'block';
                    }
                }
            });
        }
    });
</script>
@endpush
