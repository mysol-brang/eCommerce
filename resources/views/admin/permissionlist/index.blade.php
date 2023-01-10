@extends('admin.layouts.app')

@section('content')
<div class="col-12">
  <div class="col-4">
      <!-- Alert  -->
      @if(Session::has('addedSuccess') | Session::has('updatedSuccess') | Session::has('delSuccess'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{Session::get('addedSuccess')}}  {{Session::get('updatedSuccess')}}  {{Session::get('delSuccess')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      <!-- Alert box -->
      @if(Session::has('delfailed'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{Session::get('delfailed')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
  </div>
    <div class="card">
      <div class="card-header">
       
        <h3 class="card-title"><b>Permission User List</b></h3>
        <a href="{{route('superadmin.addpermission')}}">
          <button class="btn btn-sm bg-primary text-white mx-3"><i class="fa-solid fa-plus mr-1"></i>Add Permission</button>
        </a>
      
        
        <div class="card-tools">
          <form action="" method="POST">@csrf
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="adminSearch" class="form-control float-right" placeholder="Search">
  
              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap text-center">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Role</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Address</th>
              <th></th>
            </tr>
          </thead>
          <tbody> 
           @foreach ($userlist as $index=>$user)
                <tr>
                  <td>{{ $index+1 }}</td>
                  <td>{{ $user['name'] }}</td>
                  <td>{{ $user->role->role}}</td>
                  <td>{{ $user['email'] }}</td>
                  <td>{{ $user['phone'] }}</td>
                  <td>{{ $user['address'] }}</td>
                  <td>
                    @if ($user->role_id != '1')
                        <a href="{{route('superadmin.edit',$user->id)}}">
                            <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
                        </a>
                    @endif
                   
                    @if(Auth::id()!=$user['id'])
                    <a   href="{{route('superadmin.delete',$user->id)}}" onclick="return confirm('Are you sure?');">
                      <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>
                    </a>
                    @endif
                  </td>
                </tr>
           @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
@endsection