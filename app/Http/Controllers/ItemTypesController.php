<?php

namespace App\Http\Controllers;

use App\ItemType;
use Illuminate\Http\Request;

class ItemTypesController extends Controller
{
    public function index(){
        $data['itemTypes'] = ItemType::all();
        return view('generalSettings.itemTypes.viewItemTypes',$data);
    }
    
    public function saveItemType(Request $request){
        $itemType = New ItemType();
        $itemType->name = $request->name;
        $itemType->save();
        return back();
    }

    public function editItemType(Request $request){
        $itemType = ItemType::find($request->id);
        return $itemType;
    }
    public function updateItemType(Request $request){
        $itemType = ItemType::find($request->id);
        $itemType->name = $request->name;
        $itemType->save();
        
        return back();
    }
    public function deleteItemType(Request $request){
        $itemType = ItemType::find($request->id);
        $itemType->delete();
        return back();
    }
}
