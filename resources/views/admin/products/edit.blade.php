@extends('admin.layout.admin-master')
@section('title', 'Edit Product')

@section('main')
<div class="container mt-4 px-5">
    <h4>Edit Project</h4>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        {{-- Product Name --}}
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" value="{{ $product->name }}" class="form-control" required>
        </div>

        {{-- Category --}}
        <div class="mb-3">
            <label class="form-label">Category</label>
            <select name="category_id" class="form-control" required>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Cover Image --}}
        <div class="mb-3">
            <label class="form-label">Cover Image</label><br>
            @if($product->cover_image)
                <img src="{{ asset('upload/' . $product->cover_image) }}" width="100" class="rounded mb-2 border">
            @endif
            <input type="file" name="cover_image" class="form-control" accept="image/*" onchange="previewCover(event)">
            <img id="coverPreview" class="mt-2 rounded border" width="120" style="display:none;">
        </div>

        {{-- Existing Images (with remove option) --}}
        <div class="mb-3">
            <label class="form-label">Existing Images</label><br>
            <div class="d-flex flex-wrap gap-2 mb-2">
                @foreach($product->images as $img)
                    <div class="position-relative d-inline-block">
                        <img src="{{ asset('upload/' . $img->image) }}" width="100" height="100" class="rounded border object-fit-cover">
                        <button 
                            type="button" 
                            class="btn btn-sm btn-danger position-absolute top-0 end-0 translate-middle rounded-circle" 
                            style="padding: 0 6px"
                            onclick="removeExistingImage({{ $img->id }}, this)"
                        >×</button>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Add New Images (with preview + remove) --}}
        <div class="mb-3">
            <label class="form-label">Add New Images</label>
            <input 
                type="file" 
                name="images[]" 
                id="imageInput"
                class="form-control" 
                multiple 
                accept="image/*" 
                onchange="previewImages(event)"
            >
            <div id="imagePreview" class="mt-2 d-flex flex-wrap gap-3"></div>
        </div>

        {{-- Description --}}
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" id="description" rows="4" class="form-control">{{ $product->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#description'), {
            toolbar: [
                'heading', '|',
                'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|',
                'blockQuote', 'insertTable', 'undo', 'redo'
            ],
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
                ]
            }
        })
        .catch(error => {
            console.error('CKEditor initialization error:', error);
        });
</script>
<script>
let selectedFiles = [];

// Preview cover image
function previewCover(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('coverPreview');
    if (file) {
        preview.src = URL.createObjectURL(file);
        preview.style.display = 'block';
    } else {
        preview.style.display = 'none';
    }
}

// Preview + remove for new images
function previewImages(event) {
    const files = Array.from(event.target.files);
    const previewContainer = document.getElementById('imagePreview');
    previewContainer.innerHTML = '';
    selectedFiles = files;

    files.forEach((file, index) => {
        const wrapper = document.createElement('div');
        wrapper.classList.add('position-relative', 'd-inline-block');

        const img = document.createElement('img');
        img.src = URL.createObjectURL(file);
        img.width = 100;
        img.height = 100;
        img.classList.add('rounded', 'border', 'object-fit-cover');

        const removeBtn = document.createElement('button');
        removeBtn.innerHTML = '×';
        removeBtn.type = 'button';
        removeBtn.classList.add(
            'btn', 'btn-sm', 'btn-danger', 
            'position-absolute', 'top-0', 'end-0', 
            'translate-middle', 'rounded-circle'
        );
        removeBtn.style.padding = '0 6px';
        removeBtn.onclick = () => removeImage(index);

        wrapper.appendChild(img);
        wrapper.appendChild(removeBtn);
        previewContainer.appendChild(wrapper);
    });

    rebuildFileInput();
}

function removeImage(index) {
    selectedFiles.splice(index, 1);
    const previewContainer = document.getElementById('imagePreview');
    previewContainer.innerHTML = '';
    selectedFiles.forEach((file, i) => {
        const wrapper = document.createElement('div');
        wrapper.classList.add('position-relative', 'd-inline-block');

        const img = document.createElement('img');
        img.src = URL.createObjectURL(file);
        img.width = 100;
        img.height = 100;
        img.classList.add('rounded', 'border', 'object-fit-cover');

        const removeBtn = document.createElement('button');
        removeBtn.innerHTML = '×';
        removeBtn.type = 'button';
        removeBtn.classList.add(
            'btn', 'btn-sm', 'btn-danger',
            'position-absolute', 'top-0', 'end-0',
            'translate-middle', 'rounded-circle'
        );
        removeBtn.style.padding = '0 6px';
        removeBtn.onclick = () => removeImage(i);

        wrapper.appendChild(img);
        wrapper.appendChild(removeBtn);
        previewContainer.appendChild(wrapper);
    });

    rebuildFileInput();
}

function rebuildFileInput() {
    const input = document.getElementById('imageInput');
    const dataTransfer = new DataTransfer();
    selectedFiles.forEach(file => dataTransfer.items.add(file));
    input.files = dataTransfer.files;
}

// Remove existing images via AJAX
function removeExistingImage(imageId, button) {
    if (!confirm('Are you sure you want to delete this image?')) return;

    fetch(`/admin/products/images/${imageId}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })
    .then(response => {
        if (response.ok) {
            button.parentElement.remove();
        } else {
            alert('Failed to delete image.');
        }
    })
    .catch(() => alert('Error while deleting image.'));
}
</script>
@endsection
