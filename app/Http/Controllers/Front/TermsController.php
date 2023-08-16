<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class TermsController extends Controller
{
    public function index(){
        $terms_data = Page::where('id',1)->first();
        return view('front.terms_and_condition', compact('terms_data'));
    }

}
