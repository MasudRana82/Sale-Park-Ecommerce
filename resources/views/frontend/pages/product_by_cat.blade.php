<?php
	use App\Models\Product;
?>
@extends('frontend.master')
@section('content')
   

		{{-- <!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="#">All Categories</a></li>
							<li><a href="#">cat</a></li>
							<li><a href="#">Accessories</a></li>
							<li class="active">Headphones (227,490 Results)</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB --> --}}

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Sub-Categories</h3>
							<div class="checkbox-filter">
                                @foreach ($subcategories as $sub)
                                @php
									$subcatcount=Product::subcatProductCount($sub->id);
								@endphp
                              
								<div class="input-checkbox">
									<input type="checkbox" id="category-1">
									<label for="category-1">
										<span></span>
										<a href="{{url('/product_by_subcat'.$sub->id)}}"> {{$sub->name}} </a>
										<small>({{$subcatcount}})</small>
										
									</label>
								</div>
                            @endforeach
							
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						{{-- <div class="aside">
							<h3 class="aside-title">Price</h3>
							<div class="price-filter">
								<div id="price-slider"></div>
								<div class="input-number price-min">
									<input id="price-min" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
								<span>-</span>
								<div class="input-number price-max">
									<input id="price-max" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
							</div>
						</div> --}}
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Brand</h3>
							<div class="checkbox-filter">
                                @foreach ($brands as $brand)
                                 @php
									$brandcount=Product::brandProductCount($brand->id);
								@endphp
								<div class="input-checkbox">
									<input type="checkbox" id="brand-1">
									<label for="brand-1">
										<span></span>
										<a href="{{url('/product_by_brand'.$brand->id)}}"> {{$brand->name}} </a>
										<small>({{$brandcount}})</small>
									</label>
								</div>
								@endforeach
								
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Top selling</h3>
							@foreach ($top_products as $top_product)
							@php
									$top_product['image']= explode('|',	$top_product->image);
									$images = $top_product->image[0];
							@endphp
							
							<div class="product-widget">
								<a href="{{url('/view-product'.$top_product->id)}}">
								<div class="product-img">
									<img src="{{asset('/image/'.$images)}} " alt="">
								</div>
								<div class="product-body">
									<p class="product-category">{{$top_product->category->name}}</p>
									<h3 class="product-name">{{$top_product->name}}</h3>
									<h4 class="product-price">{{$top_product->price}}<del class="product-old-price">{{$top_product->price+100}}</del></h4>
								</div>
								</a>
							</div>
							@endforeach
						
						</div>
						<!-- /aside Widget -->
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store top filter -->
						<div class="store-filter clearfix">
							<div class="store-sort">
								<label>
									Sort By:
									<select class="input-select">
										<option value="0">Popular</option>
										<option value="1">Position</option>
									</select>
								</label>

								<label>
									Show:
									<select class="input-select">
										<option value="0">20</option>
										<option value="1">50</option>
									</select>
								</label>
							</div>
							<ul class="store-grid">
								<li class="active"><i class="fa fa-th"></i></li>
								<li><a href="#"><i class="fa fa-th-list"></i></a></li>
							</ul>
						</div>
						<!-- /store top filter -->

						<!-- store products -->
						<div class="row">
                            	@foreach ($products as $product)

											{{-- Multiple image Sepatation --}}
											@php
											$product['image'] = explode('|',$product->image);
											$images = $product->image[0];
											@endphp
							<!-- product -->
							<div class="col-md-4 col-xs-6">
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
						<!-- /store products -->

						<!-- store bottom filter -->
						<div class="store-filter clearfix">
							<span class="store-qty">Showing 20-100 products</span>
							<ul class="store-pagination">
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
							</ul>
						</div>
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
@endsection