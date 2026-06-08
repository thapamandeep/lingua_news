@extends('author.layouts.template')

@section('content')

<div class="author-settings">

    <!-- HEADER -->
    <div class="settings-header">
        <h2>⚙️ Author Settings</h2>
        <p>Manage your profile and publishing preferences</p>
    </div>

    <!-- GRID -->
    <div class="settings-grid">

        <!-- PROFILE SETTINGS -->
        <div class="settings-card">
            <h3>Profile Information</h3>

            <form>
                <label>Name</label>
                <input type="text" placeholder="Your name">

                <label>Email</label>
                <input type="email" placeholder="Your email">

                <label>Bio</label>
                <textarea rows="4" placeholder="Short bio..."></textarea>

                <button type="submit">Update Profile</button>
            </form>
        </div>

        <!-- PASSWORD -->
        <div class="settings-card">
            <h3>Change Password</h3>

            <form>
                <label>Current Password</label>
                <input type="password">

                <label>New Password</label>
                <input type="password">

                <label>Confirm Password</label>
                <input type="password">

                <button type="submit">Update Password</button>
            </form>
        </div>

        <!-- PREFERENCES -->
        <div class="settings-card">
            <h3>Publishing Preferences</h3>

            <form>
                <label>Default Category</label>
                <input type="text" placeholder="e.g. Technology">

                <label>Auto Save Draft</label>
                <select>
                    <option>Enable</option>
                    <option>Disable</option>
                </select>

                <label>Email Notifications</label>
                <select>
                    <option>Enable</option>
                    <option>Disable</option>
                </select>

                <button type="submit">Save Preferences</button>
            </form>
        </div>

    </div>

</div>

@endsection