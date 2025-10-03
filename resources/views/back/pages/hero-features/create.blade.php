@extends('back.layouts.master')

@section('title', 'Yeni Hero Kartı - İdarə Paneli')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Yeni Hero Kartı</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.hero-features.index') }}">Hero Kartları</a></li>
                            <li class="breadcrumb-item active">Yeni Əlavə Et</li>
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
                        <h4 class="card-title">Yeni Hero Kartı Əlavə Et</h4>
                        <p class="card-title-desc">Hero bölümündə göstəriləcək kart məlumatlarını daxil edin</p>
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

                        <form action="{{ route('admin.hero-features.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <!-- Başlıq -->
                            <div class="mb-3">
                                <label for="title" class="form-label">Kart Başlığı <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                       id="title" name="title" value="{{ old('title') }}" 
                                       placeholder="Məsələn: Sürətli Razılaşma">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Açıqlama -->
                            <div class="mb-3">
                                <label for="description" class="form-label">Açıqlama <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('description') is-invalid @enderror" 
                                          id="description" name="description" rows="3" 
                                          placeholder="Kart açıqlamasını daxil edin">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Şəkil Yükləmə -->
                            <div class="mb-3">
                                <label for="image" class="form-label">Şəkil Yüklə <span class="text-danger">*</span></label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                       id="image" name="image" accept="image/*" onchange="previewImage(this)" required>
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Maksimum ölçü: 2MB. Dəstəklənən formatlar: JPEG, PNG, JPG, GIF, SVG</div>
                                
                                <!-- Image Preview -->
                                <div class="mt-3" id="imagePreview" style="display: none;">
                                    <img src="" alt="Preview" class="img-thumbnail" style="max-width: 100px; max-height: 100px;">
                                </div>
                            </div>

                            <!-- Sıra -->
                            <div class="mb-3">
                                <label for="order" class="form-label">Sıralama <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('order') is-invalid @enderror" 
                                       id="order" name="order" value="{{ old('order', 0) }}" min="0"
                                       placeholder="0">
                                @error('order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Kartların göstərilmə sırası (0, 1, 2, ...)</div>
                            </div>

                            <!-- Düymələr -->
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bx bx-save me-2"></i> Yadda Saxla
                                </button>
                                <a href="{{ route('admin.hero-features.index') }}" class="btn btn-secondary">
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

@section('script')
<script>
    function previewImage(input) {
        const preview = document.getElementById('imagePreview');
        const previewImg = preview.querySelector('img');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                preview.style.display = 'block';
            }
            
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.style.display = 'none';
        }
    }
</script>
@endsection