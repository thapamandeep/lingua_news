@extends('editor.layouts.template')

@section('content')

<h1 class="page-title">
    Dashboard Overview
</h1>

<div class="cards">

    <div class="card">
        <h3>Total News</h3>
        <p>{{ $totalNews }}</p>
    </div>

    <div class="card">
        <h3>Pending News</h3>
        <p>{{ $pendingNews }}</p>
    </div>

    <div class="card">
        <h3>Approved News</h3>
        <p>{{ $approvedNews }}</p>
    </div>

    <div class="card">
        <h3>Rejected News</h3>
        <p>{{ $rejectedNews }}</p>
    </div>

</div>

<br><br>

<div class="table-container">

    <div class="page-header">
        <h1>Recent Pending News</h1>
    </div>

    <table class="news-table">

        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Category</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
        </thead>

        <tbody>

            @forelse($recentPendingNews as $news)

                <tr>

                    <td class="title-cell">
                        {{ optional($news->translations->first())->title ?? 'No Title' }}
                    </td>

                    <td>
                        {{ $news->author->name ?? 'Unknown' }}
                    </td>

                    <td>
                        {{ $news->category->translation->name ?? 'No Category' }}
                    </td>

                    <td>
                        <span class="badge badge-pending">
                            Pending
                        </span>
                    </td>

                    <td>
                        {{ $news->created_at->format('d M Y') }}
                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="5" class="empty-state">
                        No pending news found.
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection