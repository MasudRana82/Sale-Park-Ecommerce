<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="{{url('/')}}">Home</a></li>
						<li><a href="#">Hot Deals</a></li>
						
						@foreach ($categories as $category)
								
								<li><a href="{{url('/product_by_cat'.$category->id)}}">{{$category->name}}</a></li>
						@endforeach
						
						
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>