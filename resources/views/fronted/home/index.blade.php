@extends('fronted.layouts.template')

@section('content')

<section class="leatest-news">

    <div class="heroes-section">

        {{-- HERO NEWS --}}
        <div class="main-img">

            @if(isset($heroNews[0]))

                <img src="{{ asset('storage/gallery/' . $heroNews[0]->image) }}">

                <div class="news-time">
                    {{ $heroNews[0]->created_at->format('d M Y') }}
                </div>

                <div class="main-news-text">

                    <h2>
                        {{ $heroNews[0]->title ?? 'No Title' }}
                    </h2>

                </div>

            @endif

        </div>

        {{-- SIDE HERO NEWS --}}
        <div class="side-img">

            @foreach($subHeroNews as $news)

                <div class="side-item">

                    <img src="{{ asset('storage/gallery/' . $news->image) }}">

                    <div class="news-time">
                        {{ $news->created_at->format('d M Y') }}
                    </div>

                    <div class="news-text">

                        <span class="subcategory">
                            {{ $news->subcategory->name ?? 'General' }}
                        </span>

                        <h4>
                            {{ $news->title ?? 'No Title' }}
                        </h4>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>

<!-- ================= LATEST NEWS ================= -->

<section class="latest-news-section">

    <div class="latest-news-wrapper">

        <div class="section-title">
            <h2>Latest News</h2>
        </div>

        <div class="latest-news-grid">

            @foreach($latestNews as $news)

                <div class="news-card">

                    <div class="news-image">

                        <img src="{{ asset('storage/gallery/' . $news->image) }}">

                        <div class="news-time">
                            {{ $news->created_at->diffForHumans() }}
                        </div>

                    </div>

                    <div class="news-content">

                        <h3>
                            {{ $news->title ?? 'No Title' }}
                        </h3>

                        <p>
                            {{ \Illuminate\Support\Str::limit($news->description ?? '', 120) }}
                        </p>

                        <a href="#" class="read-more-btn">
                            Read More
                        </a>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>

<!-- ================= PREVIOUS NEWS ================= -->

<section class="previous-news-section">

    <div class="previous-news-wrapper">

        <div class="section-title">
            <h2>Previous News</h2>
        </div>

        <div class="previous-news-grid">

            @foreach($previousNews as $news)

                <div class="previous-news-card">

                    <div class="news-img">

                        <img src="{{ asset('storage/gallery/' . $news->image) }}">

                    </div>

                    <div class="news-content">

                        <h3>
                            {{ $news->title ?? 'No Title' }}
                        </h3>

                        <div class="news-time">
                            {{ $news->created_at->format('d M Y') }}
                        </div>

                        <p>
                            {{ \Illuminate\Support\Str::limit($news->description ?? '', 200) }}
                        </p>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>

@endsection