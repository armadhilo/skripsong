<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use Carbon\Carbon;

use App\Models\Admin\Package;

class PublishPackageController extends Controller
{
    public function index(){

        $mytime = Carbon::now();
        $date = $mytime->toDateString();

        $data['listPublish'] = Package::whereRaw('publish IS NOT NULL and date(publish) >= ?',[$date])->has('soal')->get();
        $data['dataPackage'] = Package::whereRaw('publish IS NULL')->has('soal')->get();

        return view('admin.publish-soal.index',$data);
    }

    public function publish(Request $request){
        $id = $request->id;

        $package = Package::find($id);
        $package->publish = $request->publish;
        $package->durasi = $request->durasi;
        $package->save();

        if(!$package->save()){
            return response()->json(['status' => 'fail']);
        }else{
            return response()->json(['status' => 'success']);
        }
    }

    public function first($id){
        return Package::find($id);
    }

    public function delete($id){
        $package = Package::find($id);
        $package->publish = NULL ;
        $package->durasi = NULL ;
        $package->save();

        if(!$package->save()){
            return response()->json(['status' => 'fail']);
        }else{
            return response()->json(['status' => 'success']);
        }
    }
}