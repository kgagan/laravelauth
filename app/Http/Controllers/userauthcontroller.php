<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\usertable;


class userauthcontroller extends Controller
{
    function login()
    {
             return view('auth.login');
    }
    function register()
    {
             return view('auth.register');
    }
    function create(Request $request)
    {    
         /* for show data on only on browser
         return $request->input(); */
          $request->validate([
              'name'=>'required',
              'email'=>'required|email|unique:usertables',
              'password'=>'required|min:5|max:12'
          ]);

          /*  if validate then insert into database */
          $user = new usertable;
          $user->name = $request->name;
          $user->email = $request->email;
          $user->password = Hash::make($request->password);
          $query=$user->save();
          if($query)
          {
                  return back()->with('success', 'you have successfully register');
          }else{
                  return back()->with('fail', 'something get wrong');
                }
    }

    function check(Request $request)
    {    
      /*
       return $request->input();*/
      $request->validate([
        'email'=>'required|email',
        'password'=>'required|min:5|max:12',
      ]);
        //if form  validated successfully,the process login
      $user= usertable::where('email',"=", $request->email)->first();
        if($user)
        {
        //if($request->password == $user->password)
          if(Hash::check($request->password,$user->password)){
          //if password match,then redirect user to profile
          $request->session()->put('loggeduser', $user->id);
          return redirect('profile');
                   
        }
        else{
          return back()->with('fail','invalid password');
        }   
        } else{
          return back()->with('fail','no account found for this email');
        }  
    }

    function profile(){
      if(session()->has('loggeduser')){
      $user= usertable::where('id',"=",  session('loggeduser'))->first();
      $data  = [
          'loggeduserinfo'=>$user
      ];
      }

      return view('admin.profile', $data);
    }
    function logout(){
      if(session()->has('loggeduser')){
        session()->pull('loggeduser');
        return redirect('login');
      }

    }
}
