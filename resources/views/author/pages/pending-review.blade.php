@extends('author.layouts.template')

@section('content')

<section class="news-layout">

    <div class="news-table">

        <h2>Pending Review News</h2>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Status</th>
                
                </tr>
            </thead>

          <tbody>

@forelse($pendingNews as $key => $news)

    @php
        $translation = $news->translations->first();

        $title = $translation->title ?? 'Untitled News';

        $imagePath = !empty($news->image)
            ? asset('storage/gallery/' . $news->image)
            : asset('images/default-news.png');

        $status = $news->status ?? 'pending';
    @endphp

    <tr>

        <td>{{ $key + 1 }}</td>

        <td>{{ $title }}</td>

        <td>
            <img src="{{ $imagePath }}"
                 alt="news"
                 style="width:70px;height:50px;object-fit:cover;border-radius:6px;">
        </td>

       <td>
    @if($status == 'pending')
        <span class="status pending">Under Review</span>
    @elseif($status == 'approved')
        <span class="status approved">Approved</span>
    @elseif($status == 'rejected')
        <span class="status rejected">Rejected</span>
    @else
        <span class="status unknown">Unknown</span>
    @endif
</td>

    </tr>

@empty

    <tr>
        <td colspan="4" style="text-align:center;">
            No pending news found
        </td>
    </tr>

@endforelse

</tbody>
        </table>

    </div>

</section>

@endsection