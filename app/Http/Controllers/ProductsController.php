<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;

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
            $output = '<ul class="dropdown-menu" style="position:absolute;display:block;top:30%;left:9%;width:250px">';
            foreach ($data as $row) {
                $output .= '<li onclick="addingProduct(this)" class="listItems" id= ' . $row->id . '>' . $row->name . '</li>';
                // $output .= '<li style="display: none">' . $row->price . '</li>';

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

    public function orderStore(Request $request)
    {
        // $uid = User::get('id');

        $insert_data = [];
        $product_id = $request->id;
        // dd($product_id);
        $quantity = $request->quantity;
        $price = $request->price;

        $order_id = Order::get('id');
        dd($order_id);
        // foreach ($order_id as $id) {

        // order number starts here
        $order_number = Order::orderBy('id', 'desc')->first('order_number');

        $order_number = substr($order_number->order_number, 6);
        $order_number = str_pad(++$order_number, 4, "0", STR_PAD_LEFT);
        $order_number = 'order-' . $order_number;
        // order number ends here
        for ($count = 0; $count < count($product_id); $count++) {
            $data = array(
                'product_id'  => $product_id[$count],
                'quantity'  => $quantity[$count],
                'price'  => $price[$count],
            );
            $data['order_id'] = 1;
            // dd($data);
            $data['price'] = $data['quantity'] * $data['price'];
            $insert_data[] = $data;
        }
        // dd($insert_data);
        OrderDetails::insert($insert_data);
        $order = array(
            'user_id' => 1,
            'grand_total' => $data['price'],
            'order_number' => $order_number
        );
        Order::insert($order);
        return redirect('/getorder');
    }


    public function updateOrder(Request $request)
    {
        $order = Order::find($request->id);
        $order->quantity = $request->quantity;
        $order->price = $request->price;

        $order->save();
        // return view('jqueryAjaxCrud.updateContact');
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


    public function getorder()
    {
        // $order = Order::select(DB::raw('order_id, order_number, sum(price) as total_price, sum(quantity) as total_quantity'))
        //     ->from('orders')
        //     ->rightJoin('order_details', 'order_details.order_id', '=' , 'orders.id')
        //     ->orderBy('orders.id','desc')
        //     ->groupBy('order_details.Order_id')
        //     ->get();

        $order = Order::join('order_details', function ($join) {
            $join->on('order_details.order_id', '=', 'orders.id');
        })
            ->select([
                'orders.id', 'order_details.order_id', 'orders.order_number',
                DB::raw('sum(order_details.quantity) as qty'),
                DB::raw('sum(order_details.price) as prc')
            ])
            ->groupBy('order_details.Order_id')
            ->get();

        // dd($order);

        return view('order.order')->with('order', $order);
    }
}
