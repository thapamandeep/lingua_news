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
                {{__('forgot-password.H1')}}
            </h1>

            <p>
                {{__('forgot-password.P')}}
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
                {{__('forgot-password.Enter')}}
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
                    <label>{{__('forgot-password.Email')}}</label>

                    <input
                        type="email"
                        name="email"
                        class="input-box"
                        placeholder="{{__('forgot-password.Register email')}}"
                        required>
                </div>

                <button type="submit" class="login-btn">
                    {{__('forgot-password.OTP')}}
                </button>

            </form>

            <div class="footer">
                {{__('forgot-password.Remember')}}
                <a href="{{ route('login') }}">
                    {{__('forgot-password.Back')}}
                </a>
            </div>

        </div>

    </div>

</div>

</body>
</html>