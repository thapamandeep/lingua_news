@extends('admin.layouts.template')

@section('content')

<div class="search-wrapper">

    <div class="search-banner">

        <h1>Search Results</h1>

        <p>
            Showing results for
            <span>"{{ $search }}"</span>
        </p>

    </div>

    @if($news->count())

        <div class="news-list">

            @foreach($news as $item)

                <div class="news-item">

                    <div class="news-left">

                        <div class="news-number">
                            {{ $loop->iteration }}
                        </div>

                    </div>

                    <div class="news-content">

                        <h2>
                            {{ optional($item->translations->first())->title ?? 'No Title' }}
                        </h2>

                        <div class="news-meta">

                            <span>
                                <i class="fa-solid fa-folder"></i>
                                {{ $item->category->translation->name ?? 'No Category' }}
                            </span>

                            <span>
                                <i class="fa-solid fa-calendar"></i>
                                {{ $item->created_at->format('d M Y') }}
                            </span>

                        </div>

                    </div>

                    <div class="news-status">

                        @if($item->status == 'approved')
                            <span class="approved">Approved</span>

                        @elseif($item->status == 'pending')
                            <span class="pending">Pending</span>

                        @else
                            <span class="rejected">Rejected</span>
                        @endif

                    </div>

                </div>

            @endforeach

        </div>

        <div class="pagination-wrapper">
            {{ $news->appends(request()->query())->links() }}
        </div>

    @else

        <div class="empty-box">

            <i class="fa-solid fa-magnifying-glass"></i>

            <h2>No Results Found</h2>

            <p>No articles matched "{{ $search }}"</p>

        </div>

    @endif

</div>

@endsection