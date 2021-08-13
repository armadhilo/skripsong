<?php

namespace App\Http\Controllers\Checker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use Carbon\Carbon;

use App\Models\Admin\User;

class MasterUserController extends Controller
{
    public function index(){
        $data['list'] = User::where('role','User')->orderByDesc('id')->get();
        return view('checker.master-user.index',$data);
    }

    public function reset_password($id){
        $password = Str::random(8);

        $user = User::find($id);
        $user->password = $password;
        $user->save();

        return [
			'status' => 200, // SUCCESS 
			'message' => 'Data berhasil direset dengan password ' . $password,
		];	
    }
}