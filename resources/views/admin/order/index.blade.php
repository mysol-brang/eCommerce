@extends('admin.layouts.app')

@section('content')
<div class="col-12">
  <div class="col-4">
      <!-- Alert  -->
      @if(Session::has('updatedSuccess') | Session::has('delSuccess'))
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

          <h3 class="card-title"><b>Order List</b></h3>
    
        
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
              <th>Customer</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Address</th>
              <th></th>
            </tr>
          </thead>
          <tbody> @php $i=1 @endphp   
           @foreach ($orderlistUser as $index=>$user)
           @if ($user->order)
           <tr>       
            <td>{{ $i++ }}</td>
            <td>{{ $user->name }}</td>                     
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->address }}</td>
            <td>
              <a href="{{route('admin.orderlist.detail',$user->id)}}">
                <button class="btn btn-sm bg-dark text-white"><i class="fa-solid fa-eye"></i></button>
              </a>
              @if(Auth::id()!=$user['id'])
              @canany(['isSuperAdmin', 'isAdmin'])
              <a   href="{{route('admin.order.delete',$user->id)}}" onclick="return confirm('Are you sure?');">
                <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>
              </a>
              @endcanany
              @endif
            </td>
          </tr>
           @endif
                
           @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
@endsection