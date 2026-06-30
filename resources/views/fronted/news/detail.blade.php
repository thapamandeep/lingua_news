@extends('fronted.layouts.template')

@section('content')




<section class="single-news-page">

    <div class="container news-wrapper">

        {{-- LEFT SIDE IMAGE --}}
        <div class="news-left">
            <img src="{{ asset('storage/gallery/' . $news->image) }}"
                 alt="news image">
        </div>

        {{-- RIGHT SIDE CONTENT --}}
        <div class="news-right">

          

            <span class="category">
                {{ $news->category->translation->name ?? 'News' }}
            </span>

       <h1>
    {{ $news->title }}
</h1>
            <div class="news-date">
                {{ $news->created_at->format('F d, Y') }}
            </div>

     <div class="description">
    @php
        $sentences = explode('.', $news->content);
        $chunks = array_chunk($sentences, 3);
    @endphp

    @foreach($chunks as $chunk)
        <p>{{ implode('.', $chunk) }}.</p>
    @endforeach
</div>
        </div>

    </div>

</section>

@endsection