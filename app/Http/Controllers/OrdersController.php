<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    public function editOrder(Request $request)
    {

        $order_id = $request->id;
        // dd($order_id);
        $order = OrderDetails::with('product', 'order')->where('order_id', $order_id)->get();
        // $order = Order::get();
        return view('order.editOrder')->with('order', $order);
    }
    public function update_Order(Request $request)
    {
        // dd($request->all());
        $insert_data = [];
        $id = $request->id;
        // dd($id);
        $product_id = $request->product_id;
        $quantity = $request->quantity;
        $price = $request->price;


        $preOrder = [];
        $order_id = $request->order_id;
        // dd($order_id);
        $orderDetails = OrderDetails::where('order_id', $order_id)->get();
        foreach ($orderDetails as $order) {
            array_push($preOrder, $order->id);
        }
        // dd($preOrder);
        $postOrder = [];
        $Order = $request->id;
        foreach ($Order as $odr) {
            array_push($postOrder, $odr);
        }
        // dd($postOrder);


        $order = OrderDetails::with('product', 'order')->where('order_id', $id)->get();

        for ($count = 0; $count < count($id); $count++) {
            $orderDetails = OrderDetails::find($id[$count]);
            $data = array(
                'id'  => $id[$count],
                'product_id' => $product_id[$count],
                'quantity'  => $quantity[$count],
                'price'  => $price[$count],
            );
            $insert_data[] = $data;
            $orderDetails->id = $data['id'];
            $orderDetails->product_id = $data['product_id'];
            $orderDetails->quantity = $data['quantity'];
            $orderDetails->price = $data['price'];
            $orderDetails->save();
        }
        // dd($data);   
        $result = array_diff($preOrder, $postOrder);
        $diff = OrderDetails::find($result);
        foreach ($diff as $difference) {
            $difference->delete();
        }
        $order_id  = $request->order_id;

        $grand_total = $request->grand_total;
        Order::where('id', $order_id)->update(['grand_total' => $grand_total]);
        return redirect('/getorder');
    }
    public function order_delete(Request $request)
    {
        dd($request->all());
        return back();
    }
}
