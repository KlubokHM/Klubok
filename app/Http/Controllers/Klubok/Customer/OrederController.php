<?php

namespace App\Http\Controllers\Klubok\Customer;

use App\Model\Order;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class OrederController extends Controller
{
    public function index(){
        $orderId = session('order_id');

        if(is_null($orderId)){
            return redirect()->route('customer.index.view.basket');
        }else{
            $order = Order::find($orderId);
            return view('klubok.form.order_form',compact('order'));

        }


    }
}
