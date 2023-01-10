<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class SuperAdminController extends Controller
{
    public function index()
    {
        $userlist = User::with('role')->whereNotIn('role_id',[2])->get();
        return view('admin.permissionlist.index',compact('userlist'));
    }

    public function addpermission()
    {
        $userlist = User::with('role')->whereIn('role_id',[2])->get();
        return view('admin.permissionlist.addpermission',compact('userlist'));
    }

    public function added($id)
    {
        $user = User::find($id)->update([
            'role_id' => '3',
        ]);

        return redirect()->route('superadmin.index')->with('addedSuccess','added to admin');
    }

    public function edit($id)
    {   
        $user = User::find($id);
        return view('admin.permissionlist.edit',compact('user'));
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
            "role_id"=>$request->role_id,
            "email"=>$request->email,
            "password"=>$password,
            "phone"=>$request->phone,
            "address"=>$request->address
        ]);

        return redirect()->route('superadmin.index')->with('updatedSuccess','Updated Successfully.');
    }
}
