@extends('back.layouts.master')

@section('title', 'İş Saatlarını Redaktə Et - İdarə Paneli')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">İş Saatlarını Redaktə Et</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.business-hours.index') }}">İş Saatları</a></li>
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
                        <h4 class="card-title">İş Saatlarını Redaktə Et</h4>
                        <p class="card-title-desc">Mövcud iş saatlarını yeniləyin.</p>
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

                        <form action="{{ route('admin.business-hours.update', $businessHour->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <!-- Həftə İçi İş Saatları -->
                            <div class="mb-4">
                                <label for="weekday_hours" class="form-label">Həftə İçi İş Saatları</label>
                                <input type="text" class="form-control @error('weekday_hours') is-invalid @enderror" 
                                       id="weekday_hours" name="weekday_hours" value="{{ old('weekday_hours', $businessHour->weekday_hours) }}" 
                                       placeholder="Məsələn: Bazar ertəsi - Cümə: 09:00 - 18:00">
                                @error('weekday_hours')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Həftə içi iş saatlarını daxil edin.</div>
                            </div>

                            <!-- Həftə Sonu İş Saatları -->
                            <div class="mb-4">
                                <label for="weekend_hours" class="form-label">Həftə Sonu İş Saatları</label>
                                <input type="text" class="form-control @error('weekend_hours') is-invalid @enderror" 
                                       id="weekend_hours" name="weekend_hours" value="{{ old('weekend_hours', $businessHour->weekend_hours) }}" 
                                       placeholder="Məsələn: Şənbə: 09:00 - 14:00, Bazar: Bağlı">
                                @error('weekend_hours')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Həftə sonu iş saatlarını daxil edin.</div>
                            </div>

                            <!-- Status -->
                            <div class="mb-4">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" {{ old('is_active', $businessHour->is_active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">Aktiv</label>
                                </div>
                                <div class="form-text">Bu iş saatları qeydini aktiv et.</div>
                            </div>

                            <!-- Düymələr -->
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bx bx-save me-2"></i> Yenilə
                                </button>
                                <a href="{{ route('admin.business-hours.index') }}" class="btn btn-secondary">
                                    <i class="bx bx-x me-2"></i> Ləğv Et
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
