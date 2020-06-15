<?php

namespace App\Http\Controllers\Klubok\Admin\Globals;

use App\Http\Controllers\Controller;
use App\Mail\DisableProduct;
use App\Mail\TestMail;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProductsController extends Controller
{
    public function index(){
       $products = Product::all();
       return view('admin.globals.products.all-product',compact('products'))
           ->with('msg', 'Все Товары');
    }

    public function is_publish(){
        $products = Product::all()->where('is_publish' ,'=', 1);
        return view('admin.globals.products.all-product')
            ->with('products',$products);
    }

    public function is_not_publish(){
        $products = Product::all()->where('is_publish' ,'=', 0);
        return view('admin.globals.products.all-product')
            ->with('products',$products);
    }


    public function edit($product_id){
        $product = Product::all()->find($product_id);
        return view('admin.globals.products.product-disable',compact('product'));
    }

    public function update(Request $request,$id){
        $product = Product::all()->find($id);

        $data_product = [
          'is_publish'=> 0,
        ];

        $result = $product->fill($data_product)->update();
        if($result){
            $data = [
                'text'=>$request->description,
                'id' => $product->id,
                'name'=>$product->name,
                'price'=>$product->price,
            ];
            $email = $product->institution->email;
            Mail::to($email)->send(new DisableProduct($data));
            return redirect()->route('admin.index.view.products.all');
        }else{
            return back()->withErrors('msg','ooe')->withInput();
        }


        }
}
