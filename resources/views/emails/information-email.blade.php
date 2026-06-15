<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f7fb;
            padding: 30px 15px;
            color: #333;
        }

        .container {
            max-width: 650px;
            margin: auto;
            background: #ffffff;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        }

        .header {
            background: linear-gradient(135deg, #0f172a, #1e40af);
            color: #fff;
            text-align: center;
            padding: 40px 30px;
        }

        .logo {
            font-size: 32px;
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 10px;
        }

        .tagline {
            font-size: 15px;
            opacity: 0.9;
        }

        .body {
            padding: 35px;
        }

        .welcome {
            font-size: 24px;
            color: #111827;
            margin-bottom: 15px;
        }

        .intro {
            font-size: 15px;
            line-height: 1.8;
            color: #4b5563;
            margin-bottom: 25px;
        }

        .news-card {
            background: #f8fafc;
            border-left: 5px solid #2563eb;
            padding: 25px;
            border-radius: 10px;
            margin-bottom: 25px;
        }

        .news-card h2 {
            color: #111827;
            margin-bottom: 15px;
            font-size: 22px;
        }

        .news-content {
            color: #374151;
            line-height: 1.8;
            font-size: 15px;
        }

        .highlight-box {
            background: #eff6ff;
            border: 1px solid #bfdbfe;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            margin: 25px 0;
        }

        .highlight-box h3 {
            color: #1d4ed8;
            margin-bottom: 10px;
        }

        .highlight-box p {
            color: #4b5563;
            line-height: 1.6;
        }

        .btn {
            display: inline-block;
            background: #2563eb;
            color: #ffffff !important;
            text-decoration: none;
            padding: 14px 28px;
            border-radius: 8px;
            font-weight: bold;
            margin-top: 20px;
        }

        .btn:hover {
            background: #1d4ed8;
        }

        .center {
            text-align: center;
        }

        .footer {
            background: #f8fafc;
            text-align: center;
            padding: 25px;
            color: #6b7280;
            font-size: 13px;
            border-top: 1px solid #e5e7eb;
        }

        .footer strong {
            color: #111827;
        }

        @media (max-width: 600px) {
            .body {
                padding: 25px;
            }

            .logo {
                font-size: 28px;
            }

            .welcome {
                font-size: 22px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <div class="logo">📰 Lingua News</div>
        <div class="tagline">
            Stay Informed • Stay Connected • Stay Ahead
        </div>
    </div>

    <div class="body">

        <h1 class="welcome">Hello 👋</h1>

        <p class="intro">
            Thank you for being a valued member of the Lingua News community.
            We are committed to bringing you the latest news, updates,
            insights, and stories from around the world.
        </p>

        <div class="highlight-box">
            <h3>Latest Update</h3>
            <p>
                Explore today's featured news, trending topics,
                and important announcements curated specially for our readers.
            </p>
        </div>

        <div class="news-card">
            <h2>{{ $title }}</h2>

            <hr style="margin:15px 0; border:none; border-top:1px solid #e5e7eb;">

            <div class="news-content">
                {!! nl2br(e($email_message)) !!}
            </div>
        </div>

        <div class="center">
            <a href="{{ route('home.index') }}" class="btn">
                Read More News
            </a>
        </div>

        <p style="margin-top:30px; line-height:1.8; color:#4b5563;">
            We appreciate your continued support. Thank you for choosing
            <strong>Lingua News</strong> as your trusted source for news and information.
        </p>

    </div>

    <div class="footer">
        <strong>Lingua News</strong><br>
        Your Trusted Source for News & Information.<br><br>

        © {{ date('Y') }} Lingua News. All Rights Reserved.
    </div>

</div>

</body>

</html>