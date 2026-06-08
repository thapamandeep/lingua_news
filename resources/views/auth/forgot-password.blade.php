<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Forgot Password</title>

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
                Forgot Your <br>
                Password?
            </h1>

            <p>
                Enter your registered email address and we'll send a
                verification OTP to help you reset your password securely.
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
                Enter your email to receive a password reset OTP.
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

            <form action="{{ route('send.otp') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Email Address</label>

                    <input
                        type="email"
                        name="email"
                        class="input-box"
                        placeholder="Enter your registered email"
                        required>
                </div>

                <button type="submit" class="login-btn">
                    Send OTP
                </button>

            </form>

            <div class="footer">
                Remember your password?
                <a href="{{ route('login') }}">
                    Back to Login
                </a>
            </div>

        </div>

    </div>

</div>

</body>
</html>