@extends('back.layouts.master')

@section('title', 'İnvestor Əlaqə Bölməsi - İdarə Paneli')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">İnvestor Əlaqə Bölməsi Məlumatları</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">İnvestor Əlaqə Bölməsi</li>
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
                                <h4 class="card-title">İnvestor Əlaqə Bölməsi Detalları</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2">
                                    @if($sectionData)
                                    <a href="{{ route('admin.investor-contact-section.edit', $sectionData->id) }}" class="btn btn-primary">
                                        <i class="mdi mdi-pencil me-1"></i> Redaktə Et
                                    </a>
                                    @else
                                    <a href="{{ route('admin.investor-contact-section.create') }}" class="btn btn-success">
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

                        @if($sectionData)
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <tbody>
                                    <tr>
                                        <th scope="row" style="width: 250px;">Başlıq</th>
                                        <td>{{ $sectionData->title }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Alt Başlıq</th>
                                        <td>{{ $sectionData->subtitle }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">1-ci Düymə Mətni</th>
                                        <td>{{ $sectionData->button1_text }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">1-ci Düymə Linki</th>
                                        <td><a href="{{ $sectionData->button1_link }}" target="_blank">{{ $sectionData->button1_link }}</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2-ci Düymə Mətni</th>
                                        <td>{{ $sectionData->button2_text }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2-ci Düymə Linki</th>
                                        <td><a href="{{ $sectionData->button2_link }}" target="_blank">{{ $sectionData->button2_link }}</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Əlaqə Email</th>
                                        <td>{{ $sectionData->email }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Status</th>
                                        <td>
                                            <span class="badge bg-{{ $sectionData->is_active ? 'success' : 'danger' }} font-size-12">
                                                {{ $sectionData->is_active ? 'Aktiv' : 'Deaktiv' }}
                                            </span>
                                            <form action="{{ route('admin.investor-contact-section.toggle-status', $sectionData->id) }}" method="POST" class="d-inline-block ms-2">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-secondary">
                                                    {{ $sectionData->is_active ? 'Deaktiv Et' : 'Aktiv Et' }}
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Yaradılma Tarixi</th>
                                        <td>{{ $sectionData->created_at->format('d M, Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Son Yenilənmə</th>
                                        <td>{{ $sectionData->updated_at->format('d M, Y H:i') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        @else
                        <div class="alert alert-info text-center" role="alert">
                            Hələ ki heç bir investor əlaqə bölməsi məlumatı əlavə edilməyib. Yuxarıdakı düymədən yeni məlumat əlavə edə bilərsiniz.
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container-fluid -->
</div>
@endsection

@push('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if(session('success') || session('error') || session('info'))
            // SweetAlert2 mesajları əvvəlcədən daxil edildiyi üçün burada təkrar etmirik
        @endif
    });
</script>
@endpush
