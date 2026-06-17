@extends('fronted.layouts.template')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us - Lingua News</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1100px;
            margin: 50px auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            padding: 20px;
        }

        .info-box {
            background: #111827;
            color: white;
            padding: 40px;
            border-radius: 10px;
        }

        .info-box h2 {
            margin-bottom: 20px;
        }

        .info-box p {
            line-height: 1.7;
            color: #d1d5db;
        }

        .form-box {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }

        .form-box h2 {
            margin-bottom: 20px;
        }

        input, select, textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
        }

        button {
            background: #2563eb;
            color: white;
            border: none;
            padding: 12px 20px;
            width: 100%;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background: #1d4ed8;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        @media(max-width: 768px) {
            .container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <!-- LEFT INFO -->
    <div class="info-box">
        <h2>Contact Lingua News</h2>

        <p>
            Have a question, news tip, or business inquiry?<br><br>

            📧 Email: info@linguanews.com<br>
            📞 Phone: +977-9800000000<br>
            📍 Kathmandu, Nepal<br><br>

            Our team responds within 24 hours.
        </p>
    </div>

    <!-- RIGHT FORM -->
    <div class="form-box">

        <h2>Send Message</h2>

        @if(session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('contact.store') }}" enctype="multipart/form-data">
            @csrf

            <input type="text" name="name" placeholder="Full Name" required>

            <input type="email" name="email" placeholder="Email Address" required>

            <input type="text" name="phone" placeholder="Phone (optional)">

            <select name="department" required>
                <option value="general">General Inquiry</option>
                <option value="editorial">Editorial</option>
                <option value="advertising">Advertising</option>
                <option value="technical">Technical Support</option>
                <option value="report_news">Report News</option>
            </select>

            <input type="text" name="subject" placeholder="Subject" required>

            <textarea name="message" rows="5" placeholder="Your Message" required></textarea>

            <input type="file" name="attachment">

            <button type="submit">Send Message</button>
        </form>

    </div>

</div>

</body>
</html>

@endsection