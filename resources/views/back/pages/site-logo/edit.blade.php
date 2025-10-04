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
                        <p class="card-title-desc">Saytın loqosu, adı və əsas parametrlərini idarə edin. Həmçinin "Haqqımızda" səhifəsinin əsas məlumatlarını daxil edin.</p>
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
                            
                            <h5 class="font-size-14 mb-3">Əsas Sayt Məlumatları</h5>
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

                            <!-- Sayt Təsviri -->
                            <div class="mb-4">
                                <label for="site_description" class="form-label">Sayt Təsviri (Footer üçün)</label>
                                <textarea class="form-control @error('site_description') is-invalid @enderror" 
                                          id="site_description" name="site_description" rows="4" 
                                          placeholder="Sayt haqqında qısa təsvir yazın...">{{ old('site_description', $siteLogo->site_description) }}</textarea>
                                @error('site_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Bu təsvir footer hissəsində göstəriləcək</div>
                            </div>

                            <hr class="my-4">

                            <h5 class="font-size-14 mb-3">"Haqqımızda" Səhifəsinin Məlumatları</h5>
                            <div class="row">
                                <div class="col-lg-6">
                                    <!-- Haqqımızda Başlığı -->
                                    <div class="mb-4">
                                        <label for="about_title" class="form-label">Haqqımızda Səhifə Başlığı</label>
                                        <input type="text" class="form-control @error('about_title') is-invalid @enderror" 
                                               id="about_title" name="about_title" value="{{ old('about_title', $siteLogo->about_title) }}" 
                                               placeholder="Haqqımızda bölməsinin başlığını daxil edin...">
                                        @error('about_title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <!-- Haqqımızda Alt Başlığı -->
                                    <div class="mb-4">
                                        <label for="about_subtitle" class="form-label">Haqqımızda Səhifə Alt Başlığı</label>
                                        <textarea class="form-control @error('about_subtitle') is-invalid @enderror" 
                                                  id="about_subtitle" name="about_subtitle" rows="4" 
                                                  placeholder="Haqqımızda bölməsinin alt başlığını daxil edin...">{{ old('about_subtitle', $siteLogo->about_subtitle) }}</textarea>
                                        @error('about_subtitle')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Haqqımızda Şəkli -->
                            <div class="mb-4">
                                <label for="about_image" class="form-label">Haqqımızda Səhifəsi Şəkli</label>
                                <input type="file" class="form-control @error('about_image') is-invalid @enderror" 
                                       id="about_image" name="about_image">
                                @error('about_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Haqqımızda bölməsində göstəriləcək şəkili yükləyin. (Max: 2MB)</div>

                                @if($siteLogo->about_image)
                                    <div class="mt-3">
                                        <label class="form-label">Hazırki Şəkil:</label>
                                        <div class="current-about-image">
                                            <img src="{{ $siteLogo->about_image_url }}" 
                                                 alt="Haqqımızda Şəkli" 
                                                 style="max-height: 150px; max-width: 300px; object-fit: contain; border: 1px solid #dee2e6; border-radius: 4px; padding: 10px; background: #f8f9fa;">
                                        </div>
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="checkbox" id="clear_about_image" name="clear_about_image">
                                            <label class="form-check-label" for="clear_about_image">Şəkli Sil</label>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <hr class="my-4">

                            <h5 class="font-size-14 mb-3">Logo & Favicon</h5>
                            <div class="row">
                                <div class="col-lg-6">
                                    <!-- Logo Şəkli -->
                                    <div class="mb-4">
                                        <label for="logo_image" class="form-label">Logo Şəkli</label>
                                        <input type="file" class="form-control @error('logo_image') is-invalid @enderror" 
                                               id="logo_image" name="logo_image">
                                        @error('logo_image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">Saytın əsas loqosunu yükləyin. (Max: 2MB)</div>
                                        
                                        @if($siteLogo->logo_image)
                                            <div class="mt-3">
                                                <label class="form-label">Hazırki Logo:</label>
                                                <div class="current-logo">
                                                    <img src="{{ $siteLogo->logo_url }}" 
                                                         alt="{{ $siteLogo->site_name }}" 
                                                         style="max-height: 80px; max-width: 200px; object-fit: contain; border: 1px solid #dee2e6; border-radius: 4px; padding: 10px; background: #f8f9fa;">
                                                </div>
                                                <div class="form-check mt-2">
                                                    <input class="form-check-input" type="checkbox" id="clear_logo_image" name="clear_logo_image">
                                                    <label class="form-check-label" for="clear_logo_image">Loqonu Sil</label>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <!-- Favicon -->
                                    <div class="mb-4">
                                        <label for="favicon" class="form-label">Favicon</label>
                                        <input type="file" class="form-control @error('favicon') is-invalid @enderror" 
                                               id="favicon" name="favicon">
                                        @error('favicon')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">Brauzer tabında göstəriləcək ikonu yükləyin. (Max: 1MB)</div>
                                        
                                        @if($siteLogo->favicon)
                                            <div class="mt-3">
                                                <label class="form-label">Hazırki Favicon:</label>
                                                <div class="current-favicon">
                                                    <img src="{{ $siteLogo->favicon_url }}" 
                                                         alt="Favicon" 
                                                         style="width: 32px; height: 32px; object-fit: contain; border: 1px solid #dee2e6; border-radius: 4px; padding: 2px; background: #f8f9fa;">
                                                </div>
                                                <div class="form-check mt-2">
                                                    <input class="form-check-input" type="checkbox" id="clear_favicon" name="clear_favicon">
                                                    <label class="form-check-label" for="clear_favicon">Faviconu Sil</label>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Mətn göstər -->
                            <div class="mb-4">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="show_text" name="show_text" {{ old('show_text', $siteLogo->show_text) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="show_text">Logo yanında sayt adını göstər</label>
                                </div>
                                <div class="form-text">Navbar hissəsində loqo ilə yanaşı sayt adını da göstərmək üçün.</div>
                            </div>

                            <!-- Aktiv Status -->
                            <div class="mb-4">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" {{ old('is_active', $siteLogo->is_active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">Aktiv Logo</label>
                                </div>
                                <div class="form-text">Bu loqonu saytda istifadə et. Yalnız bir logo aktiv ola bilər.</div>
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
        const showTextCheckbox = document.getElementById('show_text');
        const siteNameInput = document.getElementById('site_name');
        
        // Navbar önizləməsini yenilə - Dəyişiklik edildi
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
            
            if (previewContainer) {
                previewContainer.innerHTML = previewHTML;
            }
        }
        
        // Event listener'lar
        if (showTextCheckbox) showTextCheckbox.addEventListener('change', updatePreview);
        if (siteNameInput) siteNameInput.addEventListener('input', updatePreview);
        
        // İlk yükləmədə önizləməni yenilə
        updatePreview();
    });
</script>
@endpush
