<header class="dashboard-header">

    <div class="header-left">

        <button class="sidebar-toggle" id="menuToggle">
            <i class="fa-solid fa-bars"></i>
        </button>

        <div class="header-title">
            <h2>Welcome Back 👋</h2>
            <p>Manage your articles and publishing workflow professionally.</p>
        </div>

    </div>

    <div class="header-right">

        <form action="{{ route('author.search.articles') }}" method="GET" class="header-search">

    <i class="fa-solid fa-magnifying-glass"></i>

    <input
        type="text"
        name="search"
        value="{{ request('search') }}"
        placeholder="Search your articles...">

</form>

        <a href="{{ route('author.notifications') }}" class="header-icon">
            <i class="fa-solid fa-bell"></i>
        </a>

       <a href="{{ route('author.profile') }}" class="profile-box">

    <img
        src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'Author') }}&background=e50914&color=fff"
        alt="Profile">

    <div class="profile-info">
        <h4>{{ Auth::user()->name ?? 'Author' }}</h4>
        <span>Author</span>
    </div>

</a>

    </div>

</header>