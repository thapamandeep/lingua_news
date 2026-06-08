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
    <h2>General & Site Settings</h2>

    <button class="save-btn" type="submit" form="generalSettingsForm">
        Save Changes
    </button>
</div>

<form id="generalSettingsForm"
      action="{{ route('general.store') }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    <!-- ================= SITE IDENTITY ================= -->
    <div class="card">

        <h3>Site Identity</h3>

        <div class="row">

            <!-- LOGO -->
            <div class="col">

                <label>Site Logo</label>

                <div class="logo-box">
                    <img src="{{ asset('img/logo.png') }}" alt="logo">
                </div>

                <input type="file" name="logo">

                <button type="button" class="btn">Change Logo</button>
                <button type="button" class="btn danger">Remove</button>

            </div>

            <!-- TITLE -->
            <div class="col">

                <label>Site Title</label>
                <input type="text"
                       name="site_title"
                       value="Lingua News">

                <label>Tagline</label>
                <input type="text"
                       name="tagline"
                       value="Breaking News, Global Perspective">

            </div>

        </div>

    </div>

    <!-- ================= GENERAL SETTINGS ================= -->
    <div class="card">

        <h3>General Settings</h3>

        <div class="row">

            <!-- LEFT -->
            <div class="col">

                <label>Email</label>
                <input type="email"
                       name="email"
                       value="info@linguanews.com">

                <label>Phone</label>
                <input type="text"
                       name="phone"
                       value="+977 9800000000">

            </div>

            <!-- RIGHT -->
            <div class="col">

                <label>Description</label>
                <textarea name="description">Lingua News delivers accurate global news.</textarea>

                <label>Timezone</label>
                <select name="timezone">

                    <option value="UTC">UTC</option>
                    <option value="Asia/Kathmandu">Asia/Kathmandu</option>

                </select>

            </div>

        </div>

    </div>

</form>

@endsection