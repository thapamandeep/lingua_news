
<header class="site-header">
    <div class="background">

    <div class="media-icon">
        <img  class="img-icon"src="{{asset('img/twitter-1.png')}}" alt="icon-image">
        <img  class="img-icon"src="{{asset('img/insta-1.png')}}" alt="icon-image">
        <img  class="img-icon"src="{{asset('img/facebook-1.png')}}" alt="icon-image">
        <img  class="img-icon"src="{{asset('img/youtube-1.png')}}" alt="icon-image">

     
         <div class="logo">
              <img src="{{asset('img/lingua-logo.png')}}" alt="logo">
        </div>


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
    <a href="{{ route('login') }}"><button >Sign In</button></a>
           <i class="fa fa-user user-icon"></i>
     </div>

    </div>
    </div>
    <hr>

    <section class="banner">

  <div class="news-category">

    <nav class="main-nav">

      @foreach($categories as $category)

    <a href="{{route('category.page',$category->slug) }}" class="nav-link">
        {{ $category->name }}
    </a>

@endforeach

    </nav>

</div>

    <div class="select-language">
        <select name="language" id="choose-language">
            <option value="">Choose language</option>
     @foreach($languages as $lang)
            <option value="{{ $lang->code }}"
                {{ session('lang','en') == $lang->code ? 'selected' : '' }}>
                {{ $lang->name }}
            </option>
        @endforeach


        </select>
    </div>

  
    </section>





</header>
