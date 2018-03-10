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

Route::get('/', 'HomeController@index')->name('home')->middleware('auth');

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
});

Auth::routes();

Route::get('/login', function(){
   return view('election-home');
})->name('login');

Route::get('/home', 'CategoriesController@index')->name('home')->middleware('auth');

//facebook login
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider')->name('login.facebook');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

//redirect registration to login page
Route::get('register', 'Auth\LoginController@redirectToProvider')->name('register');




//1
//only admin and moderator can access
Route::middleware(['moderator'])->group(function () {

    Route::resource('nominationUsers', 'NominationUserController');

    //users
    Route::get('users', 'UserController@index');
    Route::get('users/{id}/edit', 'UserController@edit');
    Route::delete('users/{id}', 'UserController@destroy');
    Route::match( ['put', 'patch'], 'users/{id}', 'UserController@update');
    
    
    //categories
    Route::match(['put', 'patch'], 'categories/{id}', 'CategoryController@update');
    Route::delete('categories/{id}', 'CategoryController@destroy');
    Route::post('categories', 'CategoryController@create');
    Route::get('categories/create', 'CategoryController@create');

    //nominations
    Route::match(['put', 'patch'], 'nominations/{id}', 'NominationController@update');
    Route::delete('nominations/{id}', 'NominationController@destroy');



    //votings
    Route::match(['put', 'patch'], 'votings/{id}', 'VotingController@update');
    Route::delete('votings/{id}', 'VotingController@destroy');


            Route::resource('categories', 'CategoryController');

            Route::resource('nominations', 'NominationController');

            Route::resource('votings', 'VotingController');

    //only admin can see this
    Route::middleware(['admin'])->group(function () {


            Route::resource('settings', 'SettingController');
            
            Route::resource('roles', 'RoleController');

            Route::resource('users', 'UserController');
    });

});



//must be logged in
Route::middleware(['auth'])->group(function () {

    Route::resource('categories', 'CategoryController');

    Route::resource('nominations', 'NominationController');

    Route::resource('votings', 'VotingController');

    Route::resource('users', 'UserController');

    Route::get('nominations/vote/{nomination_id}/{category_id}', 'NominationController@vote')->name('nominations.vote');

});
