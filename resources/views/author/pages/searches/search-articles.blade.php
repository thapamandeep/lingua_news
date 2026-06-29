@extends('author.layouts.template')

@section('content')

<div class="dashboard-wrapper">

```
<div class="search-page-header">

    <div>
        <h2>Search Articles</h2>

        @if(request('search'))
            <p>
                Results for:
                <strong>"{{ request('search') }}"</strong>
            </p>
        @else
            <p>Browse your articles.</p>
        @endif
    </div>

</div>

<div class="search-results-container">

    @forelse($news as $item)

        @php
            $translation = $item->translations->first();
        @endphp

        <div class="article-card">

            <div class="article-image">

                <img
                    src="{{ asset('storage/gallery/' . $item->image) }}"
                    alt="{{ $translation->title ?? 'News Image' }}">

            </div>

            <div class="article-content">

                <h3>
                    {{ $translation->title ?? 'No Title Available' }}
                </h3>

                <p>
                    {{ \Illuminate\Support\Str::limit($translation->description ?? '', 150) }}
                </p>

                <div class="article-meta">

                    <span class="category-badge">
                        {{ $item->category->translation->name ?? 'No Category' }}
                    </span>

                    @if($item->status == 'approved')

                        <span class="status-badge approved">
                            Approved
                        </span>

                    @elseif($item->status == 'pending')

                        <span class="status-badge pending">
                            Pending
                        </span>

                    @else

                        <span class="status-badge rejected">
                            Rejected
                        </span>

                    @endif

                    <span class="date-badge">
                        {{ $item->created_at->format('d M Y') }}
                    </span>

                </div>

            </div>

        </div>

    @empty

        <div class="empty-search">

            <i class="fa-solid fa-magnifying-glass"></i>

            <h3>No Articles Found</h3>

            <p>
                We couldn't find any articles matching your search.
            </p>

        </div>

    @endforelse

</div>

@if($news->count())

    <div class="pagination-wrapper">
        {{ $news->links() }}
    </div>

@endif
```

</div>

@endsection
