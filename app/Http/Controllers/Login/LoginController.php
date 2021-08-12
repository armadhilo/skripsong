<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use App\Models\Login\Login;
use App\Models\Admin\User;

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
                }elseif($findEmail->role == 'Checker'){
                    $callback['url'] = route('dashboard.checker');
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
        
        $cek = Login::where('email',$request->email)->first();
        
        if($cek){
            return response()->json(["status" => 'fail']);
        }else{   
            $create = Login::create($request->all());

            if($create){
                return response()->json(["status" => 'success']);
            }else{
                return response()->json(["status" => 'fail']);
            }
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

    public function view_change_password(){
        return view('login.change_password');
    }

    public function change_password(request $request){
        $validator = Validator::make($request->all(), [
			'old_password' => 'required',
			'password' => 'required| min:6',
			'confirm_password' => 'required|same:password',
		]);
	
		if($validator->fails()) {
			return [
				'status' => 300,
				'message' => $validator->errors()->first()
			];
		}

		$user = User::where('id',session()->get('id'))->first();

		if ($request->old_password == $user['password']) {
			$user->password = $request->password;
			$user->save();

			return [
				'status' => 200,
				'message' => 'Password berhasil diganti'
			];

		}else{
			return [
				'status' => 300,
				'message' => 'Password lama anda salah, silahkan coba lagi'
			];
		}
		
		
    }
}

?>