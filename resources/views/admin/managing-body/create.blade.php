@extends('admin.layout.admin-master')
@section('title', 'Add Managing Body')

@section('main')
<div class="container mt-4 px-5">
    <h4>Add Managing Body</h4>

    <form action="{{ route('admin.managing-body.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Director</label>
            <input type="text" name="director" class="form-control" value="{{ old('director') }}" required>
            @error('director') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

         <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control" accept="image/*" onchange="previewImage(event)">
            @error('image') <small class="text-danger">{{ $message }}</small> @enderror
            <div class="mt-2">
                <img id="imagePreview" src="#" alt="Preview" class="rounded" width="120" style="display:none;">
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Speech</label>
            <textarea name="speech" class="form-control" rows="5">{{ old('speech') }}</textarea>
            @error('speech') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Team Structure</label>
            <textarea name="team_structure" class="form-control" rows="5">{{ old('team_structure') }}</textarea>
            @error('team_structure') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('admin.managing-body.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<script>
function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('imagePreview');
    const file = input.files[0];

    if(file) {
        preview.src = URL.createObjectURL(file);
        preview.style.display = 'block';
    } else {
        preview.src = '';
        preview.style.display = 'none';
    }
}
</script>
@endsection
