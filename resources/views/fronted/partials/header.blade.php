
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

    <form action="{{ route('news.search') }}" method="GET" style="display:flex;">

    <div class="date">
        <input
            class="select-date"
            type="date"
            name="date"
            value="{{ request('date') }}">
    </div>

    <div class="search-bar">
        <input
            type="text"
            name="search"
            placeholder="Search news..."
            value="{{ request('search') }}">

        <button type="submit" style="border:none;background:none;cursor:pointer;">
            <i class="fa fa-search search-icon"></i>
        </button>
    </div>

</form>

</form>

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
