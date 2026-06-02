@extends('admin.layouts.template')

@section('content')

<section class="users-form-section">

    <div class="form-container">

        <!-- HEADER -->
        <div class="form-header">
            <h1>System Settings</h1>
            <p>Manage your Lingua News portal configuration</p>
        </div>

        {{-- SUCCESS --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- ERROR --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="#" method="POST" enctype="multipart/form-data">

            @csrf

            <!-- SITE NAME -->
            <div class="form-group">
                <label>Site Name</label>
                <input type="text" name="site_name" placeholder="Enter site name (e.g. Lingua News)">
            </div>

            <!-- LOGO -->
            <div class="form-group">
                <label>Logo</label>
                <input type="file" name="logo">
            </div>

            <!-- FAVICON -->
            <div class="form-group">
                <label>Favicon</label>
                <input type="file" name="favicon">
            </div>

            <!-- DEFAULT LANGUAGE -->
            <div class="form-group">
                <label>Default Language</label>
                <select name="default_language">
                    <option value="">Select Language</option>
                    <option value="en">English</option>
                    <option value="ne">Nepali</option>
                    <option value="hi">Hindi</option>
                </select>
            </div>

            <!-- DEFAULT NEWS STATUS -->
            <div class="form-group">
                <label>Default News Status</label>
                <select name="default_status">
                    <option value="draft">Draft</option>
                    <option value="published">Published</option>
                </select>
            </div>

            <!-- CONTACT EMAIL -->
            <div class="form-group">
                <label>Contact Email</label>
                <input type="email" name="contact_email" placeholder="e.g. support@linguanews.com">
            </div>

            <!-- FOOTER TEXT -->
            <div class="form-group full-width">
                <label>Footer Text</label>
                <textarea name="footer_text" rows="3" placeholder="Enter footer text"></textarea>
            </div>

            <!-- SEO TITLE -->
            <div class="form-group">
                <label>SEO Meta Title</label>
                <input type="text" name="meta_title">
            </div>

            <!-- SEO DESCRIPTION -->
            <div class="form-group full-width">
                <label>SEO Meta Description</label>
                <textarea name="meta_description" rows="4"></textarea>
            </div>

            <!-- BUTTON -->
            <div class="form-btn">
                <button type="submit">Save Settings</button>
            </div>

        </form>

    </div>

</section>

@endsection