@extends('back.layouts.master')

@section('title', 'Tərəfdaşlıq Növünün Detalları - İdarə Paneli')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Tərəfdaşlıq Növünün Detalları</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.partnership-types.index') }}">Tərəfdaşlıq Növləri</a></li>
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
                        <h4 class="card-title">Tərəfdaşlıq Növü: {{ $partnershipType->title }}</h4>
                        <p class="card-title-desc">Seçilmiş tərəfdaşlıq növünün ətraflı məlumatları.</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <tbody>
                                    <tr>
                                        <th scope="row" style="width: 200px;">ID</th>
                                        <td>{{ $partnershipType->id }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Başlıq</th>
                                        <td>{{ $partnershipType->title }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Təsvir</th>
                                        <td>{{ $partnershipType->description ?? 'Təyin edilməyib' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">İkon Class</th>
                                        <td>
                                            @if($partnershipType->icon_class)
                                                <i class="{{ $partnershipType->icon_class }} font-size-20 me-2"></i> {{ $partnershipType->icon_class }}
                                            @else
                                                Təyin edilməyib
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Faydalar</th>
                                        <td>
                                            @if(is_array($partnershipType->benefits) && count($partnershipType->benefits) > 0)
                                                <ul class="list-unstyled mb-0">
                                                    @foreach($partnershipType->benefits as $benefit)
                                                        <li><i class="ri-check-line align-middle me-1 text-success"></i> {{ $benefit }}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                Yoxdur
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Sıra</th>
                                        <td>{{ $partnershipType->order }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Status</th>
                                        <td>
                                            <span class="badge bg-{{ $partnershipType->is_active ? 'success' : 'danger' }} font-size-12">
                                                {{ $partnershipType->is_active ? 'Aktiv' : 'Deaktiv' }}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Yaradılma Tarixi</th>
                                        <td>{{ $partnershipType->created_at->format('d M, Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Son Yenilənmə</th>
                                        <td>{{ $partnershipType->updated_at->format('d M, Y H:i') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-4">
                            <a href="{{ route('admin.partnership-types.edit', $partnershipType->id) }}" class="btn btn-primary me-2"><i class="bx bx-edit me-1"></i> Redaktə Et</a>
                            <a href="{{ route('admin.partnership-types.index') }}" class="btn btn-secondary"><i class="bx bx-arrow-back me-1"></i> Geri Qayıt</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container-fluid -->
</div>
@endsection
