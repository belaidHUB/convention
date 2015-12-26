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


Route::resource('stages', 'StageController');
Route::get('serch_Ajax','StageController@serch_Ajax');
Route::get('serch_stage','StageController@serch_formation_Ajax');
Route::get('Etudiant','StageController@Etudiant_index');


Route::get('stages/{id}/delete', [
    'as' => 'stages.delete',
    'uses' => 'StageController@destroy',
]);

Route::get('stages/{id}/imprimer', [
    'as' => 'stages.imprimer',
    'uses' => 'StageController@imprimer',
]);

Route::get('stages/{id}/update_etat', [
    'as' => 'stages.update_etat',
    'uses' => 'StageController@update_etat',
]);



Route::resource('formations', 'FormationController');

Route::get('formations/{id}/delete', [
    'as' => 'formations.delete',
    'uses' => 'FormationController@destroy',
]);
//exemple1
/*Route::get('home', function () {
	if(Auth::guest()){
		return Redirect::to('auth/login');
	}
	else{
    echo "welcome --".Auth::user()->email;
    };
});*/
//exemple2
Route::get('home',['middleware'=>'auth', function () {
    echo "welcome --".Auth::user()->email;
}]);

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');