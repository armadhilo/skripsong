<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

use App\Models\Admin\Soal;
use App\Models\Admin\Package;
use App\Models\Admin\Header;
use App\Models\Admin\Body;

class UserPackageController extends Controller
{
    public function index(){
        $mytime = Carbon::now();
        $datetime = $mytime->toDateTimeString();
 
        $data['list'] = Package::whereRaw('publish > ?',[$datetime])->get();
        return view('user.user-package.index',$data);
    }

    public function ambil_package($id){

        $count_soal = Soal::where('package_id',$id)->count();
        $soal = Soal::whereRaw('package_id = ? ORDER BY RAND()',$id)->get();

        $idHeader = Header::insertGetId([
            "user_id" => session()->get('id'),
            "package_id" => $id,
            "jumlahSoal" => $count_soal,
        ]);

        foreach($soal as $item){ 

            $arrayJawaban = [$item->jawabanA, $item->jawabanB, $item->jawabanC, $item->jawabanD, $item->jawabanE];
            shuffle($arrayJawaban);

            Body::create([
                "header_id" => $idHeader,
                "type" => $item->type,
                "soal" => $item->soal,
                "jawabanA" => $arrayJawaban[0],
                "jawabanB" => $arrayJawaban[1],
                "jawabanC" => $arrayJawaban[2],
                "jawabanD" => $arrayJawaban[3],
                "jawabanE" => $arrayJawaban[4],
                "jawabanBenar" => "D",
                "TrueFalse" => $item->TrueFalse,
            ]);
        }
    
    }
}