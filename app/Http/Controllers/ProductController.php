<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product(){
        $products = ProductModel::get();
        return view('/addProduct',compact('products'));
    }
  public function productDetail($id){
    $products = ProductModel::where('id',$id)->first();
    return view('/productDetail',compact('products'));
  }
    public function addProduct(Request $request){
        $this->validate(request(),[
            'name'=>'required',
        ]);
        $product = new ProductModel();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $image = $request->image;
         /** Make a new filename with extension */
         $filename = time() . rand(1, 30) . '.' . $image->getClientOriginalExtension();
         //Move Uploaded File
         $destinationPath = 'uploads';
         $image->move(public_path($destinationPath), $filename);
         /** Insert the data in the database */
         $product->image =  $filename;
         $product->save();
         return back()->with('success','Data Saved');

    }
}
