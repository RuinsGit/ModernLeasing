@extends('back.layouts.master')

@section('title', 'Navbar Menyu - İdarə Paneli')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Navbar Menyu</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Ana Səhifə</a></li>
                            <li class="breadcrumb-item active">Navbar Menyu</li>
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
                                <h4 class="card-title">Navbar Menyu Siyahısı</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2">
                                    <a href="{{ route('admin.navbar.create') }}" class="btn btn-primary">
                                        <i class="bx bx-plus me-1"></i> Yeni Menyu Əlavə Et
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
                                        <th class="align-middle">Başlıq</th>
                                        <th class="align-middle">Route/URL</th>
                                        <th class="align-middle">Icon</th>
                                        <th class="align-middle">Sıra</th>
                                        <th class="align-middle">Desktop</th>
                                        <th class="align-middle">Mobil</th>
                                        <th class="align-middle">Status</th>
                                        <th class="align-middle">Əməliyyatlar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($navbarItems as $navbarItem)
                                        <tr>
                                            <td>
                                                <div class="form-check font-size-16">
                                                    <input class="form-check-input" type="checkbox" id="navbarcheck{{ $navbarItem->id }}">
                                                    <label class="form-check-label" for="navbarcheck{{ $navbarItem->id }}"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <h5 class="font-size-14 mb-1">{{ $navbarItem->title }}</h5>
                                            </td>
                                            <td>
                                                @if($navbarItem->route_name)
                                                    <span class="badge badge-soft-primary">{{ $navbarItem->route_name }}</span>
                                                @else
                                                    <span class="text-muted">{{ Str::limit($navbarItem->url, 30) }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($navbarItem->icon)
                                                    <div class="avatar-sm">
                                                        <span class="avatar-title bg-soft-primary text-primary rounded">
                                                            <i class="{{ $navbarItem->icon }} font-size-18"></i>
                                                        </span>
                                                    </div>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                            <td>
                                                <span class="badge badge-soft-info">{{ $navbarItem->order }}</span>
                                            </td>
                                            <td>
                                                <span class="badge badge-soft-{{ $navbarItem->show_desktop ? 'success' : 'danger' }}">
                                                    {{ $navbarItem->show_desktop ? 'Bəli' : 'Xeyr' }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge badge-soft-{{ $navbarItem->show_mobile ? 'success' : 'danger' }}">
                                                    {{ $navbarItem->show_mobile ? 'Bəli' : 'Xeyr' }}
                                                </span>
                                            </td>
                                            <td>
                                                <form action="{{ route('admin.navbar.toggle-status', $navbarItem->id) }}" method="POST" class="d-inline-block">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-{{ $navbarItem->is_active ? 'success' : 'danger' }}">
                                                        {{ $navbarItem->is_active ? 'Aktiv' : 'Deaktiv' }}
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <div class="d-flex gap-3">
                                                    <a href="{{ route('admin.navbar.show', $navbarItem->id) }}" class="text-info">
                                                        <i class="mdi mdi-eye font-size-18"></i>
                                                    </a>
                                                    <a href="{{ route('admin.navbar.edit', $navbarItem->id) }}" class="text-success">
                                                        <i class="mdi mdi-pencil font-size-18"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9" class="text-center">
                                                <div class="py-4">
                                                    <div class="mb-3">
                                                        <i class="bx bx-folder-open font-size-48 text-muted"></i>
                                                    </div>
                                                    <h5 class="font-size-16">Hələ ki heç bir navbar elementi yoxdur</h5>
                                                    <p class="text-muted">İlk navbar elementini yaratmaq üçün "Yeni Menyu Əlavə Et" düyməsinə klikləyin.</p>
                                                    <a href="{{ route('admin.navbar.create') }}" class="btn btn-primary mt-2">
                                                        <i class="bx bx-plus me-1"></i> Yeni Menyu Əlavə Et
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        @if($navbarItems->hasPages())
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="pagination pagination-rounded justify-content-center mt-3 mb-4 pb-1">
                                        {{ $navbarItems->links() }}
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
    // Check all functionality
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Navbar Index - DOM loaded');
        
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
