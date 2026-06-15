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

                @forelse($pendingNews as $key => $news)

                    @php
                        $translation = $news->translations->first();

                        $title = $translation->title ?? 'Untitled News';

                        // SAFE image fallback
                        $imagePath = !empty($news->image)
                            ? asset('storage/gallery/' . $news->image)
                            : asset('images/default-news.png');

                        // IMPORTANT: translation status (NOT news status)
                        $status = $translation->status ?? 'pending';
                    @endphp

                    <tr>

                        <!-- INDEX -->
                        <td>{{ $key + 1 }}</td>

                        <!-- TITLE -->
                        <td>{{ $title }}</td>

                        <!-- IMAGE -->
                        <td>
                            <img src="{{ $imagePath }}"
                                 alt="news"
                                 style="width:70px;height:50px;object-fit:cover;border-radius:6px;">
                        </td>

                        <!-- STATUS -->
                        <td>
                            @if($status == 'pending')
                                <span class="status pending">Pending</span>
                            @elseif($status == 'approved')
                                <span class="status approved">Approved</span>
                            @elseif($status == 'rejected')
                                <span class="status rejected">Rejected</span>
                            @else
                                <span class="status unknown">Unknown</span>
                            @endif
                        </td>

                        <!-- ACTIONS -->
                        <td class="actions">

                            <a href="{{ route('news.edit', $news->id) }}" class="btn edit">
                                Edit
                            </a>

                            <form action="{{ route('news.delete', $news->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this news?')">

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

</section>

@endsection