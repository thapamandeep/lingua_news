@extends('admin.layouts.template')

@section('content')

<section class="users-table-section">

    <div class="table-container">

        <div class="table-header">
            <h1>All Subcategories</h1>
            <a href="{{ route('get.categoryForm') }}" class="btn btn-primary">
                + Add category
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
                    <th>Code</th>
                    <th>Action</th>
                
                </tr>
            </thead>

            <tbody>

                @foreach($languages as $lang)
                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $lang->name }}</td>
                   
                    <td>{{ $lang->code }}</td>


        

                    <td>

                        <!-- VIEW -->
                        <a href="#"
                           class="btn btn-info btn-sm">
                            View
                        </a>

                        <!-- EDIT -->
                        <a href="{{route('edit.lang',$lang->id)}}"
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