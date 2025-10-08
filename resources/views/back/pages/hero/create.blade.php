@extends('back.layouts.master')

@section('title', 'Yeni Hero Section - İdarə Paneli')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Yeni Hero Section</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.hero.index') }}">Hero Section</a></li>
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
                        <h4 class="card-title">Yeni Hero Section Əlavə Et</h4>
                        <p class="card-title-desc">Ana səhifənin hero bölümü üçün məlumatları daxil edin</p>
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

                        <form action="{{ route('admin.hero.store') }}" method="POST">
                            @csrf
                            
                            <!-- Ana Başlıq -->
                            <div class="mb-3">
                                <label for="title" class="form-label">Ana Başlıq <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                       id="title" name="title" value="{{ old('title') }}" 
                                       placeholder="Ana başlığı daxil edin">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Alt Başlıq -->
                            <div class="mb-3">
                                <label for="subtitle" class="form-label">Alt Başlıq</label>
                                <textarea class="form-control @error('subtitle') is-invalid @enderror" 
                                          id="subtitle" name="subtitle" rows="3" 
                                          placeholder="Alt başlığı daxil edin (məcburi deyil)">{{ old('subtitle') }}</textarea>
                                @error('subtitle')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Düymələr -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="primary_button_text" class="form-label">Əsas Düymə Mətni <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('primary_button_text') is-invalid @enderror" 
                                               id="primary_button_text" name="primary_button_text" 
                                               value="{{ old('primary_button_text', 'Lizinqə Müraciət Et') }}" 
                                               placeholder="Əsas düymənin mətni">
                                        @error('primary_button_text')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="primary_button_link" class="form-label">Əsas Düymə Linki <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('primary_button_link') is-invalid @enderror" 
                                               id="primary_button_link" name="primary_button_link" 
                                               value="{{ old('primary_button_link', '#') }}" 
                                               placeholder="Məsələn: #contact, /elaqe">
                                        @error('primary_button_link')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="secondary_button_text" class="form-label">İkinci Düymə Mətni <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('secondary_button_text') is-invalid @enderror" 
                                               id="secondary_button_text" name="secondary_button_text" 
                                               value="{{ old('secondary_button_text', 'Əlaqə Saxla') }}" 
                                               placeholder="İkinci düymənin mətni">
                                        @error('secondary_button_text')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="secondary_button_link" class="form-label">İkinci Düymə Linki <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('secondary_button_link') is-invalid @enderror" 
                                               id="secondary_button_link" name="secondary_button_link" 
                                               value="{{ old('secondary_button_link', '#contact') }}" 
                                               placeholder="Məsələn: #contact, /elaqe">
                                        @error('secondary_button_link')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- İstatistikalar -->
                            <h5 class="mb-3">İstatistik Məlumatları</h5>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="happy_customers" class="form-label">Məmnun Müştəri <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control @error('happy_customers') is-invalid @enderror" 
                                               id="happy_customers" name="happy_customers" 
                                               value="{{ old('happy_customers', 3500) }}" min="0"
                                               placeholder="3500">
                                        @error('happy_customers')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="delivered_equipment" class="form-label">Təhvil Verilən Texnika <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control @error('delivered_equipment') is-invalid @enderror" 
                                               id="delivered_equipment" name="delivered_equipment" 
                                               value="{{ old('delivered_equipment', 6800) }}" min="0"
                                               placeholder="6800">
                                        @error('delivered_equipment')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="international_partners" class="form-label">Beynəlxalq Tərəfdaş <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control @error('international_partners') is-invalid @enderror" 
                                               id="international_partners" name="international_partners" 
                                               value="{{ old('international_partners', 25) }}" min="0"
                                               placeholder="25">
                                        @error('international_partners')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="years_experience" class="form-label">İl Təcrübə <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control @error('years_experience') is-invalid @enderror" 
                                               id="years_experience" name="years_experience" 
                                               value="{{ old('years_experience', 15) }}" min="0"
                                               placeholder="15">
                                        @error('years_experience')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Düymələr -->
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="mdi mdi-content-save me-2"></i> Yadda Saxla
                                </button>
                                <a href="{{ route('admin.hero.index') }}" class="btn btn-secondary">
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