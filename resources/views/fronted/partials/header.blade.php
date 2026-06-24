
<header class="site-header">
    <div class="background">

    <div class="media-icon">
        <img  class="img-icon"src="{{asset('img/twitter-1.png')}}" alt="icon-image">
        <img  class="img-icon"src="{{asset('img/insta-1.png')}}" alt="icon-image">
        <img  class="img-icon"src="{{asset('img/facebook-1.png')}}" alt="icon-image">
        <img  class="img-icon"src="{{asset('img/youtube-1.png')}}" alt="icon-image">

     
         <div class="logo">
              <img src="{{ asset($logo) }}" alt="logo">
        </div>


        <div class="news-head">
            
            <h2 class="head">{{ $siteTitle }}</h2>
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
    @if(Auth::check())
        <a href="{{ route('member.profile', Auth::user()->id) }}">
            <i class="fa fa-user user-icon"></i>
        </a>
    @else
        <a href="{{ route('login') }}">
            <button>{{__('site.Sign In')}}</button>
        </a>
    @endif
</div>

    </div>
    </div>
    <hr>

    <section class="banner">

  <div class="news-category">

    <nav class="main-nav">

     @foreach($categories as $category)
    <a href="{{ route('category.page',$category->slug) }}" class="nav-link">
        {{ $category->translation?->name ?? $category->slug }}
    </a>
@endforeach

    </nav>

</div>

    <div class="select-language">
<select id="choose-language">
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


