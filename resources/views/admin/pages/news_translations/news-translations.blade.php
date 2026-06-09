@extends($layout)

@section('content')

<section class="users-form-section">

<div class="form-container">

    <div class="form-header">
        <h1>Add News Translation</h1>
        <p>Attach multi-language content to existing news</p>
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


    <form action="{{route('translation.store')}}" method="POST">
        @csrf

        <!-- NEWS SELECT -->
        <div class="form-group">
            <label>Select News</label>
            <select name="news_id" >
                <option value="">Select News</option>
                @foreach($news as $item)
                    <option value="{{ $item->id }}">
                        {{ $item->slug }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- LANGUAGE -->
        <div class="form-group">
            <label>Select Language</label>
            <select name="language_id" >
                <option value="">Select Language</option>
                @foreach($languages as $lang)
                    <option value="{{ $lang->id }}">
                        {{ $lang->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- TITLE -->
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" >
        </div>

        <!-- DESCRIPTION -->
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" rows="4" ></textarea>
        </div>

        <!-- CONTENT -->
        <div class="form-group">
            <label>Content</label>
            <textarea name="content" rows="6"></textarea>
        </div>

        <!-- BUTTON -->
        <div class="form-btn">
            <button type="submit">Save Translation</button>
        </div>

    </form>

</div>

</section>

@endsection