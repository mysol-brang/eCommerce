@extends('layouts.layout')

@section('content')
<!-- Items Starts Here -->
<div class="featured-page">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-12">
        <div class="section-heading">
          <div class="line-dec"></div>
          <h1>Featured Items</h1>
        </div>
      </div>
      <div class="col-md-8 col-sm-12">
        <div id="filters" class="button-group">
          <a href="{{route('products')}}" class="btn btn-primary" data-filter="*" class='nav-item active'>All Products</a>
          <a href="{{route('products.newest')}}" class="btn btn-primary" data-filter=".new">Newest</a>
          <a href="{{route('products.lowprice')}}" class="btn btn-primary" data-filter=".low">Low Price</a>
          <a href="{{route('products.highprict')}}" class="btn btn-primary" data-filter=".high">Hight Price</a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="featured container no-gutter">

    <div class="row posts">
      @foreach ($products as $product)
        <div id="1" class="item new col-md-4">
          <a href="{{url('single')}}">
            <div class="featured-item">
              <img src="{{asset('storage/app/images/'.$product->image)}}" alt="image">
            </a>
            <div class="d-flex justify-content-between">
              <div>
                <h4>{{$product->title}}</h4>            
                <h6>Kyat {{$product->price}}</h6>
              </div>
              <div class="justify-content-right">
                <h4>
                    <form action="{{ route('cart.add') }}" method="POST" enctype="multipart/form-data">
                      @csrf 
                      <input type="hidden" value="{{ $product->id }}" name="id">
                      <input type="hidden" value="{{ $product->title }}" name="title">
                      <input type="hidden" value="{{ $product->price }}" name="price">
                      <input type="hidden" value="{{ $product->image }}"  name="image">
                      <input type="hidden" value="1" name="quantity">
                      <button class="btn btn-primary">Add To Cart</button>
                    </form>
                </h4>
              </div> 
              
            </div>    
              
          </div>
          
        </div>
      @endforeach
        
        {{-- <div id="2" class="item high col-md-4">
          <a href="single-product.html">
            <div class="featured-item">
              <img src="assets/images/product-02.jpg" alt="">
              <h4>Erat odio rhoncus</h4>
              <h6>$25.00</h6>
            </div>
          </a>
        </div>
        <div id="3" class="item low col-md-4">
          <a href="single-product.html">
            <div class="featured-item">
              <img src="assets/images/product-03.jpg" alt="">
              <h4>Integer vel turpis</h4>
              <h6>$35.00</h6>
            </div>
          </a>
        </div>
        <div id="4" class="item low col-md-4">
          <a href="single-product.html">
            <div class="featured-item">
              <img src="assets/images/product-04.jpg" alt="">
              <h4>Sed purus quam</h4>
              <h6>$45.00</h6>
            </div>
          </a>
        </div>
        <div id="5" class="item new high col-md-4">
          <a href="single-product.html">
            <div class="featured-item">
              <img src="assets/images/product-05.jpg" alt="">
              <h4>Morbi aliquet</h4>
              <h6>$55.00</h6>
            </div>
          </a>
        </div>
        <div id="6" class="item new col-md-4">
          <a href="single-product.html">
            <div class="featured-item">
              <img src="assets/images/product-06.jpg" alt="">
              <h4>Urna ac diam</h4>
              <h6>$65.00</h6>
            </div>
          </a>
        </div>
        <div id="7" class="item new high col-md-4">
          <a href="single-product.html">
            <div class="featured-item">
              <img src="assets/images/product-03.jpg" alt="">
              <h4>Proin eget imperdiet</h4>
              <h6>$75.00</h6>
            </div>
          </a>
        </div>
        <div id="8" class="item low new col-md-4">
          <a href="single-product.html">
            <div class="featured-item">
              <img src="assets/images/product-02.jpg" alt="">
              <h4>Nullam risus nisl</h4>
              <h6>$85.00</h6>
            </div>
          </a>
        </div>
        <div id="9" class="item new col-md-4">
          <a href="single-product.html">
            <div class="featured-item">
              <img src="assets/images/product-01.jpg" alt="">
              <h4>Cras tempus</h4>
              <h6>$95.00</h6>
            </div>
          </a>
        </div> --}}
    </div>
</div>

<div class="page-navigation">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        {{-- <ul>
          <li class="current-page"><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
        </ul> --}}
        {{$products->links('pagination')}}
      </div>
    </div>
  </div>
</div>
<!-- Featred Page Ends Here -->


<!-- Subscribe Form Starts Here -->
<div class="subscribe-form">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <div class="line-dec"></div>
          <h1>Subscribe on PIXIE now!</h1>
        </div>
      </div>
      <div class="col-md-8 offset-md-2">
        <div class="main-content">
          <p>Godard four dollar toast prism, authentic heirloom raw denim messenger bag gochujang put a bird on it celiac readymade vice.</p>
          <div class="container">
            <form id="subscribe" action="" method="get">
              <div class="row">
                <div class="col-md-7">
                  <fieldset>
                    <input name="email" type="text" class="form-control" id="email" 
                    onfocus="if(this.value == 'Your Email...') { this.value = ''; }" 
                  onBlur="if(this.value == '') { this.value = 'Your Email...';}"
                  value="Your Email..." required="">
                  </fieldset>
                </div>
                <div class="col-md-5">
                  <fieldset>
                    <button type="submit" id="form-submit" class="button">Subscribe Now!</button>
                  </fieldset>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Subscribe Form Ends Here -->
@endsection