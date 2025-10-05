@extends('back.layouts.master')

@section('title', 'Tərəfdaşlıq Xüsusiyyətləri - İdarə Paneli')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Tərəfdaşlıq Xüsusiyyətləri</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">İnvestorlar Səhifəsi</a></li>
                            <li class="breadcrumb-item active">Xüsusiyyətlər</li>
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
                                <h4 class="card-title">Tərəfdaşlıq Xüsusiyyətləri Siyahısı</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2">
                                    <a href="{{ route('admin.partnership-features.create') }}" class="btn btn-primary">
                                        <i class="mdi mdi-plus me-1"></i> Yeni Xüsusiyyət Əlavə Et
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

                        @if($partnershipFeatures->count() > 0)
                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap table-check">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 20px;">#</th>
                                        <th>Başlıq</th>
                                        <th>İkon / Şəkil</th>
                                        <th>Statistika 1</th>
                                        <th>Statistika 2</th>
                                        <th>Sıra</th>
                                        <th>Status</th>
                                        <th>Əməliyyatlar</th>
                                    </tr>
                                </thead>
                                <tbody class="sortable" data-url="{{ route('admin.partnership-features.order') }}">
                                    @foreach($partnershipFeatures as $feature)
                                    <tr id="order-{{ $feature->id }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $feature->title }}</td>
                                        <td>
                                            @if($feature->image_url)
                                            <img src="{{ $feature->image_url }}" alt="{{ $feature->title }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 8px;">
                                            @elseif($feature->icon_class)
                                            <i class="{{ $feature->icon_class }}" style="font-size: 24px;"></i>
                                            @else
                                            <span class="text-muted">Yoxdur</span>
                                            @endif
                                        </td>
                                        <td>{{ $feature->stat_number_1 }} <small class="text-muted">{{ $feature->stat_text_1 }}</small></td>
                                        <td>{{ $feature->stat_number_2 }} <small class="text-muted">{{ $feature->stat_text_2 }}</small></td>
                                        <td>{{ $feature->order }}</td>
                                        <td>
                                            <form action="{{ route('admin.partnership-features.toggle-status', $feature->id) }}" method="POST" class="d-inline-block">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-{{ $feature->is_active ? 'success' : 'danger' }}">
                                                    {{ $feature->is_active ? 'Aktiv' : 'Deaktiv' }}
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-3">
                                                <a href="{{ route('admin.partnership-features.show', $feature->id) }}" class="text-info">
                                                    <i class="mdi mdi-eye font-size-18"></i>
                                                </a>
                                                <a href="{{ route('admin.partnership-features.edit', $feature->id) }}" class="text-success">
                                                    <i class="mdi mdi-pencil font-size-18"></i>
                                                </a>
                                                <form id="delete-form-{{ $feature->id }}" action="{{ route('admin.partnership-features.destroy', $feature->id) }}" method="POST" class="d-inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-link text-danger p-0" onclick="deleteData({{ $feature->id }})">
                                                        <i class="mdi mdi-delete font-size-18"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        <div class="alert alert-info text-center" role="alert">
                            Hələ ki heç bir tərəfdaşlıq xüsusiyyəti əlavə edilməyib. Yuxarıdakı düymədən yeni xüsusiyyət əlavə edə bilərsiniz.
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
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.14.0/Sortable.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Global deleteData function (SweetAlert ilə silmə)
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

        // Sıralama (Drag & Drop)
        const sortableList = document.querySelector('.sortable');
        if (sortableList) {
            new Sortable(sortableList, {
                animation: 150,
                ghostClass: 'blue-background-class',
                onEnd: function (evt) {
                    const order = {};
                    sortableList.querySelectorAll('tr').forEach((row, index) => {
                        const id = row.id.replace('order-', '');
                        order[id] = index + 1;
                    });

                    fetch(sortableList.dataset.url, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({ order: order })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: data.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        } else {
                            Swal.fire({
                                position: "center",
                                icon: "error",
                                title: data.message || 'Sıralama yenilənərkən xəta baş verdi!',
                                showConfirmButton: true,
                                confirmButtonText: 'Tamam',
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire({
                            position: "center",
                            icon: "error",
                            title: 'Şəbəkə xətası və ya serverlə əlaqə problemi!',
                            showConfirmButton: true,
                            confirmButtonText: 'Tamam',
                        });
                    });
                },
            });
        }
    });
</script>
@endpush
