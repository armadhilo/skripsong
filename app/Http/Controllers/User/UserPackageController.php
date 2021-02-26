<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use file;

use App\Models\Admin\Soal;
use App\Models\Admin\Package;
use App\Models\Admin\Header;
use App\Models\Admin\Body;

class UserPackageController extends Controller
{
    public function index(){
        $mytime = Carbon::now();
        $datetime = $mytime->toDateTimeString();
        
        $data['list'] = Package::whereRaw('publish >= ?',[$datetime])->has('soal')->whereDoesntHave('header', function($query) {
            $query->where('user_id',session()->get('id'));
          })->get();
        
        return view('user.user-package.index',$data);
    }

    public function ambil_package(Request $request){

        $file = $request->file('img_license');
        $photoA =  time().$file->getClientOriginalName();
        $file->move('berkas/license',$photoA);

        $file = $request->file('img_ielp');
        $photoB =  time().$file->getClientOriginalName();
        $file->move('berkas/ielp',$photoB);

        $file = $request->file('img_kompetensi');
        $photoC =  time().$file->getClientOriginalName();
        $file->move('berkas/kompetensi',$photoC);

        $file = $request->file('img_ijazah');
        $photoD =  time().$file->getClientOriginalName();
        $file->move('berkas/ijazah',$photoD);

        $file = $request->file('img_pas_foto');
        $photoE =  time().$file->getClientOriginalName();
        $file->move('berkas/foto',$photoE);

        $file = $request->file('img_bukti_pembayaran');
        $photoF =  time().$file->getClientOriginalName();
        $file->move('berkas/bukti_pembayaran',$photoF);

        $file = $request->file('img_sertifikat_kesehatan');
        $photoG =  time().$file->getClientOriginalName();
        $file->move('berkas/sertifikat_kesehatan',$photoG);

        $file = $request->file('img_ktp');
        $photoH =  time().$file->getClientOriginalName();
        $file->move('berkas/ktp',$photoH);

        $count_soal = Soal::where('package_id',$request->id)->count();
        $soal = Soal::whereRaw('package_id = ? ORDER BY RAND()',$request->id)->get();

        $idHeader = Header::insertGetId([
            "user_id" => session()->get('id'),
            "package_id" => $request->id,
            "jumlahSoal" => $count_soal,
            "lokasi" => $request->lokasi,
            "profesi" => $request->profesi,
            "rating" => $request->rating,
            "img_license" => $photoA,
            "img_ielp" => $photoB,
            "img_kompetensi" => $photoC,
            "img_ijazah" => $photoD,
            "img_pas_foto" => $photoE,
            "img_bukti_pembayaran" => $photoF,
            "img_sertifikat_kesehatan" => $photoG,
            "img_ktp" => $photoH,
            "status" => 'N'
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