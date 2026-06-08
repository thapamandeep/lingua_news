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
    <h2>Social Links Settings</h2>

    <button class="save-btn" type="submit" form="socialForm">
        Save Changes
    </button>
</div>

<!-- FORM -->
<form id="socialForm"
      action="{{route('social.store')}}"
      method="POST">

    @csrf

    <!-- SOCIAL LINKS CARD -->
    <div class="card">

        <h3>Connect Your Social Media</h3>

        <div class="row">

            <div class="col">

                <label>Facebook URL</label>
                <input type="text"
                       name="facebook"
                       placeholder="https://facebook.com/yourpage">

                <label>Twitter / X URL</label>
                <input type="text"
                       name="twitter"
                       placeholder="https://x.com/yourprofile">

                <label>Instagram URL</label>
                <input type="text"
                       name="instagram"
                       placeholder="https://instagram.com/yourprofile">

            </div>

            <div class="col">

                <label>YouTube URL</label>
                <input type="text"
                       name="youtube"
                       placeholder="https://youtube.com/@yourchannel">

                <label>LinkedIn URL</label>
                <input type="text"
                       name="linkedin"
                       placeholder="https://linkedin.com/company/yourpage">

                <label>TikTok URL</label>
                <input type="text"
                       name="tiktok"
                       placeholder="https://tiktok.com/@yourprofile">

            </div>

        </div>

    </div>

</form>

@endsection