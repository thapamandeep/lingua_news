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
        <a href="{{ route('author.articles') }}">

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

                <a href="{{ route('news.create') }}"
                   class="{{ request()->routeIs('news.create') ? 'active' : '' }}">

                    <div class="menu-left">

                        <i class="fa-solid fa-pen"></i>
                        <span>Create News</span>

                    </div>

                </a>

                <a href="{{ route('translation.create') }}"
                   class="{{ request()->routeIs('translation.create') ? 'active' : '' }}">

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

     {{-- Categories --}}
        <div class="dropdown">

            <button type="button" class="dropdown-btn">
                <div class="menu-left">
                    <i class="fa-solid fa-layer-group"></i>
                    <span>Categories</span>
                </div>
                <i class="fa-solid fa-chevron-down arrow"></i>
            </button>

            <div class="dropdown-menu">

                <a href="{{ route('author.category.index') }}">
                    <div class="menu-left">
                        <i class="fa-solid fa-list"></i>
                        <span>All Categories</span>
                    </div>
                </a>

                <a href="{{ route('category.create') }}">
                    <div class="menu-left">
                        <i class="fa-solid fa-plus"></i>
                        <span>Add Category</span>
                    </div>
                </a>

            </div>

        </div>

        {{-- Sub Categories --}}
        <div class="dropdown">

            <button type="button" class="dropdown-btn">
                <div class="menu-left">
                    <i class="fa-solid fa-folder-tree"></i>
                    <span>Sub Categories</span>
                </div>
                <i class="fa-solid fa-chevron-down arrow"></i>
            </button>

            <div class="dropdown-menu">

             <a href="{{ route('author.subcategories.index', app()->getLocale()) }}">
                    <div class="menu-left">
                        <i class="fa-solid fa-list"></i>
                        <span>All Sub Categories</span>
                    </div>
                </a>

                <a href="{{ route('subcategories.create') }}">
                    <div class="menu-left">
                        <i class="fa-solid fa-plus"></i>
                        <span>Add Sub Category</span>
                    </div>
                </a>

            </div>

        </div>

        {{-- Languages --}}
        <div class="dropdown">

            <button type="button" class="dropdown-btn">
                <div class="menu-left">
                    <i class="fa-solid fa-language"></i>
                    <span>Languages</span>
                </div>
                <i class="fa-solid fa-chevron-down arrow"></i>
            </button>

            <div class="dropdown-menu">

                <a href="{{ route('languages.index') }}">
                    <div class="menu-left">
                        <i class="fa-solid fa-list"></i>
                        <span>All Languages</span>
                    </div>
                </a>

                <a href="{{ route('languages.create') }}">
                    <div class="menu-left">
                        <i class="fa-solid fa-plus"></i>
                        <span>Add Language</span>
                    </div>
                </a>

                <a href="{{ route('translation.create') }}">
                    <div class="menu-left">
                        <i class="fa-solid fa-earth-asia"></i>
                        <span>Translate News</span>
                    </div>
                </a>

            </div>

        </div>

        {{-- NOTIFICATION --}}
        <a href="{{ route('author.notifications') }}">

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
