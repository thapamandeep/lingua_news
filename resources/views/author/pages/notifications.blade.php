@extends('author.layouts.template')

@section('content')

<section class="news-layout">

    <div class="news-table">

        <h2>Notifications</h2>

        <table>

            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>

            <tbody>

                @forelse($notifications as $key => $note)

                    <tr>

                        <td>{{ $key + 1 }}</td>

                        <td>{{ $note->title }}</td>

                        <td>{{ $note->message }}</td>

                        <td>
                            @if($note->is_read)
                                <span class="status approved">Read</span>
                            @else
                                <span class="status pending">Unread</span>
                            @endif
                        </td>

                        <td>{{ $note->created_at->format('d M Y') }}</td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="5" style="text-align:center;">
                            No notifications
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</section>

@endsection