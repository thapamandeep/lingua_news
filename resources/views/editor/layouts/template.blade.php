<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <title>Editor Dashboard</title>

    <link rel="stylesheet"
          href="{{ asset('editor/css/style.css') }}">

    <link rel="preconnect"
          href="https://fonts.googleapis.com">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

</head>

<body>

<div class="dashboard">

    {{-- SIDEBAR --}}
    @include('editor.partials.sidebar')

    {{-- MAIN --}}
    <div class="main-content">

        {{-- NAVBAR --}}
        @include('editor.partials.header')

        {{-- CONTENT --}}
        <div class="content">
            @yield('content')
        </div>

    </div>

</div>

</body>
</html>