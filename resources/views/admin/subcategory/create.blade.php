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
               
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Sub-Category</h2>
                

            </div>

            <div class="box-content">
                <form class="form-horizontal" action="{{url('/sub-categories')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="date01">Sub-Category Name</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="name" required>
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
                            <label class="control-label" for="textarea2">sub-Category Description</label>
                            <div class="controls">
                                <textarea class="cleditor" name="description" rows="3" required></textarea>
                            </div>

                        </div>

                        

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Add Sub-Category</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->
    </div><!--/row-->
    </div><!--/row-->
   
@endsection