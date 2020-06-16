<?php

namespace App\Http\Controllers\Klubok\Admin\Moderator;

use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModeratorController extends Controller
{
    public function index(){
        $user_id = Auth::user()->getAuthIdentifier();
        $org_id = User::all()->find($user_id)->institutions_id;

        return view('moderator.index');
    }

}
