@extends('back.layouts.master')

@section('title', 'Tərəfdaşlıq Növünü Redaktə Et - İdarə Paneli')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Tərəfdaşlıq Növünü Redaktə Et</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.partnership-types.index') }}">Tərəfdaşlıq Növləri</a></li>
                            <li class="breadcrumb-item active">Redaktə Et</li>
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
                        <h4 class="card-title">Tərəfdaşlıq Növünü Redaktə Et</h4>
                        <p class="card-title-desc">İnvestorlar səhifəsində göstəriləcək tərəfdaşlıq növünün məlumatlarını yeniləyin.</p>
                    </div>
                    <div class="card-body">
                        
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('admin.partnership-types.update', $partnershipType->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <!-- Başlıq -->
                                    <div class="mb-4">
                                        <label for="title" class="form-label">Başlıq <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                               id="title" name="title" value="{{ old('title', $partnershipType->title) }}" 
                                               placeholder="Məsələn: Korporativ Tərəfdaş">
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <!-- İkon Class -->
                                    <div class="mb-4">
                                        <label for="icon_class" class="form-label">İkon Class</label>
                                        <input type="text" class="form-control @error('icon_class') is-invalid @enderror" 
                                               id="icon_class" name="icon_class" value="{{ old('icon_class', $partnershipType->icon_class) }}" 
                                               placeholder="Məsələn: fas fa-building">
                                        @error('icon_class')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">FontAwesome ikon classı daxil edin. Məsələn: `fas fa-building`</div>
                                        <div class="mt-2">
                                            <i id="icon-preview" class="{{ $partnershipType->icon_class }} font-size-24 text-primary"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <!-- Sıra -->
                                    <div class="mb-4">
                                        <label for="order" class="form-label">Sıra</label>
                                        <input type="number" class="form-control @error('order') is-invalid @enderror" 
                                               id="order" name="order" value="{{ old('order', $partnershipType->order) }}" min="0">
                                        @error('order')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">0 daxil etsəniz, avtomatik təyin ediləcək.</div>
                                    </div>
                                    
                                    <!-- Status -->
                                    <div class="mb-4">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" {{ old('is_active', $partnershipType->is_active) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_active">Aktiv</label>
                                        </div>
                                        <div class="form-text">Bu tərəfdaşlıq növünü aktiv edin/deaktiv edin.</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Təsvir -->
                            <div class="mb-4">
                                <label for="description" class="form-label">Təsvir</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" 
                                          id="description" name="description" rows="3" 
                                          placeholder="Tərəfdaşlıq növü haqqında qısa təsvir yazın...">{{ old('description', $partnershipType->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Faydalar -->
                            <div class="mb-4">
                                <label class="form-label d-block">Faydalar</label>
                                <div id="benefits-container">
                                    @php
                                        $oldBenefits = old('benefits', $partnershipType->benefits);
                                    @endphp
                                    @if(is_array($oldBenefits) && count($oldBenefits) > 0)
                                        @foreach($oldBenefits as $benefit)
                                            <div class="input-group mb-2">
                                                <input type="text" class="form-control" name="benefits[]" value="{{ $benefit }}" placeholder="Fayda mətni">
                                                <button type="button" class="btn btn-danger remove-benefit"><i class="bx bx-minus"></i></button>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" name="benefits[]" placeholder="Fayda mətni">
                                            <button type="button" class="btn btn-danger remove-benefit"><i class="bx bx-minus"></i></button>
                                        </div>
                                    @endif
                                </div>
                                <button type="button" id="add-benefit" class="btn btn-success btn-sm"><i class="mdi mdi-plus me-1"></i> Fayda Əlavə Et</button>
                            </div>
                            
                            <!-- Düymələr -->
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bx bx-save me-2"></i> Tərəfdaşlıq Növünü Yenilə
                                </button>
                                <a href="{{ route('admin.partnership-types.index') }}" class="btn btn-secondary">
                                    <i class="bx bx-x me-2"></i> İmtina Et
                                </a>
                            </div>
                        </form>
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
        const iconClassInput = document.getElementById('icon_class');
        const iconPreview = document.getElementById('icon-preview');
        const benefitsContainer = document.getElementById('benefits-container');
        const addBenefitButton = document.getElementById('add-benefit');

        function updateIconPreview() {
            const iconClass = iconClassInput.value.trim();
            if (iconClass) {
                iconPreview.className = iconClass + ' font-size-24 text-primary';
            } else {
                iconPreview.className = 'fas fa-question-circle font-size-24 text-primary'; // Default icon
            }
        }

        iconClassInput.addEventListener('input', updateIconPreview);
        updateIconPreview(); // Initial update

        addBenefitButton.addEventListener('click', function() {
            const newBenefitInputGroup = document.createElement('div');
            newBenefitInputGroup.className = 'input-group mb-2';
            newBenefitInputGroup.innerHTML = `
                <input type="text" class="form-control" name="benefits[]" placeholder="Fayda mətni">
                <button type="button" class="btn btn-danger remove-benefit"><i class="mdi mdi-minus"></i></button>
            `;
            benefitsContainer.appendChild(newBenefitInputGroup);
        });

        benefitsContainer.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-benefit') || e.target.closest('.remove-benefit')) {
                let button = e.target.classList.contains('remove-benefit') ? e.target : e.target.closest('.remove-benefit');
                button.closest('.input-group').remove();
            }
        });
    });
</script>
@endpush
