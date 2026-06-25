
<footer class="footer">

    <div class="footer-container">

        
        <div class="footer-box">
            <img src="{{asset('img/lingua-logo.png')}}" alt="">
            <h2 class="footer-logo">
                Lingua News
            </h2>

            <p class="footer-text">
           {{__('footer.Description')}}
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
               {{__('footer.Quick')}}
            </h3>

            <ul class="footer-links">

                <li>
                    <a href="/">  {{__('footer.Home')}}</a>
                </li>

                <li>
                    <a href="#">{{__('footer.Latest News')}}</a>
                </li>

               
                <li>
                    <a href="{{ route('abouts') }}">{{__('footer.About Us')}}</a>
                </li>

                <li>
                    <a href="{{ route('contact') }}">{{__('footer.Contact')}}</a>
                </li>

            </ul>

        </div>

     <div class="footer-box">

    <h3 class="footer-title">
        {{__('footer.Categories')}}
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
                {{__('footer.Newsletter')}}
            </h3>

            <p class="footer-text">
                {{__('footer.Subscribe')}}
            </p>

            @auth
<form action="{{ route('subscribe', auth()->user()->id) }}" method="POST" class="footer-form">
    @csrf

    <button type="submit">
        {{__('footer.Button')}}
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