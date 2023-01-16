<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // if(Auth::check()) // To show value of Login User chosen Shopping Cart Data
        // {
        //     $cartItems = Order::where('user_id',Auth::id())->get();
        //     \Cart::clear();
        //     foreach($cartItems as $item)
        //     {
        //         \Cart::add([
        //                         'id' => $item->product->id,
        //                         'title' => $item->product->title,
        //                         'price' => $item->product->price,
        //                         'quantity' => $item->quantity,
        //                         'attributes' => array(
        //                             'image' => $item->product->image,
        //                         )
        //                     ]);
        //     }
            
        // }
        
        return view('home');
    }

    public function checkout() 
    {
        if(\Cart::getTotalQuantity() <= 0)
        {
            return back()->with('cartZero','You have to Buy Product to Order!');
        }
        $user = User::find(Auth::id());
        return view('checkout',compact('user'));
    }

    public function order(Request $request,$id)
    {
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
