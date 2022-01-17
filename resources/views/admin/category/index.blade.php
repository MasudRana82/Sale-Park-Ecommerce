@extends('admin.admin_master')
@section('admin_content')
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
						<h2><i class="halflings-icon user"></i><span class="break"></span>Categories</h2>
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
								  <th style="width: 5%" >id</th>
								  <th style="width: 15%" >Category_name</th>
								  <th style="width: 30%">Description</th>
                                  <th style="width: 15%">Image</th>
								  <th style="width: 15%">Status</th>								  
								  <th style="width: 20%">action</th>
							  </tr>
						  </thead> 
                                 @foreach ($categories as $category)
						  <tbody>
                         
                                  
                              
							<tr>
								<td>{{$category->id}}</td>
								<td class="center">{{$category->name}}</td>
								<td class="center">{!!$category->description!!}</td>
								
                                <td class="center">
									<img src="{{asset('/storage/'.$category->image)}}" style="height: 80px" alt="pic" >
								</td>
                                <td class="center">
									<span class="label label-success">active</span>
								</td>
								<td class="row">
								<div class="span3"></div>
								<div class="span2">
								
										
									
									
										<a class="btn btn-success" href="#">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
										
								
										
									
									
								</div>
								<div class="span2">
									<a class="btn btn-info" href="#">
										<i class="halflings-icon white edit"></i>  
									</a>
								</div>
								<div class="span2">
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i> 
									</a>
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