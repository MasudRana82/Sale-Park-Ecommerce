<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Size;
use App\Models\Unit;

class ProductController extends Controller
{
     public function create()
    {
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $brands=Brand::all();
        $colors=Color::all();
        $sizes=Size::all();
        $units=Unit::all();
         return view('admin.product.create',compact('categories','subcategories','colors','sizes','brands','units'));
    }

    public function index()
    {
        $products = Product::all();
        return view('admin.product.index',compact('products'));
    }

  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
        public function store(Request $request)
    {
   
        $products= new Product;
        $products->name=$request->name;
        $products->cat_id=$request->category;
        $products->subcat_id=$request->subcategory;
        $products->br_id=$request->brand;
        $products->unit_id=$request->unit;
        $products->size_id=$request->size;
        $products->color_id=$request->color;
        $products->code=$request->code;
        $products->description=$request->description;
        $products->price=$request->price;
        $images=array();
        if($files=$request->file('file')){
            $i=0;
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $fileNameExtract=explode('.',$name);
                $fileName=$fileNameExtract[0];
                $fileName.=time();
                $fileName.=$i;
                $fileName.='.';
                $fileName.=$fileNameExtract[1];

                $file->move('image',$fileName);
                $images[]=$fileName;
                $i++;
            }
            $products['image'] = implode("|",$images);

            $products->save();
            return redirect()->back()->with('messege', 'New Products added Succesfully!');
        }
        else{
            echo "error";
        }
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change_status(Product $category)
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
    public function edit(Product $product)
    {
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $brands=Brand::all();
        $colors=Color::all();
        $sizes=Size::all();
        $units=Unit::all();
        return view('admin.product.edit',compact('categories','subcategories','colors','sizes','brands','units','product'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $sizes =explode(',',$request->size);
        $color =explode(',',$request->color);
        $update = $product->update([
            'size'=>json_encode($sizes),
            'code'=>$request->code,
            'name'=>$request->name,
            'cat_id'=>$request->category,
            'subcat_id'=>$request->subcategory,
            'br_id'=>$request->brand,
            'unit'=>$request->unit,
            'color'=>$request->color,
            'size'=>$request->size,
            'description'=>$request->description,
            'price'=>$request->price,
            // 'image'=>$request->image,
        ]);
        if ($update){
           
             return redirect('/size')->with('messege','Product update successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $category)
    {
        $result=$category->delete();
        
        if($result){
               return redirect()->back()->with('messege','Product delete successfully!!');  
        }
      
          
        
    }
}
