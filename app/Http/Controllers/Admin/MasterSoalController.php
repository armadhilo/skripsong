<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Admin\Soal;
use App\Models\Admin\Package;

class MasterSoalController extends Controller
{
    public function index(){

        $data['PackageSoal'] = Package::all();

        return view('admin.master-soal.pilih_package',$data);
    }

    public function goPackage($id){

        $packageSoal = Package::find($id);

        $data['PackageSoal'] = $packageSoal;
        $data['PilihanGanda'] = Soal::where(['package_id' => $packageSoal->id, 'type' => 1])->get();
        $data['TrueFalse'] = Soal::where(['package_id' => $packageSoal->id, 'type' => 2])->get();

        return view('admin.master-soal.index',$data);
    }

    public function goCreate($id, $type){

        if($type == 'create'){
            $data['data'] = Package::find($id);
            $data['type'] = 'create';
        }else{
            $data['data'] = Soal::find($id);
            $data['type'] = 'edit';
        }

        return view('admin.master-soal.create_soal',$data);
    }

    public function addSoal(Request $request){

        $TipeSoal = $request->type;

        if($TipeSoal == 1){
            $create = Soal::create($request->except(['TrueFalse']));
        }else{
            $create = Soal::create($request->only(['type','package_id','soal','TrueFalse']));
        }
        
        if($create){
            return response()->json(["status" => 'success']);
        }else{
            return response()->json(["status" => 'fail']);
        }
    }

    public function editSoal($id){

        $data['soal'] = Soal::find($id);

        return view('admin.master-soal.create_soal',$data);
    }

    public function delete($id){
        $delete = Soal::find($id);
        $delete->delete();

        
        if($delete){
            return response()->json(["status" => 'success']);
        }else{
            return response()->json(["status" => 'fail']);
        }
    }


}