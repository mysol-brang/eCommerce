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
						@if (Cart::getTotalQuantity() == 0)
							<div class="col-md-12 col-lg-12 p-5">
								<h3 class="text-black-50 text-center p-5">Nothing in Cart</h3>
							</div>
						@else
						
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
                                                         <form action="{{ route('cart.quantity') }}" method="POST">
															@csrf
															<input type="hidden" name="id" value="{{ $item->id}}">
															<div class="input-group mb-3">
															<input id="quantity" name="quantity" type="number" value ="{{$item->quantity}}" class="form-control quantity-input" min="1" oninput="this.value = Math.abs(this.value)">
															<div class="input-group-append">
															<button type="submit" class="btn btn-outline-secondary"><i class="fa-solid fa-chevron-up"></i></button>
														    </div>
															</div>
														  </form>                                  
							 						</div>
							 						<div class="col-md-3 price">
							 							<span> {{$item->price * $item->quantity}} Kyat</span>
							 						</div>
                                                    <div class="col-md-1 mt-4">
														<form action="{{ route('cart.remove') }}" method="POST">
															@csrf
															<input type="hidden" value="{{ $item->id }}" name="id">
															<button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>
														</form>
                                                        
                                                    </div>
							 					</div>
							 				</div>
					 					</div>
					 				</div>
				 				</div>
                                @endforeach
								<div class="product">
									<div class="row">
										<div class="col-md-3">
											
										</div>
										<div class="col-md-9">
											<div class="info">
												<div class="row">
													<div class="col-md-4">
														
													</div>
													<div class="col-md-4 price pl-5">
														{{-- <b class="p-5">Total:</b>                             --}}
													</div>
													<div class="col-md-3 price">
														{{-- {{ Cart::getTotal() }} Kyat --}}
													</div>
												   <div class="col-md-1 mt-4">
													   <form action="{{ route('cart.clear') }}" method="POST">
														   @csrf
														   <input type="hidden" value="{{ $item->id }}" name="id">
														   <button class="btn btn-sm bg-danger text-white"><i class="fa-solid fa-reply-all"><i class="fas fa-trash-alt"></i></i></button>
													   </form>
													   
												   </div>
												</div>
											</div>
										</div>
									</div>
								</div>
				 			</div>
			 			</div>
			 			<div class="col-md-12 col-lg-4">
			 				<div class="summary">
			 					<h3>Summary</h3>
			 					<div class="summary-item"><span class="text">Subtotal</span><span class="price">{{ Cart::getTotal() }} Kyat</span></div>
			 					<div class="summary-item"><span class="text">Discount</span><span class="price">0 Kyat</span></div>
			 					<div class="summary-item"><span class="text">Shipping</span><span class="price">0 Kyat</span></div>
			 					<div class="summary-item"><span class="text">Total</span><span class="price">{{ Cart::getTotal() }} Kyat</span></div>
								<a href="{{route('checkout')}}">
									<button type="button" class="btn btn-primary btn-lg btn-block">Checkout</button>
								</a>	
				 			</div>
			 			</div>
						@endif
		 			</div> 
		 		</div>
	 		</div>
		</section>
	</main>
@endsection
