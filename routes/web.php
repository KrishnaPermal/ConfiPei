<?php

use Illuminate\Support\Facades\Route;

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

/* Route::get('/', function(){
    return view('home.main');
});
 */

/* Route::get('/', 'AccueilController@index'); */

Route::get('/test-mail',function(){
    return new App\Mail\Contact([
        'name' => 'toto',
        'email' => 'toto@toto.com',
        'message' => 'Voici le mail reçu!',
    ]);
});

Route::prefix('/')->group(function(){
    Route::get('/', 'AdminController@index');
    Route::get('/{any}', 'AdminController@index')->where('any','.*');
});

//Route::get('/listes', 'ProduitController@index');
//Route::get('/users', 'UsersController@index');