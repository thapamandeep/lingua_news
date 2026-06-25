<div class="navbar">

    <div class="left-navbar">
        <i class="fa-solid fa-bars menu-toggle"></i>
        <h2>Dashboard</h2>
    </div>

    <div class="right-navbar">

        {{-- Search --}}
       <form action="{{ route('admin.search') }}" method="GET" class="search-form">

    <i class="fa-solid fa-magnifying-glass"></i>

    <input
        type="text"
        name="search"
        placeholder="Search news, categories, users..."
        required>

</form>

        {{-- Notifications --}}
        <a href="{{ route('notifications.index') }}"
           class="notification-btn">

            <i class="fa-solid fa-bell {{ $unreadNotifications > 0 ? 'bell-active' : '' }}"></i>

            @if($unreadNotifications > 0)
                <span class="notification-badge">
                    {{ $unreadNotifications > 99 ? '99+' : $unreadNotifications }}
                </span>
            @endif

        </a>

        {{-- Admin Profile --}}
   <div class="admin-profile">

    <img src="{{ asset('uploads/admin.jpg') }}" alt="Admin">

    <div class="profile-info">
        <h4>Admin</h4>
        
    </div>

    <i class="fa-solid fa-chevron-down"></i>

    <div class="profile-dropdown">

        <a href="{{ route('profile.index') }}">
            <i class="fa-solid fa-user"></i>
            My Profile
        </a>

        <a href="#">
            <i class="fa-solid fa-key"></i>
            Change Password
        </a>

        <a href="#" class="logout">
            <i class="fa-solid fa-right-from-bracket"></i>
            Logout
        </a>

    </div>

</div>

</div>

</div>