@extends('admin.layout.app')

@section('heading', 'Features')

@section('right_top_button')
<div class="ml-auto">
    <a href="{{ route('admin_feature_add') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
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
                                <th>icon</th>
                                <th>heading</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($features as  $feature)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <i class="{{ $feature->icon }} fz_40"></i>
                                    </td>
                                    <td>{{ $feature->heading }}</td>
                                    <td class="pt_10 pb_10">
                                        <a href="{{ route('admin_feature_edit',$feature->id) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('admin_feature_delete',$feature->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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
