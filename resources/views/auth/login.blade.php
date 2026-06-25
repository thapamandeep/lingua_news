<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

<title>News Login</title>

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
                Stay Updated <br>
                With Global News
            </h1>

            <p>
                Read breaking headlines, politics, sports, technology,
                business, and worldwide stories in real time with your
                modern digital newsroom.
            </p>

        </div>

    </div>

    <!-- RIGHT SIDE -->

    <div class="right">

        <div class="login-card">

            <div class="logo">Lingua News</div>

            <div class="subtitle">
              {{__('login.Welcome')}}
            </div>

            @if(session('error'))
    <div class="alert-error">
        {{ session('error') }}
    </div>
@endif

             <form action="{{route('login.store')}}" method="POST" class="login">@csrf

                <div class="form-group">
                    <label>{{__('login.Email Address')}}</label>
                    <input type="email" name="email" class="input-box" placeholder="Enter your email">
                </div>

                <div class="form-group">
                    <label>{{__('login.Password')}}</label>
                    <input type="password" name="password" class="input-box" placeholder="Enter your password">
                </div>

                <div class="options">

                    <label>
                        <input type="checkbox">
                       {{__('login.Remember Me')}}
                    </label>

                    <a href="{{route('forgot.password')}}">{{__('login.Forgot Password')}}</a>

                </div>

                <button class="login-btn">
                    {{__('login.Login Account')}}
                </button>

            </form>

            <div class="divider">
              {{__('login.OR')}}
            </div>

            <button class="google-btn">
               {{__('login.Continue')}}
            </button>

            <div class="footer">
               {{__('login.Do')}}
                <a href="{{ route('register') }}">{{__('login.Sign Up')}}</a>
            </div>

        </div>

    </div>

</div>

</body>
</html>