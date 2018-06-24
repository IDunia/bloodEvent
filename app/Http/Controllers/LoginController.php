<?php

namespace App\Http\Controllers;
use App\Users;
use Illuminate\Http\Request;
use DB;
use Validator;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Event;
use Mail;
class LoginController extends Controller
{
    function index()
    {
    	return view('login');
    }

    function registerPage()
    {
        return view('register');
    }
    function checkLogin(Request $request)
    {

    	$this->validate($request, [
    		'email' => 'required|email',
    		'password'=>'required|min:8'
    	]);

    	$user_data = array(
    		'email'=>$request->get('email'),
    		'password'=>$request->get('password')
    		
    	);

    	if(Auth::attempt($user_data)){
    		
    		
            $role =Auth::user()->role;

            if($role == 'User'){
            $event= Event::all();
            return view('users.home',compact('event'));
                }else{
                return view('admin.dashboard');
            }   
    	}
    	else
    	{
    		return back()->with('error','Wrong Username and Password !');
    	}

    }

    function reset()
    {
        return view('users.resetpassword');
    }

    function successlogin(Request $request)
    {

    	return redirect('login');
    }

    function logout()
    {
	   	Auth::logout();
    	return redirect('login');
    }

     public function register(Request $request)
    {
        $users = new Users([
                    'email' => $request->get('email'),
                    'password'=> $request->get('password'),
                    'role'=>$request->get('role'),
                    'first_name'=>$request->get('first_name'),
                    'surname'=>$request->get('surname')

                ]);
        $users->save();
                return  back()->with('error','Account Created !');
    }

    public function resetpassword(Request $request)
    {
       if($request->get('button_action_reset')=="update")
               
            {
            $email = $request->get('email');
            $users = Users::where('email', $email)->first();
             $match = Users::where('email', $email)->get()->count();
             if ($match > 0){
             $newpassword  = str_random(8);
            $users->password = $newpassword;
              $data = array('first_name'=>$users->first_name,'surname'=>$users->surname,'password'=>$newpassword,'email'=>$email);
                  Mail::send('email', $data, function($message) use ($users){
                     $message->to($users->email)->subject
                        ('Reset Password');
                    $message->from('BloodEvent@gmail.com','BloodEvent');                
                  });
            $users->save();      
            return  back()->with('success','Password has been reset ! Check Your Email');
            }else{
            return  back()->with('error','Wrong Email !'); 
            }
             
            }

    }

     
}
