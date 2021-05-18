<?php


Auth::routes();


Route::get('/', 'HomeController@main')->name('main');



Route::get('/my-account', 'HomeController@index')->name('home')->middleware('auth');



Route::get('login',array('as'=>'login',function(){

    return view('auth/login');

}))->middleware('guest');

Route::get('register',array('as'=>'register',function(){

    return view('auth/register');

}))->middleware('guest');



Route::get('/pricing', function(){

    return view('pricing');

});



Route::get('/contact-us', function(){

    return view('contact');

});



//PRODUCTS

Route::get('/category', 'HomeController@category')->name('shop.index');

Route::get('/product-details', 'HomeController@product_details')->name('product-details');

Route::post('/submit_message/{productSlug}', 'API\InboxController@store'); //SUBMIT MESSAGE TO INBOX



//PRODUCTS PER CATEGORY

Route::get('/category_products', 'HomeController@category_products')->name('category-products');



//RETAILERS OR SELLERS

Route::get('/store/{slug_shop}', 'HomeController@seller')->name('sellerPage');

Route::get('/retailer-category/{slug_user}/{sub_category_slug}', 'HomeController@seller_category');

// Route::get('/retailer/{slug_user}', 'HomeController@seller')->name('sort');



//CONTACT-US

Route::post('/submit_contact', 'ContactController@contact_us');



//PAYMENT METHOD

Route::get('/payment-method/{id}', 'HomeController@payment_method')->middleware('auth');

Route::post('/payment_contact', 'ContactController@padala');





//FACEBOOK AND GOOGLE LOGIN

Route::get('/redirect_facebook', 'SocialAuthFacebookController@redirect');

Route::get('/callback_facebook', 'SocialAuthFacebookController@callback');

Route::get('/redirect_google', 'SocialAuthGoogleController@redirect');

Route::get('/callback_google', 'SocialAuthGoogleController@callback');




Route::group(['middleware'=>['revalidate','auth']], function(){ //FOR BROWSER BACK BUTTON AFTER LOGOUT

    Route::get('/my-account', 'HomeController@index')->name('home')->middleware('auth');

});



//SEARCH PRODUCTS

Route::get('searchajax',array('as'=>'searchajax','uses'=>'HomeController@autoComplete'));

Route::group(['middleware' => 'revalidate'],function(){ //FOR BROWSER BACK BUTTON

	Route::post('/search_product', 'SearchController@search_product')->name('search');

    Route::get('/search_product', 'SearchController@search_product')->name('search');




});





//PRIVACY POLICY

Route::get('/privacy-policy', function(){

    return view('privacy_policy');

});



Route::get('/terms-services', function(){

    return view('user_agreement');

});



Route::get('/{any}', 'HomeController@index')->name('home')->middleware('auth')->where('any', '.*');