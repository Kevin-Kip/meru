<?php

namespace App\Http\Controllers;

use App\Constituency;
use App\Department;
use App\Message;
use App\Project;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();
        $messagecount = Message::count();
        $projectcount = Project::count();
        $usercount = User::count();
        $constituencycount = Constituency::count();
        return view('admin.departments', compact('users','departments','projectcount','usercount','constituencycount','messagecount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $constituencies = Constituency::all();
        return view('admin.create-department', compact('constituencies'));
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
            'department_name'=>'required|max:35',
            'department_description'=>'required|max:190'
        ]);
        $file = $request['file'];
        $path = '';
        if ($request->hasFile('file')){
            $path = $file->storePublicly('/home/img','public');
        }

        $department = Department::create([
           'department_name' => $request['department_name'],
           'department_description' => $request['department_description'],
           'department_photo' => $path
        ]);

        if ($department){
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
        $department = Department::where('department_id', $id);
        if ($department->delete()){
            return redirect()->back()->with('message',"success");
        } else {
            return redirect()->back()->with('message',"error");
        }
    }
}
