<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class AdminRoomController extends Controller
{
    public function index(){
        $rooms = Room::get();
        return view('admin.room_view', compact('rooms'));
    }
    public function add(){
        return view('admin.room_add');
    }
}
