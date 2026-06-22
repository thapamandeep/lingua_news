@extends($layout)

@section('content')

<section class="users-form-section" style="display:flex; gap:30px;">

```
<!-- LEFT SIDE: CREATE CATEGORY -->
<div class="form-container" style="flex:1;">

    <div class="form-header">
        <h1>Create Category</h1>
        <p>Add news categories for Lingua News Portal</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
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

    <form action="{{ route('category.store') }}" method="POST" class="user-form">

        @csrf

        <!-- Slug -->
        <div class="form-group">
            <label>Category Slug</label>
            <input type="text" name="slug" placeholder="slug">
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


        

        <div class="form-btn">
            <button type="submit">Create Category</button>
        </div>

    </form>

</div>

<!-- RIGHT SIDE: CATEGORY LIST -->
<div class="form-container" style="flex:1;">

    <div class="form-header">
        <h1>Category List</h1>
        <p>All created categories</p>
    </div>

    <table style="width:100%; border-collapse:collapse; background:#fff; border-radius:10px; overflow:hidden;">

        <thead style="background:#111827; color:#fff;">
            <tr>
                <th style="padding:12px;">#</th>
                <th style="padding:12px;">Name</th>
                <th style="padding:12px;">Slug</th>
                <th style="padding:12px;">Status</th>
            </tr>
        </thead>

        <tbody>

            @forelse($categories as $category)
                <tr style="border-bottom:1px solid #eee;">
                    <td style="padding:12px;">{{ $loop->iteration }}</td>

                    <td style="padding:12px;">
                    {{ $category->translations->first()?->name ?? '-' }}
                    </td>

                    <td style="padding:12px;">
                        {{ $category->slug }}
                    </td>

                    <td style="padding:12px;">
                        <span class="{{ $category->status }}">
                            {{ ucfirst($category->status) }}
                        </span>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align:center; padding:15px;">
                        No categories found
                    </td>
                </tr>
            @endforelse

        </tbody>

    </table>

</div>
```

</section>

@endsection
