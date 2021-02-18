<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

use App\Models\Admin\Package;

class ListPackageController extends Controller
{
    public function index(){

        $mytime = Carbon::now();
        $date = $mytime->toDateString();

        $data['belumRilis'] = Package::whereRaw('date(publish) < ? OR publish IS NULL',[$date])->get();
        $data['soalRilis'] = Package::whereRaw('date(publish) = ?',[$date])->get();
        $data['soalExpired'] = Package::whereRaw('date(publish) > ? AND publish IS NOT NULL',[$date])->get();

        return view('admin.list-package.index',$data);
    }
}