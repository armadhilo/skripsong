<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Header;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LihatBerkasController extends Controller
{
    public function index(){

        $data['list'] = Header::all();

        return view('admin.lihat-berkas.index',$data);
    }

    public function detail(Header $header){
        return view('admin.lihat-berkas.detail',compact('header'));
    }
}