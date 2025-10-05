@extends('back.layouts.master')

@section('title', 'FAQ Sualının Detalları - İdarə Paneli')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">FAQ Sualının Detalları</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.faq-items.index') }}">FAQ Sualları</a></li>
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
                        <h4 class="card-title">Sual: {{ $faqItem->question }}</h4>
                        <p class="card-title-desc">Aşağıda FAQ sualının və cavabının ətraflı məlumatları göstərilmişdir.</p>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <p class="font-size-15 text-muted mb-1"><strong>ID:</strong></p>
                                <h5 class="font-size-14">{{ $faqItem->id }}</h5>
                            </div>
                            <div class="col-md-6">
                                <p class="font-size-15 text-muted mb-1"><strong>Kateqoriya:</strong></p>
                                <h5 class="font-size-14">{{ $faqItem->faqCategory->name ?? 'N/A' }}</h5>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <p class="font-size-15 text-muted mb-1"><strong>Sual:</strong></p>
                                <h5 class="font-size-14">{{ $faqItem->question }}</h5>
                            </div>
                            <div class="col-md-6">
                                <p class="font-size-15 text-muted mb-1"><strong>Sıra:</strong></p>
                                <h5 class="font-size-14">{{ $faqItem->order }}</h5>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <p class="font-size-15 text-muted mb-1"><strong>Cavab:</strong></p>
                                <div class="border p-3 rounded bg-light">
                                    {!! $faqItem->rendered_answer !!}
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <p class="font-size-15 text-muted mb-1"><strong>Status:</strong></p>
                                <h5 class="font-size-14">
                                    <span class="badge bg-{{ $faqItem->is_active ? 'success' : 'danger' }}">
                                        {{ $faqItem->is_active ? 'Aktiv' : 'Deaktiv' }}
                                    </span>
                                </h5>
                            </div>
                            <div class="col-md-6">
                                <p class="font-size-15 text-muted mb-1"><strong>Yaradılma Tarixi:</strong></p>
                                <h5 class="font-size-14">{{ $faqItem->created_at->format('d M Y, H:i') }}</h5>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <p class="font-size-15 text-muted mb-1"><strong>Son Yenilənmə Tarixi:</strong></p>
                                <h5 class="font-size-14">{{ $faqItem->updated_at->format('d M Y, H:i') }}</h5>
                            </div>
                        </div>

                        <div class="mt-4">
                            <a href="{{ route('admin.faq-items.edit', $faqItem->id) }}" class="btn btn-primary me-2">
                                <i class="mdi mdi-pencil me-1"></i> Redaktə Et
                            </a>
                            <a href="{{ route('admin.faq-items.index') }}" class="btn btn-secondary">
                                <i class="mdi mdi-arrow-left me-1"></i> Geri Qayıt
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container-fluid -->
</div>
@endsection
