<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Update Password - Lingua News</title>

<link rel="preconnect" href="https://fonts.googleapis.com">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('css/sites/auth.css') }}">
</head>

<body>

<div class="container">

    <!-- LEFT SIDE -->

    <div class="left">

        <div class="hero">

            <h1>
                Create A New <br>
                Password
            </h1>

            <p>
                Your identity has been verified. Create a strong new
                password to secure your Lingua News account.
            </p>

        </div>

    </div>

    <!-- RIGHT SIDE -->

    <div class="right">

        <div class="login-card">

            <div class="logo">
                Lingua News
            </div>

            <div class="subtitle">
                Enter your new password below.
            </div>

            @if(session('success'))
                <div class="alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert-error">
                    {{ session('error') }}
                </div>
            @endif

        <form action="{{ route('update.password') }}" method="POST">
    @csrf

    <div class="form-group">
        <label>Email Address</label>
        <input
            type="email"
            name="email"
            class="input-box"
            placeholder="Enter your email"
            >
    </div>

    <div class="form-group">
        <label>OTP Code</label>
        <input
            type="text"
            name="otp"
            class="input-box"
            placeholder="Enter OTP sent to your email"
            >
    </div>

    <div class="form-group">
        <label>New Password</label>
        <input
            type="password"
            name="password"
            class="input-box"
            placeholder="Enter new password"
            >
    </div>

    <div class="form-group">
        <label>Confirm Password</label>
        <input
            type="password"
            name="password_confirmation"
            class="input-box"
            placeholder="Confirm new password"
            >
    </div>

    <button type="submit" class="login-btn">
        Update Password
    </button>
</form>
            <div class="footer">

                Remember your password?

                <a href="{{ route('login') }}">
                    Login
                </a>

            </div>

        </div>

    </div>

</div>

</body>
</html>