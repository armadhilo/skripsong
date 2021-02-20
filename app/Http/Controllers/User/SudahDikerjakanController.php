<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SudahDikerjakanController extends Controller
{
    public function index(){
        return view('user.sudah-dikerjakan.index');
    }
}