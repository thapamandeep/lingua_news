@extends('admin.layouts.template')

@section('content')

<section class="users-form-section">

<div class="form-container">

<div class="form-header">
<h1>Edit News</h1>
<p>Update news for Lingua News Portal</p>
</div>

@if(session('success'))
<div class="alert alert-success">
{{ session('success') }}
</div>
@endif

@if($errors->any())
<div class="alert alert-danger">
<ul>
@foreach($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif

<form action="{{ route('post.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')

<!-- LANGUAGE -->
<div class="form-group">
    <label>Language</label>
    <select name="language_id" >
        <option value="">Select Language</option>
        @foreach($languages as $lang)
            <option value="{{ $lang->id }}"
                {{ $news->language_id == $lang->id ? 'selected' : '' }}>
                {{ $lang->name }}
            </option>
        @endforeach
    </select>
</div>

<!-- TITLE -->
<div class="form-group">
    <label>News Title</label>
    <input type="text" name="title"
        value="{{ old('title', $news->title) }}" >
</div>

<!-- SLUG -->
<div class="form-group">
    <label>Slug</label>
    <input type="text" name="slug"
        value="{{ old('slug', $news->slug) }}" >
</div>

<!-- CATEGORY -->
<div class="form-group">
    <label>Category</label>
    <select name="category_id" >
        <option value="">Select Category</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}"
                {{ $news->category_id == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>

<!-- SUBCATEGORY -->
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

<!-- ROLE -->
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

<!-- DESCRIPTION -->
<div class="form-group">
    <label>Description</label>
    <textarea name="description" rows="5">{{ old('description', $news->description) }}</textarea>
</div>

<!-- CONTENT -->
<div class="form-group">
    <label>Content</label>
    <textarea name="content" rows="8">{{ old('content', $news->content) }}</textarea>
</div>

<!-- IMAGE -->
<div class="form-group">
    <label>News Image</label>
    <input type="file" name="image">

    @if($news->image)
        <p style="margin-top:10px;">
            Current Image:
            <img src="{{ asset('storage/news/' . $news->image) }}" width="120">
        </p>
    @endif
</div>

<!-- STATUS -->
<div class="form-group">
    <label>Status</label>
    <select name="status" >
        <option value="draft" {{ $news->status == 'draft' ? 'selected' : '' }}>Draft</option>
        <option value="published" {{ $news->status == 'published' ? 'selected' : '' }}>Published</option>
    </select>
</div>

<!-- BUTTON -->
<div class="form-btn">
    <button type="submit">Update News</button>
</div>

</form>

</div>

</section>

@endsection