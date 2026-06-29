@extends('admin.layouts.template')

@section('content')

<section class="users-table-section">

```
<div class="table-container">

    <div class="table-header">

        <h1>All News</h1>

        <a href="{{ route('category.create') }}"
           class="btn btn-primary">
            + Add Category
        </a>

    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">

        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Category</th>
                <th>SubCategory</th>
                <th>Author</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

            @forelse($news as $item)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>
                    <img
                        class="news-img"
                        src="{{ asset('storage/gallery/'.$item->image) }}"
                        alt="News Image">
                </td>

                <td>
                    {{ $item->category_id }}
                </td>

                <td>
                    {{ $item->subcategory_id }}
                </td>

                <td>
                    {{ $item->author->name ?? 'N/A' }}
                </td>

                <td>

                    @if($item->status == 'approved')
                        <span class="status approved">
                            Approved
                        </span>

                    @elseif($item->status == 'rejected')
                        <span class="status rejected">
                            Rejected
                        </span>

                    @else
                        <span class="status pending">
                            Pending
                        </span>
                    @endif

                </td>

                <td>

                    <div class="action-buttons">

                        <a href="#"
                           class="btn btn-info">
                            View
                        </a>

                        <a href="{{ route('news.edit',$item->id) }}"
                           class="btn btn-warning">
                            Edit
                        </a>

                        <form action="{{ route('news.delete',$item->id) }}"
                              method="POST"
                              class="delete-form">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this news?')">
                                Delete
                            </button>

                        </form>

                    </div>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="7" style="text-align:center;">
                    No News Found
                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>
```

</section>

@endsection
