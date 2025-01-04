<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerview(){
        return view('Auth.register');
    }

    public function loginview(){
        return view('Auth.Login');
    }

    public function storedata(Request $request){
       $validated = $request->validate([
        "name"=>"required",
        "email"=>"required|email|unique:users",
        "password"=>"required|min:6"
       ]);

       $data = User::create($validated);
       if($data){
        Auth::login($data);
       }
    }
    public function logindata(Request $request){
        $validated = $request->validate([
            "email"=>"required|email",
            "password"=>"required|min:6"
           ]);

           $data = Auth::attempt($validated);
           if($data){
            return redirect()->route('product.index');
           }
    }


    public function logout(){
        Auth::logout();
        return redirect()->route('loginview');
    }
}
