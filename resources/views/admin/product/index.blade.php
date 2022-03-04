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

						<h2><i class="halflings-icon user"></i><span class="break"></span>Product List</h2>
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
								  {{-- <th style="width: 5%" >id</th> --}}
								  <th style="width: 5%" >Code</th>
								  <th style="width: 10%" >Name</th>
								  <th style="width: 20%" >Description</th>
								  <th style="width: 5%" >price</th>
								  <th style="width: 15%" >Image</th>
								  <th style="width: 5%" >Category</th>
								  <th style="width: 5%" >SubCat</th>
								  <th style="width: 5%" >Brand</th>
								  <th style="width: 5%" >Unit</th>
								  {{-- <th style="width: 5%" >Size</th>
								  <th style="width: 5%" >color</th> --}}
								  <th style="width: 5%">Status</th>								  
								  <th style="width: 20%">action</th>
							  </tr>
						  </thead> 
                            @foreach ($products as $product)
								 @php
									$product['image'] = explode("|",$product->image); 
								 @endphp
						  <tbody>
                         
                                  
                              
							 <tr>
							
								{{-- <td class="center">{{$product->id}}</td> --}}
								<td class="center">{{$product->code}}</td>
								<td class="center">{{$product->name}}</td>
								<td class="center">{!!$product->description!!}</td>
								<td class="center">&#2547;{{$product->price}}</td>
								<td>
									@foreach ($product->image as $images)
									<img src="{{asset('/image/'.$images)}}" style="height:50px; width:50px;">	
									@endforeach
								</td>
								<td class="center">{{$product->category->name ?? 'None'}}</td>
								<td class="center">{{$product->subcategory->name ?? 'None'}}</td>
								<td class="center">{{$product->brand->name ?? 'None'}}</td>
								<td class="center">{{$product->unit->name ?? 'None'}}</td>
								{{-- <td class="center">{{$product->size->name}}</td>
								<td class="center">{{$product->color->name}}</td> --}}
								
							
                             
                                <td class="center">
									@if ($product->status==1)
										<span class="label label-success">active</span>
									@else
										<span class="label label-danger">deactive</span>
									@endif
									
								</td>
								<td class="row">
								<div class="span3"></div>
								<div class="span2">
									
									@if($product->status==1)
										<a class="btn btn-success" href="{{url('/product-status'.$product->id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
									
									@else
									 <a class="btn btn-danger" href="{{url('/product-status'.$product->id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
									@endif

								</div>
								<div class="span2">
									<a class="btn btn-info" href="{{url('/product/edit'.$product->id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
								</div>
								<div class="span2">
									<form method="post" action="{{url('/product/delete'.$product->id)}}">
									@csrf
									@method('PUT') 
								<button class="btn btn-danger" type="submit"><i class="halflings-icon white trash"></i></button>
									</form>
								</div>
									<div class="span3"></div>
								</td>
							</tr>
				
							
						  </tbody>
                          	@endforeach
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
    
@endsection