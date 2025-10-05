@extends('back.layouts.master')

@section('title', 'Haqqımızda Missiya Bölməsi - İdarə Paneli')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Haqqımızda Missiya Bölməsi</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Haqqımızda Missiya Bölməsi</li>
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
                        <div class="d-flex align-items-center justify-content-between">
                            <h4 class="card-title">Missiya Bölməsi Məlumatları</h4>
                            @if(!$aboutMissionSection)
                                <a href="{{ route('admin.about-mission-section.create') }}" class="btn btn-primary">
                                    <i class="mdi mdi-plus me-1"></i> Yeni Bölmə Yarat
                                </a>
                            @else
                                <a href="{{ route('admin.about-mission-section.edit', $aboutMissionSection->id) }}" class="btn btn-primary">
                                    <i class="mdi mdi-pencil me-1"></i> Bölməni Redaktə Et
                                </a>
                            @endif
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

                        @if($aboutMissionSection)
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <h5 class="font-size-15">Başlıq:</h5>
                                        <p>{{ $aboutMissionSection->title }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <h5 class="font-size-15">Alt Başlıq:</h5>
                                        <p>{{ $aboutMissionSection->subtitle }}</p>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="alert alert-info text-center" role="alert">
                                Hələ ki, Haqqımızda Missiya Bölməsi məlumatları əlavə edilməyib. Yuxarıdakı düymədən yeni bölmə yaradın.
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container-fluid -->
</div>
@endsection
