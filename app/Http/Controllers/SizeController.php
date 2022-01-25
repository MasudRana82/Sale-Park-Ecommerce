<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Size;

class SizeController extends Controller
{
    
    


    public function create()
    {
         return view('admin.size.create');
    }

    public function index()
    {
        $sizes = Size::all();
         return view('admin.size.index',compact('sizes'));
    }

  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
        public function store(Request $request)
    {
        $sizes =explode(',',$request->name);// explode means divide. here we saparete data using comma.
        $size= new Size;
        $size->name=json_encode($sizes); //save the data with json encode  
  
        $size->save(); //all data save
        return redirect()->back()->with('messege','Size created successfully'); //back function j page e cilo oi page e abr niya ase
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change_status(Size $category)
    {
        if($category->status==1){
            $category->update(['status'=>0]);
        }
        else
        {
         $category->update(['status'=>1]);
        }
        
       return redirect()->back()->with('messege','  Status change successfully');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Size $category)
    {
        return view('admin.size.edit',compact('category'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Size $category)
    {
        $sizes =explode(',',$request->name);
        $update = $category->update([
            'name'=>json_encode($sizes),
            
        ]);
        if ($update){
           
             return redirect('/size')->with('messege','Size update successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Size $category)
    {
        $result=$category->delete();
        
        if($result){
               return redirect()->back()->with('messege','Size delete successfully!!');  
        }
      
          
        
    }
}
