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

    Route::get( '/', function () {
        return view( 'welcome' );
    } );
    Route::get( '/companies', 'CompanyController@index' );


    Auth::routes();

    Route::get( '/home', 'HomeController@index' )->name( 'home' );


    Route::middleware( [ 'auth' ] )->group( function () {
        Route::resource( '/companies', 'CompanyController' )->only(['store', 'create', 'update', 'edit', 'destroy', 'show']);

        Route::resource( '/contacts', 'ContactController' );
    } );


