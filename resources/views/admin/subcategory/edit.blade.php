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
               
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit subCategory</h2>
                

            </div>

            <div class="box-content">
                <form class="form-horizontal" action="{{url('/sub-categories/'.$category->id)}}" method="post" enctype="multipart/form-data">
                      
                    @csrf 
                   @method('PUT') 
                    {{-- always use 'PUT' in update operation --}}
                  
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="date01">subCategory Name</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="name" required value="{{$subcategory->name}}">
                            </div>
                        </div>

                         <div class="control-group">
                            <label class="control-label" for="date01">Select Category</label>
                            <div class="controls">
                                 <select name="category">
                                <option>select category</option>
                              
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}" >{{$category->name}}</option> 
                                @endforeach
                               </select>
                            </div>
                        </div>


                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Category Description</label>
                            <div class="controls">
                                <textarea class="cleditor" name="description" rows="3" required>{{$subcategory->description}}</textarea>
                            </div>

                        </div>

                       


                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">update subCategory</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->
    </div><!--/row-->
    </div><!--/row-->
   
@endsection