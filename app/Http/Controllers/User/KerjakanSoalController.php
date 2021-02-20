<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

use App\Models\Admin\Soal;
use App\Models\Admin\Package;

class KerjakanSoalController extends Controller
{
    public function index(){
        $mytime = Carbon::now();
        $date = $mytime->toDateString();

        $data['list'] = Package::where('date(publish) = ?',[$date]);
        return view('user.kerjakan-soal.index',$data);
    }

    public function kerjakan(){
        return view('user.kerjakan-soal.kerjakan_soal');
    }
}