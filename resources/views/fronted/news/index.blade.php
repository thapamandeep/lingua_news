@extends('fronted.layouts.template')

@section('content')

<section class="sports-page">

```
<div class="sports-container">


    <!-- SUBCATEGORY MENU -->
    <div class="sports-categories">
        <nav class="main-nav">

            <a href="{{ route('home.index') }}" class="nav-link active">
                Home
            </a>

            @foreach($subcategories as $subcat)
                <a href="{{ route('subcategory.page', $subcat->slug) }}"
                   class="nav-link">
                    {{ $subcat->translation?->name ?? $subcat->slug }}
                </a>
            @endforeach

        </nav>
    </div>

    <!-- CATEGORY NEWS -->
    @if($news->count())

        @php $first = $news->first(); @endphp

        <div class="featured-news">

            <div class="featured-image">
                <img src="{{ asset('storage/gallery/'.$first->image) }}"
                     alt="{{ $first->title }}">
            </div>

            <div class="featured-content">

                <h2>{{ $first->title }}</h2>

                <p>{{ $first->description }}</p>

                <a href="{{ route('detail.news',$first->id) }}"
                   class="read-more-btn">
                    {{__('site.Read More')}}
                </a>

            </div>

        </div>

        <div class="sports-news-grid">

            @foreach($news->skip(1) as $item)

                <div class="sports-card">

                    <img src="{{ asset('storage/gallery/'.$item->image) }}"
                         alt="{{ $item->title }}">

                    <div class="sports-content">

                        <h3>{{ $item->title }}</h3>

                        <p>{{ $item->description }}</p>

                        <a href="{{ route('detail.news',$item->id) }}"
                           class="read-me">
                        {{__('site.Read More')}}
                        </a>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <p>No news found in this category.</p>

    @endif

</div>
```

</section>

@endsection
