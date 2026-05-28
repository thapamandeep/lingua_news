@extends('fronted.layouts.template')

@section('content')


@php
    $translation = $news->translations->first();
@endphp

<section class="single-news-page">

    <div class="container news-wrapper">

        {{-- LEFT SIDE IMAGE --}}
        <div class="news-left">
            <img src="{{ asset('storage/gallery/' . $news->image) }}"
                 alt="news image">
        </div>

        {{-- RIGHT SIDE CONTENT --}}
        <div class="news-right">

            @php
                $translation = $news->translations->first();
            @endphp

            <span class="category">
                {{ $news->category->name ?? 'News' }}
            </span>

            <h1>
                {{ $translation->title ?? 'No Title' }}
            </h1>

            <div class="news-date">
                {{ $news->created_at->format('F d, Y') }}
            </div>

            <div class="description">
                {!! $translation->description ?? '' !!}
            </div>

        </div>

    </div>

</section>

@endsection