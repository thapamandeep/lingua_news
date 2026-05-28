@extends('admin.layouts.template')

@section('content')

<section class="users-form-section">

    <div class="form-container">

        <div class="form-header">
            <h1>Edit Language</h1>
            <p>Update language details</p>
        </div>

        {{-- SUCCESS MESSAGE --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- ERROR MESSAGE --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('update.language',$language->id)}}" method="POST" class="user-form">

            @csrf
          

            <!-- Language Name -->
            <div class="form-group">
                <label>Language Name</label>
                <input type="text"
                       name="name"
                       value="{{ old('name', $language->name) }}"
                       placeholder="e.g. English, Malay, Chinese">
            </div>

            <!-- Language Code -->
            <div class="form-group">
                <label>Language Code</label>
                <input type="text"
                       name="code"
                       value="{{ old('code', $language->code) }}"
                       placeholder="e.g. en, ms, zh, ta"
                       maxlength="5">
                <small>Use short code (2–5 letters)</small>
            </div>

            <!-- Submit -->
            <div class="form-btn">
                <button type="submit">Update Language</button>
            </div>

        </form>

    </div>

</section>

@endsection