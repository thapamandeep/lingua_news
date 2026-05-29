```blade
<!DOCTYPE html>
<html lang="en">

<head>

    {{-- META --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- TITLE --}}
    <title>@yield('title', 'Lingua News - Author Panel')</title>

    {{-- FONT AWESOME --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    {{-- GLOBAL STYLES --}}
    <link rel="stylesheet" href="{{ asset('author/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/form.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/table.css') }}">

    {{-- PAGE CSS --}}
    @stack('styles')

</head>

<body>

    <div class="dashboard">

        {{-- SIDEBAR --}}
        @include('author.partials.sidebar')

        {{-- MAIN CONTENT --}}
        <main class="main-content">

            @yield('content')

        </main>

    </div>

    {{-- JAVASCRIPT --}}
    <script src="{{ asset('author/js/script.js') }}"></script>

    {{-- PAGE SCRIPTS --}}
    @stack('scripts')

</body>

</html>
```
