@extends('fronted.layouts.template')

@section('content')

<section class="about-modern">

    <div class="about-hero">

        <img src="{{ asset('img/news-barnner.webp') }}" alt="Lingua News">

        <div class="hero-overlay"></div>

        <div class="hero-content">

            <div class="hero-left">

                <span class="about-label">ABOUT US</span>

                <div class="moving-title">
                    <h1>{{ $about->about_site_name }}</h1>
                </div>

                <p>
                    {{ $about->about_hero_description }}
                </p>

            </div>

            <div class="hero-features">

                <div class="feature-item">
                    ✓ {{ $about->feature_1 }}
                </div>

                <div class="feature-item">
                    ✓ {{ $about->feature_2 }}
                </div>

                <div class="feature-item">
                    ✓ {{ $about->feature_3 }}
                </div>

                <div class="feature-item">
                    ✓ {{ $about->feature_4 }}
                </div>

            </div>

        </div>

    </div>

    <div class="story-card">

        <span>OUR STORY</span>

        <h2>
            {{ $about->story_title }}
        </h2>

    </div>

    <div class="about-content-box">

        <h3>Who We Are</h3>

        <p>
            {!! nl2br(e($about->who_we_are)) !!}
        </p>

        <blockquote>
            "{{ $about->mission_quote }}"
        </blockquote>

        <h3>Our Vision</h3>

        <p>
            {!! nl2br(e($about->vision_content)) !!}
        </p>

        <div class="about-stats">

            <div class="stat-box">
                <h4>{{ $about->stat1_number }}</h4>
                <span>{{ $about->stat1_label }}</span>
            </div>

            <div class="stat-box">
                <h4>{{ $about->stat2_number }}</h4>
                <span>{{ $about->stat2_label }}</span>
            </div>

            <div class="stat-box">
                <h4>{{ $about->stat3_number }}</h4>
                <span>{{ $about->stat3_label }}</span>
            </div>

        </div>

    </div>

</section>

@endsection