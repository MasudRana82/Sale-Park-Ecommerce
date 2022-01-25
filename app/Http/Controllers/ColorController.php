<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;

class ColorController extends Controller
{
    
    


    public function create()
    {
         return view('admin.color.create');
    }

    public function index()
    {
        $sizes = Color::all();
         return view('admin.color.index',compact('sizes'));
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
        $size= new Color;
        $size->name=json_encode($sizes); //save the data with json encode  
  
        $size->save(); //all data save
        return redirect()->back()->with('messege','Color created successfully'); //back function j page e cilo oi page e abr niya ase
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change_status(Color $category)
    {
        if($category->status==1){
            $category->update(['status'=>0]);
        }
        else
        {
         $category->update(['status'=>1]);
        }
        
       return redirect()->back()->with('messege',' Status change successfully');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Color $category)
    {
        return view('admin.color.edit',compact('category'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Color $category)
    {
        $sizes =explode(',',$request->name);
        $update = $category->update([
            'name'=>json_encode($sizes),
            
        ]);
        if ($update){
           
             return redirect('/color')->with('messege','Color update successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Color $category)
    {
        $result=$category->delete();
        
        if($result){
               return redirect()->back()->with('messege','Color delete successfully!!');  
        }
      
          
        
    }
}
