<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use App\Product;
use App\OrderDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\PaymentTerm;
use App\Location;

class InvoicesController extends Controller
{
    public function viewAddInvoice()
    {
        $data['users'] = User::all();
        $data['payment_terms'] = PaymentTerm::all();
        $data['locations'] = Location::all();
        $data['order'] = Order::orderby('id', 'desc')->count();
        if ($data['order'] == 0) {
            $data['order'] = 1;
        } else {
            $data['order'] = Order::orderby('id', 'desc')->first();
            $data['order'] = $data['order']->order_number;
        }
        return view('admin.addInvoice', $data);
    }


    public function orderStore(Request $request)
    {
        // dd($request->all());
        $userId = $request->user;
        $insert_data = [];
        $product_id = $request->id;
        $location_id = $request->location_id;
        $quantity = $request->quantity;
        $price = $request->price;
        $comments = $request->comments;
        $file = '';
        if ($request->file) {
            $order = new Order();
            $fileName = time() . '.' . $request->file->extension();
            $order->file = $request->file->move(public_path('files'), $fileName);
            // dd($order->file);
            $order->file = $fileName;
            $file = $order->file;
            
        }
        // order number starts here
        $date;
        $order_number = Order::orderBy('id', 'desc')->count('orders.order_number');
        // dd($order_number);
        if ($order_number == 0) {
            $order_number = 'order-0001';
            $date = date("d-m-y");
        } else {
            $order_number = Order::orderBy('id', 'desc')->first();
            $order_number = 'order-' . $request->order_number;
            $date = date("d-m-y", strtotime($request->date));
        }
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
            'order_number' => $order_number,
            'location_id' => $location_id,
            'date' => $date,
            'comments' => $comments,
            'file' => $file
        );
        Order::insert($order);

        $search_order = Order::where('order_number', $order_number)->value('id');

        for ($count = 0; $count < count($product_id); $count++) {
            $data = array(
                'product_id'  => $product_id[$count],
                'quantity'  => $quantity[$count],
                'price'  => $price[$count],
                'order_id' => $search_order
            );
            // dd($data);
            $data['price'] = $data['quantity'] * $data['price'];
            $insert_data[] = $data;
        }
        // dd($insert_data);

        OrderDetails::insert($insert_data);
        return redirect('admin/getorder');
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
