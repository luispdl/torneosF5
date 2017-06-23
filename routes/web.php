<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','HomeController@index')->name('inicio');

Route::group(['prefix'=>'admin','middleware'=>['auth']],function(){

	Route::get('/',function(){
		return view('admin.index');
	});

	Route::resource('torneos','TorneoController');
	Route::get('torneos/{id}/destroy',[
		'uses'	=>	'TorneoController@destroy',
		'as'	=>	'torneos.destroy'
	]);

	Route::get('zonas','ZonaController@all');
	Route::get('zonas/{id_torneo}','ZonaController@index');
	

	Route::resource('zonas','ZonaController',[
		'only'=>['store','update','edit']
	]);
	Route::get('zonas/{id}/destroy',[
		'uses'	=>	'ZonaController@destroy',
		'as'	=>	'zonas.destroy'
	]);
	Route::get('zonas/create/{id_torneo}','ZonaController@create');

	Route::get('equipos','EquipoController@all');
	Route::get('equipos/{zona_id}','EquipoController@index');
	Route::resource('equipos','EquipoController',[
		'only'=>['store','update','edit']
	]);

	Route::get('torneos/fixture/{torneo_id}','PartidoController@fixture');

	Route::get('equipos/{id}/destroy',[
		'uses'	=>	'EquipoController@destroy',
		'as'	=>	'equipos.destroy'
	]);
	Route::get('equipos/create/{zona_id}','EquipoController@create');

	Route::get('jugadores','JugadorController@all');
	Route::get('jugadores/{equipo_id}','JugadorController@index');
	Route::resource('jugadores','JugadorController',[
		'only'=>['store','update','edit']
	]);
	Route::get('jugadores/{id}/destroy',[
		'uses'	=>	'JugadorController@destroy',
		'as'	=>	'jugadores.destroy'
	]);
	Route::get('jugadores/create/{equipo_id}','JugadorController@create');

	Route::get('partidos/{zona_id}','PartidoController@index');
	Route::get('partidos/resultados/{partido_id}/{equipo1}/{equipo2}','PartidoController@resultados');
	Route::post('partidos/resultados','PartidoController@guardar');
	Route::get('partidos/{id}/destroy',[
		'uses'	=>	'EquipoController@destroy',
		'as'	=>	'equipos.destroy'
	]);

	Route::get('posiciones/{zona_id}','PartidoController@posiciones');

	Route::get('goleadores/{torneo_id}','TorneoController@goleadores');

});

Auth::routes();
Route::any('/register',function(){
	return redirect('/');
});

Route::group(['prefix'=>'equipos'],function(){
	Route::get('/','EstadisticaEquipoController@index');
	Route::get('estadisticas/{equipo_id}','EstadisticaEquipoController@show');
});

Route::get('posiciones/{zona_id}','PartidoController@posiciones');
Route::get('fixture/{zona_id}','PartidoController@index');
Route::get('goleadores/{torneo_id}','TorneoController@goleadores');
Route::get('valla/{torneo_id}','TorneoController@valla');
Route::get('tarjetas/{torneo_id}','TarjetaController@index');

Route::get('/home', 'HomeController@index')->name('home');
