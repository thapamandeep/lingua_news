```blade
@extends('author.layouts.template')

@section('title', 'Author Dashboard')

@section('content')

{{-- TOPBAR --}}
<section class="topbar">

    <div class="topbar-left">

        <h2>Welcome Back 👋</h2>
        <p>Manage your articles and publishing workflow.</p>

    </div>

    <div class="topbar-right">

        {{-- SEARCH --}}
        <div class="search-box">

            <i class="fa-solid fa-magnifying-glass"></i>

            <input type="text"
                   placeholder="Search articles...">

        </div>

        {{-- CREATE BUTTON --}}
        <a href="{{ route('get.addnews') }}"
           class="create-btn">

            + Create News

        </a>

    </div>

</section>

{{-- STATISTICS --}}
<section class="stats-grid">

    {{-- TOTAL ARTICLES --}}
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

    {{-- PUBLISHED --}}
    <div class="card">

        <div class="card-content">

            <div>

                <p>Published</p>
                <h3>31</h3>

            </div>

            <div class="card-icon">

                <i class="fa-solid fa-chart-line"></i>

            </div>

        </div>

    </div>

    {{-- PENDING --}}
    <div class="card">

        <div class="card-content">

            <div>

                <p>Pending Review</p>
                <h3>9</h3>

            </div>

            <div class="card-icon">

                <i class="fa-solid fa-clock"></i>

            </div>

        </div>

    </div>

    {{-- VIEWS --}}
    <div class="card">

        <div class="card-content">

            <div>

                <p>Total Views</p>
                <h3>12.4K</h3>

            </div>

            <div class="card-icon">

                <i class="fa-solid fa-eye"></i>

            </div>

        </div>

    </div>

</section>

@endsection
```
