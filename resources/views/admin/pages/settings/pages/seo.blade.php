@extends('admin.pages.settings.layouts.template')

@section('settings-content')

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

<!-- HEADER -->
<div class="settings-header">
    <h2>SEO Settings</h2>

    <button class="save-btn" type="submit" form="seoForm">
        Save Changes
    </button>
</div>

<!-- FORM -->
<form id="seoForm"
      action="{{route('seo.store')}}"
      method="POST">

    @csrf

    <!-- SEO SETTINGS -->
    <div class="card">

        <h3>Basic SEO Configuration</h3>

        <div class="row">

            <div class="col">

                <label>Meta Title</label>
                <input type="text"
                       name="meta_title"
                       placeholder="Enter website meta title">

                <label>Meta Keywords</label>
                <input type="text"
                       name="meta_keywords"
                       placeholder="news, world news, politics">

            </div>

            <div class="col">

                <label>Meta Description</label>
                <textarea name="meta_description"
                          placeholder="Short description for Google search"></textarea>

                <label>Google Analytics ID</label>
                <input type="text"
                       name="google_analytics"
                       placeholder="G-XXXXXXXXXX">

            </div>

        </div>

    </div>

    <!-- SOCIAL SEO (OPEN GRAPH) -->
    <div class="card">

        <h3>Social Sharing (Open Graph)</h3>

        <div class="row">

            <div class="col">

                <label>OG Title</label>
                <input type="text" name="og_title" placeholder="Social media title">

                <label>OG Description</label>
                <textarea name="og_description"></textarea>

            </div>

            <div class="col">

                <label>OG Image</label>
                <input type="file" name="og_image">

                <small>Recommended size: 1200x630px</small>

            </div>

        </div>

    </div>

</form>

@endsection