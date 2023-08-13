@extends('admin.layout.app')

@section('heading', 'Add Slide')

@section('right_top_button')
<div class="ml-auto">
    <a href="{{ route('admin_slider_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i> view all</a>
</div>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_slider_store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Photo *</label>
                                    <input type="file" name="photo" >
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
                                    <label class="form-label">button text</label>
                                    <input type="text" class="form-control" name="button_text" value="{{ old('button_text') }}">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">button URL</label>
                                    <input type="text" class="form-control" name="button_url" value="{{ old('button_url') }}">
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
