<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Information Email</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .email-wrapper {
            max-width: 600px;
            margin: 30px auto;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }

        .email-header {
            background: #111827;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }

        .email-body {
            padding: 25px;
            color: #333;
        }

        .email-body h2 {
            margin-top: 0;
            color: #111827;
        }

        .info-box {
            background: #f9fafb;
            padding: 15px;
            border-radius: 6px;
            margin-top: 15px;
            border-left: 4px solid #3b82f6;
        }

        .email-footer {
            text-align: center;
            padding: 15px;
            font-size: 12px;
            color: #777;
            background: #f3f4f6;
        }
    </style>
</head>

<body>

<div class="email-wrapper">

    <!-- HEADER -->
    <div class="email-header">
        <h1>📢 Lingua News</h1>
        <p>Information Update</p>
    </div>

    <!-- BODY -->
    <div class="email-body">

        <h2>Hello 👋</h2>

        <p>
            You have received an important information update from Lingua News.
        </p>

        <!-- DATA SECTION -->
        <div class="info-box">

   @if(isset($title))
    <p><strong>Title:</strong> {{ $title }}</p>
@endif

@if(isset($email_message))
    <p><strong>Message:</strong> {!! nl2br(e($email_message)) !!}</p>
@endif
        </div>

        <p style="margin-top:20px;">
            Thank you for staying connected with us.
        </p>

    </div>

    <!-- FOOTER -->
    <div class="email-footer">
        © {{ date('Y') }} Lingua News. All rights reserved.
    </div>

</div>

</body>
</html>