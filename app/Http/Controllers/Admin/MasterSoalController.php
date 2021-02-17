<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Admin\MasterSoal;
use App\Models\Admin\PackageSoal;

class MasterSoalController extends Controller
{
    public function index(){

        $data['PackageSoal'] = PackageSoal::all();

        return view('admin.master-soal.pilih_package',$data);
    }

    public function goPackage($id){

        $packageSoal = PackageSoal::find($id);

        $data['PackageSoal'] = $packageSoal;
        $data['PilihanGanda'] = MasterSoal::where(['packageSoal' => $packageSoal->package, 'type' => 1])->get();
        $data['TrueFalse'] = MasterSoal::where(['packageSoal' => $packageSoal->package, 'type' => 2])->get();

        return view('admin.master-soal.index',$data);
    }

    public function goCreate($id){
        $data['PackageSoal'] = PackageSoal::find($id);

        return view('admin.master-soal.create_soal',$data);
    }

    public function addSoal(Request $request){

        $TipeSoal = $request->tipeSoal;

        if($TipeSoal == 1){
            $create = MasterSoal::create($request->except(['TrueFalse']));
        }else{
            $create = MasterSoal::create($request->only(['type','packageSoal','soal','TrueFalse']));
        }
        
        if($create){
            return response()->json(["status" => 'success']);
        }else{
            return response()->json(["status" => 'fail']);
        }
    }


}