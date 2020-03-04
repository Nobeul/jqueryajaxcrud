<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $product = Product::all()->pluck('product_name')->toArray();
        // dd($product);
        return view('ajax.search',compact('product'));
        
    }
    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = "";
            $products = Product::where('product_name', 'LIKE', '%' . $request->search . "%")->get();
            if ($products) {
                foreach ($products as $key => $product) {
                    $output .= '<tr>' .
                        '<td>' . $product->product_name . '</td>' .
                        '<td>' . $product->quantity . '</td>' .
                        '</tr>';
                }
                return Response($output);
            }
        }
    }

    public function view(){
        $product = Product::get();
        return view('ajax.view',compact('product'));
    }
}