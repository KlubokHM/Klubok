<?php

namespace App\Http\Controllers\Klubok\Admin\Globals;

use App\Http\Controllers\Controller;
use App\Model\Institution;
use App\Model\User;
use foo\bar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\In;

class StatementController extends Controller
{
    public function index(){
        $i_statements = Institution::all()->where('is_order', '=', 1);
        $indicator = null;
        return  view('admin.globals.statements.statements',compact('i_statements','indicator'));
    }

    public function disable_statments(){
        $i_statements = DB::table('institutions')->where([
                ['is_order', '=', 0],
                ['isPublish', '=', 0],
        ]
        )->get();
        $indicator = 1;

        return view('admin.globals.statements.statements',compact('i_statements','indicator'));
    }

    public function activation_institution($id){
        $org = Institution::all()->find($id);
        $data =[
            'isPublish' => 1,
            'is_order' => 0,
        ];
        $data_user=['is_moderator' => 1];
        $user = User::all()->where('institutions_id', '=',$id)->first();
        $result_user = $user->fill($data_user)->update();
        $user_name = $user->name;
        $user_email = $user->email;
        $data_mail =[
            'user_name' => $user_name,
            'full_name' => $org->full_name,
        ];
        $result = $org->fill($data)->update();
        if($result){
            //отправка email пользователю  о размещении организации на площадке
            $i_statements = Institution::all()->where('is_order', '=', 1);
            $indicator = null;
            return  view('admin.globals.statements.statements',compact('i_statements','indicator'));
        }
        else{
            return back()
                ->withErrors()
                ->withInput();
        }

    }

    public function remove_statment($id){
        $org = Institution::all()->find($id);
        $data = [
            'isPublish' => 0,
            'is_order' => 0,
        ];
        $result = $org->fill($data)->update();
        //отправка email пользователю о отказе в размещении организации
        $result = $org->fill($data)->update();
        if($result){
            //отправка email пользователю  о размещении организации на площадке
            $i_statements = Institution::all()->where('is_order', '=', 1);
            $indicator = null;
            return  view('admin.globals.statements.statements',compact('i_statements','indicator'));
        }
        else{
            return back()
                ->withErrors('msg', 'Ошибка')
                ->withInput();
        }
    }

}
