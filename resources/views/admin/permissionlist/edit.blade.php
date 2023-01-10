@extends('admin.layouts.app')

@section('content')
<div class="col-12">
  <div class="col-4">
      <!-- Alert  -->
      @if(Session::has('delSuccess'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{Session::get('delSuccess')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      <!-- Alert box -->
  </div>
    <div class="card">
      
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <div class="container">
            <div class="row">
                <form class="p-3" action="{{route('superadmin.update',$user->id)}}" method="post">@csrf
                    <div class="form-group row ">
                      <label for="forname">Name</label>
                      <input type="text" name="name" value="{{$user->name}}" class="form-control input-sm" id="forname" aria-describedby="emailHelp" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="forrole">Role Type</label>
                        <select class="form-control" id="forrole" name="role_id">
                          <option value="2" @if($user->role_id == 2)selected @endif>User</option>                
                          <option value="3" @if($user->role_id == 3)selected @endif>Admin</option>
                          <option value="4" @if($user->role_id == 4)selected @endif>Editor</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="foremail">Email address</label>
                        <input type="email" name="email" value="{{$user->email}}" class="form-control" id="foremail" aria-describedby="emailHelp" placeholder="Enter email">
                      </div>
                    <div class="form-group">
                      <label for="forpassword">New Password</label>
                      <input type="password" name="password"  class="form-control" id="forpassword" placeholder="Password">
                      <input type="hidden" name="passwordhidden" value="{{$user->password}}">
                    </div>
                    <div class="form-group">
                        <label for="forphone">Phone Number</label>
                        <input type="text" name="phone" value="{{$user->phone}}" class="form-control" id="forphone" aria-describedby="emailHelp" placeholder="Enter phone number">
                    </div>
                    <div class="form-group">
                        <label for="foraddress">Address</label>
                        <textarea name="address"  class="form-control" id="foraddress" rows="3">{{$user->address}}</textarea>
                      </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                  </form>
            </div>
        </div>
        
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
@endsection