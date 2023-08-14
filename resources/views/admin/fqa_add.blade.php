@extends('admin.layout.app')

@section('heading', 'Add FQA')

@section('right_top_button')
<div class="ml-auto">
    <a href="{{ route('admin_fqa_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i> view all</a>
</div>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_fqa_store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Question *</label>
                                    <input type="text" name="question" class="form-control" value="{{ old('question') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Answer *</label>
                                    <textarea name="answer" class="form-control snote" cols="30" rows="10">{{ old('answer') }}</textarea>
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
