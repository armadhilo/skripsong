<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\MasterSoal\MasterSoal;

class MasterSoalController extends Controller
{
    public function index(){
        return view('master_soal.master_soal');
    }

//     TipeSoal
// soal
// TrueFalse
// jawabanA
// jawabanB
// jawabanC
// jawabanD
// jawabanE
// jawabanBenar

    public function addSoal(Request $request){

        $TipeSoal = $request->tipeSoal;

        if($TipeSoal == 1){
            $create = MasterSoal::create([
                "type" => $TipeSoal,
                "packageSoal" => $request->packageSoal,
                "soal" => $request->soal,
                "jawabanA" => $request->jawabanA,
                "jawabanB" => $request->jawabanB,
                "jawabanC" => $request->jawabanC,
                "jawabanD" => $request->jawabanD,
                "jawabanE" => $request->jawabanE,
                "jawabanBenar" => $request->jawabanBenar,
            ]);
        }else{
            $create = MasterSoal::create([
                "type" => $TipeSoal,
                "packageSoal" => $request->packageSoal,
                "soal" => $request->soal,
                "TrueFalse" => $request->TrueFalse,
            ]);
        }
        
        if($create){
            return response()->json(["status" => 'success']);
        }else{
            return response()->json(["status" => 'fail']);
        }
    }


}