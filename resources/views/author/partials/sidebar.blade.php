<aside class="sidebar" id="sidebar">

    {{-- LOGO --}}
    <div class="logo">

        <div class="logo-icon">

            <i class="fa-solid fa-globe"></i>

        </div>

        <div class="logo-text">

            <h1>Lingua News</h1>
            <p>Global Multimedia</p>

        </div>

    </div>

    {{-- NAVIGATION --}}
    <nav class="menu">

        {{-- DASHBOARD --}}
        <a href="{{ route('author.dashboard') }}"
           class="{{ request()->routeIs('author.dashboard') ? 'active' : '' }}">

            <div class="menu-left">

                <i class="fa-solid fa-table-columns"></i>
                <span>Dashboard</span>

            </div>

        </a>

        {{-- ARTICLES --}}
        <a href="#">

            <div class="menu-left">

                <i class="fa-solid fa-newspaper"></i>
                <span>My Articles</span>

            </div>

        </a>

        {{-- CREATE ARTICLE --}}
        <div class="dropdown">

            <button type="button" class="dropdown-btn">

                <div class="menu-left">

                    <i class="fa-solid fa-pen-to-square"></i>
                    <span>Create Article</span>

                </div>

                <i class="fa-solid fa-chevron-down arrow"></i>

            </button>

            <div class="dropdown-menu">

                <a href="{{ route('get.addnews') }}"
                   class="{{ request()->routeIs('get.addnews') ? 'active' : '' }}">

                    <div class="menu-left">

                        <i class="fa-solid fa-pen"></i>
                        <span>Create News</span>

                    </div>

                </a>

                <a href="{{ route('news.translate') }}"
                   class="{{ request()->routeIs('news.translate') ? 'active' : '' }}">

                    <div class="menu-left">

                        <i class="fa-solid fa-language"></i>
                        <span>Add Translation</span>

                    </div>

                </a>

            </div>

        </div>

        {{-- PENDING --}}
        <a href="{{route('pending.review')}}">

            <div class="menu-left">

                <i class="fa-solid fa-clock"></i>
                <span>Pending Review</span>

            </div>

        </a>

        {{-- NOTIFICATION --}}
        <a href="#">

            <div class="menu-left">

                <i class="fa-solid fa-bell"></i>
                <span>Notifications</span>

            </div>

        </a>

        {{-- SETTINGS --}}
        <a href="{{route('author.settings')}}">

            <div class="menu-left">

                <i class="fa-solid fa-gear"></i>
                <span>Settings</span>

            </div>

        </a>

        {{-- LOGOUT --}}
        <a href="{{ route('logout') }}">

            <div class="menu-left">

                <i class="fa-solid fa-right-from-bracket"></i>
                <span>Logout</span>

            </div>

        </a>

    </nav>

</aside>
