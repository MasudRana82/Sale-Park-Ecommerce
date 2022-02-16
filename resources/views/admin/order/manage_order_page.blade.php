@extends('admin.admin_master')
@section('admin_content')
   @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>

                     <p class="alert-success">	
                <?php
                            $msg=Session::get('messege');
                            if($msg){
                                echo "$msg";
                                 Session::put('messege',null);
                            }
                ?>

                    </p>

						<h2><i class="halflings-icon user"></i><span class="break"></span>Order</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th style="width: 10%" >Order id</th>
								  <th style="width: 15%" >Customer Name</th>
								  <th style="width: 10%"> Total (&#2547)</th>
								  <th style="width: 15%">Order date and time</th>
								  <th style="width: 5%">Transaction id</th>
								  <th style="width: 5%">Payment</th>
                                  
								  <th style="width: 10%">Status</th>								  
								  <th style="width: 15%">Action</th>
							  </tr>
						  </thead> 
                                 @foreach ($orders as $order)
						  <tbody>
                         
                                  
                              
							<tr>
								<td>{{$order->id}}</td>
								<td class="center">{{$order->name}}</td>
								<td class="center">&#2547 {{$order->amount}}</td>
								{{-- Carbon is a laravel date & time package.( iA use for 12 hours) --}}
								<td class="center">{{Carbon\Carbon::parse($order->created_at)->format('M d,Y,h:iA')}}</td> 
								<td class="center">{{$order->transaction_id}}</td>
                                <td class="center">{{$order->status}}</td>
                             
                                <td class="center">
									
										<span class="label label-success">active</span>
									
										
									
									
								</td>
								<td class="row">
								<div class="span1"></div>
								<div class="span3">
									
									
										{{-- <a class="btn btn-success" href="{{url('/brand-status')}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a> --}}
									
								
									 <a class="btn btn-danger" href="{{url('/brand-status')}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
								

								</div>
								<div class="span4">
									<a class="btn btn-info" href="{{url('/order-view/'.$order->id)}}">
								VIEW
									</a>
								</div>
								<div class="span3">
									<form method="post" action="{{url('/delete')}}">
									@csrf
									@method('PUT') 
								<button class="btn btn-danger" type="submit"> <i class="halflings-icon white trash"></i></button>
									</form>
								</div>
									<div class="span1"></div>
								</td>
							</tr>
				
							
						  </tbody>
                          	@endforeach
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
    
@endsection