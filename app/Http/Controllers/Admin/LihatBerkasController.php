<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Admin\Header;

class LihatBerkasController extends Controller
{
    public function index(){

        $data['list'] = Header::whereNull('acc')->get();

        return view('admin.lihat-berkas.index',$data);
    }

    public function detail(Header $header){
        return view('admin.lihat-berkas.detail',compact('header'));
    }

    public function validasi(Request $request){
        $id = $request->id;
        $acc = $request->acc;

        $header = Header::find($id);
        $header->acc = $acc;
        $header->save();
        
        return response()->json(["status" => 'success']);
    }
}