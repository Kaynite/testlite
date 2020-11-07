<?php

use App\Models\Contact;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
    
});

Route::group(['middleware' => ['auth:api']], function () {
});

Route::post('contacts', 'ContactsController@store');
Route::get('contacts/{contact}', 'ContactsController@show');
Route::get('contacts/', 'ContactsController@index');
Route::get('birthdays', 'ContactsController@birthdays');
Route::patch('contacts/{contact}', 'ContactsController@update');
Route::delete('contacts/{contact}', 'ContactsController@destroy');
Route::post('search', 'ContactsController@search');

Route::get('test', function(){
    Contact::factory()->create();
    return Contact::find(1);
});