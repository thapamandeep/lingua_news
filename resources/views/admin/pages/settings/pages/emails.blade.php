@extends('admin.pages.settings.layouts.template')

@section('settings-content')

{{-- ALERTS --}}
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

@if($errors->any())
    <div class="alert alert-danger">
        <ul style="margin:0;padding-left:20px;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- HEADER --}}
<div class="settings-header">
    <h2>Email Settings</h2>

    <button
        type="submit"
        form="emailForm"
        class="save-btn">
        Save Changes
    </button>
</div>

{{-- MAIN EMAIL SETTINGS FORM --}}
<form
    id="emailForm"
    action="{{ route('emails.store') }}"
    method="POST">

    @csrf

    {{-- SMTP CONFIGURATION --}}
    <div class="card">

        <h3>SMTP Configuration</h3>

        <div class="row">

            <div class="col">

                <label>Mail Driver</label>

                <select name="mail_driver">

                    <option value="smtp"
                        {{ \App\Models\Setting::where('key','mail_driver')->value('value') == 'smtp' ? 'selected' : '' }}>
                        SMTP
                    </option>

                    <option value="mail"
                        {{ \App\Models\Setting::where('key','mail_driver')->value('value') == 'mail' ? 'selected' : '' }}>
                        Mail
                    </option>

                </select>

                <label>Mail Host</label>

                <input
                    type="text"
                    name="mail_host"
                    autocomplete="off"
                    value="{{ old('mail_host', \App\Models\Setting::where('key','mail_host')->value('value')) }}"
                    placeholder="smtp.gmail.com">

                <label>Mail Port</label>

                <input
                    type="text"
                    name="mail_port"
                    autocomplete="off"
                    value="{{ old('mail_port', \App\Models\Setting::where('key','mail_port')->value('value')) }}"
                    placeholder="587">

            </div>

            <div class="col">

                <label>Mail Username</label>

                <input
                    type="text"
                    name="mail_username"
                    autocomplete="off"
                    value="{{ old('mail_username', \App\Models\Setting::where('key','mail_username')->value('value')) }}"
                    placeholder="example@gmail.com">

                <label>Mail Password</label>

                <input
                    type="password"
                    name="mail_password"
                    autocomplete="new-password"
                    placeholder="Enter SMTP Password">

                <label>Encryption</label>

                <select name="mail_encryption">

                    <option value="tls"
                        {{ \App\Models\Setting::where('key','mail_encryption')->value('value') == 'tls' ? 'selected' : '' }}>
                        TLS
                    </option>

                    <option value="ssl"
                        {{ \App\Models\Setting::where('key','mail_encryption')->value('value') == 'ssl' ? 'selected' : '' }}>
                        SSL
                    </option>

                </select>

            </div>

        </div>

    </div>

    {{-- EMAIL CONTENT --}}
    <div class="card">

        <h3>Email Information</h3>

        <div class="row">

            <div class="col">

                <label>Email Subject</label>

                <input
                    type="text"
                    name="email_title"
                    required
                    value="{{ old('email_title', \App\Models\Setting::where('key','email_title')->value('value')) }}"
                    placeholder="Important Update from Lingua News">

                <label>Email Message</label>

                <textarea
                    name="email_information"
                    rows="8"
                    required
                    placeholder="Write your email message here...">{{ old('email_information', \App\Models\Setting::where('key','email_information')->value('value')) }}</textarea>

            </div>

        </div>

    </div>

</form>

{{-- TEST EMAIL --}}
<div class="card" style="margin-top:20px;">

    <h3>Send Test Email</h3>

    <form
        action="{{ route('emails.test') }}"
        method="POST">

        @csrf

        <label>Recipient Email Address</label>

        <input
            type="email"
            name="test_email"
            required
            placeholder="test@example.com">

        <button
            type="submit"
            class="btn">
            Send Test Email
        </button>

    </form>

</div>

@endsection