@extends('admin.layouts.template')
@section('content')

<section class="users-form-section">

    <div class="form-container">

        <div class="form-header">
            <h1>Create User</h1>
            <p>Add new users for Lingua News Admin Panel</p>
        </div>

            @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

        <form action="{{route('users.update', $user->id)}}" method="POST" class="user-form">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="name" value="{{ $user->name }}" placeholder="Enter full name">
            </div>

            <!-- Username -->
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" value="{{ $user->username }}" placeholder="Enter username">
            </div>

            <!-- Email -->
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" value="{{ $user->email }}" placeholder="Enter email">
            </div>

            <!-- Phone -->
            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" name="phone" value="{{ $user->phone }}" placeholder="Enter phone number">
            </div>

            <!-- Password -->
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password"  placeholder="">
            </div>

            <!-- Role -->
       <div class="form-group">
    <label>User Role</label>

    <select name="role_id">
        <option value="">Select Role</option>

        @foreach($roles as $role)
            <option value="{{ $role->id }}">
                {{ ucfirst($role->name) }}
            </option>
        @endforeach

    </select>
</div>

            <!-- Button -->
            <div class="form-btn">
                <button type="submit">Create User</button>
            </div>

        </form>

    </div>

</section>
@endsection