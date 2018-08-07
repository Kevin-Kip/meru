<?php

namespace App\Http\Controllers;

use App\Constituency;
use Illuminate\Http\Request;

class ConstituencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create-constituency');
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
           'constituency_name' => 'required|max:20|min:3'
        ]);
        $constituency = Constituency::create([
           'constituency_name' => $request['constituency_name']
        ]);

        if ($constituency) {
            return redirect()->back()->with('message','success');
        } else {
            return redirect()->back()->with('message','error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $constituency = Constituency::where('constituency_id',$id)->first();
        return view('admin.edit-constituency',compact('constituency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'constituency_name' => 'required|max:20|min:3'
        ]);

        if (Constituency::where('constituency_id',$id)->update($request->except('_token','submit'))){
            return redirect()->back()->with('message',"success");
        } else {
            return redirect()->back()->with('message',"error");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $constituency = Constituency::where('constituency_id', $id);
        return $constituency->delete() ? redirect()->back()->with('message',"success") : redirect()->back()->with('message', "error");
    }
}
