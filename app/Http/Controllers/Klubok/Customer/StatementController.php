<?php

namespace App\Http\Controllers\Klubok\Customer;

use App\Http\Controllers\Controller;
use App\Model\Institution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatementController extends Controller
{
    public function institution_statement(){
      return  view('klubok.form.institution-statment');
    }

    public function create(Request $request){

        $data = [
            'full_name' => $request->full_name,
            'name' => $request->name,
            'phone'=>$request->phone,
            'phone_reserve'=>$request->phone_reserve,
            'email' => $request->email,
            'address' => $request->city .',' . $request->street .' '. $request->building,
            'index' => $request->index,
            'site' => $request->website,
            'discription' => $request->discription,
            'is_order' => 1,
        ];

        $result = Institution::create($data);
        $answer = $result->save();
        if($answer){
            $data_isert = [
                'is_moderator'=> 1,
                'institutions_id' => $result->id,
            ];


            $user_id = Auth::user()->getAuthIdentifier();
            $user = \App\Model\User::all()->find($user_id);
            $insert = $user->fill($data_isert)->update();
            if($insert){
                return redirect()->route('customer.index.view.home')
                    ->with('msg', 'Успешное сохранение');
            }
        }

    }

    public function operator_statement(){
       return view('klubok.form.operator-statment');
    }


}
