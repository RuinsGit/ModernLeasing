@extends('back.layouts.master')

@section('title', 'Haqqımızda Missiya Bölməsini Redaktə Et - İdarə Paneli')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Haqqımızda Missiya Bölməsini Redaktə Et</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.about-mission-section.index') }}">Haqqımızda Missiya Bölməsi</a></li>
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
                        <h4 class="card-title">Haqqımızda Missiya Bölməsini Redaktə Et</h4>
                        <p class="card-title-desc">"Haqqımızda" səhifəsindəki "Bizim Missiyamız" bölməsinin əsas məlumatlarını yeniləyin.</p>
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

                        <form action="{{ route('admin.about-mission-section.update', $aboutMissionSection->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <!-- Başlıq -->
                            <div class="mb-4">
                                <label for="title" class="form-label">Bölmə Başlığı <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                       id="title" name="title" value="{{ old('title', $aboutMissionSection->title) }}" 
                                       placeholder="Məsələn: Bizim Missiyamız">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Alt Başlıq -->
                            <div class="mb-4">
                                <label for="subtitle" class="form-label">Bölmə Alt Başlığı</label>
                                <textarea class="form-control @error('subtitle') is-invalid @enderror" 
                                          id="subtitle" name="subtitle" rows="4" 
                                          placeholder="Məsələn: Müştəri yönümlü yanaşma ilə keyfiyyətli və rəqabətli həllər təqdim etmək">{{ old('subtitle', $aboutMissionSection->subtitle) }}</textarea>
                                @error('subtitle')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Düymələr -->
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bx bx-save me-2"></i> Yenilə
                                </button>
                                <a href="{{ route('admin.about-mission-section.index') }}" class="btn btn-secondary">
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
