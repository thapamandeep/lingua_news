<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lingua news/Admin</title>
    <link rel="stylesheet" href="{{asset('css/admin/header.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin/sidebar.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin/footer.css')}}">
</head>
<body>
    @include('admin.partials.header')
    @include('admin.partials.sidebar')
    @yield('content')
    @include('admin.partials.footer')
</body>
</html>