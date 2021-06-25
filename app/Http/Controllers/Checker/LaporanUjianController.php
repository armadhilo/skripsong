<?php

namespace App\Http\Controllers\Checker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use Carbon\Carbon;
use Barryvdh\DomPDF\Facade as PDF;

use App\Models\Admin\Soal;
use App\Models\Admin\Package;
use App\Models\Admin\Header;
use App\Models\Admin\Body;

class LaporanUjianController extends Controller
{

    public function index(){
        $mytime = Carbon::now();
        $datetime = $mytime->toDateTimeString();

        $data['list'] = Package::where('publish','<=',$datetime)->orderBy('publish','desc')->get();
        return view('checker.laporan-ujian.index',$data);
    }

    public function detail($package_id){
        $data['data'] = Package::find($package_id);
        $data['list'] = Header::whereRaw("status = ? and package_id = ?",["Y",$package_id])->with('user')->get();
        return view('checker.laporan-ujian.detail',$data);
    }

    public function cetak_pdf($package_id){

        $data['data'] = Package::find($package_id);
        $data['list'] = Header::whereRaw("status = ? and package_id = ?",["Y",$package_id])->with('user')->get();

        $pdf = PDF::loadView('checker.laporan-ujian.pdf', $data)->setPaper('a4', 'portrait');
        return $pdf->download('laporan '.$data['data']->package.'.pdf');
    }
}