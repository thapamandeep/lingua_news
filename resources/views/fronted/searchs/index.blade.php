@extends('fronted.layouts.template')

@section('content')

<section class="search-news-page">
    <div class="container">

        

        @forelse($news as $item)

            @php
                $translation = $item->translations->first();
            @endphp

            <div class="search-news-card">

                <div class="search-news-image">
                    <img src="{{ asset('storage/gallery/'.$item->image) }}"
                         alt="{{ $translation->title ?? '' }}">
                </div>

                <div class="search-news-content">

                    <span class="category">
                     {{ $item->category->translation->name ?? 'News' }}
                    </span>

                    <h3>
                        {{ $translation->title ?? 'No Title' }}
                    </h3>

                    <div class="news-date">
                        {{ $item->created_at->format('F d, Y') }}
                    </div>

                    <p>
                        {{ Str::limit(strip_tags($translation->description ?? ''), 200) }}
                    </p>

                    <a href="{{ route('detail.news', $item->id) }}"
                       class="read-more-btn">
                       {{__('site.Read More')}}
                    </a>

                </div>

            </div>

        @empty

            <div class="no-news">
                <h3>No news found.</h3>
            </div>

        @endforelse

        <div class="pagination-wrapper">
            {{ $news->withQueryString()->links() }}
        </div>

    </div>
</section>

@endsection