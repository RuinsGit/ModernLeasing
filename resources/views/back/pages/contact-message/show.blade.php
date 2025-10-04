@extends('back.layouts.master')

@section('title', 'Mesaj Detalları - İdarə Paneli')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Mesaj Detalları</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.contact-messages.index') }}">Əlaqə Mesajları</a></li>
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
                        <h4 class="card-title">{{ $contactMessage->name }} - Mesaj Detalları</h4>
                        <p class="card-title-desc">Göndərilən mesajın bütün detallarını nəzərdən keçirin.</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <h5 class="font-size-15">Göndərən Adı:</h5>
                                    <p>{{ $contactMessage->name }}</p>
                                </div>
                                <div class="mb-3">
                                    <h5 class="font-size-15">Email:</h5>
                                    <p><a href="mailto:{{ $contactMessage->email }}">{{ $contactMessage->email }}</a></p>
                                </div>
                                <div class="mb-3">
                                    <h5 class="font-size-15">Mövzu:</h5>
                                    <p>{{ $contactMessage->subject ?? '--' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <h5 class="font-size-15">Status:</h5>
                                    <p>
                                        @if($contactMessage->is_read)
                                            <span class="badge bg-success">Oxunub</span>
                                        @else
                                            <span class="badge bg-warning text-dark">Oxunmayıb</span>
                                        @endif
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <h5 class="font-size-15">Göndərilmə Tarixi:</h5>
                                    <p>{{ $contactMessage->created_at->format('d M Y H:i') }}</p>
                                </div>
                                <div class="mb-3">
                                    <h5 class="font-size-15">Son Yenilənmə Tarixi:</h5>
                                    <p>{{ $contactMessage->updated_at->format('d M Y H:i') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <h5 class="font-size-15">Mesaj:</h5>
                            <p>{{ $contactMessage->message }}</p>
                        </div>
                        <div class="d-flex gap-2 mt-4">
                            @if(!$contactMessage->is_read)
                                <form action="{{ route('admin.contact-messages.mark-as-read', $contactMessage->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    <button type="submit" class="btn btn-success">
                                        <i class="bx bx-check me-2"></i> Oxundu kimi qeyd et
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('admin.contact-messages.mark-as-unread', $contactMessage->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    <button type="submit" class="btn btn-warning">
                                        <i class="bx bx-x me-2"></i> Oxunmamış kimi qeyd et
                                    </button>
                                </form>
                            @endif
                            <a href="{{ route('admin.contact-messages.index') }}" class="btn btn-secondary">
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
