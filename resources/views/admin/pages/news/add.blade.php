@extends('admin.layouts.template')

@section('content')

<section class="users-form-section">

    <div class="form-container">

        <div class="form-header">
            <h1>Create News</h1>
            <p>Add latest news for Lingua News Portal</p>
        </div>

        {{-- SUCCESS MESSAGE --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- ERROR MESSAGE --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('post.news')}}" method="POST" enctype="multipart/form-data" class="user-form">

            @csrf

            <!-- Title -->
            <div class="form-group">
                <label>News Title</label>
                <input type="text" name="title" placeholder="Enter news title">
            </div>

            <!-- Slug -->
            <div class="form-group">
                <label>Slug</label>
                <input type="text" name="slug" placeholder="Enter slug (seo url)">
            </div>

            <!-- Category -->
            <div class="form-group">
                <label>Category</label>

                <select name="category_id">
                    <option value="">Select Category</option>

                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach

                </select>
            </div>

            <!-- Description -->
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" rows="4" placeholder="Short description"></textarea>
            </div>

            <!-- Content -->
            <div class="form-group">
                <label>Content</label>
                <textarea name="content" rows="6" placeholder="Full news content"></textarea>
            </div>

            <!-- Image -->
            <div class="form-group">
                <label>News Image</label>
                <input type="file" name="image">
            </div>

            <!-- Status -->
            <div class="form-group">
                <label>Status</label>

                <select name="status">
                    <option value="draft">Draft</option>
                    <option value="published">Published</option>
                </select>
            </div>

            <!-- Submit -->
            <div class="form-btn">
                <button type="submit">Create News</button>
            </div>

        </form>

    </div>

</section>

@endsection