<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = Unit::all();
         return view('admin.unit.index',compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.unit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
        public function store(Request $request)
    {
        $category= new Unit;
        $category->id=$request->category;
        $category->name=$request->name;
        $category->description=$request->description;

       
        
         $category->save(); //all data save
         return redirect()->back()->with('messege','Category created successfully'); //back function j page e cilo oi page e abr niya ase
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change_status(Category $category)
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
    public function edit(Category $category)
    {
        return view('admin.category.edit',compact('category'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $update = $category->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'image'=>$request->file('image')->store('category'),
        ]);
        if ($update){
           
             return redirect('/categories')->with('messege','Category update successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $result=$category->delete();
        
        if($result){
               return redirect()->back()->with('messege','Category delete successfully!!');  
        }
      
          
        
    }
}
