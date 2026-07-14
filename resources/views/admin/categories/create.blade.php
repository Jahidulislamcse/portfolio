@extends('admin.layout.admin-master')
@section('title', 'Add Category')

@section('main')
<div class="container mt-4 px-5">
    <h4>Add Category</h4>

    <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input 
                type="text" 
                name="name" 
                class="form-control" 
                value="{{ old('name') }}" 
                required
            >
            @error('name') 
                <small class="text-danger">{{ $message }}</small> 
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Image</label>
            <input 
                type="file" 
                name="image" 
                class="form-control" 
                accept="image/*" 
                onchange="previewImage(event)"
            >
            @error('image') 
                <small class="text-danger">{{ $message }}</small> 
            @enderror

            <div class="mt-2">
                <img id="imagePreview" src="#" alt="Preview" class="rounded" width="120" style="display:none;">
            </div>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<script>
function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('imagePreview');
    const file = input.files[0];

    if (file) {
        preview.src = URL.createObjectURL(file);
        preview.style.display = 'block';
    } else {
        preview.src = '';
        preview.style.display = 'none';
    }
}
</script>
@endsection
