@extends('author.layouts.template')

@section('title', 'Author Dashboard')

@section('content')



{{-- STATS --}}
<section class="stats-grid">

    <div class="card">

        <div class="card-content">

            <div>

                <p>Total Articles</p>
                <h3>{{ $totalArticles }}</h3>

            </div>

            <div class="card-icon">

                <i class="fa-solid fa-newspaper"></i>

            </div>

        </div>

    </div>

    <div class="card">

        <div class="card-content">

            <div>

                <p>Published</p>
             <h3>{{ $publishedCount }}</h3>

            </div>

            <div class="card-icon green">

                <i class="fa-solid fa-chart-line"></i>

            </div>

        </div>

    </div>

    <div class="card">

        <div class="card-content">

            <div>

                <p>Pending Review</p>
          <h3>{{ $pendingCount }}</h3>

            </div>

            <div class="card-icon yellow">

                <i class="fa-solid fa-clock"></i>

            </div>

        </div>

    </div>

    <div class="card">

        <div class="card-content">

            <div>

                <p>Total Views</p>
               <h3>{{ number_format($totalViews) }}</h3>

            </div>

            <div class="card-icon blue">

                <i class="fa-solid fa-eye"></i>

            </div>

        </div>

    </div>

</section>

<section class="news-layout">

    <!-- LEFT: TABLE -->
    <div class="news-table">

        <h2>Published News</h2>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Image</th>
                </tr>
            </thead>

            <tbody>
                @foreach($publishedNews as $news)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>
                            {{ $news->translations->first()->title ?? 'No Title' }}
                        </td>

                        <td>
                            <img src="{{ asset('storage/gallery/'.$news->image) }}" alt="news">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <!-- RIGHT: CATEGORY PANEL -->
    <div class="news-sidebar">

        <div class="box">
            <h3>Categories</h3>

            <ul>
                @foreach($categories as $category)
                    <li>{{ $category->translation->name }}</li>
                @endforeach
            </ul>
        </div>

        <div class="box">
            <h3>Sub Categories</h3>

            <ul>
                @foreach($subcategories as $sub)
                    <li>{{ $sub->translation->name }}</li>
                @endforeach
            </ul>
        </div>

    </div>

</section>

@endsection
