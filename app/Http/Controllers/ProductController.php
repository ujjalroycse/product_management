<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    function index(){
        return view('products.index',[
            'products' => Product::get(),
        ]);
    }

    function createProduct(){
        return view('products.create_product');
    }

    function insertProduct(Request $request){
        //Validation
        $request->validate([
            'product_name' => 'required',
            'description' => 'required',
            'photo' => 'required|mimes:png,jpg,svg,gif|max:5000'
        ]);

        //Upload Files
        $imageType = time().'.'.$request->photo->extension();
        $request->photo->move(public_path('productImages'), $imageType);

        $product = new Product;
        $product->product_name = $request->product_name;
        $product->description = $request->description;
        $product->image = $imageType;
        $product->save();

        return back()->with('success','Product Cerate Successfully..');
    }
}
