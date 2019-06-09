<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('login', 'Api\UserController@login');

Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'], function () {

    //API endpoint to add a team
    $this->get('teamPlayers/{teamModel}', 'TeamController@getTeamPlayers');
    $this->post('updateTeam/{teamModel}', 'TeamController@updateTeam');
    $this->post('searchTeam', 'TeamController@search_team');

    $this->post('updatePlayer/{playerModel}', 'PlayerController@updatePlayer');
    $this->post('searchPlayer', 'PlayerController@search_player');


});