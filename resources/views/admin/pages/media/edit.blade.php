```blade
@extends('admin.layouts.app')

@section('title', 'Edit Media')

@section('content')

<link rel="stylesheet" href="{{ asset('css/admin/media.css') }}">

<div class="media-container">

    <div class="media-card">

        <div class="card-header">

            <div class="header-left">
                <h2>Edit Media</h2>
                <p>Update media information.</p>
            </div>

            <div class="header-right">
                <a href="{{ route('admin.media.index') }}" class="btn-cancel">
                    Back
                </a>
            </div>

        </div>

        {{-- Validation Errors --}}
        @if($errors->any())

            <div class="alert error">

                <ul>

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form
            action="{{ route('admin.media.update',$media->id) }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <!-- News -->

            <div class="form-group">

                <label>News Article</label>

                <select name="news_id" required>

                    @foreach($news as $item)

                        <option
                            value="{{ $item->id }}"
                            {{ $media->news_id == $item->id ? 'selected' : '' }}>

                            {{ $item->title }}

                        </option>

                    @endforeach

                </select>

            </div>

            <!-- Current Image -->

            <div class="form-group">

                <label>Current Image</label>

                <div class="preview-box">

                    <img
                        src="{{ asset('storage/'.$media->image) }}"
                        id="previewImage"
                        style="display:block;">

                </div>

            </div>

            <!-- Upload New Image -->

            <div class="form-group">

                <label>Replace Image</label>

                <input
                    type="file"
                    name="image"
                    id="imageInput"
                    accept="image/*">

            </div>

            <!-- Alt Text -->

            <div class="form-group">

                <label>Alt Text</label>

                <input
                    type="text"
                    name="alt_text"
                    value="{{ old('alt_text',$media->alt_text) }}">

            </div>

            <!-- Caption -->

            <div class="form-group">

                <label>Caption</label>

                <textarea
                    name="caption"
                    rows="4">{{ old('caption',$media->caption) }}</textarea>

            </div>

            <!-- Media Type -->

            <div class="form-group">

                <label>Media Type</label>

                <select name="media_type">

                    <option
                        value="gallery"
                        {{ $media->media_type=='gallery'?'selected':'' }}>

                        Gallery

                    </option>

                    <option
                        value="featured"
                        {{ $media->media_type=='featured'?'selected':'' }}>

                        Featured

                    </option>

                    <option
                        value="thumbnail"
                        {{ $media->media_type=='thumbnail'?'selected':'' }}>

                        Thumbnail

                    </option>

                    <option
                        value="banner"
                        {{ $media->media_type=='banner'?'selected':'' }}>

                        Banner

                    </option>

                </select>

            </div>

            <!-- Featured -->

            <div class="form-group checkbox-group">

                <label>

                    <input
                        type="checkbox"
                        name="is_featured"
                        value="1"
                        {{ $media->is_featured ? 'checked' : '' }}>

                    Featured Image

                </label>

            </div>

            <!-- Status -->

            <div class="form-group">

                <label>Status</label>

                <select name="status">

                    <option
                        value="active"
                        {{ $media->status=='active'?'selected':'' }}>

                        Active

                    </option>

                    <option
                        value="inactive"
                        {{ $media->status=='inactive'?'selected':'' }}>

                        Inactive

                    </option>

                </select>

            </div>

            <!-- Information -->

            <div class="form-group">

                <label>Image Information</label>

                <table class="media-table">

                    <tr>

                        <th>File Size</th>

                        <td>{{ $media->formatted_size }}</td>

                    </tr>

                    <tr>

                        <th>Resolution</th>

                        <td>{{ $media->width }} × {{ $media->height }}</td>

                    </tr>

                    <tr>

                        <th>Mime Type</th>

                        <td>{{ $media->mime_type }}</td>

                    </tr>

                    <tr>

                        <th>Uploaded</th>

                        <td>{{ $media->created_at->format('d M Y h:i A') }}</td>

                    </tr>

                </table>

            </div>

            <!-- Buttons -->

            <div class="button-group">

                <button
                    type="submit"
                    class="btn-save">

                    Update Media

                </button>

                <a
                    href="{{ route('admin.media.index') }}"
                    class="btn-cancel">

                    Cancel

                </a>

            </div>

        </form>

    </div>

</div>

<script>

document.getElementById('imageInput').addEventListener('change',function(){

    const file=this.files[0];

    if(file){

        const reader=new FileReader();

        reader.onload=function(e){

            document.getElementById('previewImage').src=e.target.result;

        }

        reader.readAsDataURL(file);

    }

});

</script>

@endsection
```
