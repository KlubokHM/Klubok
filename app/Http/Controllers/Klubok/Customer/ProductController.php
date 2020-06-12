<?php

namespace App\Http\Controllers\Klubok\Customer;

use App\Http\Controllers\Controller;
use App\Model\Categories;
use App\Model\Institution;
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
        $institutions = Institution::all();

        return view('klubok.products',compact('products','institutions'));

    }

    public function category($id){
        $institutions = Institution::all();
        $products = Categories::all()->find($id)->products;
        return view('klubok.products',compact('products','institutions'));

        }

        public function institution($id){
        $products = Institution::all()->find($id)->products_inst;
        $institutions = Institution::all();
            return view('klubok.products',compact('products','institutions'));
    }



}
