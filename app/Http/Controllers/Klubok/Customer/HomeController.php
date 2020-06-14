<?php

namespace App\Http\Controllers\Klubok\Customer;

use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $user_id = Auth::user()->getAuthIdentifier();
        $orders = User::all()->find($user_id)->orders;

        // dump($orders_id);
        return view('home')
            ->with('orders',$orders)
            ->with('user',$user);
            ;
    }
}
