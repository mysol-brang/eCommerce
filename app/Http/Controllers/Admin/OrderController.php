<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orderlistUser = User::with(['order'=>function($query){
            return $query->orderBy('created_at','desc');
        }])->get();
       
        return view('admin.order.index',compact('orderlistUser'));
    }

    public function detail($id)
    {
        $details = Order::where('user_id',$id)->get();
        
        return view('admin.order.detail',compact('details'));
    }
}
