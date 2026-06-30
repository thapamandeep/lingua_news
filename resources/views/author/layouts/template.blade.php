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
    <link rel="stylesheet" href="{{ asset('author/css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('author/css/edit-profile.css') }}">
    <link rel="stylesheet" href="{{ asset('author/css/notification.css') }}">
    <link rel="stylesheet" href="{{ asset('author/css/search.css') }}">

    {{-- EXTRA PAGE CSS --}}
    @stack('styles')

</head>

<body>

<div class="dashboard">

    {{-- SIDEBAR --}}
    @include('author.partials.sidebar')

    {{-- MAIN CONTENT --}}
    <main class="main-content">

        {{-- HEADER --}}
        @include('author.partials.header')

        {{-- PAGE CONTENT --}}
        @yield('content')

    </main>

</div>

{{-- OVERLAY --}}
<div class="sidebar-overlay"></div>

{{-- JS --}}
<script src="{{ asset('author/js/script.js') }}"></script>

{{-- EXTRA PAGE JS --}}
@stack('scripts')

<script src="{{ asset('author/js/profile-update.js') }}"></script>

</body>
</html>