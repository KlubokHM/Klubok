<?php

namespace App\Http\Controllers\Klubok\Admin\Globals;

use App\Http\Controllers\Controller;
use App\Model\Institution;
use Illuminate\Http\Request;

class IstitutionController extends Controller
{
    public function index(){
        $institutions = Institution::all();
        return view('admin.globals.institution.institution',compact('institutions'));
    }
}
