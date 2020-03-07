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
                $output .= '<li onclick="addingProduct(this)" id= ' . $row->id . '>' . $row->name . '</li>';
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

        // dd($request->all());
        // $product = new Product;
        // $product = [
        //     [
        //         $product->productName => $request->productName, 
        //         $product->productCategory => $request->productCategory,
        //         $product->productPrice => $request->productPrice
        //     ]
        // ];

        // // $product->productName = $request->productName;
        // // $product->productCategory = $request->productCategory;
        // // $product->productPrice = $request->productPrice;
        // dd($product);

        // $product->save();
        $insert_data = [];
        $name = $request->name;
        $category = $request->category;
        $price = $request->price;

        // dd($productName);
        for ($count = 0; $count < count($name); $count++) {
            $data = array(
                'name' => $name[$count],
                'category'  => $category[$count],
                'price'  => $price[$count]
            );
            $insert_data[] = $data;
        }
        // dd($insert_data);
        
        Product::insert($insert_data);
        return ['success' => true, 'message' => 'Data Inserted'];
    }

    public function addProduct(Request $request)
    {
        // dd($request->all());
        $id      = $request->id;
        // dd($id);
        $product = Product::find($id); // return obj
        return $product;
    }
}
