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
          <a href="{{route('admin.orderlist')}}">
            <button class="btn btn-sm bg-primary text-white mx-3"><i class="fa-solid fa-left-long"></i> Back</button>
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
              <th>title</th>
              <th>image</th>
              <th>price</th>
              <th>quantity</th>
              <th>SubTotal</th>
            </tr>
          </thead>
          <tbody> @php $totalPrice=0 @endphp   
           @foreach ($details as $index=>$detail)
           
           <tr>       
            <td>{{ ++$index }}</td>
            <td>{{ $detail->product->title }}</td>                     
            <td><img src="/storage/app/images/{{$detail->product->image}}" alt="img" style="width:25px; height:25px"></td>
            <td>{{ $detail->product->price }}</td>
            <td>{{ $detail->quantity }}</td>
            <td>{{ $detail->product->price * $detail->quantity}}
          </tr>
                @php
                    $totalPrice += $detail->product->price * $detail->quantity
                @endphp
           @endforeach
           <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Total Price</td>
            <td><span class="text-danger text-bold">{{$totalPrice}}</span></td>
           </tr>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
@endsection