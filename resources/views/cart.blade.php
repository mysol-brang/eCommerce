@extends('layouts.layout')

@section('content')
<link rel="stylesheet" href="{{asset('css/style.css')}}">
	<main class="page pt-3">
	 	<section class="shopping-cart dark">
	 		<div class="container">
		        <div class="block-heading">
		          <h2>Shopping Cart</h2>
                  @if ($message = Session::get('success'))
                          <div class="p-4 mb-3 rounded">
                              <p class="text-success">{{ $message }}</p>
                          </div>
                  @endif
		        </div>
		        <div class="content">
	 				<div class="row">
	 					<div class="col-md-12 col-lg-8">
	 						<div class="items">
                                @foreach ($cartItems as $item)
				 				<div class="product">
				 					<div class="row">
					 					<div class="col-md-3">
					 						<img class="img-fluid mx-auto d-block image rounded p-3" src="{{asset('storage/app/images/'.$item->attributes->image)}}" alt="image">
					 					</div>
					 					<div class="col-md-9">
					 						<div class="info">
						 						<div class="row">
							 						<div class="col-md-4 product-name">
							 							<div class="product-name">
								 							<a href="#">{{$item->title}}</a>
								 							<div class="product-info">
									 							<div>Price: <span class="value">{{$item->price}}</span></div>
									 						</div>
									 					</div>
							 						</div>
							 						<div class="col-md-4 quantity">
							 							<label for="quantity">Quantity:</label>
							 							<input id="quantity" type="number" value ="{{$item->quantity}}" class="form-control quantity-input">
                                                         <div class="">
                                    
                                                            <form action="{{ route('cart.update') }}" method="POST">
                                                              @csrf
                                                              <input type="hidden" name="id" value="{{ $item->id}}" >
                                                            <input type="number" name="quantity" value="{{ $item->quantity }}" 
                                                            class="text-center" />
                                                            <button type="submit" class="px-2 pb-2 ml-2 text-white bg-blue-500">update</button>
                                                            </form>
                                                          </div>
							 						</div>
							 						<div class="col-md-3 price">
							 							<span>Kyat {{$item->price}}</span>
							 						</div>
                                                    <div class="col-md-1">
                                                        <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>
                                                    </div>
							 					</div>
							 				</div>
					 					</div>
					 				</div>
				 				</div>
                                @endforeach
				 			</div>
			 			</div>
			 			<div class="col-md-12 col-lg-4">
			 				<div class="summary">
			 					<h3>Summary</h3>
			 					<div class="summary-item"><span class="text">Subtotal</span><span class="price">$360</span></div>
			 					<div class="summary-item"><span class="text">Discount</span><span class="price">$0</span></div>
			 					<div class="summary-item"><span class="text">Shipping</span><span class="price">$0</span></div>
			 					<div class="summary-item"><span class="text">Total</span><span class="price">$360</span></div>
			 					<button type="button" class="btn btn-primary btn-lg btn-block">Checkout</button>
				 			</div>
			 			</div>
		 			</div> 
		 		</div>
	 		</div>
		</section>
	</main>
@endsection
