<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DataTables;
use App\Event;
use File;
use App\rsvp;
use Illuminate\Support\Facades\DB;
use Auth;
use Intervention\Image\ImageManagerStatic as Image;
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $event=Event::all();
        return view('admin.event');
    }
    
    public function index_user()
    {
        $event=Event::all();
        
        return view('users.home',compact('event'));
     
    }


     public function getdata()
    {

        $event = Event::select('id','type','name','date_time','host','place','photo');
        return Datatables::of($event) 
         ->addColumn('action', function($event){
                return ' <a href="#" class="btn btn-sm btn-success edit" id="'.$event->id.'"><i class="glyphicon glyphicon-edit"></i>  Edit</a> <a href="#" class="btn btn-sm btn-danger delete" id="'.$event->id.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
            })
       
        ->make(true);
    }

    function postdata(Request $request)
    {
         
        $validation = Validator::make($request->all(),[
            'type'=> 'required',
            'name'=>'required',
            'host'=>'required',
            'place'=>'required',
            'date_time'=>'required',
            'photo'=>'image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);
        
        $error_array = array();
        $success_output='';
        if ($validation->fails())
        {
            foreach($validation->messages()->getMessages() as  $field_name=>$messages) 
            {
                $error_array[] = $messages;
            }
        }
        else 
        {   
           
            if($request->get('button_action')=="insert"  )
            { 
               
                  if($request->hasfile('photo'))
             {
            $file = $request->file('photo');
            $name=rand().$file->getClientOriginalName();
            Image::make($file->getRealPath())->resize('800', '537')->save(public_path('images/' .$name));
             }else{
                $name="Unassigned.jpg";
             }
             
                
               
                $event= new Event();
                $event->type=$request->get('type');
                $event->name=$request->get('name');
                $event->date_time=$request->get('date_time');
                $event->host=$request->get('host');
                $event->place=$request->get('place');
                $event->photo=$name;
                
                $event->save();
            
                $success_output = '<div class="alert alert-success">Data Inserted</div>';

            }

            if($request->get('button_action') == 'update')
            {    
                $event = Event::find($request->get('event_id'));
                if($request->hasfile('photo'))
                 {
                    $eventPhoto= public_path("\images\{{$event->photo}}");
                    if(File::exists($eventPhoto))
                        {
                        File::delete($eventPhoto);
                        }
                    $file = $request->file('photo');
                    $name=rand().$file->getClientOriginalName();
                   Image::make($file->getRealPath())->resize('800', '537')->save(public_path('images/' .$name));
                 }else{
                  $name="Unassigned.jpg";  
                 }
               
                $event->type = $request->get('type');
                $event->name = $request->get('name');
                $event->date_time = $request->get('date_time');
                $event->host = $request->get('host');
                $event->place = $request->get('place');
                $event->photo = $name;
                
               $event->save();
                $success_output = '<div class="alert alert-success">Data Updated</div>';
            }

        
        }
        $output = array(
            'error' => $error_array,
            'success'=> $success_output
        );

        echo json_encode($output);
    }
        function fetchdata(Request $request)
    {
        $id = $request->input('id');
        $event = Event::find($id);
        $output = array(
            'type'    =>  $event->type,
            'name'     =>  $event->name,
            'date_time'=>$event->date_time,
            'host'=>$event->host,
            'place'=>$event->place
        );
        echo json_encode($output);
    }

        function removedata(Request $request)
        {
            $event = Event::find($request->input('id'));
            if($event->delete())
            {
                echo 'Data Deleted';
            }
        }

         
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rsvp = new rsvp();
        $rsvp->event_id = $request->get('id');
        $rsvp->user_id = Auth::user()->id;
        $rsvp->status = 'Not yet';
        $rsvp->save(); 
        return redirect('/home/profile');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
     
         if ($event = Event::where('id', $id)->first() ) {
            if(isset(Auth::user()->email)){
            $data =DB::table("rsvps")
                    ->where('user_id',Auth::user()->id)
                    ->where('event_id',$event->id)
                    ->count();
            }else{
                $data="null";
            }
         return view('users.event',['event'=>$event,'data'=>$data]);
            }else{
                 return abort('404');   
            }

    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         
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
