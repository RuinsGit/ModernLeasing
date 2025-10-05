@extends('back.layouts.master')

@section('title', 'Tərəfdaşlıq Bölməsi - İdarə Paneli')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Tərəfdaşlıq Bölməsi Məlumatları</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tərəfdaşlıq Bölməsi</li>
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
                                <h4 class="card-title">Tərəfdaşlıq Bölməsi Detalları</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2">
                                    @if($partnershipSection)
                                    <a href="{{ route('admin.partnership-section.edit', $partnershipSection->id) }}" class="btn btn-primary">
                                        <i class="mdi mdi-pencil me-1"></i> Redaktə Et
                                    </a>
                                    @else
                                    <a href="{{ route('admin.partnership-section.create') }}" class="btn btn-success">
                                        <i class="mdi mdi-plus me-1"></i> Yeni Yarat
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

                        @if($partnershipSection)
                        <div class="table-responsive">
                            <table class="table table-bordered dt-responsive nowrap w-100">
                                <tbody>
                                    <tr>
                                        <th>Başlıq</th>
                                        <td>{{ $partnershipSection->title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Alt Başlıq</th>
                                        <td>{{ $partnershipSection->subtitle }}</td>
                                    </tr>
                                    <tr>
                                        <th>Yaradılma Tarixi</th>
                                        <td>{{ $partnershipSection->created_at->format('d M, Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Son Yenilənmə</th>
                                        <td>{{ $partnershipSection->updated_at->format('d M, Y H:i') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        @else
                        <div class="alert alert-info text-center" role="alert">
                            Hələ ki heç bir tərəfdaşlıq bölməsi məlumatı əlavə edilməyib. Yuxarıdakı düymədən yeni məlumat əlavə edə bilərsiniz.
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container-fluid -->
</div>
@endsection
