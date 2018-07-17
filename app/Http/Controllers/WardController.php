<?php

namespace App\Http\Controllers;

use App\Constituency;
use App\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WardController extends Controller
{
    public function all(){
        return Ward::all();
    }

    public function constituencies(){
        return Constituency::all();
    }
    public function getByConstituency($id){
        return Ward::where('ward_constituency', $id)->get();
    }
}
