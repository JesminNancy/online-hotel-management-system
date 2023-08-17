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

<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="item">
                    <h2 class="heading">Site Links</h2>
                    <ul class="useful-links">
                        <li><a href="rooms.html">Rooms & Suites</a></li>
                        @if($global_page->photo_gallery_status==1)
                        <li><a href="{{ route('photo') }}">{{ $global_page->photo_gallery_heading }}</a></li>
                        @endif
                        @if($global_page->video_gallery_status==1)
                        <li>
                            <a href="{{ route('video') }}">{{ $global_page->video_gallery_heading }}</a>
                        </li>
                        @endif
                        @if($global_page->blog_status==1)
                            <li><a href="{{ route('blog') }}">{{ $global_page->blog_heading }}</a></li>
                        @endif
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="item">
                    <h2 class="heading">Useful Links</h2>
                    <ul class="useful-links">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('terms') }}">Terms and Conditions</a></li>
                        <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                        <li><a href="disclaimer.html">Disclaimer</a></li>
                        @if($global_page->fqa_status==1)
                            <li><a href="{{ route('fqa') }}">FQA</a></li>
                        @endif
                    </ul>
                </div>
            </div>


            <div class="col-md-3">
                <div class="item">
                    <h2 class="heading">Contact</h2>
                    <div class="list-item">
                        <div class="left">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="right">
                            34 Antiger Lane,<br>
                            PK Lane, USA, 12937
                        </div>
                    </div>
                    <div class="list-item">
                        <div class="left">
                            <i class="fa fa-volume-control-phone"></i>
                        </div>
                        <div class="right">
                            contact@arefindev.com
                        </div>
                    </div>
                    <div class="list-item">
                        <div class="left">
                            <i class="fa fa-envelope-o"></i>
                        </div>
                        <div class="right">
                            122-222-1212
                        </div>
                    </div>
                    <ul class="social">
                        <li><a href=""><i class="fa fa-facebook-f"></i></a></li>
                        <li><a href=""><i class="fa fa-twitter"></i></a></li>
                        <li><a href=""><i class="fa fa-pinterest-p"></i></a></li>
                        <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                        <li><a href=""><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3">
                <div class="item">
                    <h2 class="heading">Newsletter</h2>
                    <p>
                        In order to get the latest news and other great items, please subscribe us here:
                    </p>
                    <form action="{{ route('subscribe_send_email') }}" method="post" class="form_subscribe_ajax">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="email" class="form-control">
                            <span class="text-danger error-text email_error"></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Subscribe Now">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="copyright">
    Copyright 2022, ArefinDev. All Rights Reserved.
</div>

<div class="scroll-top">
    <i class="fa fa-angle-up"></i>
</div>

@include('front.layout.footer')

@if(session()->get('error'))
<script>
    iziToast.error({
        title: '',
        position: 'topRight',
        message: '{{ session()->get('error') }}',
    });
</script>
@endif

@if(session()->get('success'))
<script>
    iziToast.success({
        title: '',
        position: 'topRight',
        message: '{{ session()->get('success') }}',
    });
</script>
@endif

<script>
    (function($){
        $(".form_subscribe_ajax").on('submit', function(e){
            e.preventDefault();
            $('#loader').show();
            var form = this;
            $.ajax({
                url:$(form).attr('action'),
                method:$(form).attr('method'),
                data:new FormData(form),
                processData:false,
                dataType:'json',
                contentType:false,
                beforeSend:function(){
                    $(form).find('span.error-text').text('');
                },
                success:function(data)
                {
                    $('#loader').hide();
                    if(data.code == 0)
                    {
                        $.each(data.error_message, function(prefix, val) {
                            $(form).find('span.'+prefix+'_error').text(val[0]);
                        });
                    }
                    else if(data.code == 1)
                    {
                        $(form)[0].reset();
                        iziToast.success({
                            title: '',
                            position: 'topRight',
                            message: data.success_message,
                        });
                    }

                }
            });
        });
    })(jQuery);
</script>
<div id="loader"></div>

   </body>
</html>
