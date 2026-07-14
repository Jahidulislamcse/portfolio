@extends('admin.layout.admin-master')
@section('title', 'Edit Managing Body')

@section('main')
<div class="container mt-4 px-5">
    <h4>Edit Managing Body</h4>

    <form action="{{ route('admin.managing-body.update', $managingBody->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Director</label>
            <input type="text" name="director" class="form-control" value="{{ old('director', $managingBody->director) }}" required>
            @error('director') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control" accept="image/*" onchange="previewImage(event)">
            @error('image') <small class="text-danger">{{ $message }}</small> @enderror

            <div class="mt-2">
                @if($managingBody->image)
                    <img id="imagePreview" src="{{ asset('upload/'.$managingBody->image) }}" alt="Preview" class="rounded" width="120">
                @else
                    <img id="imagePreview" src="#" alt="Preview" class="rounded" width="120" style="display:none;">
                @endif
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Speech</label>
            <textarea name="speech" class="form-control" rows="5">{{ old('speech', $managingBody->speech) }}</textarea>
            @error('speech') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Team Structure</label>
            <textarea name="team_structure" class="form-control" rows="5">{{ old('team_structure', $managingBody->team_structure) }}</textarea>
            @error('team_structure') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-success">Update</button>
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
    }
}
</script>
@endsection
