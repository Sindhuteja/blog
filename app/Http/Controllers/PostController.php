<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Category;

class PostController extends Controller
{
     public function post(){
    	//$categories= Category::all();
    	//return $category;exit();
    	return view('posts.post');// ,['categories'=>$categories]);
   
}
public function addpost(Request $request){
	return $request->input('post_title');
	/*$this->validate($request,['post_title'=>'required',
	'post_body'=>'required',
	'Category_id'=>'required',
	'post_image'=>'required',
	'Category_id'=>'required'	]);
	return 'validation success';
     
}*/
}
}