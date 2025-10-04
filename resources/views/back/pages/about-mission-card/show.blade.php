@extends('back.layouts.master')

@section('title', 'Haqqımızda Missiya Kartı Detalları - İdarə Paneli')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Haqqımızda Missiya Kartı Detalları</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.about-mission-card.index') }}">Haqqımızda Missiya Kartları</a></li>
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
                        <h4 class="card-title">{{ $aboutMissionCard->title }} Detalları</h4>
                        <p class="card-title-desc">"Haqqımızda" səhifəsindəki "Bizim Missiyamız" bölməsinin kart detalını nəzərdən keçirin.</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <h5 class="font-size-15">Başlıq:</h5>
                                    <p>{{ $aboutMissionCard->title }}</p>
                                </div>
                                <div class="mb-3">
                                    <h5 class="font-size-15">Təsvir:</h5>
                                    <p>{{ $aboutMissionCard->description }}</p>
                                </div>
                                <div class="mb-3">
                                    <h5 class="font-size-15">İkon Class:</h5>
                                    <p><i class="{{ $aboutMissionCard->icon_class }}"></i> {{ $aboutMissionCard->icon_class }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <h5 class="font-size-15">Sıra:</h5>
                                    <p>{{ $aboutMissionCard->order }}</p>
                                </div>
                                <div class="mb-3">
                                    <h5 class="font-size-15">Status:</h5>
                                    <p>
                                        @if($aboutMissionCard->is_active)
                                            <span class="badge bg-success">Aktiv</span>
                                        @else
                                            <span class="badge bg-danger">Deaktiv</span>
                                        @endif
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <h5 class="font-size-15">Yaradılma Tarixi:</h5>
                                    <p>{{ $aboutMissionCard->created_at->format('d M Y H:i') }}</p>
                                </div>
                                <div class="mb-3">
                                    <h5 class="font-size-15">Son Yenilənmə Tarixi:</h5>
                                    <p>{{ $aboutMissionCard->updated_at->format('d M Y H:i') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex gap-2 mt-4">
                            <a href="{{ route('admin.about-mission-card.edit', $aboutMissionCard->id) }}" class="btn btn-primary">
                                <i class="bx bx-edit me-2"></i> Redaktə Et
                            </a>
                            <a href="{{ route('admin.about-mission-card.index') }}" class="btn btn-secondary">
                                <i class="bx bx-arrow-back me-2"></i> Geri Qayıt
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container-fluid -->
</div>
@endsection
