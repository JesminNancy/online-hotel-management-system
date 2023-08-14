@extends('admin.layout.app')

@section('heading', 'View Photo')

@section('right_top_button')
<div class="ml-auto">
    <a href="{{ route('admin_photo_add') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
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
                                <th>Caption</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($photos as  $photo)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/'.$photo->photo) }}" alt="" class="w_200">
                                    </td>
                                    <td>{{ $photo->caption }}</td>

                                    <td class="pt_10 pb_10">
                                        <a href="{{ route('admin_photo_edit',$photo->id) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('admin_photo_delete',$photo->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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
