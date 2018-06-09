<?php

namespace App\Http\Controllers;
use DB;
use App\Cruise;
use Illuminate\Http\Request;

class CruiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cruises = DB::table('Cruise_ships')->join('Trips','Trips.Cruise_ships_id','=','Cruise_ships.id')->paginate(3);
        return view('content.cruises',compact('cruises'));
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
     * Display the specified resource.
     *
     * @param  \App\Cruise  $cruise
     * @return \Illuminate\Http\Response
     */
    public function show(Cruise $cruise)
    {
        $ships = DB::table('Cruise_ships')->paginate(2);
     return view('content/ships',['ships'=>$ships]);
 }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cruise  $cruise
     * @return \Illuminate\Http\Response
     */
    public function edit(Cruise $cruise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cruise  $cruise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cruise $cruise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cruise  $cruise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cruise $cruise)
    {
        //
    }
}
