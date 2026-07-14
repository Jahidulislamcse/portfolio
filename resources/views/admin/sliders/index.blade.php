@extends('admin.layout.admin-master')
@section('title', 'Sliders')

@section('main')
<div class="container-fluid mt-4 px-4 py-4">

    @if(session('success'))
    <div id="success-alert" class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card mb-4 px-3">
            <div class="card-header">
                <h4>Sliders</h4>
            </div>
            <div class="card-body">
                @foreach($sliders as $slider)
                <div class="mb-4 border-bottom pb-3">
                    <input type="hidden" name="sliders[{{ $slider->id }}][id]" value="{{ $slider->id }}">
                    <div class="mb-2">
                        @if($slider->image_path)
                        <img src="{{ asset('upload/'.$slider->image_path) }}" width="100" alt="slider">
                        @endif
                    </div>
                    <div class="mb-2">
                        <label>Image</label>
                        <input type="file" name="sliders[{{ $slider->id }}][image]" class="form-control image-input">
                    </div>
                    <div class="mb-2">
                        <label>Heading</label>
                        <input type="text" name="sliders[{{ $slider->id }}][heading]" class="form-control" value="{{ $slider->heading ?? '' }}">
                    </div>
                    <div class="mb-2">
                        <label>Description</label>
                        <textarea name="sliders[{{ $slider->id }}][desc]" class="form-control">{{ $slider->desc ?? '' }}</textarea>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="sliders[{{ $slider->id }}][delete]" id="delete_slider_{{ $slider->id }}">
                        <label class="text-danger form-check-label" for="delete_slider_{{ $slider->id }}">Delete</label>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="card mb-4 px-3">
            <div class="card-header">
                <h4>Add New Sliders</h4>
            </div>
            <div class="card-body" id="new-sliders-container">
                <div class="mb-4 new-slider-row">
                    <div class="mb-2">
                        <label>Image</label>
                        <input type="file" name="new_slider_images[]" class="form-control image-input">
                    </div>
                    <div class="mb-2">
                        <label>Heading</label>
                        <input type="text" name="new_sliders_heading[]" class="form-control" placeholder="Heading">
                    </div>
                    <div class="mb-2">
                        <label>Description</label>
                        <textarea name="new_sliders_desc[]" class="form-control" placeholder="Description"></textarea>
                    </div>
                    <button type="button" class="btn btn-success add-slider-btn">Add More</button>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mb-5">Save Sliders</button>
    </form>
</div>

<script>
    setTimeout(function() {
        const alert = document.getElementById('success-alert');
        if (alert) alert.style.display = 'none';
    }, 3000);

    document.addEventListener('DOMContentLoaded', function() {
        const container = document.getElementById('new-sliders-container');

        container.addEventListener('click', function(e) {
            if (e.target.classList.contains('add-slider-btn')) {
                e.preventDefault();
                const newRow = document.createElement('div');
                newRow.classList.add('mb-4', 'new-slider-row');
                newRow.innerHTML = `
                    <div class="mb-2">
                        <label>Image</label>
                        <input type="file" name="new_slider_images[]" class="form-control image-input">
                    </div>
                    <div class="mb-2">
                        <label>Heading</label>
                        <input type="text" name="new_sliders_heading[]" class="form-control" placeholder="Heading">
                    </div>
                    <div class="mb-2">
                        <label>Description</label>
                        <textarea name="new_sliders_desc[]" class="form-control" placeholder="Description"></textarea>
                    </div>
                    <button type="button" class="btn btn-danger remove-slider-btn">Remove</button>
                `;
                container.appendChild(newRow);
            }

            if (e.target.classList.contains('remove-slider-btn')) {
                e.preventDefault();
                e.target.closest('.new-slider-row').remove();
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