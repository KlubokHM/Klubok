<?php

namespace App\Http\Controllers\Klubok\Customer;

use App\Http\Controllers\Controller;
use App\Model\Order;
use Illuminate\Support\Facades\DB;


class BasketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order_id = session('order_id');
        if(!is_null($order_id)){
            $order = Order::all()->find($order_id);
        }
        //dd($order);
        return view('basket',compact('order'));
    }

    public function add($productId){

        $order_id = session('order_id');
            if(is_null($order_id)){
                $order=Order::create()->id;
                session(['order_id' => $order]);
            }else{
                $order = Order::all()->find($order_id);
            }
            $order->products()->attach($productId);
            return view('basket',compact('order'));
    }

    public function remove($product){

    }

}
