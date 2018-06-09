<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use DB;
use Auth;

class ProfileController extends Controller
{



    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($value)
    {
        $id = Auth::user()->id;
        
        $orders = DB::table('Orders')->join('Trips','Orders.Trips_id','=','Trips.id')->where('Users_id', $id)->get();
        return view('user.profile')->with('orders', $orders);
    }

/**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
public function show($order)
{
    $orders = DB::table('Orders')->join('Trips','id','=','Trips_id')->join('Cruise_ships','Cruise_ships.id','=','Trips.Cruise_ships_id')->where('Order_id', '=', $order)->get();
       // $orders = DB::table('Orders')->join('Trips','id','=','Trip_id')->where('Order_id', '=', $order)->get();
    return view('user.ticket', ['orders'=>$orders]);
}


public function delete($value1, $value2, $value3, $value4) {

        //1 - Order_id
        //2 - Trip_id
        //3 - Num_of_Pers
        //4 - Cab_Type
    $Cab_Type = $value4;
    $Numb_of_Pers = $value3;
    $Trips_id = $value2;

    if ($Cab_Type=='D' and $Numb_of_Pers==1){

    DB::table('Trips')->where('id', $Trips_id)->decrement('Cab_Ord_D1');//обновление конкретной

} else if ($Cab_Type=='D' and $Numb_of_Pers==2) {

    DB::table('Trips')->where('id', $Trips_id)->decrement('Cab_Ord_D2');//обновление конкретной

} else if ($Cab_Type=='D' and $Numb_of_Pers==3) {

    DB::table('Trips')->where('id', $Trips_id)->decrement('Cab_Ord_D3');//обновление конкретной

} else if ($Cab_Type=='D' and $Numb_of_Pers==4) {

    DB::table('Trips')->where('id', $Trips_id)->decrement('Cab_Ord_D4');//обновление конкретной

} 

// C cabins

else if ($Cab_Type=='C' and $Numb_of_Pers==1) {

DB::table('Trips')->where('id', $Trips_id)->decrement('Cab_Ord_C1');//обновление конкретной

} else if ($Cab_Type=='C' and $Numb_of_Pers==2) {

DB::table('Trips')->where('id', $Trips_id)->decrement('Cab_Ord_C2');//обновление конкретной

} else if ($Cab_Type=='C' and $Numb_of_Pers==3) {

DB::table('Trips')->where('id', $Trips_id)->decrement('Cab_Ord_C3');//обновление конкретной

} else if ($Cab_Type=='C' and $Numb_of_Pers==4) {

DB::table('Trips')->where('id', $Trips_id)->decrement('Cab_Ord_C4');//обновление конкретной

}

// B Cabins

else if ($Cab_Type=='B' and $Numb_of_Pers==1) {

DB::table('Trips')->where('id', $Trips_id)->decrement('Cab_Ord_B1');//обновление конкретной

} else if ($Cab_Type=='B' and $Numb_of_Pers==2) {

DB::table('Trips')->where('id', $Trips_id)->decrement('Cab_Ord_B2');//обновление конкретной

} else if ($Cab_Type=='B' and $Numb_of_Pers==3) {

DB::table('Trips')->where('id', $Trips_id)->decrement('Cab_Ord_B3');//обновление конкретной

} else if ($Cab_Type=='B' and $Numb_of_Pers==4) {

DB::table('Trips')->where('id', $Trips_id)->decrement('Cab_Ord_B4');//обновление конкретной

}



else if ($Cab_Type=='A' and $Numb_of_Pers==1) {

DB::table('Trips')->where('id', $Trips_id)->decrement('Cab_Ord_A1');//обновление конкретной

} else if ($Cab_Type=='A' and $Numb_of_Pers==2) {

DB::table('Trips')->where('id', $Trips_id)->decrement('Cab_Ord_A2');//обновление конкретной

} else if ($Cab_Type=='A' and $Numb_of_Pers==3) {

DB::table('Trips')->where('id', $Trips_id)->decrement('Cab_Ord_A3');//обновление конкретной

} else if ($Cab_Type=='A' and $Numb_of_Pers==4) {

DB::table('Trips')->where('id', $Trips_id)->decrement('Cab_Ord_A4');//обновление конкретной

}



        DB::table('Trips')->where('id', $value2)->decrement('Cab_Ord_All'); //обновление всех кают

    /*  $orders = DB::table('Orders')->join('Users','Users.id','=','Orders.Users_id')->where('Trips_id', '=', $value)->get();
        
        $count = DB::table('Orders')->where('Trips_id', '=', $value)->count();

        return view('admin.order_info',['orders'=>$orders, 'count'=>$count]);*/

        DB::table('Orders')->where('Order_id', $value1)->delete();
        $cruises = DB::table('Trips')->get();
        return redirect()->back()->with('message2', 'Заказ удален!');
        //return view('admin.dashboard',['users'=>$users,'trips'=>$trips]);
        
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
