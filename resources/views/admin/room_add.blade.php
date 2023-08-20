@extends('admin.layout.app')

@section('heading', 'Add Room')

@section('right_top_button')
<div class="ml-auto">
    <a href="{{ route('admin_room_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i> view all</a>
</div>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_room_store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Photo</label>
                                    <input type="file" name="featured_photo" >
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Description</label>
                                        <textarea class="form-control h_100 snote" name="description" id="" cols="30" rows="10">{{ old('description') }}</textarea>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Price</label>
                                    <input type="text" class="form-control" name="price" value="{{ old('price') }}">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Room</label>
                                    <input type="text" class="form-control" name="total_rooms" value="{{ old('total_rooms') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Amenity</label>
                                    @php
                                        $i=0;
                                    @endphp
                                    @foreach ($all_amenities as $amenity)
                                    @php
                                        $i++;
                                    @endphp
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $amenity->id }}" id="defaultCheck{{ $i }}" name="arr_amenities[]">
                                        <label class="form-check-label" for="defaultCheck{{ $i }}">
                                          {{ $amenity->name }}
                                        </label>
                                      </div>
                                    @endforeach
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Beds</label>
                                    <input type="text" class="form-control" name="total_beds" value="{{ old('total_beds') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Size</label>
                                    <input type="text" class="form-control" name="size" value="{{ old('size') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Guest</label>
                                    <input type="text" class="form-control" name="total_guests" value="{{ old('total_guests') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Bathrooms</label>
                                    <input type="text" class="form-control" name="total_bathrooms" value="{{ old('total_bathrooms') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Balconies</label>
                                    <input type="text" class="form-control" name="total_balconies" value="{{ old('total_balconies') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Vedio ID</label>
                                    <input type="text" class="form-control" name="vedio_id" value="{{ old('vedio_id') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
