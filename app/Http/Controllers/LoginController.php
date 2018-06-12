<?php

namespace App\Http\Controllers;
use App\Users;
use Illuminate\Http\Request;
use DB;
use Validator;
use Auth;
use Illuminate\Support\Facades\Hash;
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

            return view('users.home');
                }else{
                return view('admin.dashboard');
            }   
    	}
    	else
    	{
    		return back()->with('error','Wrong Username and Password !');
    	}

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

     
}
