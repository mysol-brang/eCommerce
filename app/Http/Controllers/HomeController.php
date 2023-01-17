<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');        
    }

    public function index()
    {
        $products = DB::table('products')->orderBy('updated_at','desc')->limit(12)->get();
    
        return view('home',compact('products'));
    }

    public function checkout() 
    {   
        $role = auth()->user()->role_id; //Unallow admin or superadmin or editor to Order
        /* role_id 1 for supserAdmin
        role_id 2 for User
        role_id 3 for Admin
        role_id 4 for Editor
        */
        if($role == 1 || $role ==3 || $role == 4)
        {
            return abort(403);
        }

        if(\Cart::getTotalQuantity() <= 0) // if there no Product to checkout
        {
            return back()->with('cartZero','You have to Buy Product to Order!');
        }
        $user = User::find(Auth::id());
        return view('checkout',compact('user'));
    }

    public function order(Request $request,$id)
    {
        $role = auth()->user()->role_id; //Unallow admin or superadmin or editor to Order
        /* role_id 1 for supserAdmin
        role_id 2 for User
        role_id 3 for Admin
        role_id 4 for Editor
        */
        if($role == 1 || $role ==3 || $role == 4)
        {
            return abort(403);
        }

        $request->validate([
            'name'=> 'required|string|max:50',
            'phone'=> 'required|digits_between:1,20|unique:users',
            'address'=> 'required|string|max:255'
        ]);

        $user = User::find($id);
        $user->update([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'address'=>$request->address
        ]);
        $cartItems = \Cart::getContent();
        foreach($cartItems as $item)
        {
            Order::create([
            'product_id'=> $item->id,
            'quantity' => $item->quantity,
            'user_id' => Auth::id(),  
            ]);
        }
        
        \Cart::clear();
        session()->flash('orderSuccess','Product will be delivered & we will contact you soon!');
        return redirect()->route('home');
        
    }
}
