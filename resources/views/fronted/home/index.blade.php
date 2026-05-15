@extends('fronted.layouts.template')

@section('content')
<section class="leatest-news">

    <div class="heroes-section">

     <div class="main-img">

    <img src="{{ asset('img/multigual.jpg') }}" alt="">

    <div class="main-news-text">
        <h2>Main News Heading Here</h2>
    </div>

</div>
    <div class="side-img">

    <div class="side-item">
        <img src="{{ asset('img/sudan.webp') }}" alt="">
        <div class="news-text">
            <h4>Sudan Crisis Update</h4>
        </div>
    </div>

    <div class="side-item">
        <img src="{{ asset('img/economics-news.jpg') }}" alt="">
        <div class="news-text">
            <h4>Economic News Today</h4>
        </div>
    </div>

</div>

    </div>
</section>
<br>

<!-- ---------------------leatest news------------------------------- -->
<section class="latest-news-section">

    <div class="latest-news-wrapper">

        <div class="section-title">
            <h2>Latest News</h2>
           
            <div class="slider-buttons">
        <button onclick="slideLeft()">&#10094;</button>
        <button onclick="slideRight()">&#10095;</button>
    </div>
        </div>

      

            <div class="latest-news-grid">

    <div class="news-card">

        <div class="news-image">
            <img src="{{ asset('img/sudan.webp') }}" alt="">
        </div>

        <div class="news-content">
            <h3>Sudan Crisis Update</h3>
            <p>
                Latest updates from Sudan crisis and international reactions continue worldwide.
            </p>

            <a href="#" class="read-more-btn">Read More</a>
        </div>

    </div>


    <div class="news-card">

        <div class="news-image">
            <img src="{{ asset('img/multigual.jpg') }}" alt="">
        </div>

        <div class="news-content">
            <h3>Technology News Today</h3>
            <p>
                AI and multilingual systems are rapidly changing modern digital platforms.
            </p>

            <a href="#" class="read-more-btn">Read More</a>
        </div>

    </div>


    <div class="news-card">

        <div class="news-image">
            <img src="{{ asset('img/sports-headlines.webp') }}" alt="">
        </div>

        <div class="news-content">
            <h3>Sports Headlines</h3>
            <p>
                Football and cricket updates from international leagues and tournaments.
            </p>

            <a href="#" class="read-more-btn">Read More</a>
        </div>

    </div>

        <div class="news-card">

        <div class="news-image">
            <img src="{{ asset('img/sports-headlines.webp') }}" alt="">
        </div>

        <div class="news-content">
            <h3>Sports Headlines</h3>
            <p>
                Football and cricket updates from international leagues and tournaments.
            </p>

            <a href="#" class="read-more-btn">Read More</a>
        </div>

    </div>
     
</div>

</div>

    </div>

</section>

<!-- --------------previous news-------------------- -->
<section class="previous-news-section">

    <div class="previous-news-wrapper">

        <div class="section-title">
            <h2>Previous News</h2>
        </div>
<div class="previous-news-grid">

    <div class="previous-news-card">
        <div class="news-img">
            <img src="{{ asset('img/sudan.webp') }}" alt="">
        </div>

        <div class="news-content">
            <h3>First News Title</h3>
            <p>First news description goes here...</p>
        </div>
    </div>

    <div class="previous-news-card">
        <div class="news-img">
            <img src="{{ asset('img/multigual.jpg') }}" alt="">
        </div>

        <div class="news-content">
            <h3>Second News Title</h3>
            <p>Second news description goes here...</p>
        </div>
    </div>

    <div class="previous-news-card">
        <div class="news-img">
            <img src="{{ asset('img/sports-headlines.webp') }}" alt="">
        </div>

        <div class="news-content">
            <h3>Third News Title</h3>
            <p>Third news description goes here...</p>
        </div>
    </div>

</div>

        </div>

    </div>

</section>
@endsection