<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Admin\Soal;
use App\Models\Admin\Package;
use App\Models\Admin\Header;
use App\Models\Admin\Body;

class HasilController extends Controller
{
    public function index(){
        $data['list'] = Header::where("status","Y")->with('package')->get();
        return view('admin.hasil.index',$data);
    }
}