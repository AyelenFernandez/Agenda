<?php




Route::get('/exportar-excel', 'excelController@exp');
Route::get('/exportar-PDF', 'PDFController@exp');
Route::get('/export-PDF', 'PDFController@exportDefault');




Route::get('/', 'calendarioController@tv');

Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

//Registration Routes...
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

Route::group(['prefix' => 'admin','middleware' => 'auth'], function () {

	Route::get('denegado', 'adminController@denegado');
	Route::group(['middleware' => 'role:user'], function () {

		//Rutas Publicas a usuarios Autenticados
		Route::get('changepass','adminController@vista');
		Route::post('changepass','adminController@updatePassword');
		//INICIO
		Route::get('/', 'adminController@index');
		//EVENTOS
		Route::get('eventos', 'eventoController@index');
		Route::get('eventos-dia','eventoController@eventoDia');
		Route::get('eventos-semana','eventoController@eventoSemana');
		Route::get('eventos-mes','eventoController@eventoMes');
		Route::get('eventos-todos','eventoController@eventoTodos');
		
		Route::get('feedAgenda','calendarioController@feedJson');
		Route::get('calendario', 'calendarioController@index');
		Route::get('excel/eventos', 'excelController@index');
		Route::get('excel/dia', 'excelController@dia');
		Route::get('excel/semana', 'excelController@semana');
		Route::get('excel/mes', 'excelController@mes');

		Route::group(['middleware' => 'role:admin'], function () {
			//EVENTO
			Route::get('eventos/create', 'eventoController@create');
			Route::get('eventos/create/{fecha}', 'eventoController@createCalendario');
			Route::get('eventoFecha/{fecha}', 'eventoController@eventoFecha');
			Route::post('eventos', 'eventoController@store');
			Route::get('eventos/{id}/edit', 'eventoController@edit');
			Route::patch('eventos/{id}', 'eventoController@update');
			Route::delete('evento/{id}', 'eventoController@delete');
			Route::post('cancelarEvento','eventoController@cancelar');
			Route::post('eliminarEvento','eventoController@eliminar');
			Route::resource('espaciofisico', 'EspacioFisicoController');
			Route::resource('fechas', 'fechaController');	
		});
		//Se respeta orden de creacion de Rutas
		Route::get('eventos/{id}', 'eventoController@show');
		
	});	
});

// Password Reset Routes...
//Route::get('password/reset', 'Auth\PasswordController@getEmail');
//Route::post('password/email', 'Auth\PasswordController@postEmail');
//Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
//Route::post('password/reset', 'Auth\PasswordController@postReset');