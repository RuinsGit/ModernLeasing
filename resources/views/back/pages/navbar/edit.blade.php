@extends('back.layouts.master')

@section('title', 'Navbar Menyu Redaktə Et - İdarə Paneli')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Navbar Menyu Redaktə Et</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.navbar.index') }}">Navbar Menyu</a></li>
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
                        <h4 class="card-title">Navbar Menyu Redaktə Et</h4>
                        <p class="card-title-desc">Navbar'da göstəriləcək menyu elementini yeniləyin</p>
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

                        <form action="{{ route('admin.navbar.update', $navbar->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <!-- Başlıq -->
                            <div class="mb-3">
                                <label for="title" class="form-label">Menyu Başlığı <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                       id="title" name="title" value="{{ old('title', $navbar->title) }}" 
                                       placeholder="Məsələn: Ana Səhifə, Haqqımızda">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Route və ya URL -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="route_name" class="form-label">Laravel Route Adı</label>
                                        <input type="text" class="form-control @error('route_name') is-invalid @enderror" 
                                               id="route_name" name="route_name" value="{{ old('route_name', $navbar->route_name) }}" 
                                               placeholder="Məsələn: front.index, front.about">
                                        @error('route_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">Laravel route adı (tövsiyə edilir)</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="url" class="form-label">Direkt URL</label>
                                        <input type="text" class="form-control @error('url') is-invalid @enderror" 
                                               id="url" name="url" value="{{ old('url', $navbar->url_raw ?? '') }}" 
                                               placeholder="Məsələn: https://example.com">
                                        @error('url')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">Route yoxdursa istifadə edin</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Icon və Sıra -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="icon" class="form-label">FontAwesome Icon</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control @error('icon') is-invalid @enderror" 
                                                   id="icon" name="icon" value="{{ old('icon', $navbar->icon) }}" 
                                                   placeholder="Məsələn: fas fa-home, fas fa-info-circle">
                                            <div class="input-group-text">
                                                @if($navbar->icon)
                                                    <i class="{{ $navbar->icon }}"></i>
                                                @else
                                                    <i class="fas fa-circle"></i>
                                                @endif
                                            </div>
                                        </div>
                                        @error('icon')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">
                                            Mobil navbar üçün icon. 
                                            <a href="https://fontawesome.com/icons" target="_blank">FontAwesome iconları</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="order" class="form-label">Sıralama <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control @error('order') is-invalid @enderror" 
                                               id="order" name="order" value="{{ old('order', $navbar->order) }}" min="0"
                                               placeholder="0">
                                        @error('order')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">Menyu elementlərinin göstərilmə sırası</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Checkbox'lar -->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" 
                                                   {{ old('is_active', $navbar->is_active) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_active">
                                                Aktiv
                                            </label>
                                        </div>
                                        <div class="form-text">Menyu elementini aktiv et</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="show_desktop" name="show_desktop" 
                                                   {{ old('show_desktop', $navbar->show_desktop) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="show_desktop">
                                                Desktop'da Göstər
                                            </label>
                                        </div>
                                        <div class="form-text">Desktop navbar'da göstər</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="show_mobile" name="show_mobile" 
                                                   {{ old('show_mobile', $navbar->show_mobile) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="show_mobile">
                                                Mobil'də Göstər
                                            </label>
                                        </div>
                                        <div class="form-text">Mobil navbar'da göstər</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Düymələr -->
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bx bx-save me-2"></i> Yenilə
                                </button>
                                <a href="{{ route('admin.navbar.index') }}" class="btn btn-secondary">
                                    <i class="bx bx-x me-2"></i> İmtina Et
                                </a>
                                <a href="{{ route('admin.navbar.show', $navbar->id) }}" class="btn btn-info">
                                    <i class="bx bx-show me-2"></i> Bax
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
    // Icon preview update
    document.getElementById('icon').addEventListener('input', function() {
        const iconPreview = document.querySelector('.input-group-text i');
        const iconValue = this.value.trim();
        
        if (iconValue) {
            iconPreview.className = iconValue;
        } else {
            iconPreview.className = 'fas fa-circle';
        }
    });
</script>
@endpush
