<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

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
            $output = '<ul class="dropdown-menu" style="position:absolute;display:block;top:30%;left:9.1%;width:250px">';
            // dd($data);
            $gg = $data->toArray();
            // dd($gg);
            if (count($gg)>0) {

                foreach ($data as $row) {


                    $output .= '<li onclick="addingProduct(this)" class="listItems" id= ' . $row->id . '>' . $row->name . '</li>';
                }
            }else{
                $output .= '<li onclick="addingProduct(this)" class="listItems">Nothing Found</li>';
            }
        }
        $output .= '</ul>';
        // dd(gettype($output));
        return $output;
    }
    public function getData(Request $request)
    {
        $query = $request->get('query');
        return Product::where('name', 'LIKE', '%' . $query . '%')->get();
    }

    public function orderStore(Request $request)
    {
        $userId = Auth::id();
        $insert_data = [];
        $product_id = $request->id;
        // dd($product_id);
        $quantity = $request->quantity;
        $price = $request->price;
        // order number starts here
        $order_number = Order::orderBy('id', 'desc')->first('order_number');

        $order_number = substr($order_number->order_number, 6);
        $order_number = str_pad(++$order_number, 4, "0", STR_PAD_LEFT);
        $order_number = 'order-' . $order_number;
        // order number ends here
        for ($count = 0; $count < count($product_id); $count++) {

            $data = array(
                'quantity'  => $quantity[$count],
                'price'  => $price[$count],
            );
            $grand_total = $data['quantity'] * $data['price'];
        }
        $order = array(
            'user_id' => $userId,
            'grand_total' => $grand_total,
            'order_number' => $order_number
        );
        // dd($order);
        Order::insert($order);

        $search_order = Order::where('order_number', $order_number)->value('id');

        for ($count = 0; $count < count($product_id); $count++) {
            $data = array(
                'product_id'  => $product_id[$count],
                'quantity'  => $quantity[$count],
                'price'  => $price[$count],
                'order_id' => $search_order,
            );
            // dd($data);
            $data['price'] = $data['quantity'] * $data['price'];
            $insert_data[] = $data;
        }
        // dd($insert_data);
        OrderDetails::insert($insert_data);
        return back();
    }

    public function deleteInvoice(Request $request){
        $order = Order::with('order_details')->find($request->id);
        dd($order);
        $order->delete();
        return ['success' => true, 'message' => 'Data Deleted'];
    }

    public function updateOrder(Request $request)
    {
        $order = Order::find($request->id);
        $order->quantity = $request->quantity;
        $order->price = $request->price;

        $order->save();
        return ['success' => true, 'message' => 'Data Updated'];
    }

    public function addProduct(Request $request)
    {
        // dd($request->all());
        $id      = $request->id;
        // dd($id);
        $product = Product::find($id); // return obj
        return $product;
    }

    public function orderList(){
        $userId = Auth::id();
        $order = Order::join('order_details', function ($join) {
            $join->on('order_details.order_id', '=', 'orders.id');
        })
            ->select([
                'orders.id', 'order_details.order_id', 'orders.order_number', 'orders.grand_total', 'user_id',
                DB::raw('sum(order_details.quantity) as qty')

            ])
            ->groupBy('order_details.order_id', 'orders.id', 'user_id', 'orders.order_number', 'orders.grand_total')
            ->orderBy('orders.order_number', 'desc')
            ->where('user_id', $userId)
            ->get();
        return view('products.orderList')->with('order', $order);
    }

    public function editOrder(Request $request)
    {
        $order_id = $request->id;
        $order = OrderDetails::with('product', 'order')->where('order_id', $order_id)->get();
        return view('order.editOrder')->with('order', $order);
    }
    public function productList(){
        $products = Product::get();
        return view('admin.productlist')->with('products',$products);
    }

    public function deleteProduct(Request $request){
        $product = Product::find($request->id);
        $product->delete();
        return ['success' => true, 'message' => 'Data Deleted'];
    }

    public function insertProduct(Request $request){
        $product = new Product;
        $product->name = $request->name;
        $product->quantity = $request->quantity;
        $product->price = $request->price;

        $product->save();
        return redirect('admin/productlist');
    }
    public function viewAddProduct(){
        return view('admin.addproduct');
    }
    public function updateProduct(Request $request){
        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->quantity = $request->quantity;
        $product->price = $request->price;

        $product->save();
        return redirect('admin/productlist');
    }

    public function viewProduct(Request $request){
        $product = Product::find($request->id);
        // dd($product);   
        return view('admin.editproduct')->with('product', $product);
    }
    
}
