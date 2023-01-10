<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserListController extends Controller
{
    public function index()
    {
        $userlist = User::with('role')->whereNotIn('role_id',[1,3])->get();
        return view('admin.list.index',compact('userlist'));
    }

    public function edit($id)
    {   
        $user = User::find($id);
        return view('admin.list.edit',compact('user'));
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

        return redirect()->route('admin.userlist')->with('updatedSuccess',"Updated Successfully!");
    }

    public function delete($id)
    {
        $user = User::find($id);
        if($user->delete())
        {
            return back()->with('delSuccess','user deleted.');
        }else{
            return back()->with('delfailed','failed to delete.');
        }
    }
}
