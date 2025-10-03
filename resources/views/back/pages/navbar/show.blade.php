@extends('back.layouts.master')

@section('title', 'Navbar Menyu Detalları - İdarə Paneli')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Navbar Menyu Detalları</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.navbar.index') }}">Navbar Menyu</a></li>
                            <li class="breadcrumb-item active">Detallar</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            @if($navbar->icon)
                                <div class="avatar-sm me-3">
                                    <span class="avatar-title bg-soft-primary text-primary rounded">
                                        <i class="{{ $navbar->icon }} font-size-18"></i>
                                    </span>
                                </div>
                            @endif
                            <div class="flex-grow-1">
                                <h4 class="card-title mb-1">{{ $navbar->title }}</h4>
                                <p class="card-title-desc mb-0">Navbar menyu elementi detalları</p>
                            </div>
                            <div class="flex-shrink-0">
                                <span class="badge badge-soft-{{ $navbar->is_active ? 'success' : 'danger' }} font-size-12">
                                    {{ $navbar->is_active ? 'Aktiv' : 'Deaktiv' }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card border shadow-none">
                                    <div class="card-header bg-transparent border-bottom">
                                        <h5 class="my-0">
                                            <i class="mdi mdi-information-outline me-2"></i>
                                            Əsas Məlumatlar
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-nowrap mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row" style="width: 50%;">Başlıq:</th>
                                                        <td>{{ $navbar->title }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Route Adı:</th>
                                                        <td>
                                                            @if($navbar->route_name)
                                                                <span class="badge badge-soft-primary">{{ $navbar->route_name }}</span>
                                                            @else
                                                                <span class="text-muted">Təyin edilməyib</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">URL:</th>
                                                        <td>
                                                            @if($navbar->url_raw)
                                                                <a href="{{ $navbar->url_raw }}" target="_blank" class="text-primary">
                                                                    {{ Str::limit($navbar->url_raw, 40) }}
                                                                    <i class="mdi mdi-open-in-new ms-1"></i>
                                                                </a>
                                                            @else
                                                                <span class="text-muted">Direkt URL yoxdur</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Final URL:</th>
                                                        <td>
                                                            <a href="{{ $navbar->url }}" target="_blank" class="text-success">
                                                                {{ $navbar->url }}
                                                                <i class="mdi mdi-open-in-new ms-1"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Icon:</th>
                                                        <td>
                                                            @if($navbar->icon)
                                                                <div class="d-flex align-items-center">
                                                                    <i class="{{ $navbar->icon }} me-2 text-primary"></i>
                                                                    <code>{{ $navbar->icon }}</code>
                                                                </div>
                                                            @else
                                                                <span class="text-muted">Icon təyin edilməyib</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Sıralama:</th>
                                                        <td>
                                                            <span class="badge badge-soft-info">{{ $navbar->order }}</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card border shadow-none">
                                    <div class="card-header bg-transparent border-bottom">
                                        <h5 class="my-0">
                                            <i class="mdi mdi-cog-outline me-2"></i>
                                            Parametrlər
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-nowrap mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row" style="width: 50%;">Status:</th>
                                                        <td>
                                                            <span class="badge badge-soft-{{ $navbar->is_active ? 'success' : 'danger' }}">
                                                                {{ $navbar->is_active ? 'Aktiv' : 'Deaktiv' }}
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Desktop'da Göstər:</th>
                                                        <td>
                                                            <span class="badge badge-soft-{{ $navbar->show_desktop ? 'success' : 'danger' }}">
                                                                {{ $navbar->show_desktop ? 'Bəli' : 'Xeyr' }}
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Mobil'də Göstər:</th>
                                                        <td>
                                                            <span class="badge badge-soft-{{ $navbar->show_mobile ? 'success' : 'danger' }}">
                                                                {{ $navbar->show_mobile ? 'Bəli' : 'Xeyr' }}
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Yaradılma Tarixi:</th>
                                                        <td>{{ $navbar->created_at->format('d.m.Y H:i') }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Son Yeniləmə:</th>
                                                        <td>{{ $navbar->updated_at->format('d.m.Y H:i') }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <!-- Preview Card -->
                                <div class="card border shadow-none mt-3">
                                    <div class="card-header bg-transparent border-bottom">
                                        <h5 class="my-0">
                                            <i class="mdi mdi-eye-outline me-2"></i>
                                            Önizləmə
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <h6 class="font-size-14 mb-2">Desktop Navbar:</h6>
                                            @if($navbar->show_desktop)
                                                <div class="p-2 bg-light rounded">
                                                    <a href="{{ $navbar->url }}" class="text-decoration-none text-dark fw-medium">
                                                        {{ $navbar->title }}
                                                    </a>
                                                </div>
                                            @else
                                                <div class="p-2 bg-light rounded text-muted">
                                                    Desktop'da göstərilmir
                                                </div>
                                            @endif
                                        </div>

                                        <div>
                                            <h6 class="font-size-14 mb-2">Mobil Navbar:</h6>
                                            @if($navbar->show_mobile)
                                                <div class="p-2 bg-light rounded text-center" style="max-width: 120px;">
                                                    <div class="d-flex flex-column align-items-center">
                                                        @if($navbar->icon)
                                                            <i class="{{ $navbar->icon }} mb-1"></i>
                                                        @endif
                                                        <small class="text-dark">{{ $navbar->title }}</small>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="p-2 bg-light rounded text-muted">
                                                    Mobil'də göstərilmir
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="mt-4 d-flex gap-2">
                            <a href="{{ route('admin.navbar.edit', $navbar->id) }}" class="btn btn-primary">
                                <i class="bx bx-edit me-2"></i> Redaktə Et
                            </a>
                            <a href="{{ route('admin.navbar.index') }}" class="btn btn-secondary">
                                <i class="bx bx-arrow-back me-2"></i> Geri Qayıt
                            </a>
                            <form action="{{ route('admin.navbar.toggle-status', $navbar->id) }}" method="POST" class="d-inline-block">
                                @csrf
                                <button type="submit" class="btn btn-{{ $navbar->is_active ? 'warning' : 'success' }}">
                                    <i class="bx bx-{{ $navbar->is_active ? 'hide' : 'show' }} me-2"></i>
                                    {{ $navbar->is_active ? 'Deaktiv Et' : 'Aktiv Et' }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container-fluid -->
</div>
@endsection
