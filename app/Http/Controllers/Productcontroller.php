<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use File;


class ProductController extends Controller
// fornt page...........
{
    public function index()
    {
        $products = Product::get();

        // return view('products.index', compact('products'));
        return view('products.index', [
            'products' => $products
        ]);
    }
// new to next page..........
    public function create()
    {
        return view('products.create');
    }

//  store to page....
    public function store(Request $request)
    {
        // dd($request->all());
        // Validate data 
        $request->validate([
            'name' => 'required',
            'description' => 'required', 
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:100000',
        ]);

        // Upload Image
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('products'), $imageName);

        $product = new Product;
        $product->image = $imageName;
        $product->name = $request->name;
        $product->description = $request->description;

        $product->save();
        return back()->withSuccess('Product Created !!!');
    }

    // edit the page......
    public function edit($id)
    {
        $product = Product::where('id', $id)->first();

        return view('products.edit', ['product' => $product]);
    }

    // update to page.............
    public function update(Request $request, $id)
    {
        // Validate data 
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:100000',
        ]);

        $product = Product::where('id', $id)->first();

        if (isset($request->image)) {
            // Upload Image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('products'), $imageName);
            $product->image = $imageName;
        }

        $product->name = $request->name;
        $product->description = $request->description;

        $product->save();
        return back()->withSuccess('Product Updated !!!');
        return redirect('/');
    }


    // delete to page
    public function destroy($id)
    {
        $product = Product::where('id', $id)->first();

        $image_path = public_path('products/' . $product->image);
        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        $product->delete();
        return back()->withSuccess('Product Deleted !!!');
    }
    public function imageDelete() {
        $image_name = '$image';
        $image_path = public_path('products/'.$image_name);
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
    }
// show the listing front
    public function show($id)
    {
        $product = Product::where('id', $id)->first();
        return view('products.show', ['product' => $product]);

    }

}