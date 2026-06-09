@extends($layout)

@section('content')

<section class="users-form-section" style="display:flex; gap:30px;">

    <!-- LEFT SIDE: FORM -->
    <div class="form-container" style="flex:1;">

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

    <!-- RIGHT SIDE: LIST -->
    <div class="form-container" style="flex:1;">

        <div class="form-header">
            <h1>Subcategory List</h1>
            <p>All created subcategories</p>
        </div>

        <table style="width:100%; border-collapse:collapse; background:#fff; border-radius:10px; overflow:hidden;">

            <thead style="background:#111827; color:#fff;">
                <tr>
                    <th style="padding:12px;">#</th>
                    <th style="padding:12px;">Name</th>
                    <th style="padding:12px;">Category</th>
                    <th style="padding:12px;">Slug</th>
                    <th style="padding:12px;">Status</th>
                </tr>
            </thead>

            <tbody>

                @forelse($subcategories as $subcategory)
                    <tr style="border-bottom:1px solid #eee;">
                        <td style="padding:12px;">{{ $loop->iteration }}</td>
                        <td style="padding:12px;">{{ $subcategory->name }}</td>

                        <td style="padding:12px;">
                            {{ $subcategory->category->name ?? 'N/A' }}
                        </td>

                        <td style="padding:12px;">{{ $subcategory->slug }}</td>

                        <td style="padding:12px;">
                            @if($subcategory->status == 1)
                                <span style="color:green;">Active</span>
                            @else
                                <span style="color:red;">Inactive</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align:center; padding:15px;">
                            No subcategories found
                        </td>
                    </tr>
                @endforelse

            </tbody>

        </table>

    </div>

</section>

@endsection