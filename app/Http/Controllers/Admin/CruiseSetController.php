<?php

namespace App\Http\Controllers\Admin;

use DB;	
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class CruiseSetController extends Controller
{
    //
	public function __construct()
	{
		$this->middleware('auth:admin');
	}

	public function index($value) {
		$cruises = DB::table('Trips')->where('id', '=', $value)->get();
		$places = DB::table('Trips')->join('Cruise_ships','Cruise_ships.id','=','Trips.Cruise_ships_id')->where('Trips.id',      $value)->get();

		return view('admin.cruise_set',['cruises'=>$cruises, 'places'=>$places]);
	}


	public function DeleteTrip(Request $req) {

		$id = $req->input('id');

		DB::table('Trips')->where('id', $id)->delete();
		
		$cruises = DB::table('Trips')->get();

		return view('admin.cruises_info',['cruises'=>$cruises]);
	}


	public function EditTripForm($value) {
		$ships = DB::table('Cruise_Ships')->get();
		//$cruises = DB::table('Trips')->where('id', '=', $value)->get();
		$cruises =  $cruises = DB::table('Cruise_ships')->join('Trips','Trips.Cruise_ships_id','=','Cruise_ships.id')->where('Trips.id', $value)->get();

		return view('admin.EditTrip',['ships'=>$ships, 'cruises'=>$cruises]);
	}

	public function UpdateTrip(Request $req) {

		$id = $req->input('id');
		$Trip_Name = $req->input('Trip_Name');
		$Description = $req->input('Description');
		$Duration = $req->input('Duration');
		$Countries = $req->input('Countries');
		$Port = $req->input('Port');
		$Start_Date = $req->get('Start_Date');
		$Price = $req->input('Price');
		$Ship = $req->get('Ship');
		$Schedule = $req->input('Schedule');

	//	$data = array('Trip_Name'=>$Trip_Name, 'Description'=>$Description, 'Duration'=>$Duration, 'Countries'=>$Countries, 'Port'=>$Port, 'Start_Date'=>$Start_Date,'Price'=>$Price,'Cruise_ships_id'=>$Ship, 'Schedule'=>$Schedule);

	//	DB::table('Trips')->insert($data);

		DB::table('Trips')->where('id', $id)->update(['Trip_Name'=>$Trip_Name, 'Description'=>$Description, 'Duration'=>$Duration, 'Countries'=>$Countries, 'Port'=>$Port, 'Start_Date'=>$Start_Date,'Price'=>$Price,'Cruise_ships_id'=>$Ship, 'Schedule'=>$Schedule]);

		//return view('admin.dashboard',['users'=>$users,'trips'=>$trips]);
		return Redirect::to('admin/cruise_set/'.$id);
	}


	public function AddTripForm() {

		$ships = DB::table('Cruise_Ships')->get();

		return view('admin.AddTrip',['ships'=>$ships]);
	}

	public function AddTrip(Request $req) {

		$Trip_Name = $req->input('Trip_Name');
		$Description = $req->input('Description');
		$Duration = $req->input('Duration');
		$Countries = $req->input('Countries');
		$Port = $req->input('Port');
		$Start_Date = $req->get('Start_Date');
		$Price = $req->input('Price');
		$Ship = $req->get('Ship');
		$Schedule = $req->input('Schedule');

		$data = array('Trip_Name'=>$Trip_Name, 'Description'=>$Description, 'Duration'=>$Duration, 'Countries'=>$Countries, 'Port'=>$Port, 'Start_Date'=>$Start_Date,'Price'=>$Price,'Cruise_ships_id'=>$Ship, 'Schedule'=>$Schedule);

		DB::table('Trips')->insert($data);

		$users = DB::table('Users')->count();
		$trips = DB::table('Trips')->count();

		return view('admin.dashboard',['users'=>$users,'trips'=>$trips]);
		
	}




	public function ShowShips() {
		
		$ships = DB::table('Cruise_Ships')->get();
		
		return view('admin.ships',['ships'=>$ships]);
	}


	public function ShipInfo($value) {

		$ships = DB::table('Cruise_Ships')->where('id', '=', $value)->get();
		$trips = DB::table('Cruise_Ships')->join('Trips','Cruise_ships_id','=', 'Cruise_Ships.id')->where('Cruise_Ships.id', '=', $value)->get();
		/*$places = DB::table('Trips')->join('Cruise_ships','Cruise_ships.id','=','Trips.Cruise_ships_id')->where('Trips.id',      $value)->get();*/

		return view('admin.ship_info',['ships'=>$ships,'trips'=>$trips]);
	}




	public function AddShipForm() {

		return view('admin.AddShip');
	}

	public function AddShip(Request $req) {


		///////////////image///////////////////////
		$file = $req->file('Image');
		$a = 'нет';

		if ($file) {
			$filename = $file->getClientOriginalName();

			$a = '/public/'.$filename;

			Storage::disk('local')->put($filename, File::get($file));
		}
		//////////////image//////////////////////

		$Ship_Name = $req->input('Ship_Name');
		$Description = $req->input('Description');
		$Year_of_production = $req->input('Year_of_production');
		$Lenght = $req->input('Lenght');
		$Speed = $req->input('Speed');
		$Capacity = $req->input('Capacity');
		$Href = $req->input('Href');
		$Cab_Def_All = $req->input('Cab_Def_All');

		$Cab_Def_A1 = $req->get('Cab_Def_A1');
		$Cab_Def_A2 = $req->get('Cab_Def_A2');
		$Cab_Def_A3 = $req->get('Cab_Def_A3');
		$Cab_Def_A4 = $req->get('Cab_Def_A4');


		$Cab_Def_B1 = $req->get('Cab_Def_B1');
		$Cab_Def_B2 = $req->get('Cab_Def_B2');
		$Cab_Def_B3 = $req->get('Cab_Def_B3');
		$Cab_Def_B4 = $req->get('Cab_Def_B4');


		$Cab_Def_C1 = $req->get('Cab_Def_C1');
		$Cab_Def_C2 = $req->get('Cab_Def_C2');
		$Cab_Def_C3 = $req->get('Cab_Def_C3');
		$Cab_Def_C4 = $req->get('Cab_Def_C4');

		$Cab_Def_D1 = $req->get('Cab_Def_D1');
		$Cab_Def_D2 = $req->get('Cab_Def_D2');
		$Cab_Def_D3 = $req->get('Cab_Def_D3');
		$Cab_Def_D4 = $req->get('Cab_Def_D4');


		$data = array('Ship_Name'=>$Ship_Name, 'Description'=>$Description, 'Year_of_production'=>$Year_of_production, 'Lenght'=>$Lenght, 'Speed'=>$Speed, 'Capacity'=>$Capacity, 'Href'=>$Href,'Image'=>$a, 'Cab_Def_All'=>$Cab_Def_All,
			'Cab_Def_A1'=>$Cab_Def_A1, 'Cab_Def_A2'=>$Cab_Def_A2, 'Cab_Def_A3'=>$Cab_Def_A3, 'Cab_Def_A4'=>$Cab_Def_A4, 

			'Cab_Def_B1'=>$Cab_Def_B1, 'Cab_Def_B2'=>$Cab_Def_B2, 'Cab_Def_B3'=>$Cab_Def_B3, 'Cab_Def_B4'=>$Cab_Def_B4,

			'Cab_Def_C1'=>$Cab_Def_C1, 'Cab_Def_C2'=>$Cab_Def_C2, 'Cab_Def_C3'=>$Cab_Def_C3, 'Cab_Def_C4'=>$Cab_Def_C4,

			'Cab_Def_D1'=>$Cab_Def_D1, 'Cab_Def_D2'=>$Cab_Def_D2, 'Cab_Def_D3'=>$Cab_Def_D3, 'Cab_Def_D4'=>$Cab_Def_D4,);

		DB::table('Cruise_ships')->insert($data);

		$users = DB::table('Users')->count();
		$trips = DB::table('Trips')->count();

		return view('admin.dashboard',['users'=>$users,'trips'=>$trips]);
		
	}	
}
