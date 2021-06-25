<?php

namespace App\Http\Controllers\Checker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Admin\Soal;
use App\Models\Admin\Package;
use App\Models\Admin\Header;
use App\Models\Admin\Body;

class SudahUjianController extends Controller
{
    public function index(){
        $data['list'] = Header::whereRaw("user_id = ? and status = 'Y'",[session()->get('id')])->with('package')->get();
        return view('checker.hasil-ujian.index',$data);
    }
}