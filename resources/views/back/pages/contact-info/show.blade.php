@extends('back.layouts.master')

@section('title', 'Əlaqə Məlumatı Detalları - İdarə Paneli')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Əlaqə Məlumatı Detalları</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.contact-info.index') }}">Əlaqə Məlumatları</a></li>
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
                                <h4 class="card-title mb-0">Əlaqə Məlumatları</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2">
                                    <a href="{{ route('admin.contact-info.edit', $contactInfo->id) }}" class="btn btn-primary btn-sm">
                                        <i class="bx bx-edit me-1"></i> Redaktə Et
                                    </a>
                                    <a href="{{ route('admin.contact-info.index') }}" class="btn btn-secondary btn-sm">
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
                                <!-- Məlumatlar -->
                                <div class="mb-4">
                                    <h5 class="font-size-15 mb-3">Əlaqə Məlumatları</h5>
                                    
                                    <div class="table-responsive">
                                        <table class="table table-borderless mb-0">
                                            <tbody>
                                                <tr>
                                                    <td class="fw-medium" style="width: 250px;">Ünvan:</td>
                                                    <td>{{ $contactInfo->address ?: 'Qeyd edilməyib' }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-medium">Telefon 1:</td>
                                                    <td>{{ $contactInfo->phone1 ?: 'Qeyd edilməyib' }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-medium">Telefon 2:</td>
                                                    <td>{{ $contactInfo->phone2 ?: 'Qeyd edilməyib' }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-medium">E-poçt 1:</td>
                                                    <td>{{ $contactInfo->email1 ?: 'Qeyd edilməyib' }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-medium">E-poçt 2:</td>
                                                    <td>{{ $contactInfo->email2 ?: 'Qeyd edilməyib' }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-medium">İş Saatları (Həftəiçi):</td>
                                                    <td>{{ $contactInfo->working_hours_weekdays ?: 'Qeyd edilməyib' }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-medium">İş Saatları (Həftəsonu):</td>
                                                    <td>{{ $contactInfo->working_hours_weekends ?: 'Qeyd edilməyib' }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-medium">Status:</td>
                                                    <td>
                                                        @if($contactInfo->is_active)
                                                            <span class="badge badge-soft-success">Aktiv</span>
                                                        @else
                                                            <span class="badge badge-soft-danger">Deaktiv</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-medium">Yaradılma tarixi:</td>
                                                    <td>{{ $contactInfo->created_at->format('d.m.Y H:i') }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-medium">Son yeniləmə:</td>
                                                    <td>{{ $contactInfo->updated_at->format('d.m.Y H:i') }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>

                            <!-- Əməliyyatlar -->
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <h5 class="font-size-15 mb-3">Əməliyyatlar</h5>
                                    <div class="d-grid gap-2">
                                        <a href="{{ route('admin.contact-info.edit', $contactInfo->id) }}" class="btn btn-primary">
                                            <i class="bx bx-edit me-2"></i> Redaktə Et
                                        </a>
                                        
                                        <form action="{{ route('admin.contact-info.toggle-status', $contactInfo->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-{{ $contactInfo->is_active ? 'warning' : 'success' }} w-100">
                                                <i class="bx bx-{{ $contactInfo->is_active ? 'hide' : 'show' }} me-2"></i>
                                                {{ $contactInfo->is_active ? 'Deaktiv Et' : 'Aktiv Et' }}
                                            </button>
                                        </form>

                                        <form id="delete-form-{{ $contactInfo->id }}" action="{{ route('admin.contact-info.destroy', $contactInfo->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger w-100" onclick="deleteData({{ $contactInfo->id }})">
                                                <i class="bx bx-trash me-2"></i> Sil
                                            </button>
                                        </form>
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
