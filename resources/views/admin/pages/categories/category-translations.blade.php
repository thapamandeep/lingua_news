@extends($layout)

@section('content')

<section class="users-form-section">

```
<div class="form-container">

    <div class="form-header">
        <h1>Create Category Translation</h1>
        <p>Add translations for existing categories</p>
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

    <form action="{{ route('category.translation.store') }}" method="POST" class="user-form">

        @csrf

        <!-- Category -->
        <div class="form-group">
            <label>Category</label>
            <select name="category_id">
                <option value="">Select Category</option>

                @foreach($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->slug }}
                    </option>
                @endforeach

            </select>
        </div>

        <!-- Language -->
       <div class="form-group">
    <label>Language</label>

    <select name="locale">
        <option value="">Select Language</option>

        @foreach($languages as $language)
            <option value="{{ $language->code }}">
                {{ $language->name }}
            </option>
        @endforeach

    </select>
</div>

        <!-- Name -->
        <div class="form-group">
            <label>Category Name</label>
            <input type="text" name="name" placeholder="Enter translated category name">
        </div>

        <!-- Description -->
        <div class="form-group full-width">
            <label>Description</label>
            <textarea name="description" rows="5"></textarea>
        </div>

        <div class="form-btn">
            <button type="submit">
                Save Translation
            </button>
        </div>

    </form>

</div>
```

</section>

@endsection
