<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category ;


class CategoryController extends Controller
{
    //
    public function addCategory(){
        return view('admin.addcategory'); 
    }

    public function savecategory(Request $request){
         $this->validate($request, ['category_name' => 'required|unique:categories']);


         $category = new Category();
         $category->category_name = $request->input('category_name'); 
         $category->save();

         return back()->with('status', 'the category name has been successfully saved !! ');
    }

    public function categories(){
        $categories = Category::All(); 
        return view('admin.categories')->with('categories', $categories); 
    }

    public function editCategory ($id){
        $category = Category::find($id);

        return view('admin.editCategory')->with('category', $category);

    }

    public function updatecategory  (Request $request){

    }
}
