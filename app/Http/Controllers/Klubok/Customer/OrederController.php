<?php

namespace App\Http\Controllers\Klubok\Customer;

use App\Model\Order;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

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

    public function order(Request $request)
    {
        $order_id = session('order_id');
        if(is_null($order_id)){
            return redirect()->route('customer.index.view.basket');
        }
        dump($request->all());
        $order = Order::all()->find($order_id);
        $user = Auth::user();
        $user_id = $user->id;
        $order-> user_id = $user_id;
        $order-> status = 1;
        $data = $request->all();
        $result =$order->fill($data)->save();
        session()->forget('order_id');
        dump($result);
            if($result == true){
                return redirect()
                    ->route('customer.index.view.basket')
                    ->with(['msg'=>"ваш заказ с номером {$order->id} принят"])
                    ->withInput();

            }else{
                return redirect()
                    ->route('customer.index.view.order.form')
                    ->with(['msg'=>"Что то пошло не так"])
                    ->withInput();
            }

        //dump($order->save());
    }
}
