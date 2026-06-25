@extends('admin.layouts.template')

@section('content')

<section class="notifications-page">

```
<div class="page-header">

    <div>
        <h1>Notifications</h1>
        <p>Manage all admin notifications</p>
    </div>

    <form action="{{ route('notifications.readAll') }}" method="POST">
        @csrf
        <button type="submit" class="mark-all-btn">
            Mark All Read
        </button>
    </form>

</div>

<div class="notifications-container">

    @forelse($notifications as $notification)

        <div class="notification-card {{ !$notification->is_read ? 'unread' : '' }}">

            <div class="notification-icon">

                @if(!$notification->is_read)
                    <i class="fa-solid fa-bell"></i>
                @else
                    <i class="fa-solid fa-check"></i>
                @endif

            </div>

            <div class="notification-content">

                <h3>{{ $notification->title }}</h3>

                <p>{{ $notification->message }}</p>

                <span>
                    {{ $notification->created_at->diffForHumans() }}
                </span>

            </div>

            <div class="notification-actions">

                @if(!$notification->is_read)

                    <form action="{{ route('notifications.read',$notification->id) }}"
                          method="POST">

                        @csrf

                        <button type="submit" class="read-btn">
                            Mark Read
                        </button>

                    </form>

                @endif

            </div>

        </div>

    @empty

        <div class="empty-state">

            <i class="fa-solid fa-bell-slash"></i>

            <h3>No Notifications Found</h3>

        </div>

    @endforelse

</div>

<div class="pagination-wrapper">
    {{ $notifications->links() }}
</div>
```

</section>

@endsection
