<header class="site-header">
    <div class="background">

    <div class="media-icon">
        <img  class="img-icon"src="{{asset('img/twitter-1.png')}}" alt="icon-image">
        <img  class="img-icon"src="{{asset('img/insta-1.png')}}" alt="icon-image">
        <img  class="img-icon"src="{{asset('img/facebook-1.png')}}" alt="icon-image">
        <img  class="img-icon"src="{{asset('img/youtube-1.png')}}" alt="icon-image">

        <div class="news-head">
            <h2 class="head">Lingua News</h2>
        </div>

        <div class="date">
            <input class="select-date" type="date">
        </div>

        <div class="search-bar">
    <input type="text" placeholder="Search news...">
    <i class="fa fa-search search-icon"></i>
     </div>

     <div class="signin">
    <button>Sign In</button>
           <i class="fa fa-user user-icon"></i>
     </div>

    </div>
    </div>
    <hr>

    <section class="banner">

    <div class="news-category">
        <p>{{__('Sports')}}</p>
        <p>Politics</p>
        <p>Entertainment</p>
        <p>Technology</p>
        <p>Business</p>
        <p>Education</p>
    </div>

    <div class="select-language">
        <select name="language" id="choose-language">
            <option value="">Choose language</option>
            <option value="malasayan">Malasayan</option>
            <option value="chinese">Chinese</option>
            <option value="tamil">Tamil</option>
            <option value="nepali">Nepali</option>
        </select>
    </div>
    </section>



</header>
