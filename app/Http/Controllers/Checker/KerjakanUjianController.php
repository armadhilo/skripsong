<?php

namespace App\Http\Controllers\Checker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

use App\Models\Admin\Soal;
use App\Models\Admin\Package;
use App\Models\Admin\Header;
use App\Models\Admin\Body;

class KerjakanUjianController extends Controller
{
    public function index(){
        $mytime = Carbon::now();
        $datetime = $mytime->toDateTimeString();
        $date = $mytime->toDateString();

        $data['list'] = Header::whereRaw('user_id = ? and acc = ? and status <> ?',[session()->get('id'),'Y','Y'])->whereHas('package', function ($query) use ($date) {
            return $query->whereRaw('date(publish) = ? and user_id = ?',[$date, session()->get('id')]);
        })->get();
        
        return view('checker.kerjakan-ujian.index',$data);
    }

    public function kerjakan($id){

        $data['soal'] = Body::whereHas('header', function ($query) use ($id) {
            return $query->where('header_id',$id);
            })->get();

        $data['package'] = header::where('id',$id)->has('package')->first();

        return view('checker.kerjakan-ujian.kerjakan-ujian',$data);
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

        $countCorrect = Body::where('jawaban','correct')->whereHas('header', function($query) use ($data) {
            return $query->whereRaw('id = ? and user_id = ?',[$data,session()->get('id')]);
        })->count();

        $countWrong = Body::where('jawaban','wrong')->whereHas('header', function($query) use ($data) {
            return $query->whereRaw('id = ? and user_id = ?',[$data,session()->get('id')]);
        })->count();

        $header = header::whereRaw('id = ? and user_id = ?',[$data,session()->get('id')])->first();
        $header->status = 'Y';
        $header->jumlahBenar = $countCorrect;
        $header->jumlahSalah = $countWrong;

        $header->save();

        return response()->json(['status' => 'success']);

    }

}