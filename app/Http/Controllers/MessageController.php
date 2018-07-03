<?php

namespace App\Http\Controllers;

use App\Constituency;
use App\Message;
use App\Project;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messagecount = Message::count();
        $projectcount = Project::count();
        $usercount = User::count();
        $constituencycount = Constituency::count();
        $messages = Message::all();
        return view('admin.messages',compact('messages','messagecount','projectcount','usercount','constituencycount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $result = "";
        $constituencies = DB::table('constituencies')->get();
        return view('contact',compact('constituencies','result'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $message = Message::create([
            'sender_first_name' => $request['sender_first_name'],
            'sender_last_name' => $request['sender_last_name'],
            'email' => $request['email'],
            'constituency' => $request['constituency'],
            'message' => $request['message']
        ]);

        $result = "";

        if ($message){
            $result = "success";
        } else {
            $result = "error";
        }

        $constituencies = DB::table('constituencies')->get();

        return view('contact',compact('result','constituencies'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = Message::find($id);
        $message->delete();
        return back();
    }
}
