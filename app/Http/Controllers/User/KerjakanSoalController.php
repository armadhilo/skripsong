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

class KerjakanSoalController extends Controller
{
    public function index(){
        $mytime = Carbon::now();
        $datetime = $mytime->toDateTimeString();
        $date = $mytime->toDateString();

        $data['list'] = Header::whereRaw('user_id = ? and acc = ? and status <> ?',[session()->get('id'),'Y','Y'])->whereHas('package', function ($query) use ($datetime, $date) {
            return $query->whereRaw('publish >= ? and user_id = ? and date(publish) = ? ',[$datetime, session()->get('id'),$date]);
        })->get();
        
        return view('user.kerjakan-soal.index',$data);
    }

    public function kerjakan($id){

        $data['soal'] = Body::whereHas('header', function ($query) use ($id) {
            return $query->where('header_id',$id);
            })->get();

        $data['package'] = header::where('id',$id)->has('package')->first();

        return view('user.kerjakan-soal.kerjakan_soal',$data);
    }

    public function jawab(Request $request){
        $data = explode("-", $request->data);
        $jawaban = $data[0];
        $body_id = $data[1];
    
        $body = Body::find($body_id);

        if($jawaban == 'True' || $jawaban == 'False'){
            $jawabanBenar = $body->TrueFalse;
        }else{
            $jawabanBenar = $body->jawabanBenar;
        }
        
        if($jawabanBenar == $jawaban){
            $body->jawaban = 'correct';
        }else{
            $body->jawaban = 'wrong';
        }

        $body->jawabanUser = $jawaban;
        $body->save();
    }

    public function finish(Request $request){
        $data = $request->data;

        $countCorrect = header::whereRaw('id = ? and user_id = ?',[$data,session()->get('id')])->whereHas('body', function ($query) {
            return $query->where('jawaban','correct');
            })->count();

        $countWrong = header::whereRaw('id = ? and user_id = ?',[$data,session()->get('id')])->whereHas('body', function ($query) {
            return $query->where('jawaban','wrong');
            })->count();

        $header = header::whereRaw('id = ? and user_id = ?',[$data,session()->get('id')])->first();
        $header->status = 'Y';
        $header->jumlahBenar = $countCorrect;
        $header->jumlahSalah = $countWrong;

        $header->save();

        return response()->json(['status' => 'success']);

    }

}