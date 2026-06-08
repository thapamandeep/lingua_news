@extends('editor.layouts.template')

@section('content')

<div class="page-header">
    <h1>Approved News</h1>
    <p>Published and visible articles</p>
</div>

<div class="table-wrapper">

    <div class="table-card">

        <table class="news-table">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Language</th>
                    <th>Author</th>
                    <th>Date</th>
                </tr>
            </thead>

            <tbody>

            @forelse($news as $item)

                @php
                    $translation = $item->translations->first();
                @endphp

                <tr>

                    <td class="muted">#{{ $item->id }}</td>

                    <td class="title-cell">
                        {{ $translation->title ?? $item->slug ?? 'No Title' }}
                    </td>

                    <td>
                        {{ $translation->language->name ?? 'N/A' }}
                    </td>

                    <td>
                        {{ $item->author->name ?? 'Unknown' }}
                    </td>

                    <td class="muted">
                        {{ $item->created_at->format('d M Y, h:i A') }}
                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="5" class="empty-state">
                        No Approved News Found 🎉
                    </td>
                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection