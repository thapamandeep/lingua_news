@extends('author.layouts.template')
@section('content')
<div class="notification-wrapper">

    <h3>Notifications</h3>

    <table class="notification-table">

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

            @foreach($notifications as $notification)

            <tr>

                <td class="notification-id">
                    {{ $loop->iteration }}
                </td>

                <td class="notification-title">
                    {{ $notification->title }}
                </td>

                <td class="notification-message">
                    {{ $notification->message }}
                </td>

                <td>
                    <span class="status-badge {{ $notification->is_read ? 'status-read' : 'status-unread' }}">
                        {{ $notification->is_read ? 'Read' : 'Unread' }}
                    </span>
                </td>

                <td class="notification-date">
                    {{ $notification->created_at->format('d M Y') }}
                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection