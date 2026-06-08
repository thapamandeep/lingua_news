@extends('editor.layouts.template')

@section('content')

<div class="page-header">
    <h1>Pending News</h1>
    <p>Review and take action on submitted articles</p>
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
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
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

                    <td>
                        <span class="badge badge-{{ $item->status }}">
                            {{ ucfirst($item->status) }}
                        </span>
                    </td>

                    <td class="muted">
                        {{ $item->created_at->format('d M Y, h:i A') }}
                    </td>
<td class="actions">

    <a href="{{ route('news.edit', $item->id) }}"
       class="btn btn-view">
        View
    </a>

   <form action="{{ route('editor.news.approve', $item->id) }}"
      method="POST"
      style="display:inline-block;">
    @csrf
    <button type="submit" class="btn btn-approve">
        Approve
    </button>
</form>

    {{-- REJECT --}}
    <form action="{{ route('editor.news.reject', $item->id) }}"
          method="POST"
          style="display:inline-block;">
        @csrf
        <button type="submit" class="btn btn-reject">
            Reject
        </button>
    </form>

</td>

                </tr>

            @empty

                <tr>
                    <td colspan="7" class="empty-state">
                        No Pending News Found 🎉
                    </td>
                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection