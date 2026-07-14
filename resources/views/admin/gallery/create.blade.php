@extends('admin.layout.admin-master')
@section('title', 'Add Gallery Image')

@section('main')
<div class="container mt-5 px-4">
    <h1 class="mb-4 text-primary">Add Gallery Image</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="image" id="imageInput" class="form-control" required>
            <div class="mt-2">
                <img id="preview" src="#" alt="Image Preview" class="img-thumbnail d-none" width="150">
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Description (optional)</label>
            <textarea name="description" rows="3" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('admin.gallery.index') }}" class="btn btn-secondary ms-2">Cancel</a>
    </form>
</div>

<script>
document.getElementById('imageInput').addEventListener('change', function(event){
    const preview = document.getElementById('preview');
    const file = event.target.files[0];
    if(file){
        preview.src = URL.createObjectURL(file);
        preview.classList.remove('d-none');
    } else {
        preview.src = '#';
        preview.classList.add('d-none');
    }
});
</script>
@endsection
