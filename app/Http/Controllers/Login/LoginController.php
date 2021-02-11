<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use App\Models\Login\Login;

class LoginController extends Controller
{

	public function index(){
		return view('login.login');
	}

    public function actionLogin(Request $request){
        $email = $request->email;
        $password = $request->password;

        $findEmail = Login::where('email','=',$email)->first(); 

        if($findEmail){
            $findPassword = Login::where('password','=',$password)->first();

            if($findPassword){
                Session::put('firstname',$findEmail->firstname);
                Session::put('lastname',$findEmail->lastname);
                Session::put('email',$findEmail->email);
                Session::put('password',$findEmail->password);

                $callback['status'] = 'success';

                if($findEmail->role == 'User'){
                    $callback['url'] = "{!! route('user.dashboard') !!}";
                }else{
                    $callback['url'] = "{!! route('admin.dashboard') !!}";
                }

                $callback['status'] = 'success';

            }else{
                $callback['status'] = 'fail';
            }
        }else{
            $callback['status'] = 'fail';
        }

        return response()->json($callback);
    }

    public function actionRegister(Request $request){
        
        $create = Login::create($request->all());

        if($create){
            return response()->json(["status" => 'success']);
        }else{
            return response()->json(["status" => 'fail']);
        }
    }
}

?>