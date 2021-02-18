<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

use App\Models\Admin\PackageSoal;

class ListPackageController extends Controller
{
    public function index(){

        $mytime = Carbon::now();
        $datetime = $mytime->toDateTimeString();

        $data['belumRilis'] = PackageSoal::where('publish','<=',$datetime);
        // $data['soalRilis'] = PackageSoal::where('publish',);

        return view('admin.list-package.index',$data);
    }
}