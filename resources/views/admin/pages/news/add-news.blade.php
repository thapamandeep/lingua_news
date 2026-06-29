@extends($layout)

@section('content')

<section class="users-form-section">

<div class="form-container">

    <div class="form-header">
        <h1>Create News</h1>
        <p>Add main news (translation will be added later)</p>
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

    <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- SLUG --}}
        <div class="form-group">
            <label>Slug</label>
            <input type="text" name="slug" value="{{ old('slug') }}" >
        </div>

        {{-- CATEGORY --}}
        <div class="form-group">
            <label>Category</label>
            <select name="category_id" >
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->translation->name ?? 'No Translation' }}
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
                    <option value="{{ $subcategory->id }}">
                        {{ $subcategory->translation->name ?? 'No Translation'}}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- {{-- ROLE --}}
        <div class="form-group">
            <label>Role</label>
            <select name="role_id" >
                <option value="">Select Role</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
        </div> -->

        {{-- IMAGE --}}
        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" >
        </div>

       

        {{-- SUBMIT --}}
        <div class="form-btn">
            <button type="submit">Create News</button>
        </div>

    </form>

</div>

</section>

@endsection