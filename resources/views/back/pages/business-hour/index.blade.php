@extends('back.layouts.master')

@section('title', 'İş Saatları İdarəetməsi - İdarə Paneli')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">İş Saatları İdarəetməsi</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">İş Saatları</li>
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
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="card-title">İş Saatları</h4>
                            @if(!$businessHour)
                                <a href="{{ route('admin.business-hours.create') }}" class="btn btn-primary">
                                    <i class="bx bx-plus me-1"></i> Yeni İş Saatı Əlavə Et
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">

                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="mdi mdi-check-all me-2"></i>
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="mdi mdi-block-helper me-2"></i>
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if(session('info'))
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                <i class="mdi mdi-information me-2"></i>
                                {{ session('info') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if($businessHour)
                            <div class="table-responsive">
                                <table class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Həftə İçi Saatları</th>
                                            <th>Həftə Sonu Saatları</th>
                                            <th>Status</th>
                                            <th>Əməliyyatlar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $businessHour->id }}</td>
                                            <td>{{ $businessHour->weekday_hours ?? 'Təyin edilməyib' }}</td>
                                            <td>{{ $businessHour->weekend_hours ?? 'Təyin edilməyib' }}</td>
                                            <td>
                                                <form action="{{ route('admin.business-hours.toggle-status', $businessHour->id) }}" method="POST" class="d-inline-block">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-{{ $businessHour->is_active ? 'success' : 'danger' }}">
                                                        {{ $businessHour->is_active ? 'Aktiv' : 'Deaktiv' }}
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.business-hours.edit', $businessHour->id) }}" class="btn btn-primary btn-sm"><i class="bx bx-edit"></i> Redaktə Et</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="alert alert-info text-center" role="alert">
                                Hələ ki, heç bir iş saatı qeydi əlavə edilməyib. Yuxarıdakı düymədən yeni iş saatları əlavə edə bilərsiniz.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container-fluid -->
</div>
@endsection
