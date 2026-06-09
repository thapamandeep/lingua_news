```blade
@extends('fronted.layouts.template')

@section('content')

<div class="profile-wrapper">

    <div class="profile-card">

        <h2>Edit Profile</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

       

        <form action="{{route('update.member',$member->id)}}"
              method="POST">

            @csrf
          

            <div class="form-group">
                <label>Full Name</label>

                <input
                    type="text"
                    name="name"
                    class="form-control"
                    value="{{ old('name', $member->name) }}"
                    placeholder="Enter full name"
                >
            </div>

            <div class="form-group">
                <label>Username</label>

                <input
                    type="text"
                    name="username"
                    class="form-control"
                    value="{{ old('username', $member->username) }}"
                    placeholder="Enter username"
                >
            </div>

            <div class="form-group">
                <label>Email Address</label>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email', $member->email) }}"
                    placeholder="Enter email address"
                >
            </div>

            <div class="form-group">
                <label>Country</label>

                <input
                    type="text"
                    name="country"
                    class="form-control"
                    value="{{ old('country', $member->country) }}"
                    placeholder="Enter country"
                >
            </div>

            <hr class="my-4">

            <h4>Change Password</h4>

            <div class="form-group">
                <label>Current Password</label>

                <input
                    type="password"
                    name="current_password"
                    class="form-control"
                    placeholder="Enter current password"
                >

                @error('current_password')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>

            <div class="form-group">
                <label>New Password</label>

                <input
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder="Enter new password"
                >

                @error('password')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>

            <div class="form-group">
                <label>Confirm New Password</label>

                <input
                    type="password"
                    name="password_confirmation"
                    class="form-control"
                    placeholder="Confirm new password"
                >
            </div>

            <div class="profile-actions">

                <button type="submit" class="btn-edit">
                    Update Profile
                </button>

                <a href="#"
                   class="btn-cancel">
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

@endsection
```
