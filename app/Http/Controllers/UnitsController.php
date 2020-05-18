<?php

namespace App\Http\Controllers;

use App\Unit;
use Illuminate\Http\Request;

class UnitsController extends Controller
{
    public function index(){
        $data['units'] = Unit::all();
        return view('generalSettings.units.viewUnits', $data);
    }

    public function saveUnit(Request $request){
        $unit = New Unit();
        $unit->name = $request->name;
        $unit->abbr = $request->abbr;
        $unit->save();
        return back();
    }

    public function editUnit(Request $request){
        $unit = Unit::find($request->id);
        return $unit;
    }
    public function updateUnit(Request $request){
        $unit = Unit::find($request->id);
        $unit->name = $request->name;
        $unit->abbr = $request->abbr;
        $unit->save();
        
        return back();
    }
    public function deleteUnit(Request $request){
        $unit = Unit::find($request->id);
        $unit->delete();
        return back();
    }
}
