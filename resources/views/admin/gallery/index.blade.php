@extends('admin.layout.admin-master')
@section('title', 'Gallery')

@section('main')
<div class="container mt-4 px-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>Gallery</h4>
        <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">Add Image</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($galleries->count())
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($galleries as $gallery)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($gallery->image)
                                <img src="{{ asset('upload/' . $gallery->image) }}" alt="Gallery Image" width="80" class="rounded">
                            @else
                                <span class="text-muted">No Image</span>
                            @endif
                        </td>
                        <td>{{ $gallery->description ?? '-' }}</td>
                        <td>
                            <a href="{{ route('admin.gallery.edit', $gallery->id) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ route('admin.gallery.destroy', $gallery->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this image?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info">No images found. <a href="{{ route('admin.gallery.create') }}">Add a new image</a></div>
    @endif
</div>
@endsection
