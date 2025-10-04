@extends('back.layouts.master')

@section('title', 'Haqqımızda Missiya Kartını Redaktə Et - İdarə Paneli')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Haqqımızda Missiya Kartını Redaktə Et</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.about-mission-card.index') }}">Haqqımızda Missiya Kartları</a></li>
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
                        <h4 class="card-title">Haqqımızda Missiya Kartını Redaktə Et</h4>
                        <p class="card-title-desc">"Haqqımızda" səhifəsindəki "Bizim Missiyamız" bölməsi üçün mövcud kartı yeniləyin.</p>
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

                        <form action="{{ route('admin.about-mission-card.update', $aboutMissionCard->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <!-- Başlıq -->
                                    <div class="mb-4">
                                        <label for="title" class="form-label">Başlıq <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                               id="title" name="title" value="{{ old('title', $aboutMissionCard->title) }}" 
                                               placeholder="Məsələn: Missiya">
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <!-- İkon Class -->
                                    <div class="mb-4">
                                        <label for="icon_class" class="form-label">İkon Class</label>
                                        <input type="text" class="form-control @error('icon_class') is-invalid @enderror" 
                                               id="icon_class" name="icon_class" value="{{ old('icon_class', $aboutMissionCard->icon_class) }}" 
                                               placeholder="Məsələn: fas fa-bullseye">
                                        @error('icon_class')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">FontAwesome ikon classı daxil edin. Məsələn: `fas fa-bullseye`</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Təsvir -->
                            <div class="mb-4">
                                <label for="description" class="form-label">Təsvir <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('description') is-invalid @enderror" 
                                          id="description" name="description" rows="4" 
                                          placeholder="Kart haqqında qısa təsvir...">{{ old('description', $aboutMissionCard->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Sıra -->
                            <div class="mb-4">
                                <label for="order" class="form-label">Sıra <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('order') is-invalid @enderror" 
                                       id="order" name="order" value="{{ old('order', $aboutMissionCard->order) }}" 
                                       min="0" placeholder="Məsələn: 1">
                                @error('order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Kartın səhifədəki göstərilmə sırası. 0 olarsa, avtomatik təyin ediləcək.</div>
                            </div>

                            <!-- Status -->
                            <div class="mb-4">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" {{ old('is_active', $aboutMissionCard->is_active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">Aktiv</label>
                                </div>
                                <div class="form-text">Bu kartı səhifədə göstər.</div>
                            </div>

                            <!-- Düymələr -->
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bx bx-save me-2"></i> Yenilə
                                </button>
                                <a href="{{ route('admin.about-mission-card.index') }}" class="btn btn-secondary">
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
