@extends('fronted.layouts.template')

@section('content')
<section class="leatest-news">

    <div class="heroes-section">

       <div class="main-img">
    <img src="{{ asset('img/balen.webp') }}" alt="">
    <button class="main-btn">View</button>
</div>
    <div class="side-img">

    <div class="side-item">
        <img src="{{ asset('img/sudan.webp') }}" alt="">
        <div class="news-text">
            <h4>Sudan Crisis Update</h4>
        </div>
    </div>

    <div class="side-item">
        <img src="{{ asset('img/sudan.webp') }}" alt="">
        <div class="news-text">
            <h4>Economic News Today</h4>
        </div>
    </div>

</div>

    </div>

</section>
@endsection