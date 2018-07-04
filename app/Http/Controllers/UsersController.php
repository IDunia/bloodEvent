<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Users;
use App\card;
use App\rsvp;
use App\Event;
use DataTables;
use DB;
use Auth;
use Illuminate\Support\Facades\Hash;
use File;
use Intervention\Image\ImageManagerStatic as Image;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_admin()
    {
        $users=Users::all();
        return view('admin.users');
    }

   
    
    public function getdata()
    {

        $users = Users::select('id','email','first_name','surname','role');
        return Datatables::of($users)
         
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response

     */
     function postdata(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'email'=> 'required|email',
            'password'=>'required|min:8',
            'first_name'=>'required',
            'surname'=>'required'
           
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
           
            if($request->get('button_action')=="insert")
            {
                $users = new Users([
                    'email' => $request->get('email'),
                    'password'=> $request->get('password'),
                    'role'=>$request->get('role'),
                    'first_name'=>$request->get('first_name'),
                    'surname'=>$request->get('surname')

                ]);
                $users->save();
                $success_output = '<div class="alert alert-success">Data Inserted</div>';
            }
           
        }
        $output = array(
            'error' => $error_array,
            'success'=> $success_output
        );

        echo json_encode($output);
    }

   
    public function admin_profile()
    {

        return view('admin.profile');
    }
    public function user_profile()
    {
        if(isset(Auth::user()->email) && Auth::user()->role == 'User'){
         $card = DB::table('cards')
        ->join('rsvps','cards.rsvp_id','=','rsvps.id')
        ->join('users','rsvps.user_id','=','users.id')
        ->join('events','rsvps.event_id','=','events.id')
        ->select( 'cards.id' , 'events.name', 'events.type', 'events.place', 'events.host','cards.points','events.photo','rsvps.updated_at')
        ->where('rsvps.user_id',Auth::user()->id)
        ->get();

           $pending = DB::table('rsvps')
        ->join('events','rsvps.event_id','=','events.id')
        ->where('rsvps.user_id',Auth::user()->id)
        ->where('rsvps.status','Not yet')
        ->get();

        $points = DB::table('cards')
        ->join('rsvps','cards.rsvp_id','=','rsvps.id')
        ->join('users','rsvps.user_id','=','users.id')
        ->join('events','rsvps.event_id','=','events.id')
        ->select( 'cards.id' , 'cards.rsvp_id','events.name', 'users.email', 'users.first_name', 'cards.points')
        ->where('rsvps.user_id',Auth::user()->id)
        ->sum('cards.points');

        return view('users.profile',['card'=>$card,'points'=>$points,'pending'=>$pending]);
        }else{
            return redirect('/error');
        }
    }

    function upload_picture(Request $request)
    {
        $validation = Validator::make($request->all(),[
           'photo'=>'image|mimes:jpeg,png,jpg,gif|max:2048|required'
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
           
            if($request->get('button_action_upload')=="insert")
               
            {
                  $users = Users::find($request->get('users_id_upload'));
                   $usersPhoto= public_path("\images\{{$users->photo}}");
                if($request->hasfile('photo'))
             {
               
                    if(File::exists($usersPhoto) && $users->photo !== "Unassigned.jpg")
                        {
                        File::delete($usersPhoto);
                        }
            $file = $request->file('photo');
            $name=rand().$file->getClientOriginalName();
            Image::make($file->getRealPath())->resize('400', '400')->save(public_path('images/' .$name));

             }
                $users->photo=$name;
    
               $users->save();
                $success_output = '<div class="alert alert-success">Profile Picture Updated</div>';
            }
        
        }
        $output = array(
            'error' => $error_array,
            'success'=> $success_output
        );

        echo json_encode($output);
    }

  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    function updateProfile(Request $request)
    {
         $validation = Validator::make($request->all(),[
           'gender' => 'required',
           'birthday'=>'required',
           'occupation'=>'required',
           'phone'=>'required'

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
           
            if($request->get('button_action_info')=="update")
               
            {
             $users = Users::find($request->get('users_id_info'));
             $users->first_name = $request->get('first_name'); 
             $users->surname = $request->get('surname'); 
             $users->gender = $request->get('gender'); 
             $users->birthday = $request->get('birthday');         
             $users->occupation = $request->get('occupation');
             $users->phone = $request->get('phone');     
             $users->save();  
                $success_output = '<div class="alert alert-success">Profile Updated</div>';
            }
        
        }
        $output = array(
            'error' => $error_array,
            'success'=> $success_output
        );

        echo json_encode($output);
    }

 function checkEmail(Request $request)
    {
       if($request->get('email'))
        {
            $email = $request->get('email');
            $data = DB::table("users")
                ->where('email', $email)
                ->count();
            if($data > 0)
            {
                return 'not available';
            }
            else
            {
                return 'available';
            }
        }
    } 
 
    function changeEmail(Request $request)
    {
        $validation = Validator::make($request->all(),[
         'email'=> 'required|email',
         'password'=>'required'

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
           
            if($request->get('button_action_email')=="update")
               
            {
             $users = Users::find($request->get('users_id_email'));
              $password = $users->password;
              $confirmpassword = $request->get('password');
              if(Hash::check($confirmpassword,$password)){
                $users->email = $request->get('email');
                $users->save();
               $success_output = '<div class="alert alert-success">Email is Changed</div>';
              
              }else{
              $success_output = '<div class="alert alert-danger">Wrong Password !</div>';
            }
            $success_output;
          }
               

            
        
        }
        $output = array(
            'error' => $error_array,
            'success'=> $success_output,
   
        );

        echo json_encode($output);
    }
    

    function changePassword(Request $request)
    {
         
           $validation = Validator::make($request->all(),[
         
         'old_password'=>'required',
         'new_password'=>'required|min:8',
         'confirm_password'=>'required'

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
           
            if($request->get('button_action_password')=="Change")
               
            {
             $users = Users::find($request->get('users_id_password'));
              $password = $users->password;
              $confirmpassword = $request->get('old_password');
              if(Hash::check($confirmpassword,$password)){
                $users->password = $request->get('new_password');
               $users->save();
               $success_output = '<div class="alert alert-success">Password is Changed</div>';
              
              }else{
              $success_output = '<div class="alert alert-danger">Wrong Old Password !</div>';
            }
            $success_output;
          }
               
        
        }
        $output = array(
             'error' => $error_array,
            'success'=> $success_output,
   
        );

        echo json_encode($output);
        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
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
