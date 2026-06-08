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
    <h2>Header & Footer Settings</h2>

    <button class="save-btn" type="submit" form="headerFooterForm">
        Save Changes
    </button>
</div>

<!-- FORM -->
<form id="headerFooterForm"
      action="{{route('header-footer.store')}}"
      method="POST">

    @csrf

    <!-- ================= HEADER SETTINGS ================= -->
    <div class="card">

        <h3>Header Settings</h3>

        <div class="row">

            <div class="col">

                <label>Show Top Bar</label>
                <select name="show_topbar">
                    <option value="1">Enable</option>
                    <option value="0">Disable</option>
                </select>

                <label>Header Style</label>
                <select name="header_style">
                    <option value="style1">Style 1</option>
                    <option value="style2">Style 2</option>
                </select>

            </div>

            <div class="col">

                <label>Breaking News Text</label>
                <input type="text"
                       name="breaking_text"
                       value="Breaking News">

                <label>Show Search Bar</label>
                <select name="show_search">
                    <option value="1">Enable</option>
                    <option value="0">Disable</option>
                </select>

            </div>

        </div>

    </div>

    <!-- ================= FOOTER SETTINGS ================= -->
    <div class="card">

        <h3>Footer Settings</h3>

        <div class="row">

            <div class="col">

                <label>Footer Text</label>
                <textarea name="footer_text">
© 2026 Lingua News. All rights reserved.
                </textarea>

                <label>Show Social Icons</label>
                <select name="show_social">
                    <option value="1">Enable</option>
                    <option value="0">Disable</option>
                </select>

            </div>

            <div class="col">

                <label>Footer Layout</label>
                <select name="footer_layout">
                    <option value="1">Layout 1</option>
                    <option value="2">Layout 2</option>
                </select>

            </div>

        </div>

    </div>

</form>

@endsection