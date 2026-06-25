 @include('admin.partials.header')

<div class="profile-card">

    <div class="profile-cover"></div>

    <div class="profile-header">

        <img src="https://i.pravatar.cc/150" alt="Profile">

        <h2>{{ $user->name }}</h2>

        <p>{{ $user->email }}</p>

        <span class="role-badge">
            <i class="fa-solid fa-crown"></i>
            {{ $user->role->name ?? 'Administrator' }}
        </span>

    </div>


    <div class="profile-stats">

        <div class="stat-box">
            <h3>{{ $totalNews ?? 0 }}</h3>
            <span>News</span>
        </div>

        <div class="stat-box">
            <h3>{{ $totalCategories ?? 0 }}</h3>
            <span>Categories</span>
        </div>

        <div class="stat-box">
            <h3>{{ $unreadNotifications ?? 0 }}</h3>
            <span>Alerts</span>
        </div>

    </div>


    <div class="quick-actions">

        <a href="{{ route('news.index') }}">
            <i class="fa-solid fa-newspaper"></i>
            Manage News
        </a>

        <a href="{{ route('notifications.index') }}">
            <i class="fa-solid fa-bell"></i>
            Notifications
        </a>

        <a href="#">
            <i class="fa-solid fa-gear"></i>
            Settings
        </a>

    </div>

</div>

 @include('admin.partials.footer')
