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

    //Insert Product Data
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

    //Edit Product Data
    function editProduct($id){
        $product = Product::where('id',$id)->first();
        return view('products.edit_product', compact('product'));
    }

    //Update Product Data
    function updateProduct(Request $request, $id){
        //Validation
        $request->validate([
            'product_name' => 'required',
            'description' => 'required',
            'photo' => 'nullable|mimes:png,jpg,svg,gif|max:5000'
        ]);
        $product = Product::where('id',$id)->first();
        if(isset($request->photo)){
            //Upload Files
            $imageType = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('productImages'), $imageType);
            $product->image = $imageType;
        }
        $product->product_name = $request->product_name;
        $product->description = $request->description;
        $product->save();
        return back()->with('success','Product Updated Successfully..');
    }

    function deleteProduct($id){
        $product = Product::where('id',$id)->first();
        $product->delete();
        return back()->with('success', 'Product Deleted Successfully!!!');
    }

    function showProduct($id){
        $product = Product::where('id',$id)->first();
        return view('products.show_product',['product'=>$product]);
    }

}
