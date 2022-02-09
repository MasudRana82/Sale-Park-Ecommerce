@extends('frontend.master')
@section('content')

<style> 
.param {
    margin-bottom: 7px;
    line-height: 1.4;
}
.param-inline dt {
    display: inline-block;
}
.param dt {
    margin: 0;
    margin-right: 7px;
    font-weight: 600;
}
.param-inline dd {
    vertical-align: baseline;
    display: inline-block;
}

.param dd {
    margin: 0;
    vertical-align: baseline;
} 

.shopping-cart-wrap .price {
    color: #000000;
    font-size: 18px;
    font-weight: bold;
    margin-right: 5px;
    display: block;
}
var {
    font-style: normal;
}

.media img {
    margin-right: 1rem;
}
.img-sm {
    width: 110px;
    max-height: 75px;
    object-fit: cover;
}
</style>



<div class="container">




<div class="card">
<table class="table table-hover shopping-cart-wrap">
<thead class="text-muted">
<tr>
  <th scope="col" style="width: 20% ">Product name</th>
  <th scope="col" style="width: 20% ">Image</th>
  <th scope="col" style="width: 10% ">Quantity</th>
  <th scope="col" style="width: 20% ">Price</th>
  <th scope="col" style="width: 20% " class="text-left">Action</th>
</tr>
</thead>
<tbody>
	@forelse ($wdata as $product)
		
		@php
			$product['image'] = explode('|',$product->Product->image);
			$images = $product->image[0];
		@endphp
<tr>
	<td> {{$product->Product->name}}</td>
	<td>
<figure class="media">
	<div class="img-wrap"><img src="{{asset('/image/'.$images)}}" class="img-thumbnail img-sm"></div>
	

	</td>
	<td class="center"> 
		<input type="number" value="1" >
	</td>
	<td class="center"> 
		<div class="price-wrap"> 
			<var class="price">&#2547 {{$product->Product->price}}</var> 
			
		</div> <!-- price-wrap .// -->
	</td>
	<td > 
	
	<form action="{{url('/add-to-cart')}}" method="post">
												@csrf
											
												<input type="hidden" name="quantity" value="1">
												<input type="hidden" name="id" value="{{$product->Product->id}}">
												<button class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Cart</button>
											
										</form>
		
	
									<form method="post" action="{{url('/wishlist-delete/'.$product->id)}}">
									@csrf
								 
								<button class="btn btn-danger" type="submit"> <i class="fa fa-close">Delete</i></button>
									</form>
								
	</td>
</tr>
@empty
    <h3>No Product</h3>
@endforelse
<tr>

</tbody>
</table>
</div> <!-- card.// -->

</div> 
<!--container end.//-->

<br><br>


@endsection