@extends('back.layouts.master')

@section('title', 'Üstünlük Detalları - İdarə Paneli')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Üstünlük Detalları</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.advantages.index') }}">Üstünlüklər</a></li>
                            <li class="breadcrumb-item active">Detallar</li>
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
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h4 class="card-title mb-0">{{ $advantage->title }}</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2">
                                    <a href="{{ route('admin.advantages.edit', $advantage->id) }}" class="btn btn-primary btn-sm">
                                        <i class="bx bx-edit me-1"></i> Redaktə Et
                                    </a>
                                    <a href="{{ route('admin.advantages.index') }}" class="btn btn-secondary btn-sm">
                                        <i class="bx bx-arrow-back me-1"></i> Geri
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        <div class="row">
                            <!-- Sol tərəf - Əsas məlumatlar -->
                            <div class="col-lg-8">
                                <!-- Üstünlük məlumatları -->
                                <div class="mb-4">
                                    <h5 class="font-size-15 mb-3">Üstünlük Məlumatları</h5>
                                    
                                    <div class="table-responsive">
                                        <table class="table table-borderless mb-0">
                                            <tbody>
                                                <tr>
                                                    <td class="fw-medium" style="width: 150px;">Başlıq:</td>
                                                    <td>{{ $advantage->title }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-medium">Təsvir:</td>
                                                    <td>{{ $advantage->description }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-medium">Icon:</td>
                                                    <td>
                                                        <i class="{{ $advantage->icon_class }} text-primary me-2" style="font-size: 1.2rem;"></i>
                                                        <code>{{ $advantage->icon }}</code>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-medium">Sıra:</td>
                                                    <td>
                                                        <span class="badge badge-soft-info">{{ $advantage->order }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-medium">Status:</td>
                                                    <td>
                                                        @if($advantage->is_active)
                                                            <span class="badge badge-soft-success">Aktiv</span>
                                                        @else
                                                            <span class="badge badge-soft-danger">Deaktiv</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-medium">Yaradılma tarixi:</td>
                                                    <td>{{ $advantage->created_at->format('d.m.Y H:i') }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-medium">Son yeniləmə:</td>
                                                    <td>{{ $advantage->updated_at->format('d.m.Y H:i') }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- Üstünlük Şəkli -->
                                @if($advantage->image)
                                    <div class="mb-4">
                                        <h5 class="font-size-15 mb-3">Üstünlük Şəkli</h5>
                                        <div class="advantage-image">
                                            <img src="{{ $advantage->image_url }}" 
                                                 alt="{{ $advantage->title }}" 
                                                 class="img-fluid" 
                                                 style="max-height: 300px; border: 1px solid #dee2e6; border-radius: 8px;">
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <!-- Sağ tərəf - Önizləmə və əməliyyatlar -->
                            <div class="col-lg-4">
                                <!-- Üstünlük Kartı Önizləməsi -->
                                <div class="mb-4">
                                    <h5 class="font-size-15 mb-3">Frontend Önizləməsi</h5>
                                    <div class="preview-card" style="background: #1F1F1F; border: 1px solid #333; border-radius: 8px; padding: 20px;">
                                        <div class="d-flex align-items-start">
                                            <div class="advantage-icon me-3" style="width: 60px; height: 60px; background: #2289FF; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                                <i class="{{ $advantage->icon_class }} text-white" style="font-size: 1.5rem;"></i>
                                            </div>
                                            <div class="advantage-content flex-grow-1">
                                                <h6 class="text-white mb-2">{{ $advantage->title }}</h6>
                                                <p class="text-light mb-0" style="font-size: 0.85rem;">{{ $advantage->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Əməliyyatlar -->
                                <div class="mb-4">
                                    <h5 class="font-size-15 mb-3">Əməliyyatlar</h5>
                                    <div class="d-grid gap-2">
                                        <a href="{{ route('admin.advantages.edit', $advantage->id) }}" class="btn btn-primary">
                                            <i class="bx bx-edit me-2"></i> Redaktə Et
                                        </a>
                                        
                                        <form action="{{ route('admin.advantages.toggle-status', $advantage->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-{{ $advantage->is_active ? 'warning' : 'success' }} w-100">
                                                <i class="bx bx-{{ $advantage->is_active ? 'hide' : 'show' }} me-2"></i>
                                                {{ $advantage->is_active ? 'Deaktiv Et' : 'Aktiv Et' }}
                                            </button>
                                        </form>
                                        
                                        <form id="delete-form-{{ $advantage->id }}" action="{{ route('admin.advantages.destroy', $advantage->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger w-100" onclick="deleteData({{ $advantage->id }})">
                                                <i class="bx bx-trash me-2"></i> Sil
                                            </button>
                                        </form>
                                    </div>
                                </div>

                                <!-- Məlumat kartı -->
                                <div class="card border">
                                    <div class="card-body">
                                        <h5 class="card-title font-size-15">Statistika</h5>
                                        <div class="row text-center">
                                            <div class="col-6">
                                                <div class="mt-2">
                                                    <p class="text-muted mb-1">ID</p>
                                                    <h5 class="font-size-16 mb-0">{{ $advantage->id }}</h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mt-2">
                                                    <p class="text-muted mb-1">Sıra</p>
                                                    <h5 class="font-size-16 mb-0">{{ $advantage->order }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container-fluid -->
</div>
@endsection

@push('script')
<script>
    // Global deleteData function
    window.deleteData = function(id) {
        Swal.fire({
            title: 'Silmək istədiyinizdən əminsiniz?',
            text: "Bu əməliyyat geri alına bilməz!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Bəli, sil!',
            cancelButtonText: 'Xeyr'
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.getElementById('delete-form-' + id);
                if (form) {
                    form.submit();
                } else {
                    console.error('Form not found for ID:', id);
                }
            }
        });
    };
</script>
@endpush
