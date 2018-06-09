<?php
namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;



class OrderController extends Controller
{

    //Оформление заказа
	public function index(Request $req) {

		$Users_id = $req->input('Users_id');
		$Trips_id = $req->input('Trips_id');
		$Numb_of_Pers = $req->get('Numb_of_Pers');
		$Cost = $req->input('Cost');
		$Cab_Type = $req->get('Cab_Type');
		
		$Cab_Variable = 'Cab_Ord_'.$Cab_Type.''.$Numb_of_Pers;
		$Cab_Select = DB::table('Trips')->WHERE('id','=',$Trips_id)->value($Cab_Variable);
		$Cab_Number =  $Cab_Select+1;

		$Ship_Name = $req->get('Ship_Name');


////////////////////////test///////////////////////
		

		$a = DB::table('Trips')->where('id', $Trips_id)->pluck('Cab_Ord_'.$Cab_Type.$Numb_of_Pers);
		$b = DB::table('Cruise_ships')->where('Ship_Name', $Ship_Name)->pluck('Cab_Def_'.$Cab_Type.$Numb_of_Pers);

		if ($b[0]-$a[0]==0) {

			return redirect()->back()->with('message', 'Данные каюты распроданы!');

		} elseif ($b[0]-$a[0]>0) {

//////////////////////tet///////////////////////




		///////////////image///////////////////////
			$file = $req->file('image');
			$a = 'нет';

			if ($file) {
				$filename = $file->getClientOriginalName();

				$a = '<a href="/public/'.$filename.'" target="_blank">Тут</a>';

				Storage::disk('local')->put($filename, File::get($file));
			}
		//////////////image//////////////////////

			if (($req->get('t1'))=='A') {
				$K1 = 1;
			} else if (($req->get('t1'))=='B') {
				$K1 = 0.5;
			}



			if (($req->get('t2'))=='A') {
				$K2 = 1;
			} else if (($req->get('t2'))=='B') {
				$K2 = 0.5;
			} else {
				$K2 = 0;
			}



			if (($req->get('t3'))=='A') {
				$K3 = 1;
			} else if (($req->get('t3'))=='B') {
				$K3 = 0.5;
			} else {
				$K3 = 0;
			}



			if (($req->get('t4'))=='A') {
				$K4 = 1;
			} else if (($req->get('t4'))=='B') {
				$K4 = 0.5;
			} else {
				$K4 = 0;
			}



			$K_All = $K1+$K2+$K3+$K4;



			$g1 = $req->input('fn1').' '.$req->input('ln1').': '.$req->get('t1').';<br>';

			if ($req->input('fn4')){
				$g4 = $req->input('fn4').' '.$req->input('ln4').': '.$req->get('t4').';<br>';
			} else {
				$g4 = '';
			}

			if ($req->input('fn3')){
				$g3 = $req->input('fn3').' '.$req->input('ln3').': '.$req->get('t3').';<br>';
			} else {
				$g3 = '';
			}

			if ($req->input('fn2')){
				$g2 = $req->input('fn2').' '.$req->input('ln2').': '.$req->get('t2').';<br>';
			} else {
				$g2 = '';
			}

			$All_guests = $g1.' '.$g2.' '.$g3.' '.$g4;



		// D cabins
			if ($Cab_Type=='D' and $Numb_of_Pers==1){

	$All_cost = $Cost * $K_All;//считаем общую сумму кают D1

	DB::table('Trips')->where('id', $Trips_id)->increment('Cab_Ord_D1');//обновление конкретной

} else if ($Cab_Type=='D' and $Numb_of_Pers==2) {

	$All_cost = $Cost * $K_All;//считаем общую сумму кают D2

	DB::table('Trips')->where('id', $Trips_id)->increment('Cab_Ord_D2');//обновление конкретной

} else if ($Cab_Type=='D' and $Numb_of_Pers==3) {

	$All_cost = $Cost * $K_All;//считаем общую сумму кают D3

	DB::table('Trips')->where('id', $Trips_id)->increment('Cab_Ord_D3');//обновление конкретной

} else if ($Cab_Type=='D' and $Numb_of_Pers==4) {

	$All_cost = $Cost * $K_All;//считаем общую сумму кают D4

	DB::table('Trips')->where('id', $Trips_id)->increment('Cab_Ord_D4');//обновление конкретной

} 

// C cabins

else if ($Cab_Type=='C' and $Numb_of_Pers==1) {

$All_cost = ($Cost * $K_All)*1.5;//считаем общую сумму кают C

DB::table('Trips')->where('id', $Trips_id)->increment('Cab_Ord_C1');//обновление конкретной

} else if ($Cab_Type=='C' and $Numb_of_Pers==2) {

$All_cost = ($Cost * $K_All)*1.5;//считаем общую сумму кают C

DB::table('Trips')->where('id', $Trips_id)->increment('Cab_Ord_C2');//обновление конкретной

} else if ($Cab_Type=='C' and $Numb_of_Pers==3) {

$All_cost = ($Cost * $K_All)*1.5;//считаем общую сумму кают C

DB::table('Trips')->where('id', $Trips_id)->increment('Cab_Ord_C3');//обновление конкретной

} else if ($Cab_Type=='C' and $Numb_of_Pers==4) {

$All_cost = ($Cost * $K_All)*1.5;//считаем общую сумму кают C

DB::table('Trips')->where('id', $Trips_id)->increment('Cab_Ord_C4');//обновление конкретной

}

// B Cabins

else if ($Cab_Type=='B' and $Numb_of_Pers==1) {

$All_cost = ($Cost * $K_All)*2;//считаем общую сумму кают B

DB::table('Trips')->where('id', $Trips_id)->increment('Cab_Ord_B1');//обновление конкретной

} else if ($Cab_Type=='B' and $Numb_of_Pers==2) {

$All_cost = ($Cost * $K_All)*2;//считаем общую сумму кают B

DB::table('Trips')->where('id', $Trips_id)->increment('Cab_Ord_B2');//обновление конкретной

} else if ($Cab_Type=='B' and $Numb_of_Pers==3) {

$All_cost = ($Cost * $K_All)*2;//считаем общую сумму кают B

DB::table('Trips')->where('id', $Trips_id)->increment('Cab_Ord_B3');//обновление конкретной

} else if ($Cab_Type=='B' and $Numb_of_Pers==4) {

$All_cost = ($Cost * $K_All)*2;//считаем общую сумму кают B

DB::table('Trips')->where('id', $Trips_id)->increment('Cab_Ord_B4');//обновление конкретной

}



else if ($Cab_Type=='A' and $Numb_of_Pers==1) {

$All_cost = ($Cost * $K_All)*3;//считаем общую сумму кают A

DB::table('Trips')->where('id', $Trips_id)->increment('Cab_Ord_A1');//обновление конкретной

} else if ($Cab_Type=='A' and $Numb_of_Pers==2) {

$All_cost = ($Cost * $K_All)*3;//считаем общую сумму кают A

DB::table('Trips')->where('id', $Trips_id)->increment('Cab_Ord_A2');//обновление конкретной

} else if ($Cab_Type=='A' and $Numb_of_Pers==3) {

$All_cost = ($Cost * $K_All)*3;//считаем общую сумму кают A

DB::table('Trips')->where('id', $Trips_id)->increment('Cab_Ord_A3');//обновление конкретной

} else if ($Cab_Type=='A' and $Numb_of_Pers==4) {

$All_cost = ($Cost * $K_All)*3;//считаем общую сумму кают A

DB::table('Trips')->where('id', $Trips_id)->increment('Cab_Ord_A4');//обновление конкретной

}


$data = array('Users_id'=>$Users_id, 'Trips_id'=>$Trips_id, 'Numb_of_Pers'=>$Numb_of_Pers, 'Cost'=>$All_cost, 'Guests'=>$All_guests,'Cab_Type'=>$Cab_Type,'Cab_Number'=>$Cab_Number, 'image'=>$a);

DB::table('Trips')->where('id', $Trips_id)->increment('Cab_Ord_All'); //обновление всех кают
DB::table('Orders')->insert($data);

$EM = Auth::user()->email;
return redirect('/profile/{{$EM}}');

}
}



//при нажатии на кнопку заказать выводим соответсвующий тур
public function value($value) {

	$cruises = DB::table('Cruise_ships')->join('Trips','Trips.Cruise_ships_id','=','Cruise_ships.id')->where('Trips.id', '=', $value)->get();
	return view('content.order')->with('cruises', $cruises);

}



}