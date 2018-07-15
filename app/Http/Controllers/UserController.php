<?php

namespace App\Http\Controllers;

use App\Constituency;
use App\Message;
use App\Project;
use App\User;
use App\Ward;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    use AuthenticatesUsers;
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
        $users = User::paginate(10);
        return view('admin.people', compact('messagecount','projectcount','usercount','constituencycount','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.login');
    }

    public function loguserin(Request $request){
        if(Auth::attempt([
            'email' => $request['email'],
            'password' => $request['password']
        ], false)){
            if (Auth::user()->role = "Admin"){
                return redirect()->route('admin.home')->with('user',Auth::user());
            } else {
                return redirect()->route('users.dashboard');
            }
        }
    }

    public function logOut(){
        if(Auth::logout()) {
            return Redirect::route('projects.home');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function newUser(){
        $message = "";
        $constituencies = Constituency::all();
        $wards = Ward::all();
        return view('admin.create-user',compact('message','constituencies','wards'));
    }

    public function store(Request $request)
    {
        $user = User::create([
            'user_email' => $request['email'],
            'user_password' => Hash::make($request['password']),
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'phone' => $request['phone'],
            'user_constituency' => $request['constituency'],
            'user_role' => $request['role']
        ]);

        if ($user){
            return redirect()->back()->with('message',"success");
        } else {
            return redirect()->back()->with('message',"error");
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
        $users = DB::table('users')->where('user_id','=',$id)->get();
        $constituencies = Constituency::all();
        $contractors = DB::table('users')->where('user_role','=',"Contractor")->get();
        $wards = Ward::all();
        return view('admin.edit-user', compact('users','constituencies','contractors','wards'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id)
    {
        if (User::find($user_id)->update($request->all())){
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
        $user = User::find($id);
        if ($user->delete()){
            return redirect()->back()->with('message', "success");
        } else {
            return redirect()->back()->with('message', "error");
        }
    }
}
