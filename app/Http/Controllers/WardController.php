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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $constituencies = Constituency::all();
        return view('admin.create-ward')->with('constituencies', $constituencies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'ward_name' => 'required|max:30|min:3',
           'ward_constituency' => 'required|max:2'
        ]);
        $ward = Ward::create([
            'ward_name' => $request['ward_name'],
            'ward_constituency' => $request['ward_constituency']
        ]);

        if ($ward) {
            return redirect()->back()->with('message','success');
        } else {
            return redirect()->back()->with('message','error');
        }
    }
}
