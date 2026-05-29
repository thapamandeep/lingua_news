@extends('editor.layouts.template')

@section('content')

<h1 class="page-title">
    Dashboard Overview
</h1>

<div class="cards">

    <div class="card">
        <h3>Total News</h3>
        <p>{{ $totalNews }}</p>
    </div>

    <div class="card">
        <h3>Pending News</h3>
        <p>{{ $pendingNews }}</p>
    </div>

    <div class="card">
        <h3>Approved News</h3>
        <p>{{ $approvedNews }}</p>
    </div>

    <div class="card">
        <h3>Rejected News</h3>
        <p>{{ $rejectedNews }}</p>
    </div>

</div>

@endsection