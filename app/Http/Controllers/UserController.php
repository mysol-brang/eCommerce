<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function edit($id)
    {
        $user = User::find($id);
        return view('profile',compact('user'));
    }

    public function update(Request $request,$id)
    {  
        $user = User::find($id);
        if(!is_null($request->password)){
            $password=Hash::make($request->password);
        }else{
            $password=$request->passwordhidden;
        }
        $user->update([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>$password,
            "phone"=>$request->phone,
            "address"=>$request->address,
        ]);
        
        return redirect('/');
    }
}
