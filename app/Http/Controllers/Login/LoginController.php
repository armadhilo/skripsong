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
                Session::put('id',$findEmail->id);
                Session::put('firstname',$findEmail->firstname);
                Session::put('lastname',$findEmail->lastname);
                Session::put('email',$findEmail->email);
                Session::put('password',$findEmail->password);
                session::put('role',$findEmail->role);

                $callback['status'] = 'success';

                if($findEmail->role == 'User'){
                    $callback['url'] = route('dashboard.user');
                }else{
                    $callback['url'] = route('dashboard.admin');
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

    public function logout(Request $request){

        $request->session()->forget('id');
        $request->session()->forget('firstname');
        $request->session()->forget('lastname');
        $request->session()->forget('email');
        $request->session()->forget('password');
        $request->session()->forget('role');
        $request->session()->flush();

        return redirect('/')->with('msg','Anda berhasil logout !');
    }
}

?>