<?php

namespace App\Http\Controllers\Klubok\Customer;

use App\Http\Controllers\Controller;
use App\Model\CategoryModel;
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
        $categories = CategoryModel::all();
        return view('klubok.products',compact('products','categories'));

    }

    public function category($id){
        $categories = CategoryModel::all();
        $category = CategoryModel::all()->find($id);
        $products = Product::all()->where('category_id',$category->id);
        return view('klubok.products',compact('products','categories'));
    }


}
