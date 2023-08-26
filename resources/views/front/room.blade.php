@extends('front.layout.app')

@section('main-content')

<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $global_page->room_heading }}</h2>
            </div>
        </div>
    </div>
</div>
<div class="home-rooms">
    <div class="container">
        <div class="row">
            @foreach($rooms_all as $item)
                <div class="col-md-3">
                    <div class="inner">
                        <div class="photo">
                            <img src="{{ asset('uploads/'.$item->featured_photo) }}" alt="">
                        </div>
                        <div class="text">
                            <h2><a href="{{ route('room_details',$item->id) }}">{{ $item->name }}</a></h2>
                            <div class="price">
                                ${{ $item->price }}/night
                            </div>
                            <div class="button">
                                <a href="{{ route('room_details',$item->id) }}" class="btn btn-primary">See Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="col-md-12">
                {{ $rooms_all->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
