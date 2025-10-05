@extends('back.layouts.master')

@section('title', 'İnvestor Əlaqə Bölməsini Redaktə Et - İdarə Paneli')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">İnvestor Əlaqə Bölməsini Redaktə Et</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.investor-contact-section.index') }}">İnvestor Əlaqə Bölməsi</a></li>
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
                        <h4 class="card-title">İnvestor Əlaqə Bölməsi Məlumatlarını Redaktə Et</h4>
                        <p class="card-title-desc">İnvestor səhifəsindəki əlaqə bölməsinin məlumatlarını yeniləyin.</p>
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

                        <form action="{{ route('admin.investor-contact-section.update', $investorContactSection->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <!-- Başlıq -->
                                    <div class="mb-4">
                                        <label for="title" class="form-label">Bölmə Başlığı <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                               id="title" name="title" value="{{ old('title', $investorContactSection->title) }}" 
                                               placeholder="Məsələn: Bizimlə Tərəfdaşlığa Hazırsınız?">
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <!-- 1-ci Düymə Mətni -->
                                    <div class="mb-4">
                                        <label for="button1_text" class="form-label">1-ci Düymə Mətni</label>
                                        <input type="text" class="form-control @error('button1_text') is-invalid @enderror" 
                                               id="button1_text" name="button1_text" value="{{ old('button1_text', $investorContactSection->button1_text) }}" 
                                               placeholder="Məsələn: Əlaqə Saxlayın">
                                        @error('button1_text')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- 1-ci Düymə Linki -->
                                    <div class="mb-4">
                                        <label for="button1_link" class="form-label">1-ci Düymə Linki</label>
                                        <input type="text" class="form-control @error('button1_link') is-invalid @enderror" 
                                               id="button1_link" name="button1_link" value="{{ old('button1_link', $investorContactSection->button1_link) }}" 
                                               placeholder="Məsələn: {{ route('front.contact') }}">
                                        @error('button1_link')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">Daxili linklər üçün `{{ route('front.contact') }}` kimi və ya xarici linklər üçün tam URL daxil edin.</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <!-- Email -->
                                    <div class="mb-4">
                                        <label for="email" class="form-label">Əlaqə Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                               id="email" name="email" value="{{ old('email', $investorContactSection->email) }}" 
                                               placeholder="Məsələn: info@example.com">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- 2-ci Düymə Mətni -->
                                    <div class="mb-4">
                                        <label for="button2_text" class="form-label">2-ci Düymə Mətni</label>
                                        <input type="text" class="form-control @error('button2_text') is-invalid @enderror" 
                                               id="button2_text" name="button2_text" value="{{ old('button2_text', $investorContactSection->button2_text) }}" 
                                               placeholder="Məsələn: +994 12 345 67 89">
                                        @error('button2_text')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- 2-ci Düymə Linki -->
                                    <div class="mb-4">
                                        <label for="button2_link" class="form-label">2-ci Düymə Linki</label>
                                        <input type="text" class="form-control @error('button2_link') is-invalid @enderror" 
                                               id="button2_link" name="button2_link" value="{{ old('button2_link', $investorContactSection->button2_link) }}" 
                                               placeholder="Məsələn: tel:+994123456789">
                                        @error('button2_link')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">Telefon zəngi üçün `tel:+994XXXXXXXXX` və ya WhatsApp üçün `https://wa.me/994XXXXXXXXX` kimi daxil edin.</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Alt Başlıq -->
                            <div class="mb-4">
                                <label for="subtitle" class="form-label">Alt Başlıq</label>
                                <textarea class="form-control @error('subtitle') is-invalid @enderror" 
                                          id="subtitle" name="subtitle" rows="3" 
                                          placeholder="Bölmənin alt başlığını daxil edin...">{{ old('subtitle', $investorContactSection->subtitle) }}</textarea>
                                @error('subtitle')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!-- Status -->
                            <div class="mb-4">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" {{ old('is_active', $investorContactSection->is_active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">Aktiv</label>
                                </div>
                                <div class="form-text">Bu bölməni aktiv edin/deaktiv edin.</div>
                            </div>

                            <!-- Düymələr -->
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="mdi mdi-content-save me-2"></i> Yenilə
                                </button>
                                <a href="{{ route('admin.investor-contact-section.index') }}" class="btn btn-secondary">
                                    <i class="mdi mdi-cancel me-2"></i> İmtina Et
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
