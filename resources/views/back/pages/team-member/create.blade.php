@extends('back.layouts.master')

@section('title', 'Yeni Komanda Üzvü Yarat - İdarə Paneli')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Yeni Komanda Üzvü Yarat</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.team-members.index') }}">Komanda Üzvləri</a></li>
                            <li class="breadcrumb-item active">Yeni Üzv</li>
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
                        <h4 class="card-title">Yeni Komanda Üzvü</h4>
                        <p class="card-title-desc">Komanda üzvünün məlumatlarını daxil edin və şəkil yükləyin.</p>
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

                        <form action="{{ route('admin.team-members.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <!-- Ad -->
                                    <div class="mb-4">
                                        <label for="name" class="form-label">Ad <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                               id="name" name="name" value="{{ old('name') }}" 
                                               placeholder="Məsələn: Ad Soyad">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <!-- Vəzifə -->
                                    <div class="mb-4">
                                        <label for="position" class="form-label">Vəzifə <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('position') is-invalid @enderror" 
                                               id="position" name="position" value="{{ old('position') }}" 
                                               placeholder="Məsələn: İcraçı Direktor">
                                        @error('position')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Təsvir -->
                            <div class="mb-4">
                                <label for="description" class="form-label">Təsvir</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" 
                                          id="description" name="description" rows="4" 
                                          placeholder="Komanda üzvü haqqında qısa təsvir...">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Şəkil -->
                            <div class="mb-4">
                                <label for="image" class="form-label">Şəkil</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                       id="image" name="image">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Komanda üzvünün şəkili. (Max: 2MB)</div>
                            </div>

                            <!-- Sıra -->
                            <div class="mb-4">
                                <label for="order" class="form-label">Sıra <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('order') is-invalid @enderror" 
                                       id="order" name="order" value="{{ old('order', 0) }}" 
                                       min="0" placeholder="Məsələn: 1">
                                @error('order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Üzvün səhifədəki göstərilmə sırası. 0 olarsa, avtomatik təyin ediləcək.</div>
                            </div>

                            <!-- Status -->
                            <div class="mb-4">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" {{ old('is_active', true) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">Aktiv</label>
                                </div>
                                <div class="form-text">Bu üzvü səhifədə göstər.</div>
                            </div>

                            <!-- Düymələr -->
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bx bx-plus me-2"></i> Üzv Yarat
                                </button>
                                <a href="{{ route('admin.team-members.index') }}" class="btn btn-secondary">
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
