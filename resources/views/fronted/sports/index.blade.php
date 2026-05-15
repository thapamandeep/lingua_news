@extends('fronted.layouts.template')

@section('content')

<section class="sports-page">

    <div class="sports-container">

        
        <div class="sports-categories">

            <nav class="main-nav">
                <a href="{{ route('sports.index') }}" class="nav-link active">All Sports</a>
                <a href="#" class="nav-link">Cricket</a>
                <a href="#" class="nav-link">Football</a>
                <a href="#" class="nav-link">Basketball</a>
                <a href="#" class="nav-link">Tennis</a>
            </nav>

        </div>

       
        <div class="sports-header">
            <h1>Latest Sports News</h1>
            <p>Breaking news, live scores, match reports, transfer updates and player interviews from around the world.</p>
        </div>

        
        <div class="featured-news">

            <div class="featured-image">
                <img src="{{ asset('img/manunited_win.avif') }}" alt="Football News">
            </div>

            <div class="featured-content">
                <span class="category football">Football</span>

                <h2>
                    Manchester United Secure Dramatic Victory in Final Minutes
                </h2>

                <p>
                    Manchester United stunned fans with a late winning goal in a thrilling
                    Premier League clash. The match remained intense from start to finish
                    with outstanding performances from both teams.
                </p>

                <a href="#" class="read-more-btn">Read Full Story</a>
            </div>

        </div>

      
        <div class="sports-news-grid">

           
            <div class="sports-card">

                <img src="{{ asset('img/indiat20_win.jpg') }}" alt="Cricket">

                <div class="sports-content">

                    <span class="category cricket">Cricket</span>

                    <h3>
                        India Wins T20 Series After Outstanding Batting Performance
                    </h3>

                    <p>
                        India dominated the series with explosive batting and disciplined
                        bowling. Fans celebrated the impressive partnership that changed
                        the game completely.
                    </p>

                    <a href="#"  class="read-me">Read More</a>

                </div>

            </div>

        
            <div class="sports-card">

                <img src="{{ asset('img/real.training_pic.jpg') }}" alt="Football">

                <div class="sports-content">

                    <span class="category football">Football</span>

                    <h3>
                        Real Madrid Preparing for Champions League Final Battle
                    </h3>

                    <p>
                        Real Madrid are training intensely ahead of the biggest match of
                        the season. Coaches are confident about the squad’s current form.
                    </p>

                    <a href="#" class="read-me">Read More</a>

                </div>

            </div>

            
            <div class="sports-card">

                <img src="{{ asset('img/lakers.jpg') }}" alt="Basketball">

                <div class="sports-content">

                    <span class="category basketball">Basketball</span>

                    <h3>
                        Lakers Star Scores Record Points in Playoff Match
                    </h3>

                    <p>
                        Basketball fans witnessed an unforgettable performance as the
                        Lakers secured a crucial playoff victory with a record-breaking score.
                    </p>

                    <a href="#" class="read-me">Read More</a>

                </div>

            </div>

            
            <div class="sports-card">

                <img src="{{ asset('img/alexender_tennis.jpg') }}" alt="Tennis">

                <div class="sports-content">

                    <span class="category tennis">Tennis</span>

                    <h3>
                        Young Tennis Star Reaches Grand Slam Semi Final
                    </h3>

                    <p>
                        The rising tennis sensation shocked experienced opponents with
                        powerful serves and excellent court control throughout the match.
                    </p>

                    <a href="#" class="read-me">Read More</a>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection