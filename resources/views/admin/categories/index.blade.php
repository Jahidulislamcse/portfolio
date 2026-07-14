@extends('admin.layout.admin-master')
@section('title', 'Categories')

@section('main')
<div class="container mt-4 px-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Categories</h4>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Add Category</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th width="5%">#</th>
                <th>Name</th>
                <th>Image</th>
                <th width="20%">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $key => $category)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    @if($category->image)
                        <img src="{{ asset('upload/' . $category->image) }}" alt="" width="60">
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this category?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
