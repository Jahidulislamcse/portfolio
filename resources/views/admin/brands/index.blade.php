@extends('admin.layout.admin-master')
@section('title', 'Brands')

@section('main')
<div class="container mt-4 px-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>Brands</h4>
        <a href="{{ route('admin.brands.create') }}" class="btn btn-primary">Add Brand</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($brands->count())
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($brands as $brand)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($brand->image)
                                <img src="{{ asset('upload/' . $brand->image) }}" alt="{{ $brand->name }}" width="80" class="rounded">
                            @else
                                <span class="text-muted">No Image</span>
                            @endif
                        </td>
                        <td>{{ $brand->name }}</td>
                        <td>
                            <a href="{{ route('admin.brands.edit', $brand->id) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ route('admin.brands.destroy', $brand->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this brand?');">
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
        <div class="alert alert-info">No brands found. <a href="{{ route('admin.brands.create') }}">Add a new brand</a></div>
    @endif
</div>
@endsection
