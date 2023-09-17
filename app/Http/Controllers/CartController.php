<?php

namespace App\Http\Controllers;

use App\Mail\buyMailler;
use App\Models\Cart;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    public function index(){
        return view("products/cart",[
            'products' => Cart::all()->where('user_id', auth()->id())
        ]);
    }

    public function add(Products $id, Request $request){
        
        $request->merge([
            'user_id' => auth()->id(),
            'product_id' => $id->id
        ]);

        $filds = $request->validate([
            'count' => 'required|integer|between:1,'.$id->count,
            'user_id' => ['required'],
            'product_id' => ['required']
        ]);
        
        Cart::create($filds);
        
        return redirect(route('home'))->with("message", 'Your Cart Not Empty');
    }

    public function mail(){
        Mail::to("our@m.com")->send(new buyMailler);
        return redirect(route("home"))->with("message", "Email Is Sent Successfuly :)");
    }

}
