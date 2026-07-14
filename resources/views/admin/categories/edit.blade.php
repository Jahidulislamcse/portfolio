@extends('admin.layout.admin-master')
@section('title', 'Edit Category')

@section('main')
<div class="container mt-4 px-5">
    <h4>Edit Category</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input 
                type="text" 
                name="name" 
                class="form-control" 
                value="{{ old('name', $category->name) }}" 
                required
            >
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Current Image</label><br>
            @if($category->image)
                <img 
                    src="{{ asset('upload/' . $category->image) }}" 
                    alt="Current Category Image" 
                    width="120" 
                    class="mb-2 rounded border"
                >
            @else
                <p>No image uploaded.</p>
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Change Image</label>
            <input 
                type="file" 
                name="image" 
                class="form-control" 
                accept="image/*"
                onchange="previewNewImage(event)"
            >
            @error('image')
                <small class="text-danger">{{ $message }}</small>
            @enderror

            <div class="mt-2">
                <img 
                    id="newImagePreview" 
                    src="#" 
                    alt="New Image Preview" 
                    width="120" 
                    class="rounded border" 
                    style="display:none;"
                >
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<script>
function previewNewImage(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('newImagePreview');
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
