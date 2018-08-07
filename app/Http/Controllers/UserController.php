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
        $this->validate($request,[
            'email'=>'required|max:30|min:10',
            'password'=>'required|min:6|max:12',
            'role' => 'required|min:5'
        ]);

        $role = $request['role'];

        if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']],false)){
            $user = Auth::user();
            Auth::login($user);
            Session::put('user',$user);
            if ($user->user_role == $role) {
                if ($user->user_role == "Admin") {
                    return redirect()->route('admin.home');
                } else if ($user->user_role == "Finance Officer") {
                    return \redirect()->route('finance.home');
                } else {
                    return redirect()->route('users.home');
                }
            } else {
                return \redirect()->back()->with('role_error','Please select your correct role.');
            }
        } else {
            return \redirect()->back()->with('message',"error");
        }
    }

    public function logOut(){
        Session::forget('user');
        return \redirect()->route('user.signin');
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
        $this->validate($request, [
            'email'=>'required|max:35|unique:users',
            'password'=>'required|max:12|min:6',
            'first_name'=>'required|max:35',
            'last_name'=>'required|max:35',
            'phone'=>'required|max:13|min:10'
        ]);
        $user = User::create([
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
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
        $users = DB::table('users')->where('id','=',$id)->get();
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
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'email'=>'required|max:35',
            'password'=>'required|max:35|min:6',
            'first_name'=>'required|max:35',
            'last_name'=>'required|max:35',
            'phone'=>'required|max:15'
        ]);
        $user = User::where('id',$id)->first();
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->phone = $request['phone'];
        $user->user_constituency = $request['user_constituency'];
        $user->user_role = $request['user_role'];
        return $user->save() ? redirect()->back()->with('message', "success") : redirect()->back()->with('message', "error");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id',$id);
        return $user->delete() ? redirect()->back()->with('message', "success") : redirect()->back()->with('message', "error");
    }
}
