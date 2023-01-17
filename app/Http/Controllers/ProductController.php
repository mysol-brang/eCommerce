<?php

namespace App\Http\Controllers;

use App\Models\Product;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(3);
        return view('products',compact('products'));
    }

    public function newestProduct()
    {
        $products = DB::table('products')->orderBy('updated_at', 'desc')->paginate(3);
        return view('products',compact('products'));
    }

    public function lowPrice()
    {
        $products = DB::table('products')->orderBy('price','asc')->paginate(3);
        return view('products',compact('products'));
    }

    public function highPrice()
    {
        $products = DB::table('products')->orderBy('price','desc')->paginate(3);
        return view('products',compact('products'));
    }
}
