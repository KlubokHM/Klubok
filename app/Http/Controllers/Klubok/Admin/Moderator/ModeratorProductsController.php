<?php

namespace App\Http\Controllers\Klubok\Admin\Moderator;

use App\Http\Controllers\Controller;
use App\Model\Categories;
use App\Model\Institution;
use App\Model\Product;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\Promise\all;

class ModeratorProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->getAuthIdentifier();
        $org_id = User::all()->find($user_id)->institutions_id;
        $products = Institution::all()->find($org_id)->products_inst;
        return view('moderator.products.products',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category_id = Categories::all()->where('name','=',$request->category)->first()->id;
        $org_id = Categories::all()->find($category_id)->institution->id;
        $data = [
            "institution_id" => $org_id,
            "categories_id" =>$category_id,
            "is_publish" => 1,
            "name" => $request->name,
            "sub_name" => "$request->subname",
            "slug" => random_int(1,1000) .$request->name . random_int(1,1000),
            "price" => $request->price,
            "description" => $request->description
        ];
        $result = Product::create($data)->update();
        if($result){
            return back()->with("msg","Success");
        }else{
            dd('error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!is_null($request->category)){
            $category_id = Categories::all()->where('name','=',$request->category)->first()->id;
            $data = [
                "institution_id" => $request->org_id,
                "categories_id" =>$category_id,
                "is_publish" => 1,
                "name" => $request->name,
                "sub_name" => "$request->subname",
                "slug" => random_int(1,1000) .$request->name . random_int(1,1000),
                "price" => $request->price,
                "description" => $request->description
            ];
            $result = Product::all()->find($request->id)->fill($data)->update();
            if($result){
                return back()->with("msg","Success");
            }else{
                dd('error');
            }
        }else
        {
            return back()->withErrors('msg',"Errors")
                ->withInput();

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
