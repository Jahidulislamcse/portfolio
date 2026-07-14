@extends('admin.layout.admin-master')
@section('title', 'Settings')

@section('main')
<div class="container-fluid mt-4 px-4 py-4">

    @if(session('success'))
    <div id="success-alert" class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card mb-4">
            <div class="card-header">
                <h4>General Settings</h4>
            </div>
            <div class="card-body">
            <div class="mb-4">
                <label class="mb-1">Skill Images</label>
                <input type="file" name="skill_images[]" class="form-control" multiple accept="image/*" id="skillImagesInput">

                <div class="mt-3 d-flex flex-wrap gap-2" id="skillImagesPreview">
                        @if(isset($settings->skills) && $settings->skills->count() > 0)
                            @foreach($settings->skills as $skill)
                                <div class="position-relative" style="width:100px; height:100px;">
                                    <img src="{{ asset('upload/'.$skill->image) }}" class="rounded border" width="100" height="100" style="object-fit:cover;">
                                    <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0 remove-existing-skill" data-id="{{ $skill->id }}" style="padding:2px 6px;">×</button>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="mb-4">
                    <label class="mb-1 form-label">About Description</label>
                    <textarea id="about_desc" name="about_desc" class="form-control">{{ $settings->about_desc ?? '' }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="mb-1 form-label">Mission and Vision</label>
                    <textarea id="mission_vision" name="mission_vision" class="form-control">{{ $settings->mission_vision ?? '' }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="mb-1">Company Name</label>
                    <textarea name="company" class="form-control">{{ $settings->company ?? '' }}</textarea>
                </div>
                <div class="mb-4">
                    <label class="mb-1">Logo</label><br>
                    @if($settings && $settings->logo)
                    <img src="{{ asset('upload/'.$settings->logo) }}" width="100" alt="logo">
                    @endif
                    <input type="file" name="logo" class="form-control mt-1">
                </div>
                <div class="mb-4">
                    <label class="mb-1">Contact Email</label>
                    <input type="email" name="contact_mail" class="form-control" value="{{ $settings->contact_mail ?? '' }}">
                </div>
                <div class="mb-4">
                    <label class="mb-1">Phone Number</label>
                    <input type="text" name="phone_number" class="form-control" value="{{ $settings->phone_number ?? '' }}">
                </div>
                <div class="mb-4">
                    <label class="mb-1">Address</label>
                    <textarea name="address" class="form-control">{{ $settings->address ?? '' }}</textarea>
                </div>
                <div class="mb-4">
                    <label class="mb-1">Google Map (Embeded map src only (iframe src="copy this"))</label>
                    <textarea name="google_map" class="form-control">{{ $settings->google_map ?? '' }}</textarea>
                </div>
                
                <div class="mb-4">
                    <label class="mb-1">Facebook</label>
                    <input type="text" name="facebook" class="form-control" value="{{ $settings->facebook ?? '' }}">
                </div>

                <div class="mb-4">
                    <label class="mb-1">LinkedIn</label>
                    <input type="text" name="linkedin" class="form-control" value="{{ $settings->linkedin ?? '' }}">
                </div>
            </div>
        </div>


        <button type="submit" class="btn btn-primary mb-4">Update Settings</button>
    </form>
</div>
<script>
    setTimeout(function() {
        const alert = document.getElementById('success-alert');
        if (alert) {
            alert.style.display = 'none';
        }
    }, 3000);
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const input = document.getElementById('skillImagesInput');
        const preview = document.getElementById('skillImagesPreview');
        let selectedFiles = [];

        input.addEventListener('change', function (event) {
            const files = Array.from(event.target.files);
            selectedFiles = files;

            const oldPreviews = preview.querySelectorAll('.new-preview');
            oldPreviews.forEach(el => el.remove());

            files.forEach((file, index) => {
                if (file && file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        const wrapper = document.createElement('div');
                        wrapper.classList.add('position-relative', 'new-preview', 'm-1');
                        wrapper.style.width = '100px';
                        wrapper.style.height = '100px';
                        wrapper.innerHTML = `
                            <img src="${e.target.result}" 
                                class="rounded border" 
                                width="100" height="100" 
                                style="object-fit:cover;">
                            <button type="button" 
                                    class="btn btn-sm btn-danger position-absolute top-0 end-0 remove-selected" 
                                    data-index="${index}" 
                                    style="padding:2px 6px; line-height:1;">×</button>
                        `;
                        preview.appendChild(wrapper);
                    };
                    reader.readAsDataURL(file);
                }
            });
        });

        preview.addEventListener('click', function (event) {
            if (event.target.classList.contains('remove-selected')) {
                const index = event.target.getAttribute('data-index');
                selectedFiles.splice(index, 1);
                event.target.parentElement.remove();

                const dataTransfer = new DataTransfer();
                selectedFiles.forEach(file => dataTransfer.items.add(file));
                input.files = dataTransfer.files;
            }
        });

        preview.addEventListener('click', function (event) {
            if (event.target.classList.contains('remove-existing-skill')) {
                const skillId = event.target.getAttribute('data-id');
                const parent = event.target.parentElement;

                if (confirm('Are you sure you want to remove this image?')) {
                    fetch(`/admin/skills/${skillId}/delete`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) parent.remove();
                    })
                    .catch(err => console.error(err));
                }
            }
        });
    });
</script>




<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#about_desc'))
        .catch(error => {
            console.error(error);
        });

    ClassicEditor
        .create(document.querySelector('#mission_vision'))
        .catch(error => {
            console.error(error);
        });
</script>

@endsection