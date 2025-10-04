@extends('back.layouts.master')

@section('title', 'Şirkət Tarixi Elementi Detalları - İdarə Paneli')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Şirkət Tarixi Elementi Detalları</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.company-history-items.index') }}">Şirkət Tarixi</a></li>
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
                                <h4 class="card-title mb-0">Şirkət Tarixi Elementi</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2">
                                    <a href="{{ route('admin.company-history-items.edit', $companyHistoryItem->id) }}" class="btn btn-primary btn-sm">
                                        <i class="bx bx-edit me-1"></i> Redaktə Et
                                    </a>
                                    <a href="{{ route('admin.company-history-items.index') }}" class="btn btn-secondary btn-sm">
                                        <i class="bx bx-arrow-back me-1"></i> Geri
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="mb-4">
                                    <h5 class="font-size-15 mb-3">Element Məlumatları</h5>
                                    
                                    <div class="table-responsive">
                                        <table class="table table-borderless mb-0">
                                            <tbody>
                                                <tr>
                                                    <td class="fw-medium" style="width: 200px;">ID:</td>
                                                    <td>{{ $companyHistoryItem->id }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-medium">İl:</td>
                                                    <td>{{ $companyHistoryItem->year }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-medium">Başlıq:</td>
                                                    <td>{{ $companyHistoryItem->title }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-medium">Təsvir:</td>
                                                    <td>{{ $companyHistoryItem->description }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-medium">İkon Class:</td>
                                                    <td><i class="{{ $companyHistoryItem->icon_class }}"></i> {{ $companyHistoryItem->icon_class }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-medium">Sıra:</td>
                                                    <td>{{ $companyHistoryItem->order }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-medium">Status:</td>
                                                    <td>
                                                        @if($companyHistoryItem->is_active)
                                                            <span class="badge badge-soft-success">Aktiv</span>
                                                        @else
                                                            <span class="badge badge-soft-danger">Deaktiv</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-medium">Yaradılma tarixi:</td>
                                                    <td>{{ $companyHistoryItem->created_at->format('d.m.Y H:i') }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-medium">Son yeniləmə:</td>
                                                    <td>{{ $companyHistoryItem->updated_at->format('d.m.Y H:i') }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <h5 class="font-size-15 mb-3">Əməliyyatlar</h5>
                                    <div class="d-grid gap-2">
                                        <a href="{{ route('admin.company-history-items.edit', $companyHistoryItem->id) }}" class="btn btn-primary">
                                            <i class="bx bx-edit me-2"></i> Redaktə Et
                                        </a>
                                        
                                        <form action="{{ route('admin.company-history-items.toggle-status', $companyHistoryItem->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-{{ $companyHistoryItem->is_active ? 'warning' : 'success' }} w-100">
                                                <i class="bx bx-{{ $companyHistoryItem->is_active ? 'hide' : 'show' }} me-2"></i>
                                                {{ $companyHistoryItem->is_active ? 'Deaktiv Et' : 'Aktiv Et' }}
                                            </button>
                                        </form>

                                        <form id="delete-form-{{ $companyHistoryItem->id }}" action="{{ route('admin.company-history-items.destroy', $companyHistoryItem->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger w-100" onclick="deleteData({{ $companyHistoryItem->id }})">
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
    // Global deleteData function (mümkünsə bunu master layout'a köçürün)
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
