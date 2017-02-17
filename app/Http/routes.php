<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', ['prefix' => 'api'], function ($api) {

    $api->group(['namespace' => 'App\Http\Controllers\Api'], function ($api) {

        ## For CRUD operation ##
        $api->get('solar/list', 'SolarApiController@index');
        $api->post('solar/add', 'SolarApiController@store');
        $api->get('solar/view/{id}', 'SolarApiController@show');
        $api->post('solar/edit/{id}', 'SolarApiController@update');
        $api->get('solar/delete/{id}', 'SolarApiController@destroy');
        $api->get('solar/planet/delete/{id}', 'SolarApiController@destroy_planet');

        ## For Find operation ##
        $api->get('find/solar/sun/{solar_id}', 'SolarApiController@find_solar_sun');
        $api->get('find/sun/planet/{sun_id}', 'SolarApiController@find_sun_all_planet');
        $api->get('find/solar/planet/{solar_id}', 'SolarApiController@find_solar_all_planet');

        ## For Search operation ##
        $api->get('search/solar/name', 'SolarApiController@search_by_solar_name');
        $api->get('search/sun/name', 'SolarApiController@search_by_sun_name');
        $api->get('search/planet/name', 'SolarApiController@search_by_planet_name');

        $api->get('search/solar/size', 'SolarApiController@search_by_solar_size');
        $api->get('search/sun/size', 'SolarApiController@search_by_sun_size');
        $api->get('search/planet/size', 'SolarApiController@search_by_planet_size');

    });

});


