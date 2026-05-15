@extends('fronted.layouts.template')

@section('content')

<section class="sports-page">

    <div class="sports-container">

        
        <div class="sports-categories">

            <nav class="main-nav">
                <a href="{{ route('home.index') }}" class="nav-link active">Home</a>
                <a href="#" class="nav-link">Actor/Actress</a>
                <a href="#" class="nav-link">Relationship/Marrigae</a>
                <a href="#" class="nav-link">Interview</a>
                <a href="#" class="nav-link">Awards and Achivement</a>
            </nav>

        </div>

       
        <div class="sports-header">
            <h1>Latest Entertainments News</h1>
            <p>
Get the latest updates from the world of entertainment, including celebrity news, movie releases, music launches, trending web series, fashion highlights, and exclusive interviews. Stay informed about what’s happening in Bollywood, Hollywood, and global entertainment industries with fresh stories, viral moments, and behind-the-scenes updates.
</p>
        </div>

        
        <div class="featured-news">

            <div class="featured-image">
                <img src="{{ asset('img/jacky-chaan.jpg') }}" alt="">
            </div>

            <div class="featured-content">
                <span class="category football">Football</span>

                <h2>
                    jacky chan
                </h2>

            <p>
Jackie Chan is a globally recognized actor, martial artist, director, and producer who has made a remarkable impact on the world of entertainment. Born in Hong Kong, he began his career in the film industry at a very young age and gradually became one of the most influential action stars in cinema history. He is widely known for his unique style that combines martial arts, comedy, and creative stunt work, which sets him apart from other action actors.

Throughout his career, Jackie Chan has starred in numerous successful films including “Drunken Master,” “Police Story,” “Rush Hour,” and many more international hits. His ability to perform dangerous stunts without using body doubles has earned him global respect and admiration. He often blends humor with intense action scenes, making his movies entertaining for audiences of all ages.

In addition to acting, Jackie Chan has also worked as a director, producer, and choreographer, contributing significantly to the development of modern action cinema. He has trained many young actors and stunt performers, helping to shape the future of martial arts films. His dedication to his craft and his willingness to take risks have made him a legendary figure in the film industry.

Beyond cinema, Jackie Chan is also known for his charitable work and humanitarian efforts. He has supported various causes including disaster relief, education, and children’s welfare through his foundation. His contributions outside of entertainment have further strengthened his reputation as a respected public figure.

Today, Jackie Chan remains an iconic personality whose influence extends across Hollywood, Asian cinema, and global pop culture. His legacy continues to inspire new generations of actors and filmmakers around the world.
</p>

                <a href="#" class="read-more-btn">Read Full Story</a>
            </div>

        </div>

      
        <div class="sports-news-grid">

           
            <div class="sports-card">

                <img src="{{ asset('img/devi-dona.jpg') }}" alt="Cricket">

                <div class="sports-content">

                    <span class="category cricket">Marriage</span>

                    <h3>
                       Dona's wife just a 1 day ago she bron a child and that's child name has danger given by his father dona chatar chatar
                    </h3>

                   <p>
Dona Thapa is a public figure who has recently gained attention in online discussions and social media platforms. His name has been trending due to increasing interest in his personal and professional life. Many people follow his updates closely, especially regarding his public appearances and activities in different events. As his popularity grows, he continues to attract attention from audiences who are curious about his journey and lifestyle.

He is often mentioned in entertainment and social circles, where fans engage in conversations about his recent developments and public image. Social media has played a major role in increasing his visibility, making him a frequently discussed personality in trending topics.

At the same time, discussions about his life remain mostly based on public interest and online engagement, reflecting how quickly information spreads in today’s digital world. Dona Thapa continues to be a recognizable name in entertainment-related conversations and remains a subject of interest among followers.
</p>

                    <a href="#"  class="read-me">Read More</a>

                </div>

            </div>

        
            <div class="sports-card">

                <img src="{{ asset('img/real.training_pic.jpg') }}" alt="Football">

                <div class="sports-content">

                    <span class="category football">Interview</span>

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