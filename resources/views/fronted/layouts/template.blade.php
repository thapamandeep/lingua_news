<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset('css/sites/header.css')}}">
    <link rel="stylesheet" href="{{asset('css/sites/home.css')}}">
    <link rel="stylesheet" href="{{asset('css/sites/main.css')}}">
    
    <link rel="stylesheet" href="{{ asset('css/sites/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sites/spoerts.css') }}">

</head>
<body>
    
@include('fronted.partials.header')
@yield('content')
@include('fronted.partials.footer')

</body>
</html>