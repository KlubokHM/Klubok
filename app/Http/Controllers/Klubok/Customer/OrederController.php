<?php

namespace App\Http\Controllers\Klubok\Customer;

use App\Mail\TestMail;
use App\Model\Order;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        $orderVal = $request->validate([
            'first_name'=>'required|string|max:50',
            'second_name'=>'string|nullable|max:50',
            'last_name'=>'required|string|max:50',
            'email'=>'required|email|max:55',
            'phone'=>'required|starts_with:+79,89|min:9|max:12',
            'city'=>'required|string|max:255',
            'street'=>'required|string|max:255',
            'building'=>'required',
            'room_number'=>'required',
            'index'=>'max:30'
        ]);


        $order_id = session('order_id');
        if(is_null($order_id)){
            return redirect()->route('customer.index.view.basket');
        }
        dump($request->all());
        $order = Order::all()->find($order_id);

        $user_id = Auth::user()->getAuthIdentifier();
        $finalPrice  = $order->getFullPrice();
        dump($finalPrice);
        $order ->final_price = $finalPrice;
        $order->user_id = $user_id;
        $order-> status = 1;
        $order-> status_id = 1;
        $data = $request->all();
        $result =$order->fill($data)->save();
        session()->forget('order_id');
        dump($result);
            if($result == true){
                $data = [
                    'name'=>$order->first_name,
                    'id' => $order->id
                ];
               // Mail::to($order->email)->send(new TestMail($data));
                return redirect()
                    ->route('customer.index.view.basket')
                    ->with(['msg'=>"ваш заказ с номером {$order->id} принят"])
                    ->withInput();

            }else{
                return redirect()
                    ->back()
                    ->with(['msg'=>"Что то пошло не так"])
                    ->withInput();
            }

        //dump($order->save());
    }
}
