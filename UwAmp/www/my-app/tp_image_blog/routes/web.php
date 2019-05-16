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

Route::get('/', function () {
    return view('welcome');
});



Auth::routes(['verify' => true]);



Route::get('addlocation', function () {
    return view('addlocation');
});

Route::get('fantoche', function () { //Vue servant essentiellement à faire des tests
    return view('fantoche');
});

Route::get('search', function () {
    return view('search');
});

Route::get('user', function () {
    return view('user');
});

Route::get('admin', function () {
    return view('admin');
});

Route::get('mesphotos', function () {
    return view('mesphotos');
});


Route::get('user/{id}', 'userController@user');
Route::get('user/editname/{id}','userController@editName');
Route::get('user/editmail/{id}','userController@editMail');
Route::get('user/editpassword/{id}','userController@editPassword');
Route::post('/multipleDeletes','userController@multipleDeletes');
Route::get( 'user/deleteAccount/{id}','userController@deleteAccount');

Route::get('admin/{id}', 'adminController@user');
Route::get('admin/{id}', 'adminController@showUsers');

Route::get('admin/editUser/{id}', 'adminController@showUpdateUser');
Route::post('updateUserName/{id}', 'adminController@updateUserName');
Route::post('updateUserMail/{id}', 'adminController@updateUserMail');
Route::post('updateUserPassword/{id}', 'adminController@updateUserPassword');
Route::get('admin/deleteUser/{id}', 'adminController@deleteUser');


Route::get('mesphotos/{id}','userController@show');


Route::middleware ('auth')->group (function () {
    Route::resource ('image', 'ImageController');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('insert','locationController@insertform');
Route::post('create','locationController@insert'); 
Route::get('addimage','ImageController@create'); 
Route::get('/','ImageController@index'); 
Route::get('signalement/{id}','ImageController@signalement'); /*Lors du signalement l'id de l'image sera pris en compte pour la route*/
Route::get('delete/{id}','ImageController@delete');
Route::get('search', 'SearchController@index')->name('search');

Route::get('autocomplete', 'SearchController@autocomplete')->name('autocomplete'); /*Ici on crée une route spécialment pour de l'autocomplétion en Ajax. Celle-ci possède sa propre classe*/
Route::get('search', 'SearchController@action');

Route::get('fantoche', 'SearchController@getUsers')->name('users');