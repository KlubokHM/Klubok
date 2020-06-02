<?php

namespace App\Http\Controllers\Klubok\Customer;

use App\Http\Controllers\Controller;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all()
        ->take(6);
        return view('index')->with('products',$products);
    }

    public function product($id){
        $product = Product::all()->find($id);
        return view('product',compact('product'));

    }


}
