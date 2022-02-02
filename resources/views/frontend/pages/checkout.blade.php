@extends('frontend.master')
@section('content')
<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-2"></div>

					<div class="col-md-8">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Shipping address</h3>
							</div>
							<form action="{{url('/shipping-address')}} " method="post">
								@csrf
							<div class="form-group">
								<input class="input" type="text" name="name" placeholder="Full Name" value="" required>
							</div>
							
							<div class="form-group">
								<input class="input" type="email" name="email" placeholder="Email" value="" required>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="address" placeholder="Address" required>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="city" placeholder="City" required>
							</div>
							
							<div class="form-group">
								<input class="input" type="text" name="zipcode" placeholder="ZIP Code" required>
							</div>
							<div class="form-group">
								<input class="input" type="tel" name="mobile" placeholder="Mobile Number" required>
							</div>
							<button class="btn btn-success" style="float: right; background-color: #D10024;" type="submit">   Next   </button>
						</div>
						</form>
						<!-- /Billing Details -->

						

					

					
				</div>
				<!-- /row -->
				<div class="col-md-2"></div>
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
@endsection