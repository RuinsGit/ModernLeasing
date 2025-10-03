@extends('back.layouts.master')

@section('title', 'Logo İdarəetməsi - İdarə Paneli')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Logo İdarəetməsi</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Ana Səhifə</a></li>
                            <li class="breadcrumb-item active">Logo İdarəetməsi</li>
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
                                <h4 class="card-title">Sayt Logo Siyahısı</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2">
                                    @if($logos->count() == 0)
                                        <a href="{{ route('admin.site-logo.create') }}" class="btn btn-primary">
                                            <i class="bx bx-plus me-1"></i> Yeni Logo Əlavə Et
                                        </a>
                                    @else
                                        <span class="text-muted">
                                            <i class="bx bx-info-circle me-1"></i> Yalnız bir logo ola bilər
                                        </span>
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
                                        <th class="align-middle">Logo</th>
                                        <th class="align-middle">Sayt Adı</th>
                                        <th class="align-middle">Favicon</th>
                                        <th class="align-middle">Mətn Göstər</th>
                                        <th class="align-middle">Status</th>
                                        <th class="align-middle">Əməliyyatlar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($logos as $logo)
                                        <tr>
                                            <td>
                                                <div class="form-check font-size-16">
                                                    <input class="form-check-input" type="checkbox" id="logocheck{{ $logo->id }}">
                                                    <label class="form-check-label" for="logocheck{{ $logo->id }}"></label>
                                                </div>
                                            </td>
                                            <td>
                                                @if($logo->logo_image)
                                                    <div class="avatar-sm">
                                                        <img src="{{ $logo->logo_url }}" 
                                                             alt="{{ $logo->site_name }}" 
                                                             class="rounded" 
                                                             style="width: 50px; height: 50px; object-fit: contain; background: #f8f9fa; padding: 5px;">
                                                    </div>
                                                @else
                                                    <div class="avatar-sm">
                                                        <span class="avatar-title bg-soft-secondary text-secondary rounded" 
                                                              style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                                            <i class="bx bx-image font-size-18"></i>
                                                        </span>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                <h5 class="font-size-14 mb-1">{{ $logo->site_name }}</h5>
                                                @if($logo->is_active)
                                                    <span class="badge badge-soft-success font-size-11">Aktiv Logo</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($logo->favicon)
                                                    <div class="avatar-xs">
                                                        <img src="{{ $logo->favicon_url }}" 
                                                             alt="Favicon" 
                                                             class="rounded" 
                                                             style="width: 24px; height: 24px; object-fit: contain;">
                                                    </div>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                            <td>
                                                <span class="badge badge-soft-{{ $logo->show_text ? 'success' : 'danger' }}">
                                                    {{ $logo->show_text ? 'Bəli' : 'Xeyr' }}
                                                </span>
                                            </td>
                                            <td>
                                                <form action="{{ route('admin.site-logo.toggle-status', $logo->id) }}" method="POST" class="d-inline-block">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-{{ $logo->is_active ? 'success' : 'danger' }}">
                                                        {{ $logo->is_active ? 'Aktiv' : 'Deaktiv' }}
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <div class="d-flex gap-3">
                                                    <a href="{{ route('admin.site-logo.show', $logo->id) }}" class="text-info">
                                                        <i class="mdi mdi-eye font-size-18"></i>
                                                    </a>
                                                    <a href="{{ route('admin.site-logo.edit', $logo->id) }}" class="text-success">
                                                        <i class="mdi mdi-pencil font-size-18"></i>
                                                    </a>
                                                    <form id="delete-form-{{ $logo->id }}" action="{{ route('admin.site-logo.destroy', $logo->id) }}" method="POST" class="d-inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-link text-danger p-0" onclick="deleteData({{ $logo->id }})">
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
                                                        <i class="bx bx-image font-size-48 text-muted"></i>
                                                    </div>
                                                    <h5 class="font-size-16">Hələ ki heç bir logo yoxdur</h5>
                                                    <p class="text-muted">İlk logoyu yaratmaq üçün "Yeni Logo Əlavə Et" düyməsinə klikləyin.</p>
                                                    <a href="{{ route('admin.site-logo.create') }}" class="btn btn-primary mt-2">
                                                        <i class="bx bx-plus me-1"></i> Yeni Logo Əlavə Et
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        @if($logos->hasPages())
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="pagination pagination-rounded justify-content-center mt-3 mb-4 pb-1">
                                        {{ $logos->links() }}
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
        console.log('Logo Index - DOM loaded');
        
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
