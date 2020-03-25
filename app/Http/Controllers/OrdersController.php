<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetails;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function editOrder(Request $request)
    {
        $order_id = $request->id;
        // dd($order_id);
        $order = OrderDetails::with('product')->where('order_id',$order_id)->orderBy('order_number','desc')->get();
        // dd($order);
        return view('order.editOrder')->with('order', $order);
    }
    public function update_Order(Request $request)
    {
        // dd($request->all());
        $insert_data = [];
        $order_id = $request->id;
        $product_id = $request->product_id;
        $quantity = $request->quantity;
        $price = $request->price;
        $order = 0;
        for ($count = 0; $count < count($order_id); $count++) {
            $order = OrderDetails::find($order_id[$count]);
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
    public function order_delete(Request $request)
    {
        dd($request->all());
        return back();
    }
}
