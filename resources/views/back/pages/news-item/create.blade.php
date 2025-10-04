@extends('back.layouts.master')

@section('title', 'Yeni Xəbər Yarat - İdarə Paneli')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Yeni Xəbər Yarat</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.news-items.index') }}">Xəbərlər</a></li>
                            <li class="breadcrumb-item active">Yeni Xəbər</li>
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
                        <h4 class="card-title">Yeni Xəbər</h4>
                        <p class="card-title-desc">Xəbərin məlumatlarını daxil edin.</p>
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

                        <form action="{{ route('admin.news-items.store') }}" method="POST">
                            @csrf
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <!-- Başlıq -->
                                    <div class="mb-4">
                                        <label for="title" class="form-label">Başlıq <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                               id="title" name="title" value="{{ old('title') }}" 
                                               placeholder="Məsələn: Yeni Rəqəmsal Platformamız">
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <!-- Tarix -->
                                    <div class="mb-4">
                                        <label for="news_date" class="form-label">Tarix <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control @error('news_date') is-invalid @enderror" 
                                               id="news_date" name="news_date" value="{{ old('news_date', date('Y-m-d')) }}">
                                        @error('news_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Qısa Təsvir -->
                            <div class="mb-4">
                                <label for="short_description" class="form-label">Qısa Təsvir <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('short_description') is-invalid @enderror" 
                                          id="short_description" name="short_description" rows="3" 
                                          placeholder="Xəbər haqqında qısa məlumat...">{{ old('short_description') }}</textarea>
                                @error('short_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Tam Təsvir -->
                            <div class="mb-4">
                                <label for="description" class="form-label">Tam Təsvir <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('description') is-invalid @enderror" 
                                          id="description" name="description" rows="6" 
                                          placeholder="Xəbər haqqında tam məlumat...">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
                                <div class="form-text">Xəbərin səhifədəki göstərilmə sırası. 0 olarsa, avtomatik təyin ediləcək.</div>
                            </div>

                            <!-- Status -->
                            <div class="mb-4">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" {{ old('is_active', true) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">Aktiv</label>
                                </div>
                                <div class="form-text">Bu xəbəri səhifədə göstər.</div>
                            </div>

                            <!-- Düymələr -->
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bx bx-plus me-2"></i> Xəbər Yarat
                                </button>
                                <a href="{{ route('admin.news-items.index') }}" class="btn btn-secondary">
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
