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

//RUTA  DE WELCOME
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {

  //Pagina de likes
  Route::get('Like', 'LikesController@index');

  //Pagina Notificaciones
  Route::get('Notification/index', 'NotificationController@index');
  Route::get('Notification/profile/{id}', 'NotificationController@profile');

  //Boton de like
  Route::get('Tinder/like/{id}', 'TinderController@like');

  //Boton de Dislike
  Route::get('Tinder/dislike/{id}', 'TinderController@dislike');

  //Inicio de Tinder
  Route::get('Tinder', 'TinderController@index')->name('patitas.index');

  //TODAS LAS RUTAS DE CRUD MASCOTAS
  Route::resource('Pet', 'PetController');

//rutas chat
  Route::get('/messages','MessageController@index')->name('messages.index');
  Route::get('/messages/{chat}','MessageController@chat')->name('messages.chat');
  Route::get('/messages/{chat}/all','MessageController@fetch')->name('message.fetch');
  Route::post('/messages/{chat}','MessageController@sendMessage')->name('message.send');
});
