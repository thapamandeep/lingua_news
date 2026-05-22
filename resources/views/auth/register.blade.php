<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

<title>Register - Lingua News</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('css/sites/auth.css') }}">
</head>

<body>

<div class="container">

    <!-- LEFT -->
    <div class="left">
        <div class="left-content">
            <h1>Join the World of<br>Breaking News</h1>
            <p>
                Create your Lingua News account and get real-time updates
                on politics, sports, technology, and global events instantly.
            </p>
        </div>
    </div>

    <!-- RIGHT -->
    <div class="right">

        <div class="card">

            <div class="logo">Lingua News</div>
            <div class="subtitle">Create your account</div>

            <form>

                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" class="input" placeholder="Enter your name">
                </div>

                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" class="input" placeholder="Enter your email">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="input" placeholder="Create password">
                </div>

                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="input" placeholder="Confirm password">
                </div>

                <div class="terms">
                    <label>
                        <input type="checkbox">
                        I agree to Terms & Privacy Policy
                    </label>
                </div>

                <button class="btn">Create Account</button>

            </form>

            <div class="divider">OR</div>

            <button class="google">Sign up with Google</button>

            <div class="footer">
                Already have an account?
                <a href="{{ route('login') }}">Login</a>
            </div>

        </div>

    </div>

</div>

</body>
</html>