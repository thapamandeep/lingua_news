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
    <h2>Email Settings</h2>

    <button class="save-btn" type="submit" form="emailForm">
        Save Changes
    </button>
</div>

<!-- ================= MAIN SAVE FORM ================= -->
<form id="emailForm"
      action="{{ route('emails.store') }}"
      method="POST">

    @csrf

    <!-- SMTP SETTINGS -->
    <div class="card">

        <h3>SMTP Configuration</h3>

        <div class="row">

            <div class="col">

                <label>Mail Driver</label>
                <select name="mail_driver">
                    <option value="smtp">SMTP</option>
                    <option value="mail">Mail</option>
                </select>

                <label>Mail Host</label>
                <input type="text" name="mail_host" placeholder="smtp.gmail.com">

                <label>Mail Port</label>
                <input type="text" name="mail_port" placeholder="587">

            </div>

            <div class="col">

                <label>Mail Username</label>
                <input type="text" name="mail_username" placeholder="your email">

                <label>Mail Password</label>
                <input type="password" name="mail_password" placeholder="your password">

                <label>Encryption</label>
                <select name="mail_encryption">
                    <option value="tls">TLS</option>
                    <option value="ssl">SSL</option>
                </select>

            </div>

        </div>
    </div>

    <!-- EMAIL INFORMATION (SAVED IN DB) -->
    <div class="card">

        <h3>Email Information</h3>

        <div class="row">

            <div class="col">

                <label>Email Title / Subject</label>
          <input type="text"
       name="email_title"
       value="{{ \App\Models\Setting::where('key','email_title')->value('value') }}"
       placeholder="Important Update from Lingua News">
                <label>Email Message</label>
        <textarea name="email_information"
          placeholder="Write your email content here...">{{ \App\Models\Setting::where('key','email_information')->value('value') }}</textarea>

            </div>

        </div>

    </div>

</form>

<!-- ================= TEST EMAIL FORM ================= -->
<div class="card" style="margin-top:20px;">

    <h3>Test Email</h3>

    <form action="{{ route('emails.test') }}" method="POST">
        @csrf

        <label>Send Test Email To</label>
        <input type="email"
               name="test_email"
               placeholder="test@example.com"
               required>

        <button type="submit" class="btn">
            Send Test Email
        </button>

    </form>

</div>

@endsection