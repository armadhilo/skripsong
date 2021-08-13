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

class MasterCheckerController extends Controller
{
    public function index(){
        $data['list'] = User::where('role','Çhecker')->orderByDesc('id')->get();
        return view('checker.master-checker.index',$data);
    }

    public function detail($id){
        return User::find($id);
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

    public function store_update(Request $request){
        $validator = Validator::make($request->all(), [
			'firstname' => 'required',
			'lastname' => 'required',
			'email' => 'required',
		]);
	
		if($validator->fails()) {
			return [
				'status' => 300,
				'message' => $validator->errors()->first()
			];
		}

        $password = Str::random(8);
				
		$create = User::updateOrCreate(['id' => $request->id],[
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'role' => 'Checker',
        ] );

        if(empty($request->id)){
            $user = User::find($create->id);
            $user->password = $password;
            $user->save();

            return [
                'status' => 200, // SUCCESS 
                'message' => 'Data berhasil disimpan dengan password ' . $password,
            ];	
        }

        return [
            'status' => 200,
            'message' => 'Data berhasil disimpan'
        ];

		
    }

    public function delete($id){
        $delete = User::find($id);
        $delete->delete();

        return [
            'status' => 200,
            'message' => 'Data berhasil dihapus'
        ];
    }
}