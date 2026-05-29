@extends('editor.layouts.template')

@section('content')

<div class="page-header">

    <h1>Approved News</h1>

</div>

<div class="table-container">

    <table class="news-table">

        <thead>

            <tr>

                <th>ID</th>
                <th>Title</th>
                <th>Status</th>
                <th>Date</th>

            </tr>

        </thead>

        <tbody>

            @forelse($news as $item)

            <tr>

                <td>{{ $item->id }}</td>

                <td>{{ $item->title }}</td>

                <td>
                    <span class="badge approved">
                        {{ $item->status }}
                    </span>
                </td>

                <td>
                    {{ $item->created_at->format('d M Y') }}
                </td>

            </tr>

            @empty

            <tr>

                <td colspan="4">

                    No Approved News Found

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection