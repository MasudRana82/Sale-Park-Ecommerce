@extends('frontend.master')
@section('content')
	{{-- Multiple image Sepatation --}}
			@php
			$products['image'] = explode('|',$products->image);
			
			@endphp

<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="{{url('/')}} ">Home</a></li>
							<li><a href="#">{{$products->Category->name}}</a></li>
							<li><a href="#">{{$products->Subcategory->name}}</a></li>
							
							<li class="active">{{$products->name}} </li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
							@foreach ($products->image as $image)
								
							
							<div class="product-preview">
								<img src="{{asset('/image/'.$image)}}" alt="">
							</div>
							@endforeach
							
						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						<div id="product-imgs">
								@foreach ($products->image as $image)
								
							
							<div class="product-preview">
								<img src="{{asset('/image/'.$image)}}" alt="">
							</div>
							@endforeach
							
						</div>
					</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name">{{$products->name}} </h2>
							<div>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
								</div>
								<a class="review-link" href="#tab3"><?=count($comments)?> Review(s) | Add your review</a>
							</div>
							<div>
								<h3 class="product-price">&#2547 {{$products->price}} <del class="product-old-price">&#2547 {{$products->price+100}}</del></h3>
								<span class="product-available">In Stock</span>
							</div>
							{{-- <p>{!!$products->description!!}</p> --}}

							<div class="product-options">
								<label>
									Size
									<select class="input-select">
										@foreach (Json_decode($sizes->name) as $value)
										<option value="{{$value}}">{{$value}} </option>	
										@endforeach
										
									</select>
								</label>
								<label>
									Color
									<select class="input-select">
										@foreach (Json_decode($colors->name) as $value)
										<option value="{{$value}}">{{$value}}</option>	
										@endforeach
									</select>
								</label>
							</div>

							<form action="{{url('/add-to-cart')}}" method="post">
												@csrf
											<div class="add-to-cart">
												{{-- <div class="qty-label">
															Qty
															<div class="input-number">
																<input type="number">
																<span class="qty-up">+</span>
																<span class="qty-down">-</span>
															</div>
														</div> --}}
												<input type="hidden" name="quantity" value="1">
												<input type="hidden" name="id" value="{{$products->id}}">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
											</div>
										</form>

							<ul class="product-btns">
							<form action="{{url('/add-wishlist')}} " method="post"> 
														@csrf
												<div class="product-btns">
													
														<input type="hidden" name="id" value="{{$products->id}}">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
												</form>
							</ul>

							<ul class="product-links">
								<li>{{$products->category->name}} </li>
								<li><a href="#">{{$products->subcategory->name}} </a></li>
								<li><a href="#">{{$products->brand->name}}</a></li>
							</ul>

							<ul class="product-links">
								<li>Share:</li>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-envelope"></i></a></li>
							</ul>

						</div>
					</div>
					<!-- /Product details -->

					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
								
								<li><a data-toggle="tab" href="#tab3">Reviews (<?=count($comments)?>)</a></li>
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div class="col-md-12">
											<p>{!!$products->description!!}</p>
										</div>
									</div>
								</div>
								<!-- /tab1  -->

							

								<!-- tab3  -->
								<div id="tab3" class="tab-pane fade in">
									<div class="row">
										<!-- Rating -->
										<div class="col-md-3">
											<div id="rating">
												<div class="rating-avg">
													<span>5.0</span>
													<div class="rating-stars">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o"></i>
													</div>
												</div>
												<ul class="rating">
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
														</div>
														<div class="rating-progress">
															<div style="width: 80%;"></div>
														</div>
														<span class="sum"><?=count($comments)?></span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div style="width: 60%;"></div>
														</div>
														<span class="sum">0</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div></div>
														</div>
														<span class="sum">0</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div></div>
														</div>
														<span class="sum">0</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div></div>
														</div>
														<span class="sum">0</span>
													</li>
												</ul>
											</div>
										</div>
										<!-- /Rating -->

										<!-- Reviews -->
										<div class="col-md-6">
											<div id="reviews">
												<ul class="reviews">
													@foreach ($comments as $comment)
														
													
													<li>
														<div class="review-heading">
															<h5 class="name">{{$comment->Customer->name}}</h5>
															<p class="date">{{Carbon\Carbon::parse($comment->created_at)->format('M d,Y,h:iA')}}</p>
															<div class="review-rating">

																@for ($i = 1; $i <= $comment->rating; $i++)
																	<i class="fa fa-star"></i>

																@endfor
																
																@for ($j = $i; $j <= 5; $j++)
																	
																<i class="fa fa-star-o empty"></i>
																@endfor
																
															</div>
														</div>
														<div class="review-body">
															<p>{{$comment->comment}}</p>
														</div>
													</li>
													@endforeach
													
											</div>
										</div>
										<!-- /Reviews -->

										<!-- Review Form -->
										<div class="col-md-3">
											<div id="review-form">
												<form class="review-form" action="{{url('/commnent-add')}} " method="POST">
													@csrf
													{{-- <input class="input" type="text" placeholder="Your Name">
													<input class="input" type="email" placeholder="Your Email"> --}}
													<textarea class="input" placeholder="Your Review" name="comment"></textarea>
												<input type="hidden" name="product" value="{{$products->id}} ">
													<div class="input-rating">
														<span>Your Rating: </span>
														<div class="stars">
															<input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
															<input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
															<input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
															<input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
															<input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
														</div>
													</div>
													<button class="primary-btn">Submit</button>
												</form>
											</div>
										</div>
										<!-- /Review Form -->
									</div>
								</div>
								<!-- /tab3  -->
							</div>
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- Section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-12">
						<div class="section-title text-center">
							<h3 class="title">Related Products</h3>
						</div>
					</div>

						@foreach ($related_product as $product)

											{{-- Multiple image Sepatation --}}
											@php
											$product['image'] = explode('|',$product->image);
											$images = $product->image[0];
											@endphp

										<!-- product -->
										<div class="col-md-3 col-xs-6">
										<div class="product">
											<a href="{{url('/view-product'.$product->id)}} ">
											<div class="product-img">
												<img src="{{asset('/image/'.$images)}}" style="height:230px ">
												<div class="product-label">
													<span class="sale">-30%</span>
													<span class="new">new</span>
												</div>
											</div></a>
											<div class="product-body">
												<p class="product-category"><a href="{{url('view-product'.$product->id)}}">{{$product->category->name?? 'None'}}</p></a>
												<h3 class="product-name"><a href="{{url('/view-product'.$product->id)}}">{{$product->name}}</a></h3>
												<h4 class="product-price"><a href="{{url('/view-product'.$product->id)}} "> &#2547 {{$product->price}} <del class="product-old-price">&#2547 {{$product->price+100}}</del></h4></a>
												<div class="product-rating">
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													{{-- <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button> --}}
													<a href="{{url('/view-product'.$product->id)}}"><button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view </a></span></button>
												</div>
											</div>
											<form action="{{url('/add-to-cart')}}" method="post">
												@csrf
											<div class="add-to-cart">
												<input type="hidden" name="quantity" value="1">
												<input type="hidden" name="id" value="{{$product->id}}">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
											</div>
										</form>
										</div>
										</div>
										<!-- /product -->
										
										@endforeach

					


				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /Section -->
		
@endsection