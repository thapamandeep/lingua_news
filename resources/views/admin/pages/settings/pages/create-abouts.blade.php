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

<div class="settings-header">
    <h2>About Us Settings</h2>

    <button class="save-btn" type="submit" form="aboutForm">
        Save Changes
    </button>
</div>

<form id="aboutForm"
      action="{{route('about.store')}}"
      method="POST">

    @csrf

    <!-- Hero Section -->
    <div class="card">
        <h3>Hero Section</h3>

        <div class="row">

            <div class="col">

                <label>Site Name</label>
                <input type="text" name="about_site_name">

                <label>Hero Description</label>
                <textarea name="about_hero_description" rows="5"></textarea>

            </div>

            <div class="col">

                <label>Feature 1</label>
                <input type="text" name="feature_1">

                <label>Feature 2</label>
                <input type="text" name="feature_2">

                <label>Feature 3</label>
                <input type="text" name="feature_3">

                <label>Feature 4</label>
                <input type="text" name="feature_4">

            </div>

        </div>
    </div>

    <!-- Our Story -->
    <div class="card">
        <h3>Our Story Section</h3>

        <label>Story Title</label>
        <input type="text" name="story_title">
    </div>

    <!-- Who We Are -->
    <div class="card">
        <h3>Who We Are</h3>

        <label>Who We Are Content</label>
        <textarea name="who_we_are" rows="8"></textarea>
    </div>

    <!-- Mission -->
    <div class="card">
        <h3>Mission</h3>

        <label>Mission Quote</label>
        <textarea name="mission_quote" rows="4"></textarea>
    </div>

    <!-- Vision -->
    <div class="card">
        <h3>Vision</h3>

        <label>Vision Content</label>
        <textarea name="vision_content" rows="5"></textarea>
    </div>

    <!-- Statistics -->
    <div class="card">
        <h3>Statistics</h3>

        <div class="row">

            <div class="col">

                <label>Stat 1 Number</label>
                <input type="text" name="stat1_number">

                <label>Stat 1 Label</label>
                <input type="text" name="stat1_label">

            </div>

            <div class="col">

                <label>Stat 2 Number</label>
                <input type="text" name="stat2_number">

                <label>Stat 2 Label</label>
                <input type="text" name="stat2_label">

            </div>

            <div class="col">

                <label>Stat 3 Number</label>
                <input type="text" name="stat3_number">

                <label>Stat 3 Label</label>
                <input type="text" name="stat3_label">

            </div>

        </div>

    </div>

</form>

@endsection