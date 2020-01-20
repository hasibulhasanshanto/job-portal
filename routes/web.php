<?php

// Frondend Routes
Route::get('/', 'FrontendController@index')->name('front.home');


//Auth Routes
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//Loging Process
Route::get('/login', 'AuthController@ShowLogin')->name('login');
Route::post('/login', 'AuthController@LoginProcess')->name('loginprocess');

// Register Process
Route::get('/com-register', 'AuthController@CompanyRegister')->name('company.register');
Route::get('/register', 'AuthController@UserRegister')->name('user.register');

Route::post('/com-register', 'AuthController@ComRegisterProcess')->name('company.register.pro');
Route::post('/register', 'AuthController@UserRegisterProcess')->name('user.register.pro');

//Super Admin Routes
Route::group(['as' => 'superadmin.', 'prefix' => 'superadmin', 'namespace' => 'SuperAdmin', 'middleware' => ['auth', 'superadmin']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
});

//Admin Routes
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard'); 
});
//Company Routes
Route::group(['as' => 'company.', 'prefix' => 'company', 'namespace' => 'Company', 'middleware' => ['auth', 'company']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');  
});
