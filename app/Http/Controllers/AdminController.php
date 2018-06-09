<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index1()
    {
     $users = DB::table('Users')->count();
     $trips = DB::table('Trips')->count();

     return view('admin.dashboard',['users'=>$users,'trips'=>$trips]);
 }

 public function index()
 {
    $users = DB::table('Users')->count();
    $trips = DB::table('Trips')->count();

    return view('admin.dashboard',['users'=>$users,'trips'=>$trips]);
       // return view('admin.dashboard');
}

public function users()
{
    $users = DB::table('Users')->get();

    return view('admin.users',['users'=>$users]);
}

public function user_delete($value)
{
    DB::table('Orders')->where('Users_id', $value)->delete();
    DB::table('Users')->where('id', $value)->delete();
    $users = DB::table('Users')->get();

    return redirect()->back()->with('message', 'Пользователь и его заказы удалены!');

}
}
