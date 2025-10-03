@extends('back.layouts.master')

@section('title', 'Logo Redaktə Et - İdarə Paneli')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Logo Redaktə Et</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.site-logo.index') }}">Logo İdarəetməsi</a></li>
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
                        <h4 class="card-title">Logo Redaktə Et</h4>
                        <p class="card-title-desc">Sayt logosu və adını yeniləyin</p>
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

                        <form action="{{ route('admin.site-logo.update', $siteLogo->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <!-- Sayt Adı -->
                            <div class="mb-4">
                                <label for="site_name" class="form-label">Sayt Adı <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('site_name') is-invalid @enderror" 
                                       id="site_name" name="site_name" value="{{ old('site_name', $siteLogo->site_name) }}" 
                                       placeholder="Məsələn: MODERN LİZİNQ">
                                @error('site_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Bu ad navbar'da göstəriləcək</div>
                            </div>

                            <!-- Logo Şəkli -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="logo_image" class="form-label">Logo Şəkli</label>
                                        <input type="file" class="form-control @error('logo_image') is-invalid @enderror" 
                                               id="logo_image" name="logo_image" accept="image/*">
                                        @error('logo_image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">PNG, JPG, SVG formatları qəbul edilir. Max: 2MB</div>
                                        
                                        @if($siteLogo->logo_image)
                                            <div class="mt-3">
                                                <label class="form-label">Hazırki Logo:</label>
                                                <div class="current-logo">
                                                    <img src="{{ $siteLogo->logo_url }}" 
                                                         alt="{{ $siteLogo->site_name }}" 
                                                         style="max-height: 80px; max-width: 200px; object-fit: contain; border: 1px solid #dee2e6; border-radius: 4px; padding: 10px; background: #f8f9fa;">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="favicon" class="form-label">Favicon</label>
                                        <input type="file" class="form-control @error('favicon') is-invalid @enderror" 
                                               id="favicon" name="favicon" accept="image/*,.ico">
                                        @error('favicon')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">ICO, PNG formatları qəbul edilir. Max: 1MB</div>
                                        
                                        @if($siteLogo->favicon)
                                            <div class="mt-3">
                                                <label class="form-label">Hazırki Favicon:</label>
                                                <div class="current-favicon">
                                                    <img src="{{ $siteLogo->favicon_url }}" 
                                                         alt="Favicon" 
                                                         style="width: 32px; height: 32px; object-fit: contain; border: 1px solid #dee2e6; border-radius: 4px; padding: 2px; background: #f8f9fa;">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Parametrlər -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="show_text" name="show_text" 
                                                   {{ old('show_text', $siteLogo->show_text) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="show_text">
                                                Logo Yazısını Göstər
                                            </label>
                                        </div>
                                        <div class="form-text">Navbar'da sayt adını mətn olaraq göstər</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" 
                                                   {{ old('is_active', $siteLogo->is_active) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_active">
                                                Aktiv Logo
                                            </label>
                                        </div>
                                        <div class="form-text">Bu logoyu saytda istifadə et</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Önizləmə -->
                            <div class="mb-4">
                                <label class="form-label">Navbar Önizləməsi:</label>
                                <div class="preview-navbar" style="background: #f8f9fa; border: 1px solid #dee2e6; border-radius: 8px; padding: 20px;">
                                    <div class="d-flex align-items-center">
                                        @if($siteLogo->shouldShowLogo())
                                            <img src="{{ $siteLogo->logo_url }}" 
                                                 alt="{{ $siteLogo->site_name }}" 
                                                 style="height: 40px; margin-right: 10px; object-fit: contain;">
                                        @endif
                                        @if($siteLogo->shouldShowText())
                                            <span style="font-weight: 600; font-size: 1.2rem; color: #333;">{{ $siteLogo->site_name }}</span>
                                        @endif
                                        @if(!$siteLogo->shouldShowLogo() && !$siteLogo->shouldShowText())
                                            <span style="color: #6c757d; font-style: italic;">Logo və ya mətn seçin</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Düymələr -->
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bx bx-save me-2"></i> Yenilə
                                </button>
                                <a href="{{ route('admin.site-logo.index') }}" class="btn btn-secondary">
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
        // Logo və mətn checkbox'larını dinlə
        const showTextCheckbox = document.getElementById('show_text');
        const logoInput = document.getElementById('logo_image');
        const siteNameInput = document.getElementById('site_name');
        
        // Önizləməni yenilə
        function updatePreview() {
            const previewContainer = document.querySelector('.preview-navbar .d-flex');
            const showText = showTextCheckbox.checked;
            const siteName = siteNameInput.value || '{{ $siteLogo->site_name }}';
            
            let previewHTML = '';
            
            // Logo göstər (hazırki logo)
            @if($siteLogo->shouldShowLogo())
                previewHTML += '<img src="{{ $siteLogo->logo_url }}" alt="' + siteName + '" style="height: 40px; margin-right: 10px; object-fit: contain;">';
            @endif
            
            // Mətn göstər
            if (showText) {
                previewHTML += '<span style="font-weight: 600; font-size: 1.2rem; color: #333;">' + siteName + '</span>';
            }
            
            // Heç nə seçilməyibsə
            if (!previewHTML) {
                previewHTML = '<span style="color: #6c757d; font-style: italic;">Logo və ya mətn seçin</span>';
            }
            
            previewContainer.innerHTML = previewHTML;
        }
        
        // Event listener'lar
        showTextCheckbox.addEventListener('change', updatePreview);
        siteNameInput.addEventListener('input', updatePreview);
        
        // İlk yükləmədə önizləməni yenilə
        updatePreview();
    });
</script>
@endpush
