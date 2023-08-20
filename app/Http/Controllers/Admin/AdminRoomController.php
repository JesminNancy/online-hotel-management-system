<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\Room;
use App\Models\RoomPhoto;
use Illuminate\Http\Request;

class AdminRoomController extends Controller
{
    public function index(){
        $rooms = Room::get();
        return view('admin.room_view', compact('rooms'));
    }
    public function add(){
        $all_amenities = Amenity::get();
        return view('admin.room_add',compact('all_amenities'));
    }

    public function store(Request $request){
        $amenities = '';
        $i=0;
        if(isset($request->arr_amenities)){

            foreach($request->arr_amenities as $item){
                if($i==0){
                    $amenities.= $item;
                }else{
                    $amenities.=  ','.$item;
                }

                $i++;
            }
        }

        $request->validate([
            'featured_photo' => 'required|image|mimes:jpg,jpeg,png,gif',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'total_rooms' => 'required'
        ]);
        $ext = $request->file('featured_photo')->getClientOriginalExtension();
        $image_name = time().'.'.$ext;
        $request->file('featured_photo')->move(public_path('uploads/'),$image_name );

        $obj = new Room();
        $obj->featured_photo = $image_name;
        $obj->name = $request->name;
        $obj->description = $request->description;
        $obj->price = $request->price;
        $obj->total_rooms = $request->total_rooms;
        $obj->amenities = $amenities;
        $obj->total_beds = $request->total_beds;
        $obj->size = $request->size;
        $obj->total_guests = $request->total_guests;
        $obj->total_bathrooms = $request->total_bathrooms;
        $obj->total_balconies = $request->total_balconies;
        $obj->vedio_id = $request->vedio_id;
        $obj->save();

        return redirect()->back()->with('success','Rooms added successfully');
    }

    public function edit($id){
        $all_amenities = Amenity::get();
        $room_data = Room::where('id',$id)->first();

        $existing_amenities = array();
        if($room_data->amenities != '') {
            $existing_amenities = explode(',',$room_data->amenities);
        }
        return view('admin.room_edit', compact('room_data','all_amenities','existing_amenities'));
    }

    public function update(Request $request,$id){

        $room_update = Room::where('id',$id)->first();
        $amenities = '';
        $i=0;
        if(isset($request->arr_amenities)) {
            foreach($request->arr_amenities as $item) {
                if($i==0) {
                    $amenities .= $item;
                } else {
                    $amenities .= ','.$item;
                }
                $i++;
            }
        }

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'total_rooms' => 'required'
        ]);

        if($request->hasFile('featured_photo')){
            $request->validate([
                'featured_photo' => 'required|image|mimes:jpg,jpeg,png,gif',
            ]);

            unlink(public_path('uploads/'.$room_update->featured_photo));

            $ext = $request->file('featured_photo')->Extension();
            $image_name = time().'.'.$ext;
            $request->file('featured_photo')->move(public_path('uploads/'),$image_name );
            $room_update->featured_photo = $image_name;
        }

        $room_update->name = $request->name;
        $room_update->description = $request->description;
        $room_update->price = $request->price;
        $room_update->total_rooms = $request->total_rooms;
        $room_update->amenities =$room_update->amenities;
        $room_update->total_beds = $request->total_beds;
        $room_update->size = $request->size;
        $room_update->total_guests = $request->total_guests;
        $room_update->total_bathrooms = $request->total_bathrooms;
        $room_update->total_balconies = $request->total_balconies;
        $room_update->vedio_id = $request->vedio_id;
        $room_update->update();
        return redirect()->back()->with('success','Rooms updated successfully');

    }

    public function delete($id)
    {
        $single_data = Room::where('id',$id)->first();
        unlink(public_path('uploads/'.$single_data->featured_photo));
        $single_data->delete();

        $room_photo_data = RoomPhoto::where('room_id',$id)->get();
        foreach($room_photo_data as $item) {
            unlink(public_path('uploads/'.$item->photo));
            $item->delete();
        }

        return redirect()->back()->with('success', 'Room is deleted successfully.');
    }

    public function gallery($id){
        $room_data = Room::where('id',$id)->first();
        $room_photos = RoomPhoto::where('room_id',$id)->get();
        return view('admin.room_gallery', compact('room_data','room_photos'));
    }
    public function gallery_store(Request $request,$id){
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif'
        ]);

        $ext = $request->file('photo')->extension();
        $final_name = time().'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'),$final_name);

        $obj = new RoomPhoto();
        $obj->photo = $final_name;
        $obj->room_id = $id;
        $obj->save();

        return redirect()->back()->with('success', 'Photo is added successfully.');
    }
    public function gallery_delete($id)
    {
        $single_data = RoomPhoto::where('id',$id)->first();
        unlink(public_path('uploads/'.$single_data->photo));
        $single_data->delete();

        return redirect()->back()->with('success', 'Photo is deleted successfully.');
    }

}
