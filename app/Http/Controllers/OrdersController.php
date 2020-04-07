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
        return view('admin.editInvoice')->with('order', $order);
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

   public function fetch(Request $request)
    {
        dd($request->all());
        if ($request->get('query')) {

            $output = '';
            $query = $request->get('query');
            dd($query);
            if ($query != '') {
                $data = Order::where('order_number', 'like', '%' . $query . '%')
                    ->orWhere('grand_total', 'like', '%' . $query . '%')
                    ->orderBy('order_number', 'desc')
                    ->get();
            } else {
                // $data = DB::table('tbl_customer')
                //     ->orderBy('CustomerID', 'desc')
                //     ->get();
                echo "nope";
            }
            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $row) {
                    $output .= '
                    <tr>
                    <td>' . $row->order_number . '</td>
                    <td>' . $row->grand_total . '</td>
                    </tr>
                    ';
                }
            } else {
                $output = '
                    <tr>
                        <td align="center" colspan="5">No Data Found</td>
                    </tr>
                    ';
            }
            $data = array(
                'table_data'  => $output,
                // 'total_data'  => $total_row
            );

            echo json_encode($data);
        }
    }
}
