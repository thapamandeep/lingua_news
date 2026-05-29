@extends('author.layouts.template')

@section('title', 'Author Dashboard')

@section('content')

{{-- TOPBAR --}}
<section class="topbar">

    <div class="topbar-left">

        <h2>Welcome Back 👋</h2>
        <p>Manage your articles and publishing workflow professionally.</p>

    </div>

    <div class="topbar-right">

        {{-- SEARCH --}}
        <div class="search-box">

            <i class="fa-solid fa-magnifying-glass"></i>

            <input type="text"
                   placeholder="Search articles...">

        </div>

        {{-- BUTTON --}}
        <a href="{{ route('get.addnews') }}"
           class="create-btn">

            <i class="fa-solid fa-plus"></i>
            Create News

        </a>

    </div>

</section>

{{-- STATS --}}
<section class="stats-grid">

    <div class="card">

        <div class="card-content">

            <div>

                <p>Total Articles</p>
                <h3>48</h3>

            </div>

            <div class="card-icon">

                <i class="fa-solid fa-newspaper"></i>

            </div>

        </div>

    </div>

    <div class="card">

        <div class="card-content">

            <div>

                <p>Published</p>
                <h3>31</h3>

            </div>

            <div class="card-icon green">

                <i class="fa-solid fa-chart-line"></i>

            </div>

        </div>

    </div>

    <div class="card">

        <div class="card-content">

            <div>

                <p>Pending Review</p>
                <h3>9</h3>

            </div>

            <div class="card-icon yellow">

                <i class="fa-solid fa-clock"></i>

            </div>

        </div>

    </div>

    <div class="card">

        <div class="card-content">

            <div>

                <p>Total Views</p>
                <h3>12.4K</h3>

            </div>

            <div class="card-icon blue">

                <i class="fa-solid fa-eye"></i>

            </div>

        </div>

    </div>

</section>

@endsection
