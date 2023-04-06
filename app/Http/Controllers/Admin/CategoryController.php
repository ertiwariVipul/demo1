<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::get();
        return view('admin.setting.category.index',compact('category'));
    }

    // get category list 
    public function list()
    {
        $category = Category::get();
        return view('admin.setting.category.list',compact('category'));
    }
    
    // store category 
    public function store(Request $request)
    {
        $request->validate([
            'categoryname' => 'required',

        ]);

        $category = new Category;
        $category->name = $request->categoryname;
        $category->description = $request->description;
        $category->quote = $request->quote;
        $category->slug = str_slug($request->categoryname,"");
        $category->status = '1';
        $image = $request->file('image');
        $name = $image->getClientOriginalName();
        $image->storeAs('public/adminAssets/uploads/categories',$name);
        $category->image = $name;
        $data = $category->save();
    }

    // change category status 
    public function status(Request $request)
    {
        $category = Category::findOrFail($request->id);
            if ($category->status == '1') {
                $newStatus = '0';
            } else {
                $newStatus = '1';
            }
            $update = Category::where('id',$request->id)->update(['status' => $newStatus]);
    }

    // edit category 
    public function edit(Request $request)
    {
        $category = Category::findOrfail($request->id);
        return response()->json($category);
    }
    
    // update category 
    public function update(Request $request)
    {
        // dd($request->e_image);
        $request->validate([
            'e_categoryname' => 'required',

        ]);
        $catId=$request->edit_categoryId;
        $data['name']=$request->e_categoryname;
        $data['description']=$request->e_description;
        $data['quote']=$request->e_quote;
        if ($request->e_image) {
            $image = $request->file('e_image');
            $name = $image->getClientOriginalName();
            $image->storeAs('public/adminAssets/uploads/categories', $name);
            $data['image']= $name;
        }
        $category = Category::where('id',$catId)->update($data);
        if( $category){
            return response()->json(['ResponseCode'=>1,'ResponseText'=>'Category update Successfully','ResponseData'=>$category],200);
        }
    }

     // delete category 

     public function delete(Request $request)
     {
         $delete= Category::where('id', $request->id)->delete();
         if($delete){
             return response()->json(['ResponseCode'=>1,'ResponseText'=>'Category delete Successfully','ResponseData'=>$delete],200);
         }
     }
}
