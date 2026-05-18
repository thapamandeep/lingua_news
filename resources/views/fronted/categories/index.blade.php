@extends('fronted.layouts.template')

@section('content')

<section class="sports-page">

    <div class="sports-container">

        <!-- CATEGORY NAV -->
        <div class="sports-categories">

            <nav class="main-nav">

                <a href="{{ route('home.index') }}" class="nav-link active">Home</a>

                @foreach($categories as $cat)
                    <a href="{{ route('category.page', $cat->slug) }}" class="nav-link">
                        {{ $cat->name }}
                    </a>
                @endforeach

            </nav>

        </div>

        <!-- HEADER -->
        <div class="sports-header">
            <h1>{{ $category->name ?? 'News' }}</h1>
            <p>Breaking news, live updates, and latest stories.</p>
        </div>

        @if($news->count())

            @php $first = $news->first(); @endphp

            <!-- FEATURED NEWS -->
            <div class="featured-news">

                <div class="featured-image">
                    <img src="{{ asset('storage/gallery/' . $first->image) }}" alt="">
                </div>

                <div class="featured-content">

                    <span class="category">
                        {{ $category->name }}
                    </span>

                    <h2>{{ $first->title }}</h2>

                    <p>{{ $first->description }}</p>

                    <a href="#" class="read-more-btn">Read Full Story</a>

                </div>

            </div>

            <!-- NEWS GRID -->
            <div class="sports-news-grid">

                @foreach($news->skip(1) as $item)

                    <div class="sports-card">

                        <img src="{{ asset('storage/gallery/' . $item->image) }}" alt="">

                        <div class="sports-content">

                            <span class="category">
                                {{ $category->name }}
                            </span>

                            <h3>{{ $item->title }}</h3>

                            <p>{{ $item->description }}</p>

                            <a href="#" class="read-me">Read More</a>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <p>No news found in this category.</p>

        @endif

    </div>

</section>

@endsection