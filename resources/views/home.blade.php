@extends('layouts.layout')

@section('content')
<!-- Banner Starts Here -->
<div class="banner">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="caption">
          <h2>Ecommerce HTML Template</h2>
          <div class="line-dec"></div>
          <p>Pixie HTML Template can be converted into your desired CMS theme. Total <strong>5 pages</strong> included. You can use this Bootstrap v4.1.3 layout for any CMS. 
          <br><br>Please tell your friends about <a rel="nofollow" href="https://www.facebook.com/tooplate/">Tooplate</a> free template site. Thank you. Photo credit goes to <a rel="nofollow" href="https://www.pexels.com">Pexels website</a>.</p>
          <div class="main-button">
            <a href="{{route('checkout')}}">Order Now!</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Banner Ends Here -->

<!-- Featured Starts Here -->
<div class="featured-items">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <div class="line-dec"></div>
          <h1>New Features</h1>
        </div>
      </div>
      <div class="col-md-12">
        <div class="owl-carousel owl-theme">
          @foreach ($products as $product)
            <a href="">
              <div class="featured-item">
                <img src="{{asset('storage/app/images/'.$product->image)}}" alt="image">
                <h4>{{$product->title}}</h4>
                <h6>{{$product->price}} Kyat</h6>
              </div>
            </a>
          @endforeach          
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Featred Ends Here -->

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
              <p>Integer vel turpis ultricies, lacinia ligula id, lobortis augue. Vivamus porttitor dui id dictum efficitur. Phasellus vel interdum elit.</p>
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