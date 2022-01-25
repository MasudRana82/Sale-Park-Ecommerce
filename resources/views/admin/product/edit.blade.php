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
               
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Product </h2>
                

            </div>

            <div class="box-content">
                <form class="form-horizontal" action="{{url('/product/update'.$product->id)}}" method="post" enctype="multipart/form-data">
                     @csrf 
                   @method('PUT') 
                    {{-- always use 'PUT' in update operation --}}
                    <fieldset>

                         <div class="control-group">
                            <label class="control-label" for="date01">Code</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="code"  value="{{$product->name}}" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="date01">Name</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="name" value="{{$product->name}}" required>
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
                         <div class="control-group">
                            <label class="control-label" for="date01">Select Sub-Category</label>
                            <div class="controls">
                                 <select name="subcategory">
                                <option>select sub-category</option>
                                @foreach ($subcategories as $category)
                                    <option value="{{$category->id}}" >{{$category->name}}</option> 
                                @endforeach
                               </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="date01">Select Brand</label>
                            <div class="controls">
                                 <select name="brand">
                                <option>Select Brand</option>
                                @foreach ($brands as $category)
                                    <option value="{{$category->id}}" >{{$category->name}}</option> 
                                @endforeach
                               </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="date01">Select Unit</label>
                            <div class="controls">
                                 <select name="unit">
                                <option>select Unit</option>
                                @foreach ($units as $category)
                                    <option value="{{$category->id}}" >{{$category->name}}</option> 
                                @endforeach
                               </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="date01">Select color</label>
                            <div class="controls">
                                 <select name="color">
                                <option>select color</option>
                                @foreach ($colors as $category)
                                    <option value="{{$category->id}}" >{{$category->name}}</option> 
                                @endforeach
                               </select>
                            </div>
                        </div>


                        <div class="control-group">
                            <label class="control-label" for="date01">Select Size</label>
                            <div class="controls">
                                 <select name="size">
                                <option>select Size</option>
                                @foreach ($sizes as $category)
                                    <option value="{{$category->id}}" >{{$category->name}}</option> 
                                @endforeach
                               </select>
                            </div>
                        </div>

                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Description</label>
                             <div class="controls">
                             <textarea class="cleditor" name="description" rows="3" value="{{$product->description}} " required></textarea>
                              </div>
                             </div>

                        <div class="control-group">
                            <label class="control-label">Image(Max 5)</label>
                            <div class="controls">
                                <input type="file" name="file[]" multiple required>
                            </div>
                        </div>
                        
        
                         <div class="control-group">
                            <label class="control-label" for="date01">Price &#2547</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="price" required>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Update Product</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->
    </div><!--/row-->
    </div><!--/row-->
   
@endsection