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
						<h2><i class="halflings-icon user"></i><span class="break"></span>SubCategories</h2>
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
								  <th style="width: 5%" >Id</th>
								  <th style="width: 15%" >Sub Category name</th>
								  <th style="width: 15%" >Category Name</th>
								  
								  <th style="width: 30%">Description</th>
                               
								  <th style="width: 15%">Status</th>								  
								  <th style="width: 20%">action</th>
							  </tr>
						  </thead> 
                                 @foreach ($subcategories as $subcategory)
						  <tbody>
                         
                                  
                              
							<tr>
								<td>{{$subcategory->id}}</td>
								<td class="center">{{$subcategory->name}}</td>
								<td class="center">{{$subcategory->category->name}}</td>
								<td class="center">{!!$subcategory->description!!}</td>
								
                                
                                <td class="center">
									@if ($subcategory->status==1)
										<span class="label label-success">active</span>
									@else
										<span class="label label-danger">deactive</span>
									@endif
									
								</td>
								<td class="row">
								<div class="span3"></div>
								<div class="span2">
									
									@if($subcategory->status==1)
										<a class="btn btn-success" href="{{url('/subcat-status'.$subcategory->id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
									
									@else
									 <a class="btn btn-danger" href="{{url('/subcat-status'.$subcategory->id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
									@endif

								</div>
								<div class="span2">
									<a class="btn btn-info" href="{{url('/sub-categories/edit'.$subcategory->id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
								</div>
								<div class="span2">
									<form method="post" action="{{url('/sub-categories/delete'.$subcategory->id)}}">
									@csrf
									@method('PUT') 
								<button class="btn btn-danger" type="submit"> <i class="halflings-icon white trash"></i></button>
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