@extends('fronted.layouts.template')

@section('content')
<section class="leatest-news">

    <div class="heroes-section">

        <!-- MAIN IMAGE -->
        <div class="main-img img-box">
            <img src="{{ asset('img/balen.webp') }}" alt="">
            <button class="view-btn">View</button>
        </div>

        <!-- SIDE NEWS LIST -->
        <div class="side-img">

            <!-- ITEM 1 -->
            <div class="side-item">
                <div class="img-box">
                    <img src="{{ asset('img/sudan.webp') }}" alt="">
                    <button class="view-btn">View</button>
                </div>

                <div class="news-text">
                    <h4>Sudan Crisis Update</h4>
                </div>
            </div>

            <!-- ITEM 2 -->
            <div class="side-item">
                <div class="img-box">
                    <img src="{{ asset('img/sudan.webp') }}" alt="">
                    <button class="view-btn">View</button>
                </div>

                <div class="news-text">
                    <h4>Economic News Today</h4>
                </div>
            </div>

        </div>

    </div>

</section>
@endsection