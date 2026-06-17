<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset('css/sites/header.css')}}">
    <link rel="stylesheet" href="{{asset('css/sites/home.css')}}">
    <link rel="stylesheet" href="{{asset('css/sites/main.css')}}">  
    <link rel="stylesheet" href="{{ asset('css/sites/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sites/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sites/sports.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sites/leatest-news.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sites/previous-news.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sites/detail.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sites/search-index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sites/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sites/profile-edit.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sites/abouts.css') }}">

    <!-- css -->
     <style>
#preloader{
    position:fixed;
    inset:0;
    background:#fff;
    z-index:99999;
    display:flex;
    justify-content:center;
    align-items:center;
}

.preloader-hide{
    opacity: 0;
    visibility: hidden;
    pointer-events: none;
}

.loader-wrapper{
    position:relative;
    width:120px;
    height:120px;
}

.loader-logo{
    width:70px;
    height:70px;
    border-radius:50%;
    position:absolute;
    top:25px;
    left:25px;
}

.loader-ring{
    width:120px;
    height:120px;
    border:4px solid #eee;
    border-top:4px solid #c40000;
    border-radius:50%;
    animation:spin 1s linear infinite;
}

@keyframes spin{
    to{
        transform:rotate(360deg);
    }
}
</style>

</head>

<body>

<div id="preloader">
    <div class="loader-wrapper">
        <div class="loader-ring"></div>
        <img src="{{ asset('img/lingua-logo.png') }}" class="loader-logo">
    </div>
</div>
    
@include('fronted.partials.header')
@yield('content')
@include('fronted.partials.footer')


<script>
window.addEventListener('load', function () {

   setTimeout(function () {

    document.getElementById('preloader').style.display = 'none';

}, 3000; // 5000ms = 5 seconds

});
</script>

@if(isset($heroNews))
<script>
    window.heroNewsData = @json($heroNews);
</script>
@endif

<script src="{{asset('js/sites/heroSlide.js')}}"></script>

<script src="{{asset('js/sites/translate.js')}}"></script>
<script src="{{asset('js/sites/previous-news.js')}}"></script>
<script src="{{asset('js/sites/leatest-news.js')}}"></script>
<script src="{{asset('js/sites/abouts.js')}}"></script>


</body>
</html>