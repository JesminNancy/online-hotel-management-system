<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(){
        $rooms_all = Room::paginate(2);
        return view('front.room', compact('rooms_all'));
    }
    public function singleRoom($id){
        $single_room = Room::with('roomPhoto')->where('id',$id)->first();
        return view('front.room_details', compact('single_room'));
     }
}
