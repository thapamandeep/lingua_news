@extends('author.layouts.template')

@section('title', 'Languages')

@section('content')

<div class="page-header">

    <div>
        <h2>Languages</h2>
        <p>Available languages for news translations</p>
    </div>

</div>

<div class="table-card">

    <h2>Languages</h2>

    <table class="category-table">

        <thead>
            <tr>
                <th>#</th>
                <th>Language Name</th>
                <th>Created</th>
            </tr>
        </thead>

        <tbody>

            @forelse($languages as $language)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $language->name }}</td>

                    <td>{{ $language->created_at->format('d M Y') }}</td>

                </tr>

            @empty

                <tr>
                    <td colspan="3" class="empty-row">
                        No Languages Found
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection