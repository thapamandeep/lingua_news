@extends('admin.layouts.template')

@section('content')

<div class="dashboard-wrapper">
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
            <h1>{{ number_format($totalViews) }}</h1>
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

    @forelse($latestNews as $news)
<div class="latest-item">

    <img src="{{ asset('storage/gallery/' . $news->news->image) }}"
         alt="{{ $news->title }}">

    <div class="latest-content">

        <h4>{{ $news->title }}</h4>

        <p>
            Published • {{ $news->created_at->diffForHumans() }}
        </p>

    </div>

</div>

    @empty

        <p>No published news available.</p>

    @endforelse

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

@forelse($recentNews as $news)

<tr>
 <td>
{{ optional($news->translations->where('language_id', 1)->first())->title ?? 'No Title' }}
</td>

    <td>
        <span class="badge purple-bg">
            {{ $news->category->translation->name ?? 'No Category' }}
        </span>
    </td>
    
<td>{{ $news->author->role->name }}</td>


    <td>
        @if($news->status == 'approved')
            <span class="status published">Published</span>
        @else
            <span class="status draft">Draft</span>
        @endif
    </td>

    <td>
        {{ $news->created_at->format('M d') }}
    </td>
</tr>

@empty

<tr>
    <td colspan="5">No news found</td>
</tr>

@endforelse

</tbody>

        </table>

    </div>

    <div class="category-chart">
        <h2>News by Category</h2>
        <canvas id="pieChart"></canvas>
    </div>

</div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const labels = @json($newsByDay->pluck('month'));
    const data = @json($newsByDay->pluck('total'));

    const canvas = document.getElementById('newsChart');

    if (!canvas) {
        console.error("Canvas not found");
        return;
    }

    new Chart(canvas, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'News Overview',
                data: data,
                borderColor: '#4F46E5',
                backgroundColor: 'rgba(79, 70, 229, 0.2)',
                tension: 0.4,
                fill: true,
                pointRadius: 5
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });

});
</script>



<script>
const categoryLabels = @json($categoryData->pluck('name'));
const categoryCounts = @json($categoryData->pluck('news_count'));

const labels = @json($newsByDay->pluck('day'));
const data = @json($newsByDay->pluck('total'));
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {

    const ctx = document.getElementById('pieChart');

    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: categoryLabels,
            datasets: [{
                data: categoryCounts,
                backgroundColor: [
                    '#0d6efd',
                    '#28a745',
                    '#fd7e14',
                    '#6f42c1',
                    '#dc3545',
                    '#20c997'
                ]
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });

});
</script>
@endsection



    

