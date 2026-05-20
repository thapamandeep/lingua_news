@extends('admin.layouts.template')

@section('content')

<section class="users-form-section">

    <div class="form-container">

        <div class="form-header">
            <h1>Create Subcategory</h1>
            <p>Add new subcategory for news portal</p>
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

        <form action="{{ route('subcategories.store') }}" method="POST" class="user-form">

            @csrf

            <!-- Category -->
            <div class="form-group">
                <label>Select Category</label>

                <select name="category_id">
                    <option value="">Select Category</option>

                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach

                </select>
            </div>

            <!-- Subcategory Name -->
            <div class="form-group">
                <label>Subcategory Name</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter subcategory name">
            </div>

            <!-- Slug -->
            <div class="form-group">
                <label>Slug</label>
                <input type="text" name="slug" value="{{ old('slug') }}" placeholder="Enter slug">
            </div>

            <!-- Status -->
            <div class="form-group">
                <label>Status</label>

                <select name="status">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>

            <!-- Submit -->
            <div class="form-btn">
                <button type="submit">Create Subcategory</button>
            </div>

        </form>

    </div>

</section>

@endsection