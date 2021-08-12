<?php

namespace App\Http\Controllers\Checker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Admin\Materi;

class BuatMateriController extends Controller
{
    public function index(){

        $data['list'] = Materi::all();

        return view('checker.buat-materi.index',$data);
    }

    public function first($id){

        return Materi::find($id);
    }

    public function add_update(Request $request){
        
        $create = Materi::updateOrCreate([
            'id' => $request->id
        ],[
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'materi' => $request->materi,
        ]);
        
        if($create){
            return response()->json(["status" => 'success']);
        }else{
            return response()->json(["status" => 'fail']);
        }
    }

    public function delete($id){
        $delete = Materi::find($id);
        $delete->delete();

        if($delete){
            return response()->json(["status" => 'success']);
        }else{
            return response()->json(["status" => 'fail']);
        }
    }
}