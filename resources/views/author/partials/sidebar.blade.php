<aside class="sidebar">

    {{-- LOGO --}}
    <div class="logo">

        <h1>Lingua News</h1>
        <p>Author Panel</p>

    </div>

    {{-- NAVIGATION --}}
    <nav class="menu">

        {{-- DASHBOARD --}}
        <a href="{{ route('author.dashboard') }}"
           class="{{ request()->routeIs('author.dashboard') ? 'active' : '' }}">

            <i class="fa-solid fa-table-columns"></i>
            <span>Dashboard</span>

        </a>

        {{-- MY ARTICLES --}}
        <a href="#">

            <i class="fa-solid fa-newspaper"></i>
            <span>My Articles</span>

        </a>

        {{-- DROPDOWN --}}
        <div class="dropdown">

            <button class="dropdown-btn">

                <div class="dropdown-left">

                    <i class="fa-solid fa-pen-to-square"></i>
                    <span>Create Article</span>

                </div>

                <i class="fa-solid fa-chevron-down arrow"></i>

            </button>

            <div class="dropdown-menu">

                <a href="{{ route('get.addnews') }}"
                   class="{{ request()->routeIs('get.addnews') ? 'active' : '' }}">

                    <i class="fa-solid fa-pen"></i>
                    <span>Create News</span>

                </a>

                <a href="{{ route('news.translate') }}">

                    <i class="fa-solid fa-language"></i>
                    <span>Add Translate</span>

                </a>

            </div>

        </div>

        {{-- PENDING --}}
        <a href="#">

            <i class="fa-solid fa-clock"></i>
            <span>Pending Review</span>

        </a>

        {{-- NOTIFICATIONS --}}
        <a href="#">

            <i class="fa-solid fa-bell"></i>
            <span>Notifications</span>

        </a>

        {{-- SETTINGS --}}
        <a href="#">

            <i class="fa-solid fa-gear"></i>
            <span>Settings</span>

        </a>

        {{-- LOGOUT --}}
        <a href="{{ route('logout') }}">

            <i class="fa-solid fa-right-from-bracket"></i>
            <span>Logout</span>

        </a>

    </nav>

</aside>