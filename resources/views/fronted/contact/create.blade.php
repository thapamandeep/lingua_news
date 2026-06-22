```blade
@extends('fronted.layouts.template')

@section('content')

<style>
    .contact-section{
        background:#f4f6f9;
        padding:80px 0;
    }

    .contact-container{
        max-width:1200px;
        margin:auto;
        padding:0 20px;
        display:grid;
        grid-template-columns:1fr 1.2fr;
        gap:40px;
    }

    .contact-info{
        background:#111827;
        color:white;
        padding:50px;
        border-radius:15px;
    }

    .contact-info h2{
        font-size:32px;
        margin-bottom:25px;
    }

    .contact-info p{
        color:#d1d5db;
        line-height:1.8;
        margin-bottom:20px;
    }

    .contact-item{
        margin-bottom:20px;
        font-size:16px;
    }

    .contact-form{
        background:white;
        padding:50px;
        border-radius:15px;
        box-shadow:0 10px 30px rgba(0,0,0,.08);
    }

    .contact-form h2{
        margin-bottom:25px;
        color:#111827;
    }

    .form-group{
        margin-bottom:18px;
    }

    .form-control{
        width:100%;
        padding:14px 16px;
        border:1px solid #d1d5db;
        border-radius:8px;
        outline:none;
        font-size:15px;
        transition:.3s;
    }

    .form-control:focus{
        border-color:#2563eb;
    }

    textarea.form-control{
        resize:none;
    }

    .btn-submit{
        width:100%;
        background:#2563eb;
        color:white;
        border:none;
        padding:15px;
        border-radius:8px;
        font-size:16px;
        cursor:pointer;
        transition:.3s;
    }

    .btn-submit:hover{
        background:#1d4ed8;
    }

    .success-message{
        background:#dcfce7;
        color:#166534;
        padding:15px;
        border-radius:8px;
        margin-bottom:20px;
    }

    .error{
        color:red;
        font-size:14px;
        margin-top:5px;
    }

    @media(max-width:768px){

        .contact-container{
            grid-template-columns:1fr;
        }

        .contact-info,
        .contact-form{
            padding:30px;
        }

    }
</style>


<section class="contact-section">

    <div class="contact-container">

        <!-- Left Side -->
        <div class="contact-info">

            <h2>Contact Lingua News</h2>

            <p>
                Have questions, business inquiries, or news tips?
                Feel free to contact us anytime.
                We usually respond within 24 hours.
            </p>

            <div class="contact-item">
                📧 info@linguanews.com
            </div>

            <div class="contact-item">
                📞 +977-9800000000
            </div>

            <div class="contact-item">
                📍 Kathmandu, Nepal
            </div>

        </div>

        <!-- Right Side -->
        <div class="contact-form">

            <h2>Send Us a Message</h2>

            @if(session('success'))
                <div class="success-message">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('contact.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="form-group">
                    <input type="text"
                           class="form-control"
                           name="name"
                           value="{{ old('name') }}"
                           placeholder="Full Name">

                    @error('name')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>


                <div class="form-group">
                    <input type="email"
                           class="form-control"
                           name="email"
                           value="{{ old('email') }}"
                           placeholder="Email Address">

                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>


                <div class="form-group">
                    <input type="text"
                           class="form-control"
                           name="phone"
                           value="{{ old('phone') }}"
                           placeholder="Phone Number">
                </div>


                <div class="form-group">
                    <select name="department" class="form-control">

                        <option value="general">General Inquiry</option>
                        <option value="editorial">Editorial</option>
                        <option value="advertising">Advertising</option>
                        <option value="technical">Technical Support</option>
                        <option value="report_news">Report News</option>

                    </select>
                </div>


                <div class="form-group">
                    <input type="text"
                           class="form-control"
                           name="subject"
                           value="{{ old('subject') }}"
                           placeholder="Subject">
                </div>


                <div class="form-group">
                    <textarea name="message"
                              rows="6"
                              class="form-control"
                              placeholder="Write your message...">{{ old('message') }}</textarea>
                </div>


                <div class="form-group">
                    <input type="file" name="attachment" class="form-control">
                </div>


                <button type="submit" class="btn-submit">
                    Send Message
                </button>

            </form>

        </div>

    </div>

</section>

@endsection
```
