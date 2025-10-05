@extends('back.layouts.master')

@section('title', 'Yeni Tərəfdaşlıq Bölməsi Yarat - İdarə Paneli')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Yeni Tərəfdaşlıq Bölməsi Yarat</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.partnership-section.index') }}">Tərəfdaşlıq Bölməsi</a></li>
                            <li class="breadcrumb-item active">Yeni Yarat</li>
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
                        <h4 class="card-title">Yeni Tərəfdaşlıq Bölməsi Yarat</h4>
                        <p class="card-title-desc">İnvestorlar səhifəsi üçün ümumi tərəfdaşlıq bölməsi məlumatlarını daxil edin.</p>
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

                        <form action="{{ route('admin.partnership-section.store') }}" method="POST">
                            @csrf
                            
                            <!-- Başlıq -->
                            <div class="mb-4">
                                <label for="title" class="form-label">Başlıq <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                       id="title" name="title" value="{{ old('title') }}" 
                                       placeholder="Məsələn: Tərəfdaşlıq İmkanları">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Alt Başlıq -->
                            <div class="mb-4">
                                <label for="subtitle" class="form-label">Alt Başlıq</label>
                                <textarea class="form-control @error('subtitle') is-invalid @enderror" 
                                          id="subtitle" name="subtitle" rows="4" 
                                          placeholder="Tərəfdaşlıq bölməsi üçün qısa təsvir...">{{ old('subtitle') }}</textarea>
                                @error('subtitle')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Düymələr -->
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bx bx-plus me-2"></i> Bölmə Yarat
                                </button>
                                <a href="{{ route('admin.partnership-section.index') }}" class="btn btn-secondary">
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
