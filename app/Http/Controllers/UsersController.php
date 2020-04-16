<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use App\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function userlists()
    {
        $users = User::get();
        return view('admin.user')->with('users', $users);
    }

    public function delUser(Request $request)
    {
        $orders = Order::where('user_id',$request->id)->get('id')->toArray();
        $orders_array = array_column($orders,'id');
        OrderDetails::whereIn('order_id', $orders_array)->delete();
        Order::where('user_id', $request->id)->delete();
        User::where('id', $request->id)->delete();
        
    }
}
