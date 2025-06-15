<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $usertype = Auth::user()->usertype;

            if ($usertype == 'user') {
                return view('home.index');
            } elseif ($usertype == 'admin') {
                return view('admin.index');
            } else {
                return redirect()->back()->with('error', 'Invalid user type.');
            }
        } else {
            return redirect()->route('login'); // Ensure you have a route named 'login'
        }
    }

    public function home()
    {
        return view('home.index');
    }


    public function create_room()
    {
        return view('admin.create_room');
    }
 public function add_room(Request $request)
{
    $data = new Room;
    $data->room_title = $request->input('title'); // or $request->title
    $data->description = $request->input('description'); // or $request->description
    $data->price = $request->input('price');
    $data->room_type = $request->input('type'); 
    $data->wifi = $request->input('wifi'); 

    if ($image = $request->file('image')) { // <- Define $image first
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $image->move('room', $imagename);
        $data->image = $imagename;
    }
    $data->save();

    return redirect()->back()->with('message', 'Room added successfully');
}
 public function view_room()
 {
    $data = Room::all();
    return view('admin.view_room', compact('data')); // Pass the $data to the view
    

 }

    public function room_delete($id)
    {
        $data = Room::find($id);
        
            $data->delete();
            return redirect()->back(); 
    }

    public function room_update($id)
    {
        $data = Room::find($id);
        return view('admin.room_update', compact('data'));
    }

    public function edit_room(Request $request, $id)
    {
        $data = Room::find($id);
        $data->room_title = $request->input('room_title');
        $data->description = $request->input('description');
        $data->price = $request->input('price');
        
        $data->wifi = $request->input('wifi');
        $data->room_type = $request->input('room_type');

        $image=$request->image;

        if ($image) 
        {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('room', $imagename);
            $data->image = $imagename;
        }

        $data->save();
        return redirect()->back()->with('message', 'Room updated successfully');
    }

}