<?php

namespace App\Http\Controllers\Checker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use App\Models\Admin\Header;

class LihatBerkasController extends Controller
{
    public function index(){

        $data['list'] = Header::all()->sortByDesc('acc');

        return view('checker.lihat-berkas.index',$data);
    }

    public function detail($id){
        $data['data'] = Header::where('id',$id)->with('user','package')->first();
        return view('checker.lihat-berkas.detail',$data);
    }

    public function verifikasi_berhasil(request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'img_nep' => 'required|mimes:jpeg,jpg,png|max:1000',
            'img_medex' => 'required|mimes:jpeg,jpg,png|max:1000',
        ]);
    
        if($validator->fails()) {
            return [
                'status' => 300,
                'message' => $validator->errors()->first()
            ];
        }

        $file = $request->file('img_nep');
        $photoA =  $request->id."-".time().$file->getClientOriginalName();
        $file->move('berkas/nep',$photoA);

        $file = $request->file('img_medex');
        $photoB =  $request->id."-".time().$file->getClientOriginalName();
        $file->move('berkas/medex',$photoB);

        $header = Header::find($request->id);
        $header->img_nep = $photoA;
        $header->img_medex = $photoB;
        $header->acc = 'Y';
        $header->save();

        return response()->json(['status' => 'success']);
    }

    public function verifikasi_gagal(Request $request){
        $id = $request->id;
        $acc = $request->acc;

        $header = Header::find($id);
        $header->acc = $acc;
        $header->save();
        
        return response()->json(["status" => 'success']);
    }
}