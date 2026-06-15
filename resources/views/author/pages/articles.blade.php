@extends('author.layouts.template')

@section('content')

<section class="news-layout">

    <div class="news-table">

        <h2>My Articles</h2>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Language</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                @forelse($articles as $key => $article)

                    @php
                        $translation = $article->translations->first();
                        $title = $translation->title ?? 'No Title';
                        $status = $translation->status ?? 'pending';
                        $language = $translation->language->name ?? 'N/A';
                    @endphp

                    <tr>

                        <td>{{ $key + 1 }}</td>

                        <td>{{ $title }}</td>

                        <td>
                            @if($status == 'pending')
                                <span class="status pending">Pending</span>
                            @elseif($status == 'approved')
                                <span class="status approved">Approved</span>
                            @elseif($status == 'rejected')
                                <span class="status rejected">Rejected</span>
                            @endif
                        </td>

                        <td>{{ $language }}</td>

                        <td>{{ $article->created_at->format('d M Y') }}</td>

                        <td class="actions">

                            <a href="{{ route('news.edit', $article->id) }}" class="btn edit">
                                Edit
                            </a>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="6" style="text-align:center;">
                            No articles found
                        </td>
                    </tr>

                @endforelse

            </tbody>
        </table>

    </div>

</section>

@endsection