@extends('back.layouts.master')
@section('title', 'Sosial Media Redaktə')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Sosial Media Redaktə</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('back.pages.socialfooter.update', $socialfooter->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label" for="image">Şəkil (Loqo)</label>
                                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">PNG, JPG, SVG formatları qəbul edilir. Max: 2MB</div>
                                        
                                        @if($socialfooter->image)
                                            <div class="mt-2 d-flex align-items-center">
                                                <img src="{{ asset('uploads/socialfooters/' . $socialfooter->image) }}" alt="Cari Şəkil" style="max-height: 80px; border: 1px solid #ddd; padding: 5px; border-radius: 5px; margin-right: 10px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="clear_image" name="clear_image" value="1">
                                                    <label class="form-check-label" for="clear_image">Şəkli Sil</label>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="mt-2" id="image-preview" style="display: none;">
                                            <img src="#" alt="Yeni Şəkil Önizləmə" style="max-height: 80px; border: 1px solid #ddd; padding: 5px; border-radius: 5px;">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label" for="icon_class">İkon Class (Şəkil yoxdursa)</label>
                                        <input type="text" class="form-control @error('icon_class') is-invalid @enderror" id="icon_class" name="icon_class" value="{{ old('icon_class', $socialfooter->icon_class) }}" placeholder="Məsələn: fab fa-facebook">
                                        @error('icon_class')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">FontAwesome və ya digər ikon kitabxanalarından ikon class daxil edin.</div>
                                        @if($socialfooter->icon_class)
                                            <div class="mt-2" style="font-size: 2rem;"><i class="{{ $socialfooter->icon_class }}"></i></div>
                                        @endif
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label" for="link">Link</label>
                                        <input type="url" class="form-control @error('link') is-invalid @enderror" id="link" name="link" value="{{ old('link', $socialfooter->link) }}" required>
                                        @error('link')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label" for="order">Sıra</label>
                                        <input type="number" class="form-control @error('order') is-invalid @enderror" id="order" name="order" value="{{ old('order', $socialfooter->order) }}" min="0" required>
                                        @error('order')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">Elementin göstərilmə sırası. 0 olarsa, avtomatik təyin ediləcək.</div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" {{ old('is_active', $socialfooter->is_active) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_active">Aktiv</label>
                                        </div>
                                        <div class="form-text">Sosial media linkini saytda göstər.</div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Yadda saxla</button>
                                        <a href="{{ route('back.pages.socialfooter.index') }}" class="btn btn-secondary">Geri qayıt</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const imageInput = document.getElementById('image');
            const iconClassInput = document.getElementById('icon_class');
            const imagePreview = document.querySelector('#image-preview img');
            const imagePreviewDiv = document.getElementById('image-preview');
            const clearImageCheckbox = document.getElementById('clear_image');

            function updateInputVisibility() {
                const hasImage = imageInput.files.length > 0 || (imagePreviewDiv.previousElementSibling && !clearImageCheckbox.checked);
                
                if (hasImage) {
                    iconClassInput.value = '';
                    iconClassInput.setAttribute('disabled', 'disabled');
                } else {
                    iconClassInput.removeAttribute('disabled');
                }

                if (iconClassInput.value.trim() !== '') {
                    imageInput.value = '';
                    imageInput.setAttribute('disabled', 'disabled');
                    imagePreviewDiv.style.display = 'none';
                    if (clearImageCheckbox) clearImageCheckbox.checked = false;
                } else {
                    imageInput.removeAttribute('disabled');
                    if (!hasImage && !clearImageCheckbox.checked) {
                        imagePreviewDiv.style.display = 'none';
                    } else if (hasImage) {
                        imagePreviewDiv.style.display = 'block';
                    }
                }
            }

            imageInput.addEventListener('change', function(event) {
                if (event.target.files && event.target.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        imagePreview.src = e.target.result;
                        imagePreviewDiv.style.display = 'block';
                    };
                    reader.readAsDataURL(event.target.files[0]);
                    if (clearImageCheckbox) clearImageCheckbox.checked = false;
                } else {
                    if (!clearImageCheckbox || clearImageCheckbox.checked) {
                        imagePreviewDiv.style.display = 'none';
                    }
                }
                updateInputVisibility();
            });

            iconClassInput.addEventListener('input', updateInputVisibility);
            if (clearImageCheckbox) {
                clearImageCheckbox.addEventListener('change', function() {
                    if (this.checked) {
                        imageInput.value = '';
                        imagePreviewDiv.style.display = 'none';
                    }
                    updateInputVisibility();
                });
            }

            // Səhifə yüklənəndə ilkin vəziyyəti təyin et
            updateInputVisibility();
        });
    </script>
    @endpush
@endsection