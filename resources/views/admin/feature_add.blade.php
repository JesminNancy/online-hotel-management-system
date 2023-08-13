@extends('admin.layout.app')

@section('heading', 'Add Feature')

@section('right_top_button')
<div class="ml-auto">
    <a href="{{ route('admin_feature_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i> view all</a>
</div>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_feature_store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">icon *</label>
                                    <input type="text" class="form-control" name="icon" value="{{ old('icon') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">heading</label>
                                    <input type="text" class="form-control" name="heading" value="{{ old('heading') }}">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">text</label>
                                    <textarea class="form-control h_100" name="text" id="" cols="30" rows="10">{{ old('text') }}</textarea>
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
