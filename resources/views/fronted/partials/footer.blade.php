
<footer class="footer">

    <div class="footer-container">

        
        <div class="footer-box">
            <img src="{{asset('img/lingua-logo.png')}}" alt="">
            <h2 class="footer-logo">
                Lingua News
            </h2>

            <p class="footer-text">
                Lingua News is a multilingual modern news platform
                delivering trusted world news, technology, politics,
                entertainment, sports, and business updates globally.
            </p>

            
 <div class="footer-social">

    <a href="{{ $settings['facebook'] ?? '#' }}" target="_blank" rel="noopener noreferrer">
        <i class="fab fa-facebook-f"></i>
    </a>

    <a href="{{ $settings['twitter'] ?? '#' }}" target="_blank" rel="noopener noreferrer">
        <i class="fab fa-twitter"></i>
    </a>

    <a href="{{ $settings['instagram'] ?? '#' }}" target="_blank" rel="noopener noreferrer">
        <i class="fab fa-instagram"></i>
    </a>

    <a href="{{ $settings['youtube'] ?? '#' }}" target="_blank" rel="noopener noreferrer">
        <i class="fab fa-youtube"></i>
    </a>

</div>
        </div>

    
        <div class="footer-box">

            <h3 class="footer-title">
                Quick Links
            </h3>

            <ul class="footer-links">

                <li>
                    <a href="/">Home</a>
                </li>

                <li>
                    <a href="#">Latest News</a>
                </li>

               
                <li>
                    <a href="{{route('abouts')}}">About Us</a>
                </li>

                <li>
                    <a href="#">Contact</a>
                </li>

            </ul>

        </div>

     <div class="footer-box">

    <h3 class="footer-title">
        Categories
    </h3>

    <ul class="footer-links">
        @foreach($categories as $category)
            <li>
                <a href="{{ route('category.page', $category->slug) }}">
                    {{ $category->name }}
                </a>
            </li>
        @endforeach
    </ul>

</div>
        
        <div class="footer-box">

            <h3 class="footer-title">
                Newsletter
            </h3>

            <p class="footer-text">
                Subscribe to get latest news updates directly in your email.
            </p>

            @auth
<form action="{{ route('subscribe', auth()->user()->id) }}" method="POST" class="footer-form">
    @csrf

    <button type="submit">
        Subscribe
    </button>
</form>
@endauth

        </div>

    </div>

   
    <div class="footer-bottom">

        <p>
            © 2026 Lingua News. All Rights Reserved.
        </p>

    </div>

</footer>


<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">