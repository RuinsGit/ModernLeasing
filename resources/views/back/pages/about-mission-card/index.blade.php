@extends('back.layouts.master')

@section('title', 'Haqqımızda Missiya Kartları - İdarə Paneli')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Haqqımızda Missiya Kartları</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Haqqımızda Missiya Kartları</li>
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
                            <h4 class="card-title">Missiya Kartları Siyahısı</h4>
                            <a href="{{ route('admin.about-mission-card.create') }}" class="btn btn-primary">
                                <i class="bx bx-plus me-1"></i> Yeni Kart Əlavə Et
                            </a>
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

                        @if($missionCards->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Başlıq</th>
                                            <th>İkon</th>
                                            <th>Sıra</th>
                                            <th>Status</th>
                                            <th>Əməliyyatlar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($missionCards as $card)
                                            <tr>
                                                <td>{{ $card->id }}</td>
                                                <td>{{ $card->title }}</td>
                                                <td><i class="{{ $card->icon_class }}"></i></td>
                                                <td>{{ $card->order }}</td>
                                                <td>
                                                    <form action="{{ route('admin.about-mission-card.toggle-status', $card->id) }}" method="POST" class="d-inline-block">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-{{ $card->is_active ? 'success' : 'danger' }}">
                                                            {{ $card->is_active ? 'Aktiv' : 'Deaktiv' }}
                                                        </button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.about-mission-card.show', $card->id) }}" class="btn btn-info btn-sm"><i class="bx bx-show"></i></a>
                                                    <a href="{{ route('admin.about-mission-card.edit', $card->id) }}" class="btn btn-primary btn-sm"><i class="bx bx-edit"></i></a>
                                                    <form id="delete-form-{{ $card->id }}" action="{{ route('admin.about-mission-card.destroy', $card->id) }}" method="POST" class="d-inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteData({{ $card->id }})">
                                                            <i class="bx bx-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="alert alert-info text-center" role="alert">
                                Hələ ki heç bir Missiya Kartı əlavə edilməyib. Yuxarıdakı düymədən yeni kart əlavə edə bilərsiniz.
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
    // SweetAlert üçün global deleteData funksiyası (əgər master layout-da yoxdursa)
    // Əgər artıq master layout-da mövcuddursa, bu kodu silə bilərsiniz.
    if (typeof window.deleteData === 'undefined') {
        window.deleteData = function(id) {
            Swal.fire({
                title: 'Silmək istədiyinizdən əminsiniz?',
                text: "Bu əməliyyat geri alına bilməz!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Bəli, sil!',
                cancelButtonText: 'Xeyr'
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.getElementById('delete-form-' + id);
                    if (form) {
                        form.submit();
                    } else {
                        console.error('Form not found for ID:', id);
                    }
                }
            });
        };
    }
</script>
@endpush
