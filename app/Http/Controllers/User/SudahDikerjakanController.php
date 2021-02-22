<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Admin\Soal;
use App\Models\Admin\Package;
use App\Models\Admin\Header;
use App\Models\Admin\Body;

class SudahDikerjakanController extends Controller
{
    public function index(){

        $data['list'] = Header::whereRaw("user_id = ? and status = 'Y'",[session()->get('id')])->with('package')->get();
        return view('user.sudah-dikerjakan.index',$data);
    }
}