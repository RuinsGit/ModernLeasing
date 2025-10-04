@extends('back.layouts.master')

@section('title', 'Əlaqə Məlumatları - İdarə Paneli')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Əlaqə Məlumatları</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Sayt Məlumatları</a></li>
                            <li class="breadcrumb-item active">Əlaqə</li>
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
                                <h4 class="card-title">Əlaqə Məlumatları</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2">
                                    @if(!$contactInfo)
                                    <a href="{{ route('admin.contact-info.create') }}" class="btn btn-primary">
                                        <i class="bx bx-plus me-1"></i> Yeni Əlaqə Məlumatı Əlavə Et
                                    </a>
                                    @else
                                    <a href="{{ route('admin.contact-info.edit', $contactInfo->id) }}" class="btn btn-primary">
                                        <i class="bx bx-edit me-1"></i> Əlaqə Məlumatlarını Redaktə Et
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        @if(session('success'))
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    Swal.fire({
                                        position: "center",
                                        icon: "success",
                                        title: "{{ session('success') }}",
                                        showConfirmButton: true,
                                        confirmButtonText: 'Tamam',
                                        timer: 1500
                                    });
                                });
                            </script>
                        @endif

                        @if(session('error'))
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    Swal.fire({
                                        position: "center",
                                        icon: "error",
                                        title: "{{ session('error') }}",
                                        showConfirmButton: true,
                                        confirmButtonText: 'Tamam',
                                        timer: 1500
                                    });
                                });
                            </script>
                        @endif

                        @if(session('info'))
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    Swal.fire({
                                        position: "center",
                                        icon: "info",
                                        title: "{{ session('info') }}",
                                        showConfirmButton: true,
                                        confirmButtonText: 'Tamam',
                                        timer: 2500
                                    });
                                });
                            </script>
                        @endif

                        @if($contactInfo)
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <tbody>
                                        <tr>
                                            <th style="width: 250px;">Ünvan</th>
                                            <td>{{ $contactInfo->address ?: 'Qeyd edilməyib' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Telefon 1</th>
                                            <td>{{ $contactInfo->phone1 ?: 'Qeyd edilməyib' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Telefon 2</th>
                                            <td>{{ $contactInfo->phone2 ?: 'Qeyd edilməyib' }}</td>
                                        </tr>
                                        <tr>
                                            <th>E-poçt 1</th>
                                            <td>{{ $contactInfo->email1 ?: 'Qeyd edilməyib' }}</td>
                                        </tr>
                                        <tr>
                                            <th>E-poçt 2</th>
                                            <td>{{ $contactInfo->email2 ?: 'Qeyd edilməyib' }}</td>
                                        </tr>
                                        <tr>
                                            <th>İş Saatları (Həftəiçi)</th>
                                            <td>{{ $contactInfo->working_hours_weekdays ?: 'Qeyd edilməyib' }}</td>
                                        </tr>
                                        <tr>
                                            <th>İş Saatları (Həftəsonu)</th>
                                            <td>{{ $contactInfo->working_hours_weekends ?: 'Qeyd edilməyib' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td>
                                                <form action="{{ route('admin.contact-info.toggle-status', $contactInfo->id) }}" method="POST" class="d-inline-block">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-{{ $contactInfo->is_active ? 'success' : 'danger' }}">
                                                        {{ $contactInfo->is_active ? 'Aktiv' : 'Deaktiv' }}
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Yaradılma Tarixi</th>
                                            <td>{{ $contactInfo->created_at->format('d.m.Y H:i') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Son Yeniləmə</th>
                                            <td>{{ $contactInfo->updated_at->format('d.m.Y H:i') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Xəritə (Iframe)</th>
                                            <td>
                                                @if($contactInfo->map_iframe)
                                                    <div class="embed-responsive embed-responsive-16by9" style="width: 100%; height: 200px;">
                                                        {!! $contactInfo->map_iframe !!}
                                                    </div>
                                                @else
                                                    Qeyd edilməyib
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="alert alert-info text-center" role="alert">
                                Hələ ki heç bir əlaqə məlumatı əlavə edilməyib. Yuxarıdakı düymədən yeni məlumat əlavə edə bilərsiniz.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container-fluid -->
</div>
@endsection
