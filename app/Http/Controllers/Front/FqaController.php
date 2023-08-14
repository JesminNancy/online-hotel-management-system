<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Fqa;
use Illuminate\Http\Request;

class FqaController extends Controller
{
    public function index(){
        $fqas = Fqa::get();
        return view('front.fqa', compact('fqas'));
    }
}
