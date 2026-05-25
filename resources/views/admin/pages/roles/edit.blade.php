@extends('admin.layouts.template')
@section('content')

<div class="content-area">

    <div class="section-title">
        <h2>Create Role</h2>
        <p>Add new role for users</p>
    </div>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

    <div class="form-container">

        <form action="{{route('roles.update', $role->id)}}" method="POST">

            @csrf
            @method('PUT')

            <!-- Role Name -->
            <div class="form-group">
                <label>Role Name</label>
                <input type="text" name="name" value="{{ $role->name }}" placeholder="Enter role name (e.g. admin, editor)">
            </div>

            <!-- Submit Button -->
            <div class="form-btn">
                <button type="submit">Update Role</button>
            </div>

        </form>

    </div>

</div>

@endsection