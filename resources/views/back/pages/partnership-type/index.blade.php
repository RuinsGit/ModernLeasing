@extends('back.layouts.master')

@section('title', 'Tərəfdaşlıq Növləri - İdarə Paneli')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Tərəfdaşlıq Növləri</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.partnership-section.index') }}">İnvestorlar Səhifəsi</a></li>
                            <li class="breadcrumb-item active">Tərəfdaşlıq Növləri</li>
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
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="card-title">Tərəfdaşlıq Növlərinin Siyahısı</h4>
                            <a href="{{ route('admin.partnership-types.create') }}" class="btn btn-primary"><i class="bx bx-plus me-1"></i> Yeni Növ Əlavə Et</a>
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

                        @if($partnershipTypes->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Icon</th>
                                            <th>Başlıq</th>
                                            <th>Təsvir</th>
                                            <th>Faydalar</th>
                                            <th>Sıra</th>
                                            <th>Status</th>
                                            <th>Əməliyyatlar</th>
                                        </tr>
                                    </thead>
                                    <tbody class="sortable" data-url="{{ route('admin.partnership-types.order') }}">
                                        @foreach($partnershipTypes as $type)
                                            <tr id="order-{{ $type->id }}">
                                                <td>{{ $type->id }}</td>
                                                <td><i class="{{ $type->icon_class }}"></i></td>
                                                <td>{{ $type->title }}</td>
                                                <td>{{ Str::limit($type->description, 50) }}</td>
                                                <td>
                                                    @if(is_array($type->benefits) && count($type->benefits) > 0)
                                                        <ul class="list-unstyled mb-0">
                                                            @foreach($type->benefits as $benefit)
                                                                <li><i class="ri-check-line align-middle me-1"></i> {{ $benefit }}</li>
                                                            @endforeach
                                                        </ul>
                                                    @else
                                                        Yoxdur
                                                    @endif
                                                </td>
                                                <td>{{ $type->order }}</td>
                                                <td>
                                                    <form action="{{ route('admin.partnership-types.toggle-status', $type->id) }}" method="POST" class="d-inline-block">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-{{ $type->is_active ? 'success' : 'danger' }}">
                                                            {{ $type->is_active ? 'Aktiv' : 'Deaktiv' }}
                                                        </button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.partnership-types.show', $type->id) }}" class="btn btn-info btn-sm"><i class="mdi mdi-eye font-size-18"></i></a>
                                                    <a href="{{ route('admin.partnership-types.edit', $type->id) }}" class="btn btn-primary btn-sm"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                    <form id="delete-form-{{ $type->id }}" action="{{ route('admin.partnership-types.destroy', $type->id) }}" method="POST" class="d-inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteData({{ $type->id }})">
                                                            <i class="mdi mdi-delete font-size-18"></i>
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
                                Hələ ki heç bir tərəfdaşlıq növü əlavə edilməyib. Yuxarıdakı düymədən yeni növ əlavə edə bilərsiniz.
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Global deleteData function
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

    document.addEventListener('DOMContentLoaded', function() {
        var el = document.querySelector('.sortable');
        if (el) {
            var sortable = Sortable.create(el, {
                animation: 150,
                ghostClass: 'sortable-ghost',
                onEnd: function (evt) {
                    var order = sortable.toArray().map((id, index) => ({ id: id.replace('order-', ''), order: index + 1 }));
                    fetch(el.dataset.url, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ order: Object.fromEntries(order.map(item => [item.id, item.order])) })
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
                            // Səhifəni yeniləmədən order sütununu yeniləyin
                            order.forEach(item => {
                                const row = document.getElementById('order-' + item.id);
                                if (row) {
                                    const orderCell = row.querySelector('td:nth-child(6)'); // Sıra sütunu 6-cıdır
                                    if (orderCell) {
                                        orderCell.textContent = item.order;
                                    }
                                }
                            });
                        } else {
                            Swal.fire({
                                position: "center",
                                icon: "error",
                                title: data.message,
                                showConfirmButton: true,
                                confirmButtonText: 'Tamam'
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire({
                            position: "center",
                            icon: "error",
                            title: 'Sıralama yenilənərkən xəta baş verdi!',
                            showConfirmButton: true,
                            confirmButtonText: 'Tamam'
                        });
                    });
                }
            });
        }
    });
</script>
@endpush
