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



Route::middleware('auth:api')->get('/user', function (Request $request) {

    return $request->user();

});




Route::group(['middleware' => 'auth:api'], function () {

	Route::apiResources(['user' => 'API\UserController']);

	

});



//ACOUNT DETAILS

Route::apiResources(['user' => 'API\UsersController']);

Route::get('profile', 'API\UsersController@profile');

Route::get('subscription', 'API\UsersController@subscription');

Route::get('dashboard', 'API\UsersController@dashboard');

Route::post('coverPhoto', 'API\UsersController@coverPhoto'); //UPDATE COVER PHOTO

Route::get('cover_user', 'API\UsersController@cover_user'); //GET COVER PHOTO



//PRODUCTS

Route::apiResources(['products' => 'API\ProductsController']);

// Route::put('updateProducts/{id}', 'API\ProductsController@update');

Route::get('productCount', 'API\ProductsController@countProducts');

Route::put('udpateCategory/{id}', 'API\ProductsController@udpateCategory');

Route::apiResources(['productsCategory' => 'API\CategoriesController']);



//IMAGE UPLOAD

Route::apiResources(['imageUpload' => 'API\ImagesController']);

Route::post('images/{id}', 'API\ImagesController@upload');

Route::get('imagesProducts/{id}', 'API\ImagesController@index');


//SUB CATEGORIES

Route::get('automotive', 'API\CategoriesController@automotive');

Route::get('sports', 'API\CategoriesController@sports');

Route::get('fashion', 'API\CategoriesController@fashion');

Route::get('home', 'API\CategoriesController@home');

Route::get('foods', 'API\CategoriesController@foods');

Route::get('pets', 'API\CategoriesController@pets');

Route::get('babies', 'API\CategoriesController@babies');

Route::get('healths', 'API\CategoriesController@healths');

Route::get('tvs', 'API\CategoriesController@tvs');

Route::get('electronics', 'API\CategoriesController@electronics');



//INBOX
Route::apiResources(['inbox' => 'API\InboxController']);

Route::get('messagesCount', 'API\InboxController@countMessages');



//PAYMENT

Route::post('create-payment/{membership}', 'API\PaymentController@checkOut');

Route::post('execute-payment', 'API\PaymentController@payment');

Route::post('payment-user/{membership}', 'API\PaymentController@paypal');

