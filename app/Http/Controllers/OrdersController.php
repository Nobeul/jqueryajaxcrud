<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    public function editOrder(Request $request)
    {
        $order_id = $request->id;
        $order = OrderDetails::with('product', 'order')->where('order_id', $order_id)->get();
        // dd($order);
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
        // dd($orderDetails);
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

            // dd($orderDetails);
            $orderDetails->save();
        }
        $result = array_diff($preOrder, $postOrder);
        // dd($result);
        $diff = OrderDetails::find($result);
        foreach ($diff as $difference) {
            $difference->delete();
        }
        $prc = $request->prc;
        $qty = $request->qty;
        $p_id = $request->p_id;
        // dd($order_id);
        if ($prc != null) {
            for ($count = 0; $count < count($prc); $count++) {
                $newOrder = new OrderDetails();
                $data = array(
                    'product_id' => $p_id[$count],
                    'quantity'  => $qty[$count],
                    'price'  => $prc[$count],
                );
                $insert_data[] = $data;
                $newOrder->product_id = $data['product_id'];
                $newOrder->order_id = $request->order_id;
                $newOrder->quantity = $data['quantity'];
                $newOrder->price = $data['price'];
                $newOrder->save();
            }
        }



        $order_id  = $request->order_id;

        $grand_total = $request->grand_total;
        Order::where('id', $order_id)->update(['grand_total' => $grand_total]);
        return back();
    }

    public function fetch(Request $request)
    {
        // dd($request->all());
        if ($request->get('query')) {

            $output = '';
            $query = $request->get('query');
            // dd($query);
            if ($query != '') {
                $data = Order::where('order_number', 'like', '%' . $query . '%')
                    ->orWhere('grand_total', 'like', '%' . $query . '%')
                    ->orderBy('order_number', 'desc')
                    ->get();
            } else {
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
    public function getorder()
    {
        // $order = Order::select(DB::raw('order_id, order_number, sum(price) as total_price, sum(quantity) as total_quantity'))
        //     ->from('orders')
        //     ->rightJoin('order_details', 'order_details.order_id', '=' , 'orders.id')
        //     ->orderBy('orders.id','desc')
        //     ->groupBy('order_details.order_id')
        //     ->get();

        $order = Order::join('order_details', function ($join) {
            $join->on('order_details.order_id', '=', 'orders.id');
        })
            ->select([
                'orders.id', 'order_details.order_id', 'orders.order_number', 'orders.grand_total', 'user_id',
                DB::raw('sum(order_details.quantity) as qty')

            ])
            ->groupBy('order_details.order_id', 'orders.id',  'orders.order_number', 'user_id', 'orders.grand_total')
            ->orderBy('orders.order_number', 'desc')
            ->get();
        // dd($order);
        return view('admin.invoice')->with('order', $order);
    }

    function filter_data(Request $request)
    {
        if ($request->ajax()) {

            $data = DB::table('order')
                ->whereBetween('user_id', array($request->user_id))
                ->get();
            echo json_encode($data);
        }
    }

    function fetchProducts(Request $request)
    {
        if ($request->get('query')) {
            $query = $request->get('query');
            $data = Product::where('name', 'LIKE', '%' . $query . '%')->get();
            $output = '<ul class="dropdown-menu" style="position:absolute;display:block;top:16.3%;left:2.5%;width:201px">';
            // dd($data);
            $gg = $data->toArray();
            // dd($gg);
            if (count($gg) > 0) {

                foreach ($data as $row) {


                    $output .= '<li onclick="addingProduct(this)" class="listItems" id= ' . $row->id . '>' . $row->name . '</li>';
                }
            } else {
                $output .= '<li onclick="addingProduct(this)" class="listItems">Nothing Found</li>';
            }
        }
        $output .= '</ul>';
        // dd(gettype($output));
        return $output;
    }
}
