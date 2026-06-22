@extends($layout)

@section('content')

<section class="users-form-section" style="display:flex; gap:30px;">

    <!-- LEFT SIDE -->
    <div class="form-container" style="flex:1;">

        <div class="form-header">
            <h1>Create Subcategory</h1>
            <p>Add new subcategory</p>
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

        <form action="{{ route('subcategories.store') }}" method="POST" class="user-form">

            @csrf

            <!-- Category -->
            <div class="form-group">
                <label>Select Category</label>

                <select name="category_id">
                    <option value="">Select Category</option>

                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->translation?->name ?? $category->slug }}
                        </option>
                    @endforeach

                </select>
            </div>

            <!-- Slug -->
            <div class="form-group">
                <label>Slug</label>
                <input
                    type="text"
                    name="slug"
                    value="{{ old('slug') }}"
                    placeholder="Enter slug">
            </div>

            <!-- Status -->
            <div class="form-group">
                <label>Status</label>

                <select name="status">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>

            <div class="form-btn">
                <button type="submit">
                    Create Subcategory
                </button>
            </div>

        </form>

    </div>

    <!-- RIGHT SIDE -->
    <div class="form-container" style="flex:1;">

        <div class="form-header">
            <h1>Subcategory List</h1>
            <p>All created subcategories</p>
        </div>

        <table style="width:100%; border-collapse:collapse;">

            <thead style="background:#111827;color:#fff;">
                <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th>Slug</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>

                @forelse($subcategories as $subcategory)

                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>
                            {{ $subcategory->category->translation?->name ?? $subcategory->category->slug }}
                        </td>

                        <td>{{ $subcategory->slug }}</td>

                        <td>
                            @if($subcategory->status)
                                Active
                            @else
                                Inactive
                            @endif
                        </td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="4" style="text-align:center;">
                            No subcategories found
                        </td>
                    </tr>

                @endforelse
x
            </tbody>

        </table>

    </div>

</section>

@endsection