<?php

namespace App\Http\Controllers\Klubok\Customer;

use App\Http\Controllers\Controller;
use App\Model\Categories;
use App\Model\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all(['id','name','price']);
        $categories = Categories::all();
        return view('klubok.products',compact('products','categories'));

    }

    public function category($id){
        $products = Categories::find($id)->products;
        $categories = Categories::all();
        return view('klubok.products',compact('products','categories'));

        }


}
