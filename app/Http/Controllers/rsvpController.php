<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\rsvp;
use App\card;
use DataTables;
use Illuminate\Support\Facades\DB;
class rsvpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.rsvp');
    }

    public function getdata()
    {

        $rsvp = DB::table('rsvps')
        ->join('events','rsvps.event_id','=','events.id')
        ->join('users','rsvps.user_id','=','users.id')
        ->select( 'rsvps.id' , 'events.name', 'users.email', 'users.first_name', 'users.surname', 'rsvps.status')
        ->get();
        return Datatables::of($rsvp)
         ->addColumn('action', function($rsvp){
                return ' <a href="#" class="btn btn-sm btn-success attend " id="'.$rsvp->id.'"><i class="fa fa-fw fa-check-circle "></i> Attend</a>';
            })
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    function attendance(Request $request)
    {
        $rsvp = rsvp::find($request->input('id'));
        $status = 'Yes';
        $rsvp->status = $status;
       $rsvp->save();

       $cards = new card();
       $data = DB::table("cards")
                ->where('rsvp_id', $rsvp->id)
                ->count();
     if($data > 0){
       return "already";
     }else{
       $cards->rsvp_id = $rsvp->id;
       $cards->points = '50';
       $cards->save();
    }
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
