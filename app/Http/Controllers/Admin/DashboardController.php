<?php

namespace App\Http\Controllers\Admin;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //Dash
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index() {
    	$users = DB::table('Users')->count();
    	$trips = DB::table('Trips')->count();

    	return view('admin.dashboard',['users'=>$users,'trips'=>$trips]);
    }

    public function stat() {

    	return view('admin.cruise_stat');
    }

    public function cruises () {
    	$cruises = DB::table('Trips')->get();
    	return view('admin.cruises_info',['cruises'=>$cruises]);
    }
}


