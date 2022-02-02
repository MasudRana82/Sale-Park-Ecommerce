@extends('frontend.master')
@section('content')
        <div class="section">
			<!-- container -->
		<div class="container">
<div class="col-md-3"></div>
<!-- Order Details -->
        <div class="col-md-6 order-details">
            <div class="section-title text-center">
                <h3 class="title">Your Order</h3>
            </div>
            <div class="order-summary">
                <div class="order-col">
                    <div><strong>PRODUCT</strong></div>
                    <div><strong>TOTAL</strong></div>
                </div>
                @php
		        $cart_array = cardArray();
				@endphp
                <div class="order-products">
                    @foreach ($cart_array as $cart)

                    <div class="order-col">
                        <div>{{$cart['quantity']}}x {{$cart['name']}}</div>
                        <div>&#2547 {{$cart['price']}}</div>
                    </div>

                    @endforeach
                   
                </div>
                <div class="order-col">
                    <div>Shiping Cost</div>
                    <div><strong>&#2547 60</strong></div>
                </div>
                <div class="order-col">
                    <div><strong>TOTAL</strong></div>
                    <div><strong class="order-total">&#2547 {{Cart::getTotal()+60}} </strong></div>
                </div>
            </div>
            <div class="payment-method">
                <form action="{{url('/payment')}} " method="post">
                    @csrf
                <div class="input-radio">
                    <input type="radio" name="payment" id="payment-1" value="cash">
                    <label for="payment-1">
                        <span></span>
                        Cash On Delevery
                    </label>
                    
                </div>
                <div class="input-radio">
                    <input type="radio" name="payment" id="payment-2" value="bkash">
                    <label for="payment-2">
                        <span></span>
                        Bkash
                    </label>
                    <div class="caption">
                        <p>+8801798249882</p>
                    </div>
                </div>
                <div class="input-radio">
                    <input type="radio" name="payment" id="payment-3" value="nagad">
                    <label for="payment-3">
                        <span></span>
                       Nagad
                    </label>
                    <div class="caption">
                        <p>+8801798249882</p>
                    </div>
                </div>
                <div class="input-radio">
                    <input type="radio" name="payment" id="payment-4" value="dbbl">
                    <label for="payment-4">
                        <span></span>
                       DBBL
                    </label>
                    <div class="caption">
                        <p>+8801798249882</p>
                    </div>
                </div>
                <div class="input-radio">
                    <input type="radio" name="payment" id="payment-5" value="paypal">
                    <label for="payment-5">
                        <span></span>
                       Paypal
                    </label>
                    <div class="caption">
                        <p>+8801798249882</p>
                    </div>
                </div>
               
            </div>
            <div class="input-checkbox">
                <input type="checkbox" id="terms">
                <label for="terms">
                    <span></span>
                    I've read and accept the <a href="#">terms & conditions</a>
                </label>
            </div>
            <input type="submit" value="Place Order" class="primary-btn order-submit" style="float: right;">
            </form>
        </div>
        <!-- /Order Details -->
        <div class="col-md-3"></div>
        </div>
        </div>

@endsection