@extends('front.layout.app')

@section('main-content')


<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $single_room->name }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content room-detail">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-7 col-sm-12 left">

                <div class="room-detail-carousel owl-carousel">
                    <div class="item" style="background-image:url({{ asset('uploads/'.$single_room->featured_photo) }});">
                        <div class="bg"></div>
                    </div>
                    @foreach($single_room->roomPhoto as $item)
                    <div class="item" style="background-image:url({{ asset('uploads/'.$item->photo) }});">
                        <div class="bg"></div>
                    </div>
                    @endforeach
                </div>

                <div class="description">
                    {!! $single_room->description !!}

                </div>

                <div class="amenity">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Amenities</h2>
                        </div>
                    </div>
                    <div class="row">
                        @php
                            $arr = explode(',',$single_room->amenities);
                            for ($j=0; $j < count($arr); $j++) {
                            $temp_arr = App\Models\Amenity::where('id',$arr[$j])->first();
                            echo '<div class="col-lg-6 col-md-12">';
                            echo '<div class="item"><i class="fa fa-check-circle"></i>'.$temp_arr->name.
                                '</div>';
                            echo  '</div>';
                            }
                       @endphp
                    </div>
                </div>


                <div class="feature">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Features</h2>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>Room Size</th>
                                <td>{{ $single_room->size }}</td>
                            </tr>
                            <tr>
                                <th>Number of Beds</th>
                                <td>{{ $single_room->total_beds }}</td>
                            </tr>
                            <tr>
                                <th>Number of Bathrooms</th>
                                <td>{{ $single_room->total_bathrooms }}</td>
                            </tr>
                            <tr>
                                <th>Number of Balconies</th>
                                <td>{{ $single_room->total_balconies }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                @if($single_room->vedio_id !='')
                <div class="video">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $single_room->vedio_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                @endif
            </div>
            <div class="col-lg-4 col-md-5 col-sm-12 right">

                <div class="sidebar-container" id="sticky_sidebar">

                        <div class="widget">
                            <h2>Room Price per Night</h2>
                            <div class="price">
                                ${{ $single_room->price }}
                            </div>
                        </div>
                        <div class="widget">
                            <h2>Reserve This Room</h2>
                            <form action="{{ route('cart_submit') }}" method="post">
                                @csrf
                                <input type="hidden" name="room_id" value="{{ $single_room->id }}">
                            <div class="form-group mb_20">
                                <label for="">Check in & Check out</label>
                                <input type="text" name="checkin_checkout" class="form-control daterange1" placeholder="Checkin & Checkout">
                            </div>
                            <div class="form-group mb_20">
                                <label for="">Adult</label>
                                <input type="number" name="adult" class="form-control" min="1" max="30" placeholder="Adults">
                            </div>
                            <div class="form-group mb_20">
                                <label for="">Children</label>
                                <input type="number" name="children" class="form-control" min="0" max="30" placeholder="Children">
                            </div>
                        </div>


                        <div class="widget">
                            <button type="submit" class="book-now">Add to Cart</button>
                        </div>
                    </form>
                    </div>

                </div>


            </div>
        </div>
    </div>
    @if ($errors->any())
    @foreach ($errors->all() as $error )
    <script>
        iziToast.error({
        title: '',
        position: 'topRight',
        message: '{{ $error }}',
        });
    </script>
    @endforeach
@endif

@endsection
