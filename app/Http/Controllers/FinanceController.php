<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function goHome(){
        return view('finance.dashboard');
    }
}
