<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});  */

/*LOGIN/LOGOUT*/

Route::post('/login','AuthController@login');
Route::get('/logout','AuthController@logout')->middleware('auth:api');

/*LOGIN/LOGOUT*/

// Sécurisation de la route
Route::middleware(['auth:api','roles:Admin|Producteur'])->prefix('produits')->group(function () {
    Route::post('/', 'ProduitController@createOrUpdate'); 
}); 

// Récupère les produits du Producteur (accessible qu'au producteur)
Route::middleware(['auth:api','roles:Producteur'])->prefix('producteurs')->group(function () {
    Route::get('produits', 'ProduitController@getOfProducteur');
    Route::post('produits', 'ProduitController@createOrUpdate'); 
}); 

// Récupère les tous Producteurs (accessible à l'administrateur)
Route::middleware(['auth:api','roles:Admin|Producteur'])->group(function () {
    Route::get('producteurs', 'ProducteursController@getProducteurs');
    Route::post('producteurs', 'ProducteursController@addOrUpdate');
}); 

/*****************************************************************************/
Route::middleware(['auth:api', 'roles:Producteur|Client'])->group(function(){
    Route::post('/commandes', 'CommandesController@pushPanier');
    //Route::get('/commandes', '');
    //Route::get('/commandes/{id}', '')->where('id','');
    Route::post('/commandes/{id}/payment','CommandesController@payment')->where('id', '[0-9]+');
});
/*****************************************************************************/





//Route::post('basket', 'CommandesController@pushPanier');

Route::get('fruits', 'FruitsController@index');

Route::get('produits', 'ProduitController@index');
















//Route::get('Fruits', 'FruitsController@index');

//Route::get('users', 'UsersController@index');

/****route currentUser****/

//Route::post('/currentUser', 'UsersController@getCurrentUserDB');

/****route currentUser****/
