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
//Pagina de likes
Route::get('Like', 'LikesController@index');

//Pagina Notificaciones
Route::get('Notification', 'NotificationController@index');

//Boton de like
Route::get('Tinder/like/{id}', ['as' => 'Tinder/like', 'uses' => 'TinderController@like']);

//Inicio de Tinder
Route::get('Tinder', 'TinderController@index');

//TODAS LAS RUTAS DE CRUD PERROS
Route::resource('Perros', 'PerroController');

//RUTA DE WELCOME
Route::get('/', function () {
    return view('welcome');
});


//NO SE PERO DEBE SER LAS RUTAS DE AUTORIZACIÖN
Auth::routes();

//Home
Route::get('/home', 'HomeController@index');


//CRUD USUARIOS
//Route::get('/', ['as' => 'users', 'uses' => 'UserController@index']);


//Grupo de rutas de Administradores <3 (Ya no hay que poner el /admin/...)
Route::prefix('admin')->group(function() {
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/', 'AdminController@index')->name('admin.home');//Esta ruta debe ir despues ya que da conflicto con las anteriores.

});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
