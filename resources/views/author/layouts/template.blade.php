<!DOCTYPE html>
<html lang="en">

<head>

    {{-- META --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- TITLE --}}
    <title>@yield('title', 'Lingua News - Author Dashboard')</title>

    {{-- GOOGLE FONT --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    {{-- FONT AWESOME --}}
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

    {{-- MAIN CSS --}}
    <link rel="stylesheet" href="{{ asset('author/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/form.css') }}">
    <link rel="stylesheet" href="{{ asset('author/css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('author/css/settings.css') }}">

    {{-- EXTRA PAGE CSS --}}
    @stack('styles')

</head>

<body>

<div class="dashboard">

    {{-- SIDEBAR --}}
    @include('author.partials.sidebar')

    {{-- MAIN --}}
    <main class="main-content">

        {{-- MOBILE TOPBAR --}}
        <header class="mobile-header">

            <button class="menu-toggle" id="menuToggle">

                <i class="fa-solid fa-bars"></i>

            </button>

            <h2>Lingua News</h2>

        </header>

        @yield('content')

    </main>

</div>

{{-- OVERLAY --}}
<div class="sidebar-overlay"></div>

{{-- JS --}}
<script src="{{ asset('author/js/script.js') }}"></script>

{{-- EXTRA PAGE JS --}}
@stack('scripts')

</body>
</html>
