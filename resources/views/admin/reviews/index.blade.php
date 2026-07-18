@extends('admin.layout.admin-master')
@section('title', 'Client Reviews')

@section('main')
<div class="container-fluid mt-4 px-4 py-4">

    @if(session('success'))
    <div id="success-alert" class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('admin.reviews.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card mb-4 px-3">
            <div class="card-header">
                <h4>Client Reviews</h4>
            </div>
            <div class="card-body">
                @foreach($reviews as $review)
                <div class="mb-4 border-bottom pb-3">
                    <input type="hidden" name="reviews[{{ $review->id }}][id]" value="{{ $review->id }}">
                    <div class="mb-2">
                        @if($review->image)
                        <img src="{{ asset('upload/'.$review->image) }}" width="80" height="80" style="object-fit: cover; border-radius: 50%;" alt="reviewer image">
                        @endif
                    </div>
                    <div class="mb-2">
                        <label>Reviewer Image</label>
                        <input type="file" name="reviews[{{ $review->id }}][image]" class="form-control image-input">
                    </div>
                    <div class="mb-2">
                        <label>Reviewer Name</label>
                        <input type="text" name="reviews[{{ $review->id }}][name]" class="form-control" value="{{ $review->name }}" required>
                    </div>
                    <div class="mb-2">
                        <label>Designation / Company Name</label>
                        <input type="text" name="reviews[{{ $review->id }}][designation]" class="form-control" value="{{ $review->designation ?? '' }}">
                    </div>
                    <div class="mb-2">
                        <label>Client Comment / Review</label>
                        <textarea name="reviews[{{ $review->id }}][comment]" class="form-control" required style="height: 100px;">{{ $review->comment }}</textarea>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="reviews[{{ $review->id }}][delete]" id="delete_review_{{ $review->id }}">
                        <label class="text-danger form-check-label" for="delete_review_{{ $review->id }}">Delete Review</label>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="card mb-4 px-3">
            <div class="card-header">
                <h4>Add New Reviews</h4>
            </div>
            <div class="card-body" id="new-reviews-container">
                <div class="mb-4 new-review-row border-bottom pb-3">
                    <div class="mb-2">
                        <label>Reviewer Image</label>
                        <input type="file" name="new_review_images[]" class="form-control image-input">
                    </div>
                    <div class="mb-2">
                        <label>Reviewer Name</label>
                        <input type="text" name="new_reviews_name[]" class="form-control" placeholder="Name">
                    </div>
                    <div class="mb-2">
                        <label>Designation / Company Name</label>
                        <input type="text" name="new_reviews_designation[]" class="form-control" placeholder="Co-Founder, XYZ Inc.">
                    </div>
                    <div class="mb-2">
                        <label>Client Comment / Review</label>
                        <textarea name="new_reviews_comment[]" class="form-control" placeholder="Comment" style="height: 100px;"></textarea>
                    </div>
                    <button type="button" class="btn btn-success add-review-btn">Add More</button>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mb-5">Save Reviews</button>
    </form>
</div>

<script>
    setTimeout(function() {
        const alert = document.getElementById('success-alert');
        if (alert) alert.style.display = 'none';
    }, 3000);

    document.addEventListener('DOMContentLoaded', function() {
        const container = document.getElementById('new-reviews-container');

        container.addEventListener('click', function(e) {
            if (e.target.classList.contains('add-review-btn')) {
                e.preventDefault();
                const newRow = document.createElement('div');
                newRow.classList.add('mb-4', 'new-review-row', 'border-bottom', 'pb-3');
                newRow.innerHTML = `
                    <div class="mb-2">
                        <label>Reviewer Image</label>
                        <input type="file" name="new_review_images[]" class="form-control image-input">
                    </div>
                    <div class="mb-2">
                        <label>Reviewer Name</label>
                        <input type="text" name="new_reviews_name[]" class="form-control" placeholder="Name">
                    </div>
                    <div class="mb-2">
                        <label>Designation / Company Name</label>
                        <input type="text" name="new_reviews_designation[]" class="form-control" placeholder="Co-Founder, XYZ Inc.">
                    </div>
                    <div class="mb-2">
                        <label>Client Comment / Review</label>
                        <textarea name="new_reviews_comment[]" class="form-control" placeholder="Comment" style="height: 100px;"></textarea>
                    </div>
                    <button type="button" class="btn btn-danger remove-review-btn">Remove</button>
                `;
                container.appendChild(newRow);
            }

            if (e.target.classList.contains('remove-review-btn')) {
                e.preventDefault();
                e.target.closest('.new-review-row').remove();
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
