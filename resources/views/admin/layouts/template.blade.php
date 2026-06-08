<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lingua News Admin</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/form.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/table.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/settings.css') }}">
</head>
<body>

<div class="admin-container">

    @include('admin.partials.sidebar')

    <div class="main-content">

        @include('admin.partials.header')

        <div class="content-area">
            @yield('content')
        </div>

        @include('admin.partials.footer')

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{asset('js/admin/chart.js')}}"></script>


<script src="{{ asset('admin/js/app.js') }}"></script>
<script src="{{ asset('js/admin/downdrop.js') }}"></script>

</body>
</html>