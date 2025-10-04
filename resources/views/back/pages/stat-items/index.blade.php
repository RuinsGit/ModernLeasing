@extends('back.layouts.master')

@section('title', 'Statistika Elementləri - İdarə Paneli')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Statistika Elementləri İdarəetməsi</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Statistika</a></li>
                            <li class="breadcrumb-item active">Elementlər</li>
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
                                <h4 class="card-title">Statistika Elementləri Siyahısı</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2">
                                    <a href="{{ route('admin.stat-items.create') }}" class="btn btn-primary">
                                        <i class="bx bx-plus me-1"></i> Yeni Statistika Elementi Əlavə Et
                                    </a>
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

                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap table-check">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 20px;" class="align-middle">
                                            <div class="form-check font-size-16">
                                                <input class="form-check-input" type="checkbox" id="checkAll">
                                                <label class="form-check-label" for="checkAll"></label>
                                            </div>
                                        </th>
                                        <th class="align-middle">Icon</th>
                                        <th class="align-middle">Başlıq</th>
                                        <th class="align-middle">Dəyər</th>
                                        <th class="align-middle">Sıra</th>
                                        <th class="align-middle">Status</th>
                                        <th class="align-middle">Əməliyyatlar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($statItems as $statItem)
                                        <tr>
                                            <td>
                                                <div class="form-check font-size-16">
                                                    <input class="form-check-input" type="checkbox" id="statItemcheck{{ $statItem->id }}">
                                                    <label class="form-check-label" for="statItemcheck{{ $statItem->id }}"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="avatar-sm">
                                                    <span class="avatar-title bg-soft-primary text-primary rounded" 
                                                          style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                                        <i class="{{ $statItem->icon_class }} font-size-18"></i>
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <h5 class="font-size-14 mb-1">{{ $statItem->title }}</h5>
                                                @if($statItem->is_active)
                                                    <span class="badge badge-soft-success font-size-11">Aktiv</span>
                                                @else
                                                    <span class="badge badge-soft-danger font-size-11">Deaktiv</span>
                                                @endif
                                            </td>
                                            <td>
                                                <span class="badge badge-soft-info font-size-12">
                                                    {{ $statItem->value }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge badge-soft-secondary font-size-12">
                                                    {{ $statItem->order }}
                                                </span>
                                            </td>
                                            <td>
                                                <form action="{{ route('admin.stat-items.toggle-status', $statItem->id) }}" method="POST" class="d-inline-block">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-{{ $statItem->is_active ? 'success' : 'danger' }}">
                                                        {{ $statItem->is_active ? 'Aktiv' : 'Deaktiv' }}
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <div class="d-flex gap-3">
                                                    <a href="{{ route('admin.stat-items.show', $statItem->id) }}" class="text-info">
                                                        <i class="mdi mdi-eye font-size-18"></i>
                                                    </a>
                                                    <a href="{{ route('admin.stat-items.edit', $statItem->id) }}" class="text-success">
                                                        <i class="mdi mdi-pencil font-size-18"></i>
                                                    </a>
                                                    <form id="delete-form-{{ $statItem->id }}" action="{{ route('admin.stat-items.destroy', $statItem->id) }}" method="POST" class="d-inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-link text-danger p-0" onclick="deleteData({{ $statItem->id }})">
                                                            <i class="mdi mdi-delete font-size-18"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">
                                                <div class="py-4">
                                                    <div class="mb-3">
                                                        <i class="bx bx-chart font-size-48 text-muted"></i>
                                                    </div>
                                                    <h5 class="font-size-16">Hələ ki heç bir Statistika Elementi yoxdur</h5>
                                                    <p class="text-muted">İlk Statistika Elementini yaratmaq üçün "Yeni Statistika Elementi Əlavə Et" düyməsinə klikləyin.</p>
                                                    <a href="{{ route('admin.stat-items.create') }}" class="btn btn-primary mt-2">
                                                        <i class="bx bx-plus me-1"></i> Yeni Statistika Elementi Əlavə Et
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        @if($statItems->hasPages())
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="pagination pagination-rounded justify-content-center mt-3 mb-4 pb-1">
                                        {{ $statItems->links() }}
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div> <!-- container-fluid -->
</div>

@endsection

@push('script')
<script>
    // Global deleteData function
    window.deleteData = function(id) {
        console.log('Delete function called with ID:', id);
        
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
                    console.log('Submitting form for ID:', id);
                    form.submit();
                } else {
                    console.error('Form not found for ID:', id);
                }
            }
        });
    };

    // Check all functionality
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Stat Items Index - DOM loaded');
        
        const checkAllElement = document.getElementById('checkAll');
        if (checkAllElement) {
            checkAllElement.addEventListener('change', function() {
                const checkboxes = document.querySelectorAll('tbody input[type="checkbox"]');
                checkboxes.forEach(checkbox => {
                    checkbox.checked = this.checked;
                });
            });
        }
    });
</script>
@endpush
