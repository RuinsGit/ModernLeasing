@extends('back.layouts.master')

@section('title', 'Tərəfdaşlıq Xüsusiyyəti Detalları - İdarə Paneli')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Tərəfdaşlıq Xüsusiyyəti Detalları</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.partnership-features.index') }}">Tərəfdaşlıq Xüsusiyyətləri</a></li>
                            <li class="breadcrumb-item active">Detallar</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Tərəfdaşlıq Xüsusiyyəti: {{ $partnershipFeature->title }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <tbody>
                                    <tr>
                                        <th>Başlıq</th>
                                        <td>{{ $partnershipFeature->title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Təsvir</th>
                                        <td>{{ $partnershipFeature->description }}</td>
                                    </tr>
                                    <tr>
                                        <th>İkon Class</th>
                                        <td>
                                            @if($partnershipFeature->icon_class)
                                                <i class="{{ $partnershipFeature->icon_class }}" style="font-size: 24px;"></i>
                                                ({{ $partnershipFeature->icon_class }})
                                            @else
                                                Yoxdur
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Şəkil</th>
                                        <td>
                                            @if($partnershipFeature->image_url)
                                                <img src="{{ $partnershipFeature->image_url }}" alt="{{ $partnershipFeature->title }}" class="img-fluid rounded" style="max-width: 200px; height: auto;">
                                            @else
                                                Yoxdur
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Statistika 1 Rəqəm</th>
                                        <td>{{ $partnershipFeature->stat_number_1 ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Statistika 1 Mətn</th>
                                        <td>{{ $partnershipFeature->stat_text_1 ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Statistika 2 Rəqəm</th>
                                        <td>{{ $partnershipFeature->stat_number_2 ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Statistika 2 Mətn</th>
                                        <td>{{ $partnershipFeature->stat_text_2 ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Sıra</th>
                                        <td>{{ $partnershipFeature->order }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            <span class="badge badge-{{ $partnershipFeature->is_active ? 'success' : 'danger' }} font-size-12">
                                                {{ $partnershipFeature->is_active ? 'Aktiv' : 'Deaktiv' }}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Yaradılma Tarixi</th>
                                        <td>{{ $partnershipFeature->created_at->format('d M, Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Son Yenilənmə</th>
                                        <td>{{ $partnershipFeature->updated_at->format('d M, Y H:i') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <a href="{{ route('admin.partnership-features.edit', $partnershipFeature->id) }}" class="btn btn-primary me-2">
                            <i class="bx bx-edit me-1"></i> Redaktə Et
                        </a>
                        <a href="{{ route('admin.partnership-features.index') }}" class="btn btn-secondary">
                            <i class="bx bx-arrow-back me-1"></i> Geri Qayıt
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container-fluid -->
</div>
@endsection
