<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Admin\PackageSoal;
use Facade\Ignition\Support\Packagist\Package;

class PackageSoalController extends Controller
{
    public function index(){

        $data['dataAll'] = PackageSoal::all();
        return view('admin.package-soal.index',$data);
    }

    public function add(Request $request){

        $id = $request->id;

        $create = PackageSoal::updateOrCreate([
            'id' => $id
        ],[
            'package' => $request->package,
            'deskripsi' => $request->deskripsi
        ]);
        
        if($create){
            return response()->json(["status" => 'success']);
        }else{
            return response()->json(["status" => 'fail']);
        }
    }

    public function first($id){
        return PackageSoal::find($id);
    }

    public function delete($id){
        $delete = PackageSoal::find($id);
        $delete->delete();

        
        if($delete){
            return response()->json(["status" => 'success']);
        }else{
            return response()->json(["status" => 'fail']);
        }
    }

}