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
        if(is_null($order_id)){
            $order = Order::create();
            dump($order->id);
            session(['order_id' => $order->id]);
        }else{
            $order = Order::all()->find($order_id);
        }
        return view('basket',compact('order'));
    }

    public function add($productId){

        $order_id = session('order_id');
            if(is_null($order_id)){
                $order = Order::create();
                session(['order_id' => $order->id]);
            }else{
                $order = Order::all()->find($order_id);
            }
            if($order->products->contains($productId)){
                $pivotRow = $order->products()->where('product_id',$productId)->first()->pivot;
                $pivotRow->count++;
                $pivotRow->update();
            }else{
                $order->products()->attach($productId);
            }

            return redirect()->route('customer.index.view.basket');

    }

    public function remove($productId){
        $order_id = session('order_id');
        if(is_null($order_id)){
            return redirect()->route('customer.index.view.basket');
        }
        $order = Order::all()->find($order_id);
        if($order->products->contains($productId)){
            $pivotRow = $order->products()->where('product_id',$productId)->first()->pivot;
            if ($pivotRow->count == 1){
                $order->products()->detach($productId);
            }
            else{
                $pivotRow->count--;
                $pivotRow->update();
            }
        }

        return redirect()->route('customer.index.view.basket');

    }

}
