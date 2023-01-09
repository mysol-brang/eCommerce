<?php

namespace App\Http\Controllers\Admin;

use DateTime;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index',compact('products'));
    }

    public function addProduct(Request $request)
    {
         return view('admin.product.addproduct');
    }

    public function addedProduct(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);
        $img = $request->file('image');
        $datetime= new DateTime();
        $image = "Product_".$datetime->format('y_m_d_His').".".$img->getClientOriginalExtension();
       try
        {
        $product=Product::create([
            'title' => $request['title'],
            'price' => $request['price'],
            'image' => $image,
        ]);
        
            if($product)
            { 
                $img->move(public_path('storage/app/images'),$image);
                return back()->with('success','Added successfully');
            }else return back()->with('error','failed to add!');
        
        }catch(\Exception $e){
            return back()->with('error','failed to add!');
        }
    }

    public function edit($id)
    {   
        $product = Product::find($id);
        return view('admin.product.edit',compact('product'));
    }
}
