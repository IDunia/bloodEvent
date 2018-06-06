<?php

namespace App\Http\Controllers;
use App\Users;
use Illuminate\Http\Request;

use Validator;
use Auth;
class LoginController extends Controller
{
    function index()
    {
    	return view('login');
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

            return view('users.users');
                }else{
                return view('admin.dashboard');
            }   
    	}
    	else
    	{
    		return back()->with('error','Wrong login detail');
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
}
