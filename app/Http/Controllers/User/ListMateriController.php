<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Admin\Materi;

class ListMateriController extends Controller
{
    public function index(){

        $data['list'] = Materi::all();

        return view('user.pelajari-materi.index',$data);
    }

    public function detail($id){
        $data['list'] = Materi::find($id);
        return view('user.pelajari-materi.detail',$data);
    }
}