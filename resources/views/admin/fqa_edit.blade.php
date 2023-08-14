@extends('admin.layout.app')

@section('heading', 'Edit FQA')

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
                    <form action="{{ route('admin_fqa_update',$fqa_data->id) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">

                                <div class="mb-4">
                                    <label class="form-label">Question *</label>
                                    <input type="text" name="question" class="form-control" value="{{ $fqa_data->question }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Answer *</label>
                                    <textarea name="answer" class="form-control snote" cols="30" rows="10">{{ $fqa_data->answer }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-primary">Update</button>
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
