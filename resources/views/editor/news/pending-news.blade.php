@extends('editor.layouts.template')

@section('content')

<div class="page-header">

    <h1>Pending News</h1>

</div>

<div class="table-container">

    <table class="news-table">

        <thead>

            <tr>

                <th>ID</th>
                <th>Title</th>
                <th>Status</th>
                <th>Date</th>
                <th>Action</th>

            </tr>

        </thead>

        <tbody>

            @forelse($news as $item)

            <tr>

                <td>{{ $item->id }}</td>

                <td>{{ $item->title }}</td>

                <td>
                    <span class="badge pending">
                        {{ $item->status }}
                    </span>
                </td>

                <td>
                    {{ $item->created_at->format('d M Y') }}
                </td>

                <td class="actions">

                    <a href=""
                       class="btn approve">

                        Approve

                    </a>

                    <a href=""
                       class="btn reject">

                        Reject

                    </a>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="5">

                    No Pending News Found

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection