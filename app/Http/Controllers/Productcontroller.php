<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        // $products = Product::get();   as you wish
        return view('products.index', [
            'products' =>Product::get()
        ]);
    }
    public function create(){
        return view('products.create');
    }       
    public function store (Request $request){
        // Validate data 
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:100000',
        ]);

        // Upload Image
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('products'),$imageName);

        $product = new Product;
        $product->image = $imageName;
        $product->name = $request->name;
        $product->description = $request->description;

        $product->save();
        return back()->withSuccess('Product Created !!!');
    }
    
}
