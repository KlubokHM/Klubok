<?php

namespace App\Http\Controllers\Klubok\Customer;

use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:12','min:10'],
            'city'=>['required', 'string', 'max:30',],
            'avatar'=>['sometimes','image','mimes:jpg,jpeg,png,svg,bmp','max:5000'],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        $user = Auth::user();
        return view('klubok.customer.customer_edit',compact('user'));
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
        $data=$request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'phone' => ['required', 'string', 'max:12','min:10'],
                'city'=>['required', 'string', 'max:30',],
                'avatar'=>['sometimes','image','mimes:jpg,jpeg,png,svg,bmp','max:5000'],
            ]);

        if(request()->has('avatar')){
            $avataruploaded = request()->file('avatar');
            $avatarname = time() . '.' . $avataruploaded ->getClientOriginalExtension();
            $avatarpath = public_path('/image/');
            $avataruploaded->move($avatarpath,$avatarname);
            $data = [
                'name' =>$request->name,
                'email' =>$request->email,
                'phone' =>$request->phone,
                'city' =>$request->city,
                'avatar'=> '/image/'. $avatarname,
            ];
            $user=User::all()->find($id);
            $result = $user->fill($data)->update();
        }else{
            $user=User::all()->find($id);
            $data = $request->all();
            $result = $user->fill($data)->update();
        }


        if($result){
            return redirect()
                ->route('customer.index.view.myOrders')
                ->with(['success' => 'Страница отредактированна']);
        }else{
            return back()
                ->withErrors(['msg'=>'Упссс что то пошло не так, попробуйте снова'])
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
