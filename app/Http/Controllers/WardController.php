<?php

namespace App\Http\Controllers;

use App\Constituency;
use App\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WardController extends Controller
{
    public function all($id){
        return Ward::all();
    }

    public function constituencies(){
        return Constituency::all();
    }

    public function getById($id){
        return DB::table('wards')->where('constituency_id','=',$id)->get();
    }
}
