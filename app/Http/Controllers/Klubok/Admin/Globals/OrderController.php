<?php

namespace App\Http\Controllers\Klubok\Admin\Globals;

use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('admin.globals.orders.orders', compact('orders'));
    }

    public function details($order_id){
        $order = Order::all()->find($order_id);
        $user = User::all()->find($order->user_id);
        return view('admin.globals.orders.detail_order')
            ->with('order',$order)
            ->with('user',$user);
    }

    public function active(){
        $orders = Order::all()->where('status_id','<',5);
        return view('admin.globals.orders.active-orders')
            ->with('orders',$orders);
    }
    public function pay(){
        $orders = Order::all()->where('is_pay','=',1);
        return view('admin.globals.orders.pay-oprder')
            ->with('orders',$orders);
    }

    public function finished(){
        $orders = Order::all()->where('status_id','=',5);
        return view('admin.globals.orders.finished-order')
            ->with('orders',$orders);
    }

    public function canceled(){
        $orders = Order::all()->where('status_id','=',6);
        return view('admin.globals.orders.caceled-oprder')
            ->with('orders',$orders);
    }
}
