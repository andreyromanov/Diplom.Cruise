<?php

namespace App\Http\Controllers\Admin;

use DB;	
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderAdminController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:admin');
	}

	public function index() {
		
		$cruises = DB::table('Trips')->get();
		
		return view('admin.orders',['cruises'=>$cruises]);
	}


	public function info($value) {
		$orders = DB::table('Orders')->join('Users','Users.id','=','Orders.Users_id')->where('Trips_id', '=', $value)->get();
		
		$count = DB::table('Orders')->where('Trips_id', '=', $value)->count();

		return view('admin.order_info',['orders'=>$orders, 'count'=>$count]);
	}

	public function confirm($value1, $value2) {
	/*	$orders = DB::table('Orders')->join('Users','Users.id','=','Orders.Users_id')->where('Trips_id', '=', $value)->get();
		
		$count = DB::table('Orders')->where('Trips_id', '=', $value)->count();

		return view('admin.order_info',['orders'=>$orders, 'count'=>$count]);*/

		DB::table('Orders')->where('Order_id', $value1)->update(['State'=>$value2]);
		$cruises = DB::table('Trips')->get();
		
		//return view('admin.orders',['cruises'=>$cruises]);
		return redirect()->back()->with('message', 'Заказ подтвержден!');
		//return view('admin.dashboard',['users'=>$users,'trips'=>$trips]);
		
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

	/*	$orders = DB::table('Orders')->join('Users','Users.id','=','Orders.Users_id')->where('Trips_id', '=', $value)->get();
		
		$count = DB::table('Orders')->where('Trips_id', '=', $value)->count();

		return view('admin.order_info',['orders'=>$orders, 'count'=>$count]);*/

		DB::table('Orders')->where('Order_id', $value1)->delete();
		$cruises = DB::table('Trips')->get();
		return redirect()->back()->with('message2', 'Заказ удален!');
		//return view('admin.dashboard',['users'=>$users,'trips'=>$trips]);
		
	}
	
}
