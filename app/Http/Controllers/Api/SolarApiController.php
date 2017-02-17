<?php

namespace App\Http\Controllers\Api;

use App\Models\Planet;
use App\Models\Solar;
use App\Models\Sun;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SolarApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solar = Solar::all();
        return response($solar, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $solar = new Solar();
        $solar->name = $request->get('name');
        $solar->size = $request->get('size');
        $solar->save();

        $sun = new Sun();
        $sun->solar()->associate($solar);// = $solar->id;
        $sun->name = $request->get('sun_name');
        $sun->size = $request->get('sun_size');
        $sun->save();

        $planets_name = $request->get('planet_name');
        $planets_size = $request->get('planet_size');
        if(!empty($planets_name)){
            for($i=0; $i<count($planets_name); $i++){
                $planet = new Planet();
                $planet->solar()->associate($solar);
                $planet->name = $planets_name[$i];
                $planet->size = $planets_size[$i];
                $planet->save();
            }
        }
        return response($solar, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $solar = Solar::find($id);
        if($solar){
            $solar->sun;
            $solar->planets;
            return response($solar, 200);
        }else{
            return response()->json(['Result not found'], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $solar = Solar::find($id);
        $solar->name = $request->get('name');
        $solar->size = $request->get('size');
        $solar->update();
        return response($solar, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Solar::find($id)->delete();
        return response('Deleted Successfully', 200);
    }

    public function destroy_planet($id)
    {
        Planet::find($id)->delete();
        return response('Deleted Successfully', 200);
    }

    public function find_solar_sun($solar_id){
        $solar = Solar::whereId($solar_id)->first();
        if($solar){
            $sun = $solar->sun;
            return response($sun, 200);
        }else{
            return response('Result not found', 200);
        }
    }

    public function find_sun_all_planet($sun_id){
        $sun = Sun::whereId($sun_id)->first();
        if($sun){
            $planets = $sun->solar->planets;
            return response($planets, 200);
        }else{
            return response('Result not found', 200);
        }
    }

    public function find_solar_all_planet($solar_id){
        $solar = Solar::whereId($solar_id)->first();
        if($solar){
            $planets = $solar->planets;
            return response($planets, 200);
        }else{
            return response('Result not found', 200);
        }
    }


    public function search_by_solar_name(Request $request){
        $solar_name = $request->get('keyword');
        $solar = Solar::where('name', 'like', '%'.$solar_name.'%')->get();
        if(count($solar)>0){
            return response($solar, 200);
        }else{
            return response('Result not found', 200);
        }
    }

    public function search_by_sun_name(Request $request){
        $sun_name = $request->get('keyword');
        $sun = Sun::where('name', 'like', '%'.$sun_name.'%')->get();
        if(count($sun)>0){
            return response($sun, 200);
        }else{
            return response('Result not found', 200);
        }
    }

    public function search_by_planet_name(Request $request){
        $planet_name = $request->get('keyword');
        $planets = Planet::where('name', 'like', '%'.$planet_name.'%')->get();
        if(count($planets)>0){
            return response($planets, 200);
        }else{
            return response('Result not found', 200);
        }
    }

    public function search_by_solar_size(Request $request){
        $solar_size = $request->get('keyword');
        $solar = Solar::where('size', 'like', '%'.$solar_size.'%')->get();
        if(count($solar)>0){
            return response($solar, 200);
        }else{
            return response('Result not found', 200);
        }
    }

    public function search_by_sun_size(Request $request){
        $sun_size = $request->get('keyword');
        $sun = Sun::where('size', 'like', '%'.$sun_size.'%')->get();
        if(count($sun)>0){
            return response($sun, 200);
        }else{
            return response('Result not found', 200);
        }
    }

    public function search_by_planet_size(Request $request){
        $planet_size = $request->get('keyword');
        $planets = Planet::where('size', 'like', '%'.$planet_size.'%')->get();
        if(count($planets)>0){
            return response($planets, 200);
        }else{
            return response('Result not found', 200);
        }
    }

}
