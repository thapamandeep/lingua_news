@extends('fronted.layouts.template')

@section('content')

<section class="sports-page">

    <div class="sports-container">

        
        <div class="sports-categories">

            <nav class="main-nav">
                <a href="{{ route('home.index') }}" class="nav-link active">Home</a>
                <a href="#" class="nav-link">Government Updates</a>
                <a href="#" class="nav-link">Parliament News</a>
                <a href="#" class="nav-link">International Politics</a>
                <a href="#" class="nav-link">Trending Headlines</a>
            </nav>

        </div>

       
       <div class="sports-header">
    <h1>Latest Politics News</h1>
    <p>Stay updated with breaking political news, international affairs, government decisions, elections, diplomatic relations, and global political developments from around the world.</p>
</div>
        
        <div class="featured-news">

            <div class="featured-image">
                <img src="{{ asset('img/trending news.jpg') }}" alt="Football News">
            </div>

            <div class="featured-content">
                

                <h2>
                    Breaking: Iran-Israel-US Conflict Dominates World Headlines
                </h2>

                <p>
                   This image shows several major British newspapers covering the rising tensions between Iran, Israel, and the United States. The front pages focus on missile attacks, military threats, ceasefire discussions, and international political reactions. Newspapers such as The Times, Daily Mail, The Guardian, Daily Express, and The Daily Telegraph are presenting the crisis as one of the most important global events of the moment. The large headlines and dramatic images are designed to capture public attention and show the seriousness of the situation in the Middle East.

One of the main headlines visible in the image is “Iran fires at US air base in Qatar,” which refers to reports that Iran launched missiles toward a U.S. military base located in Qatar. This development increased fears of a wider regional conflict because the United States has strong military influence in the Middle East and is a close ally of Israel. Attacks involving U.S. military bases are considered highly dangerous because they could lead to direct military retaliation and further escalation between nations.....




                </p>

                <a href="#" class="read-more-btn">Read Full Story</a>
            </div>

        </div>

      
       <div class="sports-news-grid">

    <!-- International News -->
    <div class="sports-card">

        <img src="{{ asset('img/global leaders.jpg') }}" alt="International News">

        <div class="sports-content">

            <span class="category cricket">International</span>

            <h3>
                Global Leaders Discuss Rising Middle East Tensions
            </h3>

            <p>
                International leaders gathered for urgent diplomatic talks as tensions
                continue to rise between Iran, Israel, and the United States, raising
                concerns about regional stability.
            </p>

            <a href="#" class="read-me">Read More</a>

        </div>

    </div>

    <!-- Trending News -->
    <div class="sports-card">

        <img src="{{ asset('img/bricks.jpg') }}" alt="Trending News">

        <div class="sports-content">

            <span class="category football">Trending</span>

            <h3>
                Ceasefire Discussions Become Top Global Trending Topic
            </h3>

            <p>
                Social media and international news outlets are heavily focused on
                ceasefire discussions as world leaders call for peace and diplomatic
                solutions to ongoing conflicts.
            </p>

            <a href="#" class="read-me">Read More</a>

        </div>

    </div>

    <!-- Parliament News -->
    <div class="sports-card">

        <img src="{{ asset('img/parliament.jpg') }}" alt="Parliament News">

        <div class="sports-content">

            <span class="category basketball">Parliament</span>

            <h3>
                Parliament Debates New National Security Policies
            </h3>

            <p>
                Lawmakers held intense discussions in parliament regarding defense,
                border security, and economic strategies following recent international
                political developments.
            </p>

            <a href="#" class="read-me">Read More</a>

        </div>

    </div>

    <!-- Government News -->
    <div class="sports-card">

        <img src="{{ asset('img/economics plan.jpg') }}" alt="Government News">

        <div class="sports-content">

            <span class="category tennis">Government</span>

            <h3>
                Government Announces New Economic Reform Plans
            </h3>

            <p>
                Officials introduced major economic reform policies aimed at improving
                employment opportunities, infrastructure development, and national
                financial stability.
            </p>

            <a href="#" class="read-me">Read More</a>

        </div>

    </div>

</div>

</div>

</section>

@endsection