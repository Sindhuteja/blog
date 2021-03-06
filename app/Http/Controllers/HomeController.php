<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Profile;
use App\user;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id =Auth::user()->id;
        $profile =DB::table('users')
        ->join('profiles','user_id','=','profiles.user_id')
        ->select('users.*','profiles.*')
        ->where(['profiles.user_id'=>$user_id])
        ->first();
 //return $profile->name;
    //  return $profile->designation;
        return view('home',['profiles'=>$profile]);
    }
}

