@extends('admin.layout.admin-master')
@section('title', 'Settings')

@section('main')

<div class="px-4 py-4 container">
    <h2>Branches</h2>

    @if(session('success'))
    <div id="success-alert" class="alert alert-success">{{ session('success') }}</div>
    <script>
        setTimeout(() => document.getElementById('success-alert').style.display = 'none', 3000);
    </script>
    @endif

    <a href="{{ route('admin.branches.create') }}" class="btn btn-primary mb-3">Add Branch</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Login Id</th>
                {{-- <th>Password</th> --}}
                <th>Phone</th>
                <th>Contact Email</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($branches as $branch)
            <tr>
                <td>{{ $branch->name }}</td>
                <td>{{ $branch->account }}</td>
                {{-- <td>{{ $branch->password ? Illuminate\Support\Facades\Crypt::decryptString($branch->password) : '' }}</td> --}}
                <td>{{ $branch->phone }}</td>
                <td>{{ $branch->email }}</td>
                <td>
                    @if($branch->image)
                    <img src="{{ asset('upload/'.$branch->image) }}" width="80" alt="image">
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.branches.edit', $branch) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.branches.destroy', $branch) }}" method="POST" 
                        style="display:inline;" 
                        onsubmit="return confirm('Are you sure you want to delete this branch?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                    
                    <a href="{{ route('admin.branches.autologin', $branch) }}" class="btn btn-sm btn-success">
                        Direct Login
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-3">
        {{ $branches->links() }}
    </div>
</div>
@endsection