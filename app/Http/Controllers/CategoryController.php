<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function category()
   {
      return view('categories.category');
   }

   public function addcategory(Request $request)
   {
      

      $this->validate($request,['category'=>'required']);
      $category = new Category;
      $category->category= $request->input('category');
      $category->save();
      // dd($data);

      // $category= Category::create($data);
      //$category= Category::create($data);

      return redirect('/category')->with('response','Category added succfully');
   }
}
