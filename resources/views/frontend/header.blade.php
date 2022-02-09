
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +8801732324234</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> salepark@gmail.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> Baby super,Chattogram</a></li>
					</ul>
					<ul class="header-links pull-right">
						<li><a href="#"><i class="fa fa-bdt"></i> &#2547 BDT</a></li>
						@php
							$customer_id= Session::get('id');
							$customer_name= Session::get('name');
						@endphp

						@if ($customer_id!=NULL)
						<li><a href="{{url('#')}}"><i class="fa fa-user-o"></i>{{ $customer_name}}</a></li>
						<li><a href="{{url('/customer-logout')}}">Logout <i class="fa fa-sign-out"></i></a></li>
						

						@else

						<li><a href="{{url('/login')}}"><i class="fa fa-sign-in"></i>Login</a></li>	
						@endif
						
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="{{url('/')}} " class="logo">
									<img src="./img/logo.png" height="50px" height="70px" alt="SalePark">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form action="{{url('/search')}}" method="GET" >
									<select class="input-select" name="category">
										<option value="ALL" {{request('category') == 'ALL' ? 'selected' : '' }} >All Categories</option>

										@foreach ($categories as $category)
										<option value="{{$category->id}}" {{request('category') == $category->id ? 'selected' : ''}} > {{$category->name}}</option>	
										
										@endforeach
										
									</select>
									<input class="input" placeholder="Search here" name="product" value="{{request('product')}} ">
									<button class="search-btn">Search</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->
								@php
									$cart_array = cardArray();
									$wish = App\Models\Wishlist::all();
								@endphp
						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								<div>
									<a href="{{url('/wishlist')}} ">
										<i class="fa fa-heart-o"></i>
										<span>Wishlist</span>
										<div class="qty"><?=count($wish)?></div>
									</a>
								</div>
								<!-- /Wishlist -->

							

								<!-- Cart -->
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Cart</span>
										<div class="qty"><?=count($cart_array)?></div>
									</a>
									<div class="cart-dropdown">
										<div class="cart-list">

											@foreach ($cart_array as $cart)

											<?php
											//image separation
											$images = $cart['attributes'][0];
											$images = explode('|',$images);
											$images = $images[0];

											?>

											<div class="product-widget">
												<div class="product-img">
													<img src="{{asset('/image/'.$images)}}" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">{{$cart['name']}} </a></h3>
													<h4 class="product-price"><span class="qty">{{$cart['quantity']}}x</span>&#2547 {{$cart['price']}}</h4>
												</div>
											<a href="{{url('/delete'.$cart['id'])}} ">	<button class="delete"><i class="fa fa-close"></i></button></a>
											</div>
											@endforeach

										
										</div>
										<div class="cart-summary">
											<small><?=count($cart_array)?> Item(s) selected</small>
											<h5>SUBTOTAL: &#2547 {{Cart::getTotal()}} </h5>
										</div>
										<div class="cart-btns">
											{{-- <a href="{{url('/view-cart')}}">View Cart</a> --}}

											@php
											$customer_id= Session::get('id');
											@endphp

											@if ($customer_id!=NULL)
											<a style="width: 100%; background-color: #D10024;" href="{{url('/checkout')}}" >Checkout  <i class="fa fa-arrow-circle-right"></i></a>

											@else

											<a style="width: 100%; background-color: #D10024;" href="{{url('/login')}}">Checkout    <i class="fa fa-arrow-circle-right"></i></a>
											@endif
											


											
										</div>
									</div>
								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
	