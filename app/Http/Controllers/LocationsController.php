<?php

namespace App\Http\Controllers;
use App\Location;
use Illuminate\Http\Request;

class LocationsController extends Controller
{
    public function index(){
        $locations = Location::get();
        return view('location.location')->with('locations',$locations);
    }
    public function viewNewLocation(){
        return view('location.addNewLocation');
    }
    public function createLocation(Request $request){
        // dd($request->all());
        $location = new Location;
        $location->name = $request->name;
        $location->code = $request->code;
        $location->address = $request->address;
        $location->is_default = $request->is_default;
        $location->phone = $request->phone;
        $location->fax = $request->fax;
        $location->email = $request->email;
        $location->contact = $request->contact;
        $location->status = $request->status;

        $location->save();
        return redirect('admin/location');
    }

    public function openEditLocationPage(Request $request){
        $locations = Location::where('id', $request->id)->get();
        return view('location.editLocation')->with('locations', $locations);
    }

    public function updateLocation(Request $request){
        $location = Location::find($request->id);
        $location->name = $request->name;
        $location->code = $request->code;
        $location->address = $request->address;
        $location->is_default = $request->is_default;
        $location->phone = $request->phone;
        $location->fax = $request->fax;
        $location->email = $request->email;
        $location->contact = $request->contact;
        $location->status = $request->status;
        $location->update();
        return redirect('admin/location');
    }

    public function deleteLocation(Request $request){
        $location = Location::find($request->id);
        $location->delete();
        return back();
    }
}
