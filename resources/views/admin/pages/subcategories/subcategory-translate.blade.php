@extends($layout)

@section('content')

<section class="users-form-section">

    <div class="form-container">

        <div class="form-header">
            <h1>Create Subcategory Translation</h1>
            <p>Add translations for existing subcategories</p>
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

        <form action="{{ route('subcategories.translate.store') }}" method="POST" class="user-form">

            @csrf

            <!-- Subcategory -->
            <div class="form-group">
                <label>Subcategory</label>

                <select name="subcategory_id">
                    <option value="">Select Subcategory</option>

                    @foreach($subcategories as $subcategory)
                        <option value="{{ $subcategory->id }}">
                            {{ $subcategory->slug }}
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
                <label>Subcategory Name</label>
                <input
                    type="text"
                    name="name"
                    placeholder="Enter translated subcategory name">
            </div>

            <!-- Description -->
            <div class="form-group full-width">
                <label>Description</label>
                <textarea
                    name="description"
                    rows="5"
                    placeholder="Enter description"></textarea>
            </div>

            <div class="form-btn">
                <button type="submit">
                    Save Translation
                </button>
            </div>

        </form>

    </div>

</section>

@endsection