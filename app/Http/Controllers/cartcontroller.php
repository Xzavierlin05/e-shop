<?php

namespace App\Http\Controllers;

use App\Models\cartid;
use App\Models\cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cartcontroller extends Controller
{
    public function add_cart(Request $request,$id){
        $formfields = $request->validate([
             "p_mass" => "required|numeric:100",
        ]);

        $cart=new cart();
        $cart->p_id=$id;
        $cart->p_mass=$formfields['p_mass'];
        $cart->u_id=Auth::id();
        $cart->cart_id=0;
        $cart->c_status="pending";
        $cart->save();
        return redirect()->route('index');
    
    }

    public function cart_list(){
     $cart = cart::selectRaw("*,carts.p_mass as total_mass")->join("products","carts.p_id","=","products.id")
     ->where('u_id',Auth::id())
     ->where('c_status','pending')->get();
     return view('cart_list',compact('cart'));
}

    public function checKout(){
    $cartid=cartid::selectRaw("MAX(id) as id")->first();
    
    if ($cartid==null) {
        $cart_id = 1;
    }else {
        $cart_id=$cartid->id;
    }

    
    $cart=cart::where('u_id',Auth::id())->where('cart_id',0)->where('c_status','pending')->update(['cart_id' => $cart_id,'c_status' => 'checkout']);

    if ($cart) {
        $newcartid=new cartid();
        $newcartid['c_id']= $cart_id;
        $newcartid->save();
        return redirect()->route('index')->with('success','Your order has been placed successfully');
    }
}

public function history(){
    $cart = cart::selectRaw("*,carts.p_mass as total_mass")->join("products","carts.p_id","=","products.id")
    ->where('u_id',Auth::id())
    ->where('c_status','checkout')->get();
    return view('cart_list',compact('cart'));
}
}