<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $subcategories =SubCategory::all();
      return view('admin.subcategory.index',compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.subcategory.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subcategory= new SubCategory;
        $subcategory->cat_id=$request->category;
        $subcategory->name=$request->name;
        $subcategory->description=$request->description;

        $subcategory->save(); //all data save
         return redirect()->back()->with('messege','SubCategory created successfully'); //back function j page e cilo oi page e abr niya ase
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      public function change_status(SubCategory $subcategory)
    {
        if($subcategory->status==1){
            $subcategory->update(['status'=>0]);
        }
        else
        {
         $subcategory->update(['status'=>1]);
        }
        
        return redirect()->back()->with('messege','Status change successfully');

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subcategory)
    {
        $categories=Category::all();
        return view('admin.subcategory.edit',compact('subcategory','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subcategory)
    {
       $result = $subcategory->update([
            'name'=>$request->name,
            'cat_id'=>$request->category,
            'description'=>$request->description,
       ]);
       if($result){
               return redirect('/sub-categories')->with('messege','SubCategory update successfully!!');  
        }
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subcategory)
    {
         $result=$subcategory->delete();
        if($result){
               return redirect()->back()->with('messege','Category delete successfully!!');  
        }
      
          
        
    
    }
}
