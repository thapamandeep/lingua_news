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
                {{__('update-password.H1')}}
            </h1>

            <p>
              {{__('update-password.P')}}
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
                {{__('update-password.Enter')}}
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
        <label>{{__('update-password.Email Address')}}</label>
        <input
            type="email"
            name="email"
            class="input-box"
            placeholder="{{__('Enter Email')}}"
            >
    </div>

    <div class="form-group">
        <label>{{__('update-password.OTP')}}</label>
        <input
            type="text"
            name="otp"
            class="input-box"
            placeholder="{{__('Enter OTP')}}"
            >
    </div>

    <div class="form-group">
        <label>{{__('update-password.New Password')}}</label>
        <input
            type="password"
            name="password"
            class="input-box"
            placeholder="{{__('update-password.Enter New Password')}}"
            >
    </div>

    <div class="form-group">
        <label>{{__('update-password.Confirm')}}</label>
        <input
            type="password"
            name="password_confirmation"
            class="input-box"
            placeholder="{{__('update-password.Confirm New Password')}}"
            >
    </div>

    <button type="submit" class="login-btn">
        {{__('update-password.Update')}}
    </button>
</form>
            <div class="footer">

               {{__('update-password.Remember')}}

                <a href="{{ route('login') }}">
                   {{__('update-password.Login')}}
                </a>

            </div>

        </div>

    </div>

</div>

</body>
</html>