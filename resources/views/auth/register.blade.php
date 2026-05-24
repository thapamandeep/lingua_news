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

            <form>

              

                <div class="form-group">
                    <label>Email Address</label>

                    <input
                        type="email"
                        class="input-box"
                        placeholder="Enter your email"
                    >
                </div>

                <div class="form-group">
                    <label>Password</label>

                    <input
                        type="password"
                        class="input-box"
                        placeholder="Create password"
                    >
                </div>

                <div class="form-group">
                    <label>Confirm Password</label>

                    <input
                        type="password"
                        class="input-box"
                        placeholder="Confirm password"
                    >
                </div>

                <div class="options">

                    <label>
                        <input type="checkbox">
                        I agree to Terms & Privacy Policy
                    </label>

                </div>

                <button class="login-btn">
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