@extends('admin.layouts.template')

@section('content')

<section class="users-form-section">

<div class="form-container">

<div class="form-header">
<h1>Create News</h1>
<p>Add latest news for Lingua News Portal</p>
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

<form action="{{ route('post.news') }}" method="POST" enctype="multipart/form-data">
@csrf

<!-- LANGUAGE -->
<div class="form-group">
    <label>Language</label>
    <select name="language_id" required>
        <option value="">Select Language</option>
        @foreach($languages as $lang)
            <option value="{{ $lang->id }}">
                {{ $lang->name }}
            </option>
        @endforeach
    </select>
</div>

<!-- TITLE -->
<div class="form-group">
    <label>News Title</label>
    <input type="text" name="title" value="{{ old('title') }}" required>
</div>

<!-- SLUG -->
<div class="form-group">
    <label>Slug</label>
    <input type="text" name="slug" value="{{ old('slug') }}" required>
</div>

<!-- CATEGORY -->
<div class="form-group">
    <label>Category</label>
    <select name="category_id" required>
        <option value="">Select Category</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">
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
            <option value="{{ $subcategory->id }}">
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
            <option value="{{ $role->id }}">
                {{ $role->name }}
            </option>
        @endforeach
    </select>
</div>

<!-- DESCRIPTION -->
<div class="form-group">
    <label>Description</label>
    <textarea name="description" rows="5">{{ old('description') }}</textarea>
</div>

<!-- CONTENT -->
<div class="form-group">
    <label>Content</label>
    <textarea name="content" rows="8">{{ old('content') }}</textarea>
</div>

<!-- IMAGE -->
<div class="form-group">
    <label>News Image</label>
    <input type="file" name="image" required>
</div>

<!-- STATUS -->
<div class="form-group">
    <label>Status</label>
    <select name="status" required>
        <option value="draft">Draft</option>
        <option value="published">Published</option>
    </select>
</div>

<!-- BUTTON -->
<div class="form-btn">
    <button type="submit">Create News</button>
</div>

</form>

</div>

</section>

@endsection