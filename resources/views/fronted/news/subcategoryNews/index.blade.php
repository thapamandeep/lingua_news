@extends('fronted.layouts.template')

@section('content')

<section class="sports-page">

    <div class="sports-container">

        <!-- SUBCATEGORY NAVIGATION -->
        <div class="sports-categories">

            <nav class="main-nav">

                <a href="{{ route('home.index') }}" class="nav-link active">
                    Home
                </a>

                @forelse($subcategories as $subcat)

                    <a href="{{ route('subcategory.page', $subcat->slug) }}" class="nav-link">

                        @if($subcat->translation)
                            {{ $subcat->translation->name }}
                        @else
                            {{ $subcat->slug }}
                        @endif

                    </a>

                @empty

                    <span>No Subcategories Found</span>

                @endforelse

            </nav>

        </div>

        <!-- BREAKING NEWS -->
        <div class="sports-header">
            <p id="breaking-text">
                {{ __('messages.breaking_news') }}
            </p>
        </div>

        @if($news->isNotEmpty())

            @php
                $first = $news->first();
            @endphp

            <!-- FEATURED NEWS -->
            <div class="featured-news">

                <div class="featured-image">
                    <img
                        src="{{ asset('storage/gallery/' . $first->image) }}"
                        alt="{{ $first->title }}">
                </div>

                <div class="featured-content">

                    <span class="category">

                        @if($subcategory->translation)
                            {{ $subcategory->translation->name }}
                        @else
                            {{ $subcategory->slug }}
                        @endif

                    </span>

                    <h2>{{ $first->title }}</h2>

                    <p>{{ $first->description }}</p>

                    <a href="{{ route('detail.news', $first->id) }}"
                       class="read-more-btn">
                        {{__('site.Read More')}}
                    </a>

                </div>

            </div>

            <!-- NEWS GRID -->
            <div class="sports-news-grid">

                @foreach($news->slice(1) as $item)

                    <div class="sports-card">

                        <img
                            src="{{ asset('storage/gallery/' . $item->image) }}"
                            alt="{{ $item->title }}">

                        <div class="sports-content">

                            <span class="category">

                                @if($subcategory->translation)
                                    {{ $subcategory->translation->name }}
                                @else
                                    {{ $subcategory->slug }}
                                @endif

                            </span>

                            <h3>{{ $item->title }}</h3>

                            <p>{{ $item->description }}</p>

                            <a href="{{ route('detail.news', $item->id) }}"
                               class="read-me">
                                Read More
                            </a>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="no-news">
                <p>No news found in this subcategory.</p>
            </div>

        @endif

    </div>

</section>

@endsection