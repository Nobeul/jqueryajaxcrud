<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function editOrder(Request $request){
        $order = $request->id;
        $order = Order::where('order_number',$order)->get();
        return view('order.editOrder')->with('order',$order);
    }
    public function update_Order(Request $request){
        // dd($request->all());
        $insert_data = [];
        $order_id= $request->id;
        $product_id= $request->product_id;
        $quantity = $request->quantity;
        $price = $request->price;
        $order = 0;
        for ($count = 0; $count < count($order_id); $count++) {
            $order = Order::find($order_id[$count]);
            $data = array(
                'id'  => $order_id[$count],
                'product_id' => $product_id[$count],
                'quantity'  => $quantity[$count],
                'price'  => $price[$count],
            );
            $insert_data[] = $data;
            $order->id = $data['id'];
            $order->product_id = $data['product_id'];
            $order->quantity = $data['quantity'];
            $order->price = $data['price'];
            $order->save();
        }
        return redirect('/getorder');
    }
    public function order_delete(Request $request){
        dd($request->all());
        return back();
    }
}
