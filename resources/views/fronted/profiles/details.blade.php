```blade
@extends('fronted.layouts.template')

@section('content')

<div class="container py-5">

    <div class="profile-wrapper">

        <!-- Profile Header -->
        <div class="profile-card">

            <div class="profile-right">

                <h2>{{ $member->name }}</h2>

                <p class="username">
                    {{ $member->username }}
                </p>

                <p class="email">
                    <strong>Email:</strong>
                    {{ $member->email }}
                </p>

                <p class="country">
                    <strong>Country:</strong>
                    {{ $member->country ?? 'Not Specified' }}
                </p>

                <p class="status">
                    <strong>Status:</strong>
                    <span class="status-badge">
                        {{ ucfirst($member->status) }}
                    </span>
                </p>

                <div class="profile-actions">
                    <a href="{{route('edit.member',$member->id)}}" class="btn-edit">
                        Edit Profile
                    </a>
                </div>

            </div>

        </div>

        <!-- Stats -->
        <div class="stats-grid">

            <div class="stat-card">
                <h3>24</h3>
                <p>Saved Articles</p>
            </div>

            <div class="stat-card">
                <h3>12</h3>
                <p>Comments</p>
            </div>

            <div class="stat-card">
                <h3>5</h3>
                <p>Categories Followed</p>
            </div>

        </div>

        <!-- Recent Activity -->
        <div class="section-card">

            <h3>Recent Activity</h3>

            <ul class="activity-list">

                <li>
                    Read:
                    <strong>Stones to leave Man City after trophy-laden decade</strong>
                </li>

                <li>
                    Commented on:
                    <strong>Global Politics and Future Elections</strong>
                </li>

                <li>
                    Saved:
                    <strong>Technology Trends in 2026</strong>
                </li>

            </ul>

        </div>

    </div>

</div>

@endsection
```
