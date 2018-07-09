<?php

namespace App\Http\Controllers;

use App\Constituency;
use App\Message;
use App\Project;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PdfController extends Controller
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
        $completed = DB::table('projects')->where('completion','=',100)->count();
        $ongoing = DB::table('projects')->where('completion','<',100)->count();
        $projects = Project::all();
        $pdf = \PDF::loadview('users.report', compact('projects','completed','ongoing','messagecount','projectcount','usercount','constituencycount'));
        return $pdf->download('meru-report.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function count()
    {
//        return response()->json(['count'=>DB::table('projects')->count()]);
        return DB::table('projects')->where("name",'=',"Dam")->pluck('id');
    }

    public function ongoing(){
        return response()->json(['ongoing'=>DB::table('projects')->where('completion','<',100)->count()]);
    }

    public function completed(){
        return response()->json(['completed'=>DB::table('projects')->where('completion','=',100)->count()]);
    }

    public function chartData(){
        $to20 = DB::table('projects')->where('completion','<=',20)->count();
        $to40 = DB::table('projects')->where('completion','>',20)->where('completion','<=',40)->count();
        $to60 = DB::table('projects')->where('completion','>',40)->where('completion','<=', 60)->count();
        $to80 = DB::table('projects')->where('completion','>',60)->where('completion','<=', 80)->count();
        $to100 = DB::table('projects')->where('completion','>',80)->count();

        $totalCount = Project::count();
        $completed = DB::table('projects')->where('completion','=',100)->count();
        $ongoing = DB::table('projects')->where('completion','<',100)->count();

        $constituencies = Constituency::all();

        $full = array();

        foreach ($constituencies as $constituency){
            $count = DB::table('projects')->where('constituency_id','=',$constituency->id)->count();
            $full[$constituency->constituency_name] = $count;
        }

        return response()->json([
            'to20' => $to20,
            'to40' => $to40,
            'to60' => $to60,
            'to80' => $to80,
            'to100' => $to100,
            'completed' => $completed,
            'ongoing' => $ongoing,
            'total' => $totalCount,
            'full' => $full
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
