<?php

namespace App\Http\Controllers;
use App\User;
use App\Order;
use App\Product;
use App\OrderDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    public function viewAddInvoice()
    {
        $users = User::all();
        return view('admin.addInvoice')->with('users',$users);
    }

    
    public function orderStore(Request $request)
    {
        // dd($request->all());
        $userId = $request->user;
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

        $grand_total = 0;
        // order number ends here
        for ($count = 0; $count < count($product_id); $count++) {

            $data = array(
                'quantity'  => $quantity[$count],
                'price'  => $price[$count],
            );
            $total = $data['quantity'] * $data['price'];
            $grand_total += $total;
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
    function fetch(Request $request)
    {
        if ($request->get('query')) {
            $query = $request->get('query');
            $data = Product::where('name', 'LIKE', '%' . $query . '%')->get();
            $output = '<ul class="dropdown-menu" style="position:absolute;display:block;top:48.9%;left:3.9%;width:250px">';
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
