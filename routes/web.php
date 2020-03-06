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

    use App\Log;
    use App\User;
    use Illuminate\Support\Facades\DB;

    Route::get( '/', function () {

        return view( 'welcome', compact( 'logs' ) );
    } );


    Auth::routes();

    Route::get( '/home', 'HomeController@index' )->name( 'home' );


    Route::middleware( [ 'auth' ] )->group( function () {
        Route::resource( '/companies/{company}/contacts', 'ContactController' );
        Route::post('/companies/{company}/contacts/{contact}/archive', 'ContactController@archive');
        Route::post('/companies/{company}/contacts/{contact}/active', 'ContactController@active');
        Route::resource( '/companies', 'CompanyController' );
        Route::post('/companies/{company}/archive', 'CompanyController@archive');
        Route::post('/companies/{company}/active', 'CompanyController@active');


        Route::get( '/logs', function () {

            $logs = Log::with('user')->paginate();

            return view( 'log.index', compact( 'logs' ) );
        } );


        Route::get('/users/{user}/logs', function(User $user){
           $logs = Log::where('User_Key',$user->PRI)->with('user')->paginate();
           return view('log.show', compact('logs'));
        });
    } );


