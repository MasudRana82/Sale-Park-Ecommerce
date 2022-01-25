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
               
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit size</h2>
                

            </div>

            <div class="box-content">
                <form class="form-horizontal" action="{{url('/color/update'.$category->id)}}" method="post">
                      
                @csrf 
                {{-- always use 'PUT' in update operation --}}
                @method('PUT') 
                    
                  
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="date01"> Size</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="name" data-role="tagsinput"  required value="{{implode(',',Json_decode($category->name))}}">
                            </div>
                        </div>


                       

                       


                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">update size</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->
    </div><!--/row-->
    </div><!--/row-->
   
@endsection