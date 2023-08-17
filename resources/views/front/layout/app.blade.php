<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="description" content="">
        <title>Hotel Website</title>

        <link rel="icon" type="image/png" href="uploads/favicon.png">


        @include('front.layout.styles')

        @include('front.layout.scripts')

        <link href="https://fonts.googleapis.com/css2?family=Karla:wght@400;500&display=swap" rel="stylesheet">

    </head>
    <body>

        <div class="top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 left-side">
                        <ul>
                            <li class="phone-text">111-222-3333</li>
                            <li class="email-text">contact@arefindev.com</li>
                        </ul>
                    </div>
                    <div class="col-md-6 right-side">
                        <ul class="right">
                            @if($global_page->cart_status==1)
                                <li class="menu"><a href="cart.html">{{ $global_page->cart_heading }}</a></li>
                            @endif
                            @if($global_page->checkout_status==1)
                                <li class="menu"><a href="checkout.html">{{ $global_page->checkout_heading }}</a></li>
                            @endif
                            @if($global_page->signup_status==1)
                                <li class="menu"><a href="signup.html">{{ $global_page->signup_heading }}</a></li>
                            @endif
                            @if($global_page->signin_status==1)
                                <li class="menu"><a href="login.html">{{ $global_page->signin_heading }}</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="navbar-area" id="stickymenu">

            <!-- Menu For Mobile Device -->
            <div class="mobile-nav">
                <a href="index.html" class="logo">
                    <img src="uploads/logo.png" alt="">
                </a>
            </div>

            <!-- Menu For Desktop Device -->
            <div class="main-nav">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="{{ route('about') }}">
                            <img src="uploads/logo.png" alt="">
                        </a>
                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a href="{{ route('home') }}" class="nav-link">Home</a>
                                </li>
                                @if($global_page->about_status==1)
                                <li class="nav-item">
                                    <a href="{{ route('about') }}" class="nav-link">{{ $global_page->about_heading }}</a>
                                </li>
                                @endif
                                <li class="nav-item">
                                    <a href="javascript:void;" class="nav-link dropdown-toggle">Room & Suite</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="room-detail.html" class="nav-link">Regular Couple Bed</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="room-detail.html" class="nav-link">Delux Couple Bed</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="room-detail.html" class="nav-link">Regular Double Bed</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="room-detail.html" class="nav-link">Delux Double Bed</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="room-detail.html" class="nav-link">Premium Suite</a>
                                        </li>
                                    </ul>
                                </li>
                                @if($global_page->photo_gallery_status==1 || $global_page->video_gallery_status==1)
                                <li class="nav-item">
                                    <a href="javascript:void;" class="nav-link dropdown-toggle">Gallery</a>
                                    <ul class="dropdown-menu">
                                        @if($global_page->photo_gallery_status==1)
                                            <li class="nav-item">
                                                <a href="{{ route('photo') }}" class="nav-link">{{ $global_page->photo_gallery_heading }}</a>
                                            </li>
                                        @endif
                                        @if($global_page->video_gallery_status==1)
                                        <li class="nav-item">
                                            <a href="{{ route('video') }}" class="nav-link">{{ $global_page->video_gallery_heading }}</a>
                                        </li>
                                        @endif
                                    </ul>
                                </li>
                                @endif
                                @if($global_page->blog_status==1)
                                <li class="nav-item">
                                    <a href="{{ route('blog') }}" class="nav-link">{{ $global_page->blog_heading }}</a>
                                </li>
                                @endif
                                @if($global_page->contact_status==1)
                                <li class="nav-item">
                                    <a href="{{ route('contact') }}" class="nav-link">{{ $global_page->contact_heading }}</a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>

        @yield('main-content')
        @include('front.layout.footer')
        <script src="{{ asset('dist-front/js/custom.js') }}"></script>

   </body>
</html>
