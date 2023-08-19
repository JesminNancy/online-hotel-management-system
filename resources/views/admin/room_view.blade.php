@extends('admin.layout.app')

@section('heading', 'View Rooms')

@section('right_top_button')
<div class="ml-auto">
    <a href="{{ route('admin_room_add') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
</div>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example1">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Price(Per Night)</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($rooms as  $room)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/'.$room->photo) }}" alt="" class="w_200">
                                    </td>
                                    <td>{{ $room->name }}</td>
                                    <td>{{ $room->price }}</td>
                                    <td class="pt_10 pb_10">
                                        <a href="{{ route('admin_slider_edit',$slider->id) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('admin_slider_delete',$slider->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
