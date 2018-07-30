<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use App\Profile;
use	Auth;


class ProfileController extends Controller
{
    //
    public function profile(){
    
   	return view('profiles.profile');
   }
    public function addprofile(Request $request){
   	$this->validate($request,['name'=>'required',
   		'designation'=>'required'

   		]);
    $profiles=new Profile;
    $profiles->name =$request->input('name') ;
    if(Auth::check()){
      $user=Auth::user();
      $profiles->user_id = Auth::user()->id;
      //return $user_id;
    }
 // $profile->user_id = Auth::user()->id;
    $profiles->designation = $request->input('designation');
   		//dd($profile->user_id);
    if(Input::hasFile('profile_pic')){


   //	dd($profile->user_id);	
   		
   	$file= Input::file('profile_pic');
   	$file->move(public_path().'/uploads/',
   	$file-> getClientOriginalName());
   	$url=URL::to("/").'/uploads/'.$file->
   	getClientOriginalName();

    
    $profiles->profile_pic = $url;
 // dd($profile->profile_pic);
  //$profile->save();
   }
  
    $profiles->save();

    return redirect('/home')->with('response','profile added successfully');
   
  
   }
}
