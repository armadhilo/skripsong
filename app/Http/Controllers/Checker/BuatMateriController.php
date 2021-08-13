<?php

namespace App\Http\Controllers\Checker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

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

        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'deskripsi' => 'required',
            'materi' => 'mimes:pdf|max:3000',
        ]);

        if(empty($request->id)){
            $validator = Validator::make($request->all(), [
                'materi' => 'required|mimes:pdf|max:3000',
            ]);
        }
    
        if($validator->fails()) {
            return [
                'status' => 300,
                'message' => $validator->errors()->first()
            ];
        }

        $cek_materi = File::exists($request->materi);

        $create = Materi::updateOrCreate([
            'id' => $request->id
        ],[
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);
        
        if($create){
           
            if($cek_materi){
                $file = $request->file('materi');
                $nama_foto =  "MATERI"."-".time()."-".$file->getClientOriginalName();
                $file->move('berkas/materi',$nama_foto);
    
                $materi = Materi::find($create->id);
                $materi->materi = $nama_foto;
                $materi->save();
            }
           
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