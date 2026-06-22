@extends('fronted.layouts.template')

@section('content')

Locale: {{ app()->getLocale() }} <br>
Lang session: {{ session('lang') }} <br>
Lang ID: {{ session('language_id') }}

{{-- ================= HERO SECTION ================= --}}
<section class="leatest-news">
    <div class="heroes-section">

        {{-- MAIN HERO --}}
        <div class="main-img">
  @if($heroNews->isNotEmpty())

    @php
        $heroItem = $heroNews->first();

        $hero = $heroItem->translations
            ->where('language_id', session('language_id'))
            ->first();
    @endphp

    <img
        src="{{ asset('storage/gallery/' . $heroItem->image) }}"
        alt="{{ $hero->title ?? 'News Image' }}"
        loading="lazy">

    <div class="news-time">
        {{ $heroItem->created_at->format('d M Y') }}
    </div>

    <div class="main-news-text">
        <a href="{{ route('detail.news', $heroItem->id) }}" class="hero-link">
            <h2 class="hero-title">
                {{ $hero->title ?? __('app.no_title') }}
            </h2>
        </a>
    </div>

@endif
        </div>

        {{-- SIDE HERO --}}
        <div class="side-img">

            @foreach($subHeroNews as $news)

              @php
$translation = $news->translations
    ->where('language_id', session('language_id'))
    ->first();
@endphp

                <div class="side-item">

                    <img
                        src="{{ asset('storage/gallery/' . $news->image) }}"
                        alt="{{ $translation->title ?? 'News Image' }}"
                        loading="lazy">

                    <div class="news-time">
                        {{ $news->created_at->format('d M Y') }}
                    </div>

                    <div class="news-text">

                        <span class="subcategory">
                            {{ optional($news->subcategory)->name ?? __('app.general') }}
                        </span>

                        <a href="{{ route('detail.news', $news->id) }}" class="link">
                            <h4>
                                {{ $translation->title ?? __('app.no_title') }}
                            </h4>
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

            <h2>{{ __('app.latest_news') }}</h2>

            <div class="slider-btns">
                <button class="btns" onclick="slideLeft()">&#8592;</button>
                <button class="btns" onclick="slideRight()">&#8594;</button>
            </div>

        </div>

        <div class="latest-news-grid">

            @foreach($latestNews as $news)
@php
$translation = $news->translations
    ->where('language_id', session('language_id'))
    ->first();
@endphp

                <div class="news-card">

                    <div class="news-image">

                        <img
                            src="{{ asset('storage/gallery/' . $news->image) }}"
                            alt="{{ $translation->title ?? 'News Image' }}"
                            loading="lazy">

                        <div class="news-time">
                            {{ $news->created_at->diffForHumans() }}
                        </div>

                    </div>

                    <div class="news-content">

                        <h3>
                            {{ $translation->title ?? __('app.no_title') }}
                        </h3>

                        <p>
                            {{ \Illuminate\Support\Str::limit($translation->description ?? '',120) }}
                        </p>

                        <a href="{{ route('detail.news',$news->id) }}" class="read-more-btn">
                            {{ __('app.read_more') }}
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
            <h2>{{ __('app.previous_news') }}</h2>
        </div>

        <div class="previous-news-grid">

            @foreach($previousNews as $news)

                @php
$translation = $news->translations
    ->where('language_id', session('language_id'))
    ->first();
@endphp

                <div class="previous-news-card">

                    <div class="news-img">

                        <img
                            src="{{ asset('storage/gallery/' . $news->image) }}"
                            alt="{{ $translation->title ?? 'News Image' }}"
                            loading="lazy">

                    </div>

                    <div class="news-content">

                        <h3>
                            {{ $translation->title ?? __('app.no_title') }}
                        </h3>

                        <div class="news-time">
                            {{ $news->created_at->format('d M Y') }}
                        </div>

                        <p>
                            {{ \Illuminate\Support\Str::limit($translation->description ?? '',200) }}
                        </p>

                        <a href="{{ route('detail.news',$news->id) }}" class="read-more-btn">
                            {{ __('app.read_more') }}
                        </a>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>

@endsection