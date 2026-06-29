@extends('admin.layouts.template
')

@section('title', 'Upload Media')

@section('content')

<link rel="stylesheet" href="{{ asset('css/admin/media.css') }}">

<div class="media-container">

    <div class="media-card">

        <div class="card-header">
            <h2>Upload Media</h2>
            <p>Upload an image and attach it to a news article.</p>
        </div>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="alert success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="alert error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('media.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <!-- News -->
            <div class="form-group">
                <label>News Article <span class="required">*</span></label>

                <select name="news_id" required>

                    <option value="">Select News</option>

                    @foreach($news as $item)

                        <option value="{{ $item->id }}"
                            {{ old('news_id') == $item->id ? 'selected' : '' }}>

                            {{ $item->slug }}

                        </option>

                    @endforeach

                </select>
            </div>

            <!-- Image -->
            <div class="form-group">

                <label>Upload Image <span class="required">*</span></label>

                <input
                    type="file"
                    name="image"
                    id="imageInput"
                    accept="image/*"
                    required>

            </div>

            <!-- Preview -->
            <div class="preview-box">

                <img
                    src=""
                    id="previewImage"
                    alt="Preview"
                    style="display:none;">

            </div>

            <!-- Alt Text -->
            <div class="form-group">

                <label>Alt Text</label>

                <input
                    type="text"
                    name="alt_text"
                    value="{{ old('alt_text') }}"
                    placeholder="Enter image alt text">

            </div>

            <!-- Caption -->
            <div class="form-group">

                <label>Caption</label>

                <textarea
                    name="caption"
                    rows="4"
                    placeholder="Write image caption...">{{ old('caption') }}</textarea>

            </div>

            <!-- Media Type -->
            <div class="form-group">

                <label>Media Type</label>

                <select name="media_type">

                    <option value="gallery">Gallery</option>

                    <option value="featured">Featured</option>

                    <option value="thumbnail">Thumbnail</option>

                    <option value="banner">Banner</option>

                </select>

            </div>

            <!-- Featured -->
            <div class="form-group checkbox-group">

                <label>

                    <input
                        type="checkbox"
                        name="is_featured"
                        value="1">

                    Featured Image

                </label>

            </div>

            <!-- Status -->
            <div class="form-group">

                <label>Status</label>

                <select name="status">

                    <option value="active">Active</option>

                    <option value="inactive">Inactive</option>

                </select>

            </div>

            <!-- Buttons -->
            <div class="button-group">

                <button
                    type="submit"
                    class="btn-save">

                    Upload Media

                </button>

                <a
                    href="{{ route('media.index') }}"
                    class="btn-cancel">

                    Cancel

                </a>

            </div>

        </form>

    </div>

</div>

<script>

document.getElementById('imageInput').addEventListener('change', function(){

    const file = this.files[0];

    if(file){

        const reader = new FileReader();

        reader.onload = function(e){

            const image = document.getElementById('previewImage');

            image.src = e.target.result;

            image.style.display = "block";

        }

        reader.readAsDataURL(file);

    }

});

</script>

@endsection