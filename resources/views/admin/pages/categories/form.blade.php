@extends('admin.layouts.template')

@section('content')

<section class="users-form-section">

    <div class="form-container">

        <div class="form-header">
            <h1>Create Category</h1>
            <p>Add news categories for Lingua News Portal</p>
        </div>

        <!-- SUCCESS MESSAGE -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- ERROR MESSAGE -->
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- VALIDATION ERRORS -->
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('post.category')}}" method="POST" class="user-form">

            @csrf

            <!-- Category Name -->
            <div class="form-group">
                <label>Category Name</label>
                <input type="text" name="name" placeholder="Enter category name">
            </div>

            <!-- Category Slug -->
            <div class="form-group">
                <label>Category Slug</label>
                <input type="text" name="slug" placeholder="Enter category slug">
            </div>

            <!-- Status -->
            <div class="form-group">
                <label>Status</label>

                <select name="status">
                    <option value="">Select Status</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>

            <!-- Description -->
            <div class="form-group full-width">
                <label>Description</label>

                <textarea 
                    name="description" 
                    rows="5" 
                    placeholder="Enter category description"></textarea>
            </div>

            <!-- Submit Button -->
            <div class="form-btn">
                <button type="submit">Create Category</button>
            </div>

        </form>

    </div>

</section>

@endsection