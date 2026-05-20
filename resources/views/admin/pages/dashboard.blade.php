@extends('admin.layouts.template')

@section('content')

<div class="dashboard-cards">

    <div class="card blue">
        <div>
            <h3>Total News</h3>
          <h1>{{ $totalNews }}</h1>
            <p>+12% this month</p>
        </div>

        <i class="fa-solid fa-newspaper"></i>
    </div>

    <div class="card green">
        <div>
            <h3>Categories</h3>
           <h1>{{ $totalCategories }}</h1>
            <p>+5% this month</p>
        </div>

        <i class="fa-solid fa-layer-group"></i>
    </div>

    <div class="card orange">
        <div>
            <h3>Users</h3>
           <h1>{{ $totalUsers }}</h1>
            <p>+8% this month</p>
        </div>

        <i class="fa-solid fa-users"></i>
    </div>

    <div class="card purple">
        <div>
            <h3>Total Views</h3>
            <h1>125,678</h1>
            <p>+15% this month</p>
        </div>

        <i class="fa-solid fa-eye"></i>
    </div>

</div>

<div class="chart-section">

    <div class="chart-box">
        <h2>News Overview</h2>
        <canvas id="newsChart"></canvas>
    </div>

    <div class="latest-news">

        <h2>Latest News</h2>

        <div class="latest-item">
            <img src="https://picsum.photos/80/60?1">

            <div>
                <h4>Marvel New Movie Breaks Record</h4>
                <p>Published</p>
            </div>
        </div>

        <div class="latest-item">
            <img src="https://picsum.photos/80/60?2">

            <div>
                <h4>Popular Singer Releases Music</h4>
                <p>Published</p>
            </div>
        </div>

        <div class="latest-item">
            <img src="https://picsum.photos/80/60?3">

            <div>
                <h4>Sports Team Wins Trophy</h4>
                <p>Published</p>
            </div>
        </div>

    </div>

</div>

<div class="table-section">

    <div class="recent-news">

        <div class="section-title">
            <h2>Recent News</h2>
        </div>

        <table>

            <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Author</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>

            <tbody>

                <tr>
                    <td>Hollywood Star Announced New Project</td>
                    <td><span class="badge purple-bg">Entertainment</span></td>
                    <td>John Doe</td>
                    <td><span class="status published">Published</span></td>
                    <td>May 31</td>
                </tr>

                <tr>
                    <td>Government Announces Economic Plan</td>
                    <td><span class="badge blue-bg">Politics</span></td>
                    <td>Jane Smith</td>
                    <td><span class="status published">Published</span></td>
                    <td>May 31</td>
                </tr>

                <tr>
                    <td>New Smartphone Launch</td>
                    <td><span class="badge orange-bg">Technology</span></td>
                    <td>Mike Brown</td>
                    <td><span class="status draft">Draft</span></td>
                    <td>May 30</td>
                </tr>

            </tbody>

        </table>

    </div>

    <div class="category-chart">
        <h2>News by Category</h2>
        <canvas id="pieChart"></canvas>
    </div>

</div>

@endsection