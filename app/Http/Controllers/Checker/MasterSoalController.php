<?php

namespace App\Http\Controllers\Checker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Admin\Soal;
use App\Models\Admin\Package;

class MasterSoalController extends Controller
{
    public function index(){

        $data['PackageSoal'] = Package::all();

        return view('checker.master-soal.pilih_package',$data);
    }

    public function goPackage($id){

        $packageSoal = Package::find($id);

        $data['PackageSoal'] = $packageSoal;
        $data['PilihanGanda'] = Soal::where(['package_id' => $packageSoal->id, 'type' => 1])->get();
        $data['TrueFalse'] = Soal::where(['package_id' => $packageSoal->id, 'type' => 2])->get();

        return view('checker.master-soal.index',$data);
    }

    public function goCreate($id, $type){

        if($type == 'create'){
            $data['data'] = Package::find($id);
            $data['type'] = 'create';
        }else{
            $data['data'] = Soal::find($id);
            $data['type'] = 'edit';
        }

        return view('checker.master-soal.create_soal',$data);
    }

    public function addSoal(Request $request){

        $TipeSoal = $request->type;

        if($TipeSoal == 1){
            // $create = Soal::create($request->except(['TrueFalse']));
            
            $create = Soal::updateOrCreate([
                'id' => $request->id
            ],[
                'package_id' => $request->package_id,
                'type' => $request->type,
                'soal' => $request->soal,
                'jawabanA' => $request->jawabanA,
                'jawabanB' => $request->jawabanB,
                'jawabanC' => $request->jawabanC,
                'jawabanD' => $request->jawabanD,
                'jawabanE' => $request->jawabanE,
                'jawabanBenar' => $request->jawabanBenar,
            ]);
        }else{
            // $create = Soal::create($request->only(['type','package_id','soal','TrueFalse']));

            $create = Soal::updateOrCreate([
                'id' => $request->id
            ],[
                'package_id' => $request->package_id,
                'type' => $request->type,
                'soal' => $request->soal,
                'TrueFalse' => $request->TrueFalse,
            ]);
        }
        
        if($create){
            return response()->json(["status" => 'success']);
        }else{
            return response()->json(["status" => 'fail']);
        }
    }

    public function editSoal($id){

        $data['soal'] = Soal::find($id);

        return view('checker.master-soal.create_soal',$data);
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