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


        <!-- Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $global_setting_data->analytic_id }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '{{ $global_setting_data->analytic_id }}');
        </script>

        <style>
            .main-nav nav .navbar-nav .nav-item a:hover,
            .main-nav nav .navbar-nav .nav-item:hover a,
            .slide-carousel.owl-carousel .owl-nav .owl-prev:hover,
            .slide-carousel.owl-carousel .owl-nav .owl-next:hover,
            .home-feature .inner .icon i,
            .home-rooms .inner .text .price,
            .home-rooms .inner .text .button a,
            .blog-item .inner .text .button a,
            .room-detail-carousel.owl-carousel .owl-nav .owl-prev:hover,
            .room-detail-carousel.owl-carousel .owl-nav .owl-next:hover {
                color: {{ $global_setting_data->theme_color_1 }};
            }
            .main-nav nav .navbar-nav .nav-item .dropdown-menu li a:hover,
            .primary-color
           {
                color: {{ $global_setting_data->theme_color_1 }}!important;
            }
            .testimonial-carousel .owl-dots .owl-dot,
            .footer ul.social li a,
            .footer input[type="submit"],
            .scroll-top,
            .room-detail .right .widget .book-now {
                background-color: {{ $global_setting_data->theme_color_1 }};
            }
            .slider .text .button a,
            .search-section button[type="submit"],
            .home-rooms .big-button a,
            .bg-website {
                background-color: {{ $global_setting_data->theme_color_1 }}!important;
            }
            .slider .text .button a,
            .slide-carousel.owl-carousel .owl-nav .owl-prev:hover,
            .slide-carousel.owl-carousel .owl-nav .owl-next:hover,
            .search-section button[type="submit"],
            .room-detail-carousel.owl-carousel .owl-nav .owl-prev:hover,
            .room-detail-carousel.owl-carousel .owl-nav .owl-next:hover,
            .room-detail .amenity .item {
                border-color: {{ $global_setting_data->theme_color_1 }}!important;
            }
            .home-feature .inner .icon i,
            .home-rooms .inner .text .button a,
            .blog-item .inner .text .button a,
            .room-detail .amenity .item,
            .cart .table-cart tr th {
                background-color: {{ $global_setting_data->theme_color_2 }}!important;
            }
        </style>

    </head>
    <body>

        <div class="top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 left-side">
                        <ul>
                            @if ($global_setting_data->top_bar_phone !='')
                            <li class="phone-text">{{ $global_setting_data->top_bar_phone }}</li>
                            @endif
                            @if ($global_setting_data->top_bar_email!='')
                            <li class="email-text">{{ $global_setting_data->top_bar_email }}</li>
                            @endif
                        </ul>
                    </div>
                    <div class="col-md-6 right-side">
                        <ul class="right">
                            @if($global_page->cart_status==1)
                                <li class="menu"><a href="{{ route('cart') }}">{{ $global_page->cart_heading }}
                                @if(session()->has('cart_room_id'))<sup>{{ count(session()->get('cart_room_id')) }}</sup>@endif</a>
                                </li>
                            @endif
                            @if($global_page->checkout_status==1)
                                <li class="menu"><a href="{{ route('checkout') }}">{{ $global_page->checkout_heading }}</a></li>
                            @endif

                            @if(!Auth::guard('customer')->check())

                                @if($global_page->signup_status==1)
                                    <li class="menu"><a href="{{ route('customer_signup') }}">{{ $global_page->signup_heading }}</a></li>
                                @endif
                                @if($global_page->signin_status==1)
                                    <li class="menu"><a href="{{ route('customer_login') }}">{{ $global_page->signin_heading }}</a></li>
                                @endif

                            @else
                                <li class="menu"><a href="{{ route('customer_home') }}">Dashboard</a></li>
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
                    <img src="{{ asset('uploads/'.$global_setting_data->logo) }}" alt="">
                </a>
            </div>

            <!-- Menu For Desktop Device -->
            <div class="main-nav">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="{{ route('about') }}">
                            <img src="{{ asset('uploads/'.$global_setting_data->logo) }}" alt="">
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
                                        @foreach ($global_room_data as $item)
                                            <li class="nav-item">
                                                <a href="{{ route('room_details',$item->id) }}" class="nav-link">{{ $item->name }}</a>
                                            </li>
                                        @endforeach
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
                           {!! nl2br($global_setting_data->footer_address) !!}
                        </div>
                    </div>
                    <div class="list-item">
                        <div class="left">
                            <i class="fa fa-volume-control-phone"></i>
                        </div>
                        <div class="right">
                            {{ $global_setting_data->footer_email }}
                        </div>
                    </div>
                    <div class="list-item">
                        <div class="left">
                            <i class="fa fa-envelope-o"></i>
                        </div>
                        <div class="right">
                            {{ $global_setting_data->footer_phone }}
                        </div>
                    </div>
                    <ul class="social">
                        @if( $global_setting_data->facebook !='')
                        <li><a href="{{ $global_setting_data->facebook }}"><i class="fa fa-facebook-f"></i></a></li>
                        @endif
                        @if( $global_setting_data->twitter !='')
                        <li><a href="{{ $global_setting_data->twitter }}"><i class="fa fa-twitter"></i></a></li>
                        @endif
                        @if( $global_setting_data->pinterest !='')
                        <li><a href="{{ $global_setting_data->pinterest }}"><i class="fa fa-pinterest-p"></i></a></li>
                        @endif
                        @if( $global_setting_data->linkedin !='')
                        <li><a href="{{ $global_setting_data->linkedin }}"><i class="fa fa-linkedin"></i></a></li>
                        @endif
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
    {{ $global_setting_data->copyright }}
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
