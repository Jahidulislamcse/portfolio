@extends('admin.layout.admin-master')
@section('title', 'Settings')

@section('main')
<div class="px-4 py-4 container">
    <h2>Create Branch</h2>

    @if(session('success'))
        <div id="success-alert" class="alert alert-success">
            {{ session('success') }}
        </div>

        <script>
            setTimeout(function() {
                const alert = document.getElementById('success-alert');
                if (alert) alert.style.display = 'none';
            }, 3000);
        </script>
    @endif

    <form action="{{ route('admin.branches.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Name *</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Link</label>
            <input type="text" name="link" class="form-control">
        </div>

        <div class="form-group">
            <label>Admin Link</label>
            <input type="text" name="admin_link" class="form-control">
        </div>

        <div class="form-group">
            <label>Account</label>
            <input type="text" name="account" class="form-control">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="text" name="password" class="form-control">
        </div>

        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="form-group">
            <label>Address</label>
            <textarea name="address" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control">
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
        </div>

        <button type="submit" class="mb-5 btn btn-primary mt-2">Create Branch</button>
    </form>
</div>
@endsection
