@extends('admin.layout.admin-master')
@section('title', 'Add Product')

@section('main')
<div class="container mt-4 px-5">
    <h4>Add Project</h4>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Product Name --}}
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        {{-- Category --}}
        <div class="mb-3">
            <label class="form-label">Category</label>
            <select name="category_id" class="form-control" required>
                <option value="">Select category</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Cover Image --}}
        <div class="mb-3">
            <label class="form-label">Cover Image</label>
            <input type="file" name="cover_image" class="form-control" accept="image/*" onchange="previewCover(event)">
            <img id="coverPreview" class="mt-2 rounded border" width="120" style="display:none;">
        </div>

        {{-- Additional Images --}}
        <div class="mb-3">
            <label class="form-label">Additional Images</label>
            <input 
                type="file" 
                name="images[]" 
                id="imageInput"
                class="form-control" 
                multiple 
                accept="image/*" 
                onchange="previewImages(event)"
            >
            <div id="imagePreview" class="mt-3 d-flex flex-wrap gap-3"></div>
        </div>

        {{-- Description --}}
       <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea id="description" name="description" rows="6" class="form-control">{{ old('description', $product->description ?? '') }}</textarea>
    </div>


        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#description'), {
            toolbar: [
                'undo', 'redo', '|',
                'bold', 'italic', 'underline', 'link', '|',
                'bulletedList', 'numberedList', '|',
                'blockQuote', 'insertTable', '|',
                'alignment', 'outdent', 'indent'
            ],
        })
        .catch(error => {
            console.error(error);
        });
</script>

<script>
let selectedFiles = [];

function previewCover(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('coverPreview');
    if (file) {
        preview.src = URL.createObjectURL(file);
        preview.style.display = 'block';
    } else {
        preview.src = '';
        preview.style.display = 'none';
    }
}

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
            'position-absolute', 'top-0', 'end-0', 'translate-middle', 'rounded-circle'
        );
        removeBtn.style.padding = '0 6px';
        removeBtn.onclick = () => removeImage(index);

        wrapper.appendChild(img);
        wrapper.appendChild(removeBtn);
        previewContainer.appendChild(wrapper);
    });

    // Rebuild input files list dynamically
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
            'position-absolute', 'top-0', 'end-0', 'translate-middle', 'rounded-circle'
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
</script>
@endsection
