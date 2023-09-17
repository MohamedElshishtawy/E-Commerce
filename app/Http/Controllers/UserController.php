<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    // Show Login Page
    public function register(){
        return view("users/register");
    }

    // Show Login Page
    public function login(){
        return view("users/login");
    }

    // Store New Register
    static public function store(Request $request){
        // dd($request);
        $form_fields = $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users",
            "phone" => "required",
            "sex" => "required",
            "birth" => "required",
            "password" => "required"
        ]);
        
        
        $user = User::create($form_fields);

        auth()->login($user);

        return redirect(route("home"))->with("message", "Hello ".$request->name);

    }

    public function authonticate(Request $request){
        $form_field = $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        if ( auth()->attempt($form_field) ){
            if ( !Schema::hasColumn("users","remember_token") ){
                Schema::table("users" , function(Blueprint $table){
                    $table->rememberToken();
                });
            }
            auth()->loginUsingId(auth()->id(), true);
            $request->session()->regenerate();
            return redirect(route("home"))->with("message", "Hello! Welcome Back");
        }

        return back()->withErrors("Invalid Data")->onlyInput("email");
    }

    public function logout(Request $request){

        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route("home"))->with("message", "You Have Loged Out");
    }

}
