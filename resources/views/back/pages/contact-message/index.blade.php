@extends('back.layouts.master')

@section('title', 'Əlaqə Mesajları - İdarə Paneli')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Əlaqə Mesajları</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Əlaqə Mesajları</li>
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
                        <h4 class="card-title">Mesajlar Siyahısı</h4>
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

                        @if($messages->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Ad</th>
                                            <th>Email</th>
                                            <th>Mövzu</th>
                                            <th>Mesaj</th>
                                            <th>Status</th>
                                            <th>Tarix</th>
                                            <th>Əməliyyatlar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($messages as $message)
                                            <tr class="{{ $message->is_read ? '' : 'bg-light text-dark fw-bold' }}">
                                                <td>{{ $message->id }}</td>
                                                <td>{{ $message->name }}</td>
                                                <td>{{ $message->email }}</td>
                                                <td>{{ Str::limit($message->subject, 30) ?? '--' }}</td>
                                                <td>{{ Str::limit($message->message, 50) }}</td>
                                                <td>
                                                    @if($message->is_read)
                                                        <span class="badge bg-success">Oxunub</span>
                                                    @else
                                                        <span class="badge bg-warning text-dark">Oxunmayıb</span>
                                                    @endif
                                                </td>
                                                <td>{{ $message->created_at->format('d M Y H:i') }}</td>
                                                <td>
                                                    <a href="{{ route('admin.contact-messages.show', $message->id) }}" class="btn btn-info btn-sm"><i class="bx bx-show"></i></a>
                                                    @if(!$message->is_read)
                                                        <form action="{{ route('admin.contact-messages.mark-as-read', $message->id) }}" method="POST" class="d-inline-block">
                                                            @csrf
                                                            <button type="submit" class="btn btn-success btn-sm" title="Oxundu kimi qeyd et">
                                                                <i class="bx bx-check"></i>
                                                            </button>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('admin.contact-messages.mark-as-unread', $message->id) }}" method="POST" class="d-inline-block">
                                                            @csrf
                                                            <button type="submit" class="btn btn-warning btn-sm" title="Oxunmamış kimi qeyd et">
                                                                <i class="bx bx-x"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                    <form id="delete-form-{{ $message->id }}" action="{{ route('admin.contact-messages.destroy', $message->id) }}" method="POST" class="d-inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteData({{ $message->id }})">
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
                                Hələ ki heç bir əlaqə mesajı yoxdur.
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container-fluid -->
</div>
@endsection

@push('scripts')
<script>
    // SweetAlert üçün global deleteData funksiyası (əgər master layout-da yoxdursa)
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
