@extends('author.layouts.template')

@section('title', 'Categories')

@section('content')

<div class="page-header">

    <div>
        <h2>Categories</h2>
        <p>Manage all news categories</p>
    </div>

    <a href="{{ route('category.create') }}" class="add-btn">
        <i class="fa-solid fa-plus"></i>
        Add Category
    </a>

</div>
<div class="table-card">

    <h2>Categories</h2>

    <table class="category-table">

        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Created</th>
            
            </tr>
        </thead>

        <tbody>

            @forelse($categories as $category)

                <tr>

                    <td>{{ $loop->iteration }}</td>


                    <td>{{ $category->translation->name ?? 'No Translation' }}</td>

                    <td>{{ $category->created_at->format('d M Y') }}</td>

                    <td>


                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="5" class="empty-row">
                        No Categories Found
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection