@extends('admin.layouts.template')

@section('content')

<section class="users-table-section">

    <div class="table-container">

        <div class="table-header">
            <h1>All Subcategories</h1>
            <a href="{{ route('translation.create') }}" class="btn btn-primary">
                + Add Translation News
            </a>
        </div>

        {{-- SUCCESS MESSAGE --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>News ID</th>
                    <th>Language ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Content</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                @foreach($news as $news)
                <tr>

                    <td>{{ $news->id }}</td>

                    <td>{{ $news->news_id }}</td>


                    <td>{{ $news->language_id }}</td>

      <td>
    <p class="text-secondary mb-0" style="max-width:250px; word-wrap:break-word;">
        {{ \Illuminate\Support\Str::words($news->title ?? 'No Title', 10, '...') }}
    </p>
</td>

<td>
    <p class="text-secondary mb-0 text-truncate-custom">
        {{ \Illuminate\Support\Str::words($news->description ?? 'No Description', 8, '...') }}
    </p>
</td>

<td>
    <p class="text-secondary mb-0 text-truncate-custom">
        {{ \Illuminate\Support\Str::words($news->content ?? 'No Content', 10, '...') }}
    </p>
</td>

                    

           

   <td class="action-column">

    <div class="action-buttons">

        <a href="#" class="btn btn-info btn-sm">View</a>

        <a href="{{ route('news.edit',$news->id) }}" class="btn btn-warning btn-sm">
            Edit
        </a>

        <form action="{{ route('news.delete',$news->id) }}"
              method="POST"
              class="delete-form">
            @csrf
            @method('DELETE')

            <button type="submit"
                    class="btn btn-danger btn-sm"
                    onclick="return confirm('Are you sure?')">
                Delete
            </button>
        </form>

    </div>

</td>

                </tr>
                @endforeach

            </tbody>

        </table>

    </div>

</section>

@endsection