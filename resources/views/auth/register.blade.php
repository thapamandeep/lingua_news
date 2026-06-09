<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

<title>Register - Lingua News</title>

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
                Join The World <br>
                Of Breaking News
            </h1>

            <p>
                Create your Lingua News account and get real-time updates
                on politics, sports, technology, and global events instantly.
            </p>

        </div>

    </div>

    <!-- RIGHT SIDE -->

    <div class="right">

        <div class="login-card">

            <div class="logo">Lingua News</div>

            <div class="subtitle">
                Create your account to continue.
            </div>

      <form action="{{ route('members.store') }}" method="POST">
    @csrf

    

    <div class="form-group">
        <label>Email Address</label>

        <input
            type="email"
            name="email"
            class="input-box"
            placeholder="Enter your email"
            value="{{ old('email') }}"
        >

        @error('email')
            <small style="color:red;">
                {{ $message }}
            </small>
        @enderror
    </div>

    <div class="form-group">
        <label>Password</label>

        <input
            type="password"
            name="password"
            class="input-box"
            placeholder="Create password"
        >

        @error('password')
            <small style="color:red;">
                {{ $message }}
            </small>
        @enderror
    </div>

    <div class="form-group">
        <label>Confirm Password</label>

        <input
            type="password"
            name="confirm_password"
            class="input-box"
            placeholder="Confirm password"
        >

        @error('confirm_password')
            <small style="color:red;">
                {{ $message }}
            </small>
        @enderror
    </div>

    <div class="options">
        <label>
            <input type="checkbox">
            I agree to Terms & Privacy Policy
        </label>
    </div>

    <button type="submit" class="login-btn">
        Create Account
    </button>
</form>

            <div class="divider">
                OR
            </div>

            <button class="google-btn">
                Sign up with Google
            </button>

            <div class="footer">

                Already have an account?

                <a href="{{ route('login') }}">
                    Login
                </a>

            </div>

        </div>

    </div>

</div>

</body>
</html>