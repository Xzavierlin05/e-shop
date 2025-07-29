<?php

namespace App\Http\Controllers;
use App\Models\products;
use Illuminate\Http\Request;

class productscontroller extends Controller
{
    public function index()
    {
        $products = products::all();
        return view('index',compact('products'));
}

public function showproduct($id){
    $products = products::find($id);
    return view('showproduct',compact('products'));
}
}