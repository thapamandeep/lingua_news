@extends('fronted.layouts.template')

@section('content')



{{-- ================= HERO SECTION ================= --}}
<section class="leatest-news">
    <div class="heroes-section">

        {{-- MAIN HERO --}}
        <div class="main-img">

       

  @if($heroNews->isNotEmpty())

    @php
        $heroItem = $heroNews->first();
    @endphp

    <img
        src="{{ asset('storage/gallery/' . $heroItem->image) }}"
        alt="{{ $heroItem->title ?? 'News Image' }}"
        loading="lazy">

    <div class="news-time">
        {{ $heroItem->created_at->format('d M Y') }}
    </div>

    <div class="main-news-text">
        <a href="{{ route('detail.news', $heroItem->id) }}" class="hero-link">
            <h2 class="hero-title">
                {{ $heroItem->title ?? __('app.no_title') }}
            </h2>
        </a>
    </div>

@endif
        </div>

        {{-- SIDE HERO --}}
        <div class="side-img">

         @foreach($subHeroNews as $news)

<div class="side-item">

    <img
        src="{{ asset('storage/gallery/' . $news->image) }}"
        alt="{{ $news->title ?? 'News Image' }}"
        loading="lazy">

    <div class="news-time">
        {{ $news->created_at->format('d M Y') }}
    </div>

    <div class="news-text">

        <span class="subcategory">
            {{ optional($news->subcategory)->name ?? __('app.general') }}
        </span>

        <a href="{{ route('detail.news', $news->id) }}" class="link">
            <h4>{{ $news->title ?? __('app.no_title') }}</h4>
        </a>

    </div>

</div>

@endforeach
        </div>

    </div>
</section>


{{-- ================= LATEST NEWS ================= --}}
<section class="latest-news-section">

    <div class="latest-news-wrapper">

        <div class="section-title">

            <h2>{{ __('site.Latest') }}</h2>

      

            <div class="slider-btns">
                <button class="btns" onclick="slideLeft()">&#8592;</button>
                <button class="btns" onclick="slideRight()">&#8594;</button>
            </div>

        </div>

        <div class="latest-news-grid">

@foreach($latestNews as $news)

<div class="news-card">

    <div class="news-image">

        <img
            src="{{ asset('storage/gallery/' . $news->image) }}"
            alt="{{ $news->title ?? 'News Image' }}"
            loading="lazy">

        <div class="news-time">
            {{ $news->created_at->diffForHumans() }}
        </div>

    </div>

    <div class="news-content">

        <h3>{{ $news->title ?? __('app.no_title') }}</h3>

        <p>
            {{ \Illuminate\Support\Str::limit($news->description ?? '',120) }}
        </p>

        <a href="{{ route('detail.news',$news->id) }}" class="read-more-btn">
            {{ __('site.Read More') }}
        </a>

    </div>

</div>

@endforeach
        </div>

    </div>

</section>


{{-- ================= PREVIOUS NEWS ================= --}}
<section class="previous-news-section">

    <div class="previous-news-wrapper">

        <div class="section-title">
            <h2>{{ __('site.Previous') }}</h2>
            
        </div>

        <div class="previous-news-grid">
@foreach($previousNews as $news)

<div class="previous-news-card">

    <div class="news-img">

        <img
            src="{{ asset('storage/gallery/' . $news->image) }}"
            alt="{{ $news->title ?? 'News Image' }}"
            loading="lazy">

    </div>

    <div class="news-content">

        <h3>{{ $news->title ?? __('app.no_title') }}</h3>

        <div class="news-time">
            {{ $news->created_at->format('d M Y') }}
        </div>

        <p>
            {{ \Illuminate\Support\Str::limit($news->description ?? '',200) }}
        </p>

        <a href="{{ route('detail.news',$news->id) }}" class="read-more-btn">
            {{ __('site.Read More') }}
        </a>

    </div>

</div>

@endforeach
        </div>

    </div>

</section>

@endsection