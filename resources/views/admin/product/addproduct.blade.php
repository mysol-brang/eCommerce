@extends('admin.layouts.app')

@section('content')
<div class="col-12">
  <div class="col-4">
      <!-- Alert  -->
      @if(Session::has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{Session::get('success')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      <!-- Alert box -->
      @if(Session::has('error'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{Session::get('error')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
  </div>
    <div class="card">
      
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <div class="container">
            <div class="row">
                <form class="p-3" action="{{route('admin.addedproduct')}}" method="post" enctype='multipart/form-data'>@csrf
                    <div class="form-group row ">
                      <label for="fortitle">Title</label>
                      <input type="text" name="title" class="form-control input-sm @error('title') is-invalid @enderror"  id="fortittle" aria-describedby="emailHelp" placeholder="Enter Product Title">
                      @error('title')
                      <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                        <label for="forprice">Price</label>
                        <input type="number" name="price" class="form-control @error('price') is-invalid @enderror"  id="forprice" aria-describedby="emailHelp" placeholder="Enter price">
                        @error('price')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="forimage">Image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="forimage" name="image">
                        @error('image')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Add Product</button>
                  </form>
            </div>
        </div>
        
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
@endsection