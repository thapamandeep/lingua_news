<aside class="sidebar">

    <div class="logo">

        <h2>Lingua News</h2>
        <p>Editor Panel</p>

    </div>

    <nav class="menu">

        <a href="{{ route('editor.dashboard') }}"
           class="{{ request()->routeIs('editor.dashboard') ? 'active' : '' }}">

            Dashboard

        </a>

        <a href="{{ route('editor.pending.news') }}"
           class="{{ request()->routeIs('editor.pending.news') ? 'active' : '' }}">

            Pending News

        </a>

        <a href="{{ route('editor.approved.news') }}"
           class="{{ request()->routeIs('editor.approved.news') ? 'active' : '' }}">

            Approved News

        </a>

        <a href="{{ route('editor.rejected.news') }}"
           class="{{ request()->routeIs('editor.rejected.news') ? 'active' : '' }}">

            Rejected News

        </a>

        <a href="{{ route('logout') }}">
            Logout
        </a>

    </nav>

</aside>