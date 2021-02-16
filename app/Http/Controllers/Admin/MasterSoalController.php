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