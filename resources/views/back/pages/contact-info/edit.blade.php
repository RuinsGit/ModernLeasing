@extends('back.layouts.master')

@section('title', 'Əlaqə Məlumatlarını Redaktə Et - İdarə Paneli')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Əlaqə Məlumatlarını Redaktə Et</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.contact-info.index') }}">Əlaqə Məlumatları</a></li>
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
                        <h4 class="card-title">Əlaqə Məlumatlarını Redaktə Et</h4>
                        <p class="card-title-desc">Saytın əlaqə məlumatlarını yeniləyin (footer və əlaqə səhifəsi üçün)</p>
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

                        <form action="{{ route('admin.contact-info.update', $contactInfo->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <!-- Ünvan -->
                                    <div class="mb-4">
                                        <label for="address" class="form-label">Ünvan</label>
                                        <input type="text" class="form-control @error('address') is-invalid @enderror" 
                                               id="address" name="address" value="{{ old('address', $contactInfo->address) }}" 
                                               placeholder="Məsələn: 28 May küç. 123, Bakı, Azərbaycan AZ1000">
                                        @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Telefon 1 -->
                                    <div class="mb-4">
                                        <label for="phone1" class="form-label">Telefon 1</label>
                                        <input type="text" class="form-control @error('phone1') is-invalid @enderror" 
                                               id="phone1" name="phone1" value="{{ old('phone1', $contactInfo->phone1) }}" 
                                               placeholder="Məsələn: +994 12 345 67 89">
                                        @error('phone1')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Telefon 2 -->
                                    <div class="mb-4">
                                        <label for="phone2" class="form-label">Telefon 2</label>
                                        <input type="text" class="form-control @error('phone2') is-invalid @enderror" 
                                               id="phone2" name="phone2" value="{{ old('phone2', $contactInfo->phone2) }}" 
                                               placeholder="Məsələn: +994 50 345 67 89 (Opsional)">
                                        @error('phone2')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <!-- E-poçt 1 -->
                                    <div class="mb-4">
                                        <label for="email1" class="form-label">E-poçt 1</label>
                                        <input type="email" class="form-control @error('email1') is-invalid @enderror" 
                                               id="email1" name="email1" value="{{ old('email1', $contactInfo->email1) }}" 
                                               placeholder="Məsələn: info@domain.com">
                                        @error('email1')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- E-poçt 2 -->
                                    <div class="mb-4">
                                        <label for="email2" class="form-label">E-poçt 2</label>
                                        <input type="email" class="form-control @error('email2') is-invalid @enderror" 
                                               id="email2" name="email2" value="{{ old('email2', $contactInfo->email2) }}" 
                                               placeholder="Məsələn: support@domain.com (Opsional)">
                                        @error('email2')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- İş Saatları (Həftəiçi) -->
                                    <div class="mb-4">
                                        <label for="working_hours_weekdays" class="form-label">İş Saatları (Həftəiçi)</label>
                                        <textarea class="form-control @error('working_hours_weekdays') is-invalid @enderror" 
                                                  id="working_hours_weekdays" name="working_hours_weekdays" rows="2" 
                                                  placeholder="Məsələn: Bazar ertəsi - Cümə: 09:00 - 18:00">{{ old('working_hours_weekdays', $contactInfo->working_hours_weekdays) }}</textarea>
                                        @error('working_hours_weekdays')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- İş Saatları (Həftəsonu) -->
                                    <div class="mb-4">
                                        <label for="working_hours_weekends" class="form-label">İş Saatları (Həftəsonu)</label>
                                        <textarea class="form-control @error('working_hours_weekends') is-invalid @enderror" 
                                                  id="working_hours_weekends" name="working_hours_weekends" rows="2" 
                                                  placeholder="Məsələn: Şənbə: 09:00 - 14:00, Bazar: Bağlı">{{ old('working_hours_weekends', $contactInfo->working_hours_weekends) }}</textarea>
                                        @error('working_hours_weekends')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Xəritə (Iframe) -->
                                    <div class="mb-4">
                                        <label for="map_iframe" class="form-label">Google Xəritə Iframe Kodu</label>
                                        <textarea class="form-control @error('map_iframe') is-invalid @enderror" 
                                                  id="map_iframe" name="map_iframe" rows="5" 
                                                  placeholder="Google Xəritədən əldə etdiyiniz iframe kodunu bura yapışdırın.">{{ old('map_iframe', $contactInfo->map_iframe) }}</textarea>
                                        @error('map_iframe')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">Google Maps-dən "Embed a map" seçimi ilə əldə etdiyiniz iframe kodunu daxil edin.</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" 
                                           {{ old('is_active', $contactInfo->is_active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">
                                        Aktiv Əlaqə Məlumatları
                                    </label>
                                </div>
                                <div class="form-text">Bu məlumatları saytda göstər</div>
                            </div>

                            <!-- Düymələr -->
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bx bx-save me-2"></i> Əlaqə Məlumatlarını Yenilə
                                </button>
                                <a href="{{ route('admin.contact-info.index') }}" class="btn btn-secondary">
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
