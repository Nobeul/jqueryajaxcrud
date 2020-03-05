<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        
        return view('products.productlist');
    }
    
    function fetch(Request $request)
    {
        if ($request->get('query')) {
            $query = $request->get('query');
            $data = Product::where('name', 'LIKE', '%' . $query . '%')->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach ($data as $row) {
                $output .= '<li onclick="addingProduct(this)" id= "result-'.$row->id.'">' . $row->name . '</li>';
                // $output .= '<li style="display: none">' . $row->price . '</li>';
                // $output .= '<li style="display: none">' . $row->id . '</li>';
                // $output .= $row->id;
                
            }
            $output .= '</ul>';
            // dd(gettype($output));
            return $output;
        }
    }
    public function getData(Request $request)
    {
        $query = $request->get('query');
        return Product::where('name', 'LIKE', '%' . $query . '%')->get();
    }
    public function productStore(Request $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->email = $request->email;
        $product->password = $request->password;

        $product->save();
        return ['success' => true, 'message' => 'Data Inserted'];
    }

    public function addProduct(Request $request)
    {
        $id      = $request->id;
        $product = Product::find($id); // return obj
        return json_encode($product);  
    }
}
