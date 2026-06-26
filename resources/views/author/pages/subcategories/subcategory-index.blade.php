@extends('author.layouts.template')

@section('title', 'Sub Categories')

@section('content')

<div class="page-header">

    <div>
        <h2>Sub Categories</h2>
        <p>Manage all news sub categories</p>
    </div>

    <a href="{{ route('subcategories.create') }}" class="add-btn">
        <i class="fa-solid fa-plus"></i>
        Add Sub Category
    </a>

</div>

<div class="table-card">

    <table class="category-table">

        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Category</th>
                <th>Slug</th>
                <th>Created</th>
               
            </tr>
        </thead>

        <tbody>

            @forelse($subcategories as $subcategory)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $subcategory->name }}</td>

                    <td>
                        {{ $subcategory->category->name ?? 'No Category' }}
                    </td>

                    <td>{{ $subcategory->slug }}</td>

                    <td>
                        {{ $subcategory->created_at->format('d M Y') }}
                    </td>


                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="6" class="empty-row">
                        No Sub Categories Found
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection