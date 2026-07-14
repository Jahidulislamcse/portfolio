@extends('admin.layout.admin-master')
@section('title', 'Services')

@section('main')
<div class="container-fluid mt-4 px-4 py-4">

    @if(session('success'))
    <div id="success-alert" class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Existing Services -->
        <div class="card mb-4 px-3">
            <div class="card-header">
                <h4>Existing Services</h4>
            </div>
            <div class="card-body">
                @foreach($services as $service)
                <div class="mb-4 border-bottom pb-3">
                    <input type="hidden" name="services[{{ $service->id }}][id]" value="{{ $service->id }}">
                    
                    <div class="mb-2">
                        @if($service->image)
                        <img src="{{ asset('upload/'.$service->image) }}" width="100" alt="service">
                        @endif
                    </div>
                    <div class="mb-2">
                        <label>Image</label>
                        <input type="file" name="services[{{ $service->id }}][image]" class="form-control image-input">
                    </div>
                    <div class="mb-2">
                        <label>Heading</label>
                        <input type="text" name="services[{{ $service->id }}][heading]" class="form-control" value="{{ $service->heading }}">
                    </div>
                    <div class="mb-2">
                        <label>Description</label>
                        <textarea name="services[{{ $service->id }}][desc]" class="form-control">{{ $service->desc }}</textarea>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="services[{{ $service->id }}][delete]" id="delete_service_{{ $service->id }}">
                        <label class="text-danger form-check-label" for="delete_service_{{ $service->id }}">Delete</label>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Add New Services -->
        <div class="card mb-4 px-3">
            <div class="card-header">
                <h4>Add New Services</h4>
            </div>
            <div class="card-body" id="new-services-container">
                <div class="mb-4 new-service-row">
                    <div class="mb-2">
                        <label>Image</label>
                        <input type="file" name="new_services[0][image]" class="form-control image-input">
                    </div>
                    <div class="mb-2">
                        <label>Heading</label>
                        <input type="text" name="new_services[0][heading]" class="form-control" placeholder="Heading">
                    </div>
                    <div class="mb-2">
                        <label>Description</label>
                        <textarea name="new_services[0][desc]" class="form-control" placeholder="Description"></textarea>
                    </div>
                    <button type="button" class="btn btn-success add-service-btn">Add More</button>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mb-5">Save Services</button>
    </form>
</div>

<script>
    setTimeout(function() {
        const alert = document.getElementById('success-alert');
        if (alert) alert.style.display = 'none';
    }, 3000);

    document.addEventListener('DOMContentLoaded', function() {
        const container = document.getElementById('new-services-container');
        let newServiceIndex = 1;

        container.addEventListener('click', function(e) {
            if (e.target.classList.contains('add-service-btn')) {
                e.preventDefault();
                const newRow = document.createElement('div');
                newRow.classList.add('mb-4', 'new-service-row');
                newRow.innerHTML = `
                    <div class="mb-2">
                        <label>Image</label>
                        <input type="file" name="new_services[${newServiceIndex}][image]" class="form-control image-input">
                    </div>
                    <div class="mb-2">
                        <label>Heading</label>
                        <input type="text" name="new_services[${newServiceIndex}][heading]" class="form-control" placeholder="Heading">
                    </div>
                    <div class="mb-2">
                        <label>Description</label>
                        <textarea name="new_services[${newServiceIndex}][desc]" class="form-control" placeholder="Description"></textarea>
                    </div>
                    <button type="button" class="btn btn-danger remove-service-btn">Remove</button>
                `;
                container.appendChild(newRow);
                newServiceIndex++;
            }

            if (e.target.classList.contains('remove-service-btn')) {
                e.preventDefault();
                e.target.closest('.new-service-row').remove();
            }
        });

        // Image size validation
        document.body.addEventListener('change', function(e) {
            if (e.target.classList.contains('image-input')) {
                const file = e.target.files[0];
                if (file && file.size > 1024 * 1024) {
                    alert('Image size must be less than 1 MB.');
                    e.target.value = '';
                }
            }
        });
    });
</script>
@endsection
