@extends('back.layouts.master')

@section('title', 'Hero Kartları - İdarə Paneli')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Hero Kartları</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Ana Səhifə</a></li>
                            <li class="breadcrumb-item active">Hero Kartları</li>
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
                                <h4 class="card-title">Hero Kartları Siyahısı</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2">
                                    <a href="{{ route('admin.hero-features.create') }}" class="btn btn-primary">
                                        <i class="bx bx-plus me-1"></i> Yeni Kart Əlavə Et
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
                                        <th class="align-middle">Açıqlama</th>
                                        <th class="align-middle">Sıra</th>
                                        <th class="align-middle">Yaradılma Tarixi</th>
                                        <th class="align-middle">Əməliyyatlar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($heroFeatures as $heroFeature)
                                        <tr>
                                            <td>
                                                <div class="form-check font-size-16">
                                                    <input class="form-check-input" type="checkbox" id="featurecheck{{ $heroFeature->id }}">
                                                    <label class="form-check-label" for="featurecheck{{ $heroFeature->id }}"></label>
                                                </div>
                                            </td>
                                            <td>
                                                @if($heroFeature->image)
                                                    <div class="avatar-sm">
                                                        <img src="{{ asset('uploads/hero-features/' . $heroFeature->image) }}" 
                                                             alt="{{ $heroFeature->title }}" 
                                                             class="rounded-circle" 
                                                             style="width: 40px; height: 40px; object-fit: cover;">
                                                    </div>
                                                @else
                                                    <div class="avatar-sm">
                                                        <span class="avatar-title bg-soft-secondary text-secondary rounded-circle" 
                                                              style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                                            <i class="bx bx-image font-size-18"></i>
                                                        </span>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                <h5 class="font-size-14 mb-1">{{ $heroFeature->title }}</h5>
                                            </td>
                                            <td>
                                                <p class="text-muted mb-0">{{ Str::limit($heroFeature->description, 60) }}</p>
                                            </td>
                                            <td>
                                                <span class="badge badge-soft-info">{{ $heroFeature->order }}</span>
                                            </td>
                                            <td>
                                                {{ $heroFeature->created_at->format('d.m.Y H:i') }}
                                            </td>
                                            <td>
                                                <div class="d-flex gap-3">
                                                    <a href="{{ route('admin.hero-features.show', $heroFeature->id) }}" class="text-info">
                                                        <i class="mdi mdi-eye font-size-18"></i>
                                                    </a>
                                                    <a href="{{ route('admin.hero-features.edit', $heroFeature->id) }}" class="text-success">
                                                        <i class="mdi mdi-pencil font-size-18"></i>
                                                    </a>
                                                    <form id="delete-form-{{ $heroFeature->id }}" action="{{ route('admin.hero-features.destroy', $heroFeature->id) }}" method="POST" class="d-inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-link text-danger p-0" onclick="deleteData({{ $heroFeature->id }})">
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
                                                        <i class="bx bx-folder-open font-size-48 text-muted"></i>
                                                    </div>
                                                    <h5 class="font-size-16">Hələ ki heç bir hero kartı yoxdur</h5>
                                                    <p class="text-muted">İlk hero kartı yaratmaq üçün "Yeni Kart Əlavə Et" düyməsinə klikləyin.</p>
                                                    <a href="{{ route('admin.hero-features.create') }}" class="btn btn-primary mt-2">
                                                        <i class="bx bx-plus me-1"></i> Yeni Kart Əlavə Et
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        @if($heroFeatures->hasPages())
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="pagination pagination-rounded justify-content-center mt-3 mb-4 pb-1">
                                        {{ $heroFeatures->links() }}
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
        console.log('Hero Features Index - DOM loaded');
        
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
