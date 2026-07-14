@extends('admin.layout.admin-master')
@section('title', 'Managing Body')

@section('main')
<div class="container mt-4 px-5">
    <h4>Managing Body</h4>

    @if($bodies->isEmpty())
        <a href="{{ route('admin.managing-body.create') }}" class="btn btn-primary mb-4">Add Managing Body</a>
    @endif

    @if($bodies->count())
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Director</th>
                <th>Image</th>
                <th>Speech</th>
                <th>Team Structure</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @php $body = $bodies->first(); @endphp
            <tr>
                <td>{{ $body->director }}</td>
                <td>
                    @if($body->image)
                        <img src="{{ asset('upload/'.$body->image) }}" alt="{{ $body->director }}" width="60">
                    @else
                        <span class="text-gray-400">No Image</span>
                    @endif
                </td>
                <td>{{ Str::limit($body->speech, 50) }}</td>
                <td>{{ Str::limit($body->team_structure, 50) }}</td>
                <td>
                    <a href="{{ route('admin.managing-body.edit', $body->id) }}" class="btn btn-sm btn-warning">Edit</a>
                </td>
            </tr>
        </tbody>
    </table>
    @else
        <p class="text-center text-gray-500">No record found. Please add the Managing Body.</p>
    @endif
</div>
@endsection
