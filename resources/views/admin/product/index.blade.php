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
      <div class="card-header">
        <h3 class="card-title"><b>Product List</b></h3>
        <a href="{{route('admin.addproduct')}}">
            <button class="btn btn-sm bg-primary text-white mx-3"><i class="fa-solid fa-plus mr-1"></i>Add Product</button>
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
              <th>price</th>
              <th>image</th>
              <th></th>
            </tr>
          </thead>
          <tbody> 
           @foreach ($products as $index=>$product)
                <tr>
                  <td>{{ ++$index }}</td>
                  <td>{{ $product->title }}</td>
                  <td>{{ $product->price }}</td>
                  <td><img src="{{asset('storage/app/images/'.$product->image)}}" alt="image" style="width: 40px;height: 50px"></td>
                  <td>
                    <a href="{{route('admin.productlist.edit',$product->id)}}">
                      <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
                    </a>
                    
                    <a   href="{{route('admin.productlist.delete',$product->id)}}" onclick="return confirm('Are you sure?');">
                      <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>
                    </a>
                  
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