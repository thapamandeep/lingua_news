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
    <h1>Lingua News</h1>
</div>

                <p>
                    Delivering trusted news, multilingual journalism,
                    and global stories every day across the world.
                </p>

            </div>

            <div class="hero-features">

                <div class="feature-item">
                    ✓ Trusted News Coverage
                </div>

                <div class="feature-item">
                    ✓ Multilingual Journalism
                </div>

                <div class="feature-item">
                    ✓ Global News Network
                </div>

                <div class="feature-item">
                    ✓ 24/7 News Updates
                </div>

            </div>

        </div>

    </div>

    <div class="story-card">

        <span>OUR STORY</span>

        <h2>
            Delivering Reliable News & Information
            Since 2020
        </h2>

    </div>

    <div class="about-content-box">

        <h3>Who We Are</h3>

        <p>
            Lingua News is an independent digital news platform committed to
            providing reliable and timely news coverage. Our journalists
            and editors work around the clock to deliver stories from
            politics, sports, business, entertainment and world affairs.
        </p>

        <p>
            We focus on making information accessible through multilingual
            reporting and modern digital journalism, ensuring readers
            everywhere stay informed.
        </p>

        <blockquote>
            "Our mission is to connect people with accurate information
            regardless of language or location."
        </blockquote>

        <h3>Our Vision</h3>

        <p>
            To become one of the leading multilingual news platforms,
            bringing global stories closer to every reader.
        </p>

        <div class="about-stats">

            <div class="stat-box">
                <h4>50K+</h4>
                <span>Monthly Readers</span>
            </div>

            <div class="stat-box">
                <h4>1000+</h4>
                <span>Published Stories</span>
            </div>

            <div class="stat-box">
                <h4>20+</h4>
                <span>Countries Reached</span>
            </div>

        </div>

    </div>

</section>

@endsection