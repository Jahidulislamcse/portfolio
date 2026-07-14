@extends('admin.layout.admin-master')
@section('title', 'Settings')

@section('main')

<div class="px-4 py-4 container">
    <h2>Edit Branch</h2>

    @if(session('success'))
        <div id="success-alert" class="alert alert-success">{{ session('success') }}</div>
        <script>
            setTimeout(() => document.getElementById('success-alert').style.display = 'none', 3000);
        </script>
    @endif

    <form action="{{ route('admin.branches.update', $branch) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Name *</label>
            <input type="text" name="name" class="form-control" value="{{ $branch->name }}" required>
        </div>

        <div class="form-group">
            <label>Link</label>
            <input type="text" name="link" class="form-control" value="{{ $branch->link }}">
        </div>

        <div class="form-group">
            <label>Admin Link</label>
            <input type="text" name="admin_link" class="form-control" value="{{ $branch->admin_link }}">
        </div>

        <div class="form-group">
            <label>Account</label>
            <input type="text" name="account" class="form-control" value="{{ $branch->account }}">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="text" name="password" class="form-control" 
            value="{{ $branch->password ? Illuminate\Support\Facades\Crypt::decryptString($branch->password) : '' }}">
        </div>

        <div class="form-group">
            <label>Image</label>
            @if($branch->image)
                <img src="{{ asset('upload/'.$branch->image) }}" width="80" alt="image">
            @endif
            <input type="file" name="image" class="form-control mt-1">
        </div>

        <div class="form-group">
            <label>Address</label>
            <textarea name="address" class="form-control">{{ $branch->address }}</textarea>
        </div>

        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ $branch->phone }}">
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $branch->email }}">
        </div>

        <button type="submit" class="mb-5 btn btn-success mt-2">Update Branch</button>
    </form>
</div>
@endsection
