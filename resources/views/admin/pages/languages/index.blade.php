@extends('admin.layouts.template')

@section('content')

<section class="users-table-section">

    <div class="table-container">

        <div class="table-header">
            <h1>Languages</h1>
            <a href="{{ route('get.language.form') }}" class="btn btn-primary">
                + Add Language
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
                    <th>Action</th>
                
                </tr>
            </thead>

            <tbody>

                @foreach($languages as $language)
                <tr>

                    <td>{{ $language->id }}</td>

                    <td>{{ $language->name }}</td>


        

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