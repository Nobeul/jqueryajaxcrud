<?php

namespace App\Http\Controllers;

use App\Tax;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    public function index(){
        $data['taxes'] = Tax::get();
        return view('finance.taxes',$data);
    }
    public function saveTax(Request $request){
        $tax = New Tax; 
        $tax->name = $request->name;
        $tax->tax_rate = $request->tax_rate;
        $tax->is_default = $request->is_default;
        $tax->save();
        return back();
    }
    public function editTax(Request $request){
        $tax = Tax::find($request->id);
        return $tax;
    }

    public function updateTax(Request $request){
        $tax = Tax::find($request->id);
        $tax->name = $request->name;
        $tax->tax_rate = $request->tax_rate;
        $tax->is_default = $request->is_default;
        $tax->save();

        return back();
    }
    public function deleteTax(Request $request){
        $tax = Tax::find($request->id);
        $tax->delete();
        return back();
    }
}
