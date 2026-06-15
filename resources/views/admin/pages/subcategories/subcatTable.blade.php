@extends($layout)

@section('content')

<section class="users-table-section">

    <div class="table-container">

        <div class="table-header">
            <h1>All Subcategories</h1>
            <a href="{{ route('subcategories.create') }}" class="btn btn-primary">
                + Add Subcategory
            </a>
        </div>

        {{-- SUCCESS MESSAGE --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Slug</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                @foreach($subcategories as $subcategory)
                <tr>

                    <td>{{ $subcategory->id }}</td>

                    <td>{{ $subcategory->name }}</td>

                    <td>{{ $subcategory->category->name ?? 'N/A' }}</td>

                    <td>{{ $subcategory->slug }}</td>

                    <td>
                        @if($subcategory->status == 1)
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-danger">Inactive</span>
                        @endif
                    </td>

                    <td>

                        <!-- VIEW -->
                        <a href="#"
                           class="btn btn-info btn-sm">
                            View
                        </a>

                        <!-- EDIT -->
                        <a href="#"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <!-- DELETE -->
                        <form action="#"
                              method="POST"
                              style="display:inline-block;">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">
                                Delete
                            </button>

                        </form>

                    </td>

                </tr>
                @endforeach

            </tbody>

        </table>

    </div>

</section>

@endsection