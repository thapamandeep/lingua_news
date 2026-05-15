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
            <h3>Sudan Crisis Update</h3>
       <p>
Sudan Gurung is a prominent youth activist and social worker from Nepal who is widely recognized for his active involvement in community service and emergency response initiatives. He came into public attention through his leadership in organizing volunteer groups and coordinating relief efforts during natural disasters and crisis situations. His efforts have played an important role in providing immediate support to affected communities, including rescue assistance, distribution of essential supplies, and awareness campaigns.

Over the years, Sudan Gurung has become a well-known figure among Nepal’s youth, especially for promoting the idea of social responsibility and collective action. He strongly believes that young people can bring meaningful change to society if they actively participate in humanitarian and development activities. Through various campaigns, he has encouraged youth engagement in areas such as disaster management, public awareness, and community support programs.

In addition to his on-ground work, he is also active on digital platforms where he shares messages related to social issues, emergency preparedness, and youth empowerment. His initiatives often highlight the importance of unity, cooperation, and quick response during difficult times. Many people appreciate his dedication to helping others without expecting personal gain, which has made him a respected name in social work circles.

Sudan Gurung’s contributions continue to inspire many young individuals to step forward and take part in building a more responsible and supportive society. His work reflects the growing role of youth-led organizations in addressing real-world problems and strengthening community resilience in Nepal.
</p>
        </div>
    </div>

    <div class="previous-news-card">
        <div class="news-img">
            <img src="{{ asset('img/multigual.jpg') }}" alt="">
        </div>

        <div class="news-content">
            <h3>Technology News</h3>
            <p>
Technology is evolving at an extraordinary pace, reshaping the way humans live, work, and communicate. From artificial intelligence to cloud computing, modern digital systems are becoming more intelligent, efficient, and deeply integrated into everyday life. Artificial Intelligence, in particular, is transforming industries by enabling machines to learn, analyze, and make decisions with minimal human intervention. This advancement is improving healthcare through faster diagnosis, revolutionizing education with personalized learning systems, and enhancing business operations through automation and predictive analytics. At the same time, digital transformation is allowing organizations to move from traditional systems to fully connected platforms, improving speed, accuracy, and accessibility of information.

The rise of data-driven technologies has also led to the expansion of big data analytics, where massive amounts of information are processed to identify patterns, trends, and insights that were previously impossible to detect. Cloud computing has further strengthened this ecosystem by providing scalable storage and computing power, allowing businesses and individuals to access resources from anywhere in the world. In addition, cybersecurity has become more important than ever, as increasing digital dependency requires strong protection against threats, hacking attempts, and data breaches.

Moreover, technologies such as the Internet of Things (IoT) are connecting devices across homes, cities, and industries, enabling smart environments where systems communicate seamlessly with each other. From smart homes that adjust lighting and temperature automatically to smart cities that optimize traffic and energy usage, IoT is creating a more connected world. Blockchain technology is also gaining attention for its ability to provide secure, transparent, and decentralized systems, especially in finance and data management.

As technology continues to grow, it is also influencing human behavior and lifestyle. Social media platforms, mobile applications, and digital communication tools have made the world more connected than ever before, breaking geographical barriers and enabling real-time interaction. However, this rapid advancement also brings challenges such as digital addiction, privacy concerns, and ethical issues surrounding artificial intelligence.

Despite these challenges, the future of technology remains extremely promising. Innovations in robotics, quantum computing, and augmented reality are expected to further revolutionize industries and redefine human capabilities. The key to maximizing these benefits lies in responsible development, ethical usage, and continuous learning. As society adapts to this digital era, technology will continue to serve as a powerful tool for progress, innovation, and global connectivity.
</p>
        </div>
    </div>

</div>
        </div>

    </div>

</section>
@endsection