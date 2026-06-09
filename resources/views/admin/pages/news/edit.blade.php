@extends('admin.layouts.template')

@section('content')

<section class="users-form-section">

<div class="form-container">

    <div class="form-header">
        <h1>Edit News</h1>
        <p>Update existing news details</p>
    </div>

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- ERRORS --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        {{-- SLUG --}}
        <div class="form-group">
            <label>Slug</label>
            <input type="text" name="slug" value="{{ old('slug', $news->slug) }}">
        </div>

        {{-- CATEGORY --}}
        <div class="form-group">
            <label>Category</label>
            <select name="category_id">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ $news->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- SUBCATEGORY --}}
        <div class="form-group">
            <label>Subcategory</label>
            <select name="subcategory_id">
                <option value="">Select Subcategory</option>
                @foreach($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}"
                        {{ $news->subcategory_id == $subcategory->id ? 'selected' : '' }}>
                        {{ $subcategory->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- ROLE --}}
        <div class="form-group">
            <label>Role</label>
            <select name="role_id">
                <option value="">Select Role</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}"
                        {{ $news->role_id == $role->id ? 'selected' : '' }}>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- CURRENT IMAGE --}}
        <div class="form-group">
            <label>Current Image</label><br>
            <img src="{{ asset('storage/gallery/'.$news->image) }}" width="120" style="border-radius:10px;">
        </div>

        {{-- NEW IMAGE --}}
        <div class="form-group">
            <label>Change Image</label>
            <input type="file" name="image">
        </div>

        {{-- STATUS --}}
        <div class="form-group">
            <label>Status</label>
            <select name="status">
                <option value="draft" {{ $news->status == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ $news->status == 'published' ? 'selected' : '' }}>Published</option>
            </select>
        </div>

        {{-- SUBMIT --}}
        <div class="form-btn">
            <button type="submit">Update News</button>
        </div>

    </form>

</div>

</section>

@endsection