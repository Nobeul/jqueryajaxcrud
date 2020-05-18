<?php

namespace App\Http\Controllers;

use App\Unit;
use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(){
        $data['categories'] = Category::with('unit')->get();
        $data['units'] = Unit::all();
        return view('generalSettings.itemCategories.viewItems',$data);
    }

    public function saveCategory(Request $request){
        $category = New Category();
        $category->name = $request->name;
        $category->unit_id = $request->unit_id;
        $category->status = $request->status;
        $category->save();
        return back();
    }

    public function editCategory(Request $request){
        $category = Category::find($request->id);
        return $category;
    }
    public function updateCategory(Request $request){
        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->unit_id = $request->unit_id;
        $category->status = $request->status;
        $category->save();
        
        return back();
    }
    public function deleteCategory(Request $request){
        $category = Category::find($request->id);
        $category->delete();
        return back();
    }
}
