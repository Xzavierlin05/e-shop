<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class usercontroller extends Controller
{
    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }

    public function login_submit(Request $request){
       $formfield= $request->validate([
        "name" => "required|max:50",
        "password" => "required|min:3"
       ]);

       Auth::attempt($formfield);
       if (Auth::check()) {
          return redirect()->route('index');
       }else{
        return response('login failed');
       }
}
 
     public function res_user(Request $request){
        $formfield = $request->validate([
           "name" => "required|max:50",
           "password" => "required|min:3|confirmed",
        ]);

        $user = User::create($formfield);
        if ($user) {
            return redirect()->route('login')->with('user created successfully');
        }
     }
}