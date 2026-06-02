@extends('author.layouts.template')

@section('content')

<section class="news-layout">

    <div class="news-table">

        <h2>Pending Review News</h2>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($pendingNews as $news)
                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>
                            {{ $news->translations->first()->title ?? 'No Title' }}
                        </td>

                        <td>
                            <img src="{{ asset('storage/gallery/'.$news->image) }}" alt="news">
                        </td>

                        <td>
                            <span class="status pending">draft</span>
                        </td>

                        <!-- ACTIONS -->
                        <td class="actions">

                            <!-- EDIT -->
                            <a href="{{ route('news.edit', $news->id) }}" class="btn edit">
                                Edit
                            </a>

                            <!-- DELETE -->
                            <form action="{{ route('delete.news', $news->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn delete">
                                    Delete
                                </button>
                            </form>

                        </td>

                    </tr>
                @empty

                    <tr>
                        <td colspan="5" style="text-align:center;">
                            No pending news found
                        </td>
                    </tr>

                @endforelse
            </tbody>

        </table>

    </div>

    <div class="news-sidebar">

        <div class="box">
            <h3>Review Info</h3>
            <p>These news are waiting for admin approval before publishing.</p>
        </div>

    </div>

</section>

@endsection