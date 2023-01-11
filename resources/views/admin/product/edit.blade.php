@extends('admin.layouts.app')

@section('content')
<div class="col-12">
  <div class="col-4">
      <!-- Alert  -->
      @if( Session::has('updatedSuccess') )
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong> {{Session::get('updatedSuccess')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      <!-- Alert box -->
      @if(Session::has('updatedError'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{Session::get('updatedError')}}</strong>
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
                <form class="p-3" action="{{route('admin.productlist.update',$product->id)}}" method="post" enctype="multipart/form-data">@csrf
                    <div class="form-group row ">
                      <label for="forname">Title</label>
                      <input type="text" name="title" value="{{$product->title}}" class="form-control input-sm" id="forname" aria-describedby="emailHelp" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="foremail">Price</label>
                        <input type="number" name="price" value="{{$product->price}}" class="form-control" id="foremail" aria-describedby="emailHelp" placeholder="Enter email">
                      </div>
                    <div class="form-group">
                        <label for="forimage">Image File</label>
                        <input type="file" name="image"  class="form-control" id="forimage">
                    </div>
                    <div class="form-group">
                        <label for="fordescritpion">Description</label>
                        <textarea name="description"  class="form-control" id="fordescription" rows="3">{{$product->description}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all()  as $error)
                            <li>{{ $error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
@endsection