<?php

namespace App\Http\Controllers\Checker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use Carbon\Carbon;
use file;

use App\Models\Admin\Soal;
use App\Models\Admin\Package;
use App\Models\Admin\Header;
use App\Models\Admin\Body;


class DaftarUjianController extends Controller
{
    public function index(){
        $mytime = Carbon::now();
        $datetime = $mytime->toDateTimeString();
        
        $data['list'] = Package::whereRaw('publish >= ?',[$datetime])->has('soal')->whereDoesntHave('header', function($query) {
            $query->where('user_id',session()->get('id'));
          })->get();
        
        return view('checker.daftar-ujian.index',$data);
    }

    public function ambil_package(Request $request){

        $validator = Validator::make($request->all(), [
            'img_nep' => 'required|mimes:jpeg,jpg,png|size:1000',
            'img_medex' => 'required|mimes:jpeg,jpg,png|size:1000',
        ]);

        if($validator->fails()) {
            return [
                'status' => 300,
                'message' => $validator->errors()->first()
            ];
        }

        $file = $request->file('img_nep');
        $photoA =  time().$file->getClientOriginalName();
        $file->move('berkas/nep',$photoA);

        $file = $request->file('img_medex');
        $photoB =  time().$file->getClientOriginalName();
        $file->move('berkas/medex',$photoB);

        $count_soal = Soal::where('package_id',$request->id)->count();
        $soal = Soal::whereRaw('package_id = ? ORDER BY RAND()',$request->id)->get();

        $idHeader = Header::insertGetId([
            "user_id" => session()->get('id'),
            "package_id" => $request->id,
            "jumlahSoal" => $count_soal,
            "lokasi" => $request->lokasi,
            "profesi" => $request->profesi,
            "rating" => $request->rating,
            "img_nep" => $photoA,
            "img_medex" => $photoB,
            "status" => 'N',
            "acc" => 'Y'
        ]);

        foreach($soal as $item){ 

            $arrayJawaban = [[$item->jawabanA,'A'],[$item->jawabanB,'B'],[$item->jawabanC,'C'],[$item->jawabanD,'D'],[$item->jawabanE,'E']];
            shuffle($arrayJawaban);

            $arrayAbjad = ['A','B','C','D','E'];

            if($item->type == '1'){
                foreach($arrayJawaban as $key => $value){
                    if($item->jawabanBenar == $arrayJawaban[$key][1]){
                        $jawabanBenar = $arrayAbjad[$key];
                    }
                }
            }else{
                $jawabanBenar = NULL;
            }

            Body::create([
                "header_id" => $idHeader,
                "type" => $item->type,
                "soal" => $item->soal,
                "jawabanA" => $arrayJawaban[0][0],
                "jawabanB" => $arrayJawaban[1][0],
                "jawabanC" => $arrayJawaban[2][0],
                "jawabanD" => $arrayJawaban[3][0],
                "jawabanE" => $arrayJawaban[4][0],
                "jawabanBenar" => $jawabanBenar,
                "TrueFalse" => $item->TrueFalse,
            ]);
        }

       return response()->json(['status' => 'success']);
    }


}