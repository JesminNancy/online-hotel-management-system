<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fqa;
use Illuminate\Http\Request;

class AdminFqaController extends Controller
{
    public function index(){
        $fqas = Fqa::get();
        return view('admin.fqa_view', compact('fqas'));
    }
    public function add(){
        return view('admin.fqa_add');
    }
    public function store(Request $request){

        $request->validate([
            'question' => 'required',
            'answer' => 'required'
        ]);

        $obj = new Fqa();
        $obj->question = $request->question;
        $obj->answer = $request->answer;
        $obj->save();

        return redirect()->back()->with('success','FQA is added successfully');
    }
    public function edit($id){

        $fqa_data = Fqa::where('id',$id)->first();

        return view('admin.fqa_edit', compact('fqa_data'));
    }

public function update(Request $request,$id){
    $fqa_update = Fqa::where('id',$id)->first();
    $fqa_update->question = $request->question;
    $fqa_update->answer = $request->answer;
    $fqa_update->update();

    return redirect()->back()->with('success','FQA is updated successfully');
}
public function delete($id){
    $single_data = Fqa::where('id',$id)->first();
    $single_data->delete();
    return redirect()->back()->with('success','FQA is deleted successfully');
}
}
