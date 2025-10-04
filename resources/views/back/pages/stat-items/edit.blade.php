@extends('back.layouts.master')

@section('title', 'Statistika Elementi Redaktə Et - İdarə Paneli')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Statistika Elementi Redaktə Et</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.stat-items.index') }}">Statistika Elementləri</a></li>
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
                        <h4 class="card-title">Statistika Elementi Redaktə Et</h4>
                        <p class="card-title-desc">Ana səhifədə göstəriləcək Statistika Elementi məlumatlarını yeniləyin</p>
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

                        <form action="{{ route('admin.stat-items.update', $statItem->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="row">
                                <!-- Sol tərəf - Əsas məlumatlar -->
                                <div class="col-lg-8">
                                    <!-- Başlıq -->
                                    <div class="mb-4">
                                        <label for="title" class="form-label">Başlıq <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                               id="title" name="title" value="{{ old('title', $statItem->title) }}" 
                                               placeholder="Məsələn: Məmnun Müştəri">
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Dəyər -->
                                    <div class="mb-4">
                                        <label for="value" class="form-label">Dəyər <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control @error('value') is-invalid @enderror" 
                                               id="value" name="value" value="{{ old('value', $statItem->value) }}" min="0">
                                        @error('value')
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
                                               id="icon" name="icon" value="{{ old('icon', $statItem->icon) }}" 
                                               placeholder="fas fa-users">
                                        @error('icon')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">
                                            FontAwesome icon class. Məsələn: fas fa-users, fas fa-handshake, fas fa-globe, fas fa-award
                                            <br><a href="https://fontawesome.com/icons" target="_blank">Icon axtarın</a>
                                        </div>
                                        
                                        <!-- Icon Preview -->
                                        <div class="mt-3" id="icon-preview">
                                            <label class="form-label">Icon Önizləmə:</label>
                                            <div class="p-3 border rounded text-center">
                                                <i id="icon-preview-element" class="{{ $statItem->icon_class }} text-primary" style="font-size: 2rem;"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Sıra -->
                                    <div class="mb-4">
                                        <label for="order" class="form-label">Göstərilmə Sırası</label>
                                        <input type="number" class="form-control @error('order') is-invalid @enderror" 
                                               id="order" name="order" value="{{ old('order', $statItem->order) }}" min="0">
                                        @error('order')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">0 = avtomatik sıra</div>
                                    </div>

                                    <!-- Status -->
                                    <div class="mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" 
                                                   {{ old('is_active', $statItem->is_active) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_active">
                                                Aktiv Statistika Elementi
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
                                        <label class="form-label">Statistika Kartı Önizləməsi:</label>
                                        <div class="preview-card text-center" style="background: #2289FF; border-radius: 8px; padding: 20px; max-width: 300px; color: #fff;">
                                            <div class="stat-icon">
                                                <i id="preview-icon" class="{{ $statItem->icon_class }}" style="font-size: 2.5rem; margin-bottom: 0.5rem;"></i>
                                            </div>
                                            <h3 id="preview-value" style="font-size: 2.5rem; font-weight: 700; margin-bottom: 0.5rem;">{{ $statItem->value }}</h3>
                                            <p id="preview-title" style="font-size: 1.1rem; opacity: 0.9;">{{ $statItem->title }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Düymələr -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex gap-2">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bx bx-save me-2"></i> Statistika Elementi Yenilə
                                        </button>
                                        <a href="{{ route('admin.stat-items.index') }}" class="btn btn-secondary">
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
        const valueInput = document.getElementById('value');
        
        // Önizləmə elementləri
        const previewIcon = document.getElementById('preview-icon');
        const previewTitle = document.getElementById('preview-title');
        const previewValue = document.getElementById('preview-value');
        
        // Icon input'u dinlə
        iconInput.addEventListener('input', function() {
            const iconClass = this.value.trim();
            if (iconClass) {
                iconPreviewElement.className = iconClass + ' text-primary';
                previewIcon.className = iconClass;
            } else {
                iconPreviewElement.className = 'fas fa-chart-bar';
                previewIcon.className = 'fas fa-chart-bar';
            }
        });
        
        // Title input'u dinlə
        titleInput.addEventListener('input', function() {
            previewTitle.textContent = this.value || 'Başlıq';
        });

        // Value input'u dinlə
        valueInput.addEventListener('input', function() {
            previewValue.textContent = this.value || '0';
        });
    });
</script>
@endpush
