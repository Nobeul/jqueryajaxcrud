<?php

namespace App\Http\Controllers;

use App\Language;
use Illuminate\Http\Request;

class LanguagesController extends Controller
{
    public function index(){
        $data['languages'] = Language::all();
        return view('generalSettings.languages.viewlanguages',$data);
    }
    
    public function savelanguage(Request $request){
        $language = New Language();
        $language->language_name = $request->language_name;
        $language->save();
        return back();
    }

    public function editlanguage(Request $request){
        $language = Language::find($request->id);
        return $language;
    }
    public function updatelanguage(Request $request){
        $language = Language::find($request->id);
        $language->language_name = $request->language_name;
        $language->save();
        
        return back();
    }
    public function deletelanguage(Request $request){
        $language = Language::find($request->id);
        $language->delete();
        return back();
    }
}
