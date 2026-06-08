@extends('admin.layouts.template')

@section('content')

<div class="settings-wrapper">

    <!-- ================= SIDEBAR ================= -->
    <div class="settings-sidebar">

        <h3>Settings</h3>

        <a href="{{route('admin.settings')}}"
           class="{{ request()->routeIs('admin.settings.general') ? 'active' : '' }}">
            General + Site Settings
        </a>

     

        <a href="{{route('settings.header-footer')}}"
           class="{{ request()->routeIs('admin.settings.header-footer') ? 'active' : '' }}">
            Header & Footer
        </a>

        <a href="{{route('settings.social-links')}}">
            Social Links
        </a>

        <a href="{{route('settings.seo')}}">
            SEO Settings
        </a>

        <a href="{{route('settings.email')}}">
            Email Settings
        </a>

    </div>

    <!-- ================= MAIN CONTENT ================= -->
    <div class="settings-content">

        @yield('settings-content')

    </div>

</div>

@endsection