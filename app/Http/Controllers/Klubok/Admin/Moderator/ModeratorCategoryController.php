<?php

namespace App\Http\Controllers\Klubok\Admin\Moderator;

use App\Http\Controllers\Controller;
use App\Model\Categories;
use App\Model\Institution;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModeratorCategoryController extends Controller
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
        $categories = Institution::all()->find($org_id)->categories;
        return view('moderator.category.categories',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       dd($request->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = [
            'name' => $request->name,
            'slug' => random_int(1,1000) .$request->name . random_int(1,1000),
        ];
        Categories::create($data)->save();
        return back();
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
        dd(__METHOD__);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = ['name' => $request->name];
        $category = Categories::all()->find($request->id);
        $result = $category->fill($data)->update();
        if($result){
           return back()->with('msg',"Success");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

    }

    public function delete(Request $request){
        $result = Categories::all()->find($request->id)->delete();
        if($result){
            return back()->with('msg','success');
        }else{
            return back()->withErrors()->with('msg', 'error');
        }
}


}
