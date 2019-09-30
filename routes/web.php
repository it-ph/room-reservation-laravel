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
// Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('logout', function () {
    if(Auth::check()){
            Auth::logout();
            return redirect('/')->with('with_success', 'Successfully Log-out!');
        return view('/');
    }
    return redirect('/');
});

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});


Route::get('unauthorized', function () {
    return view('notifications.401');
})->name('unauthorized');

Route::get('/', 'CalendarController@index');
Route::get('/home', 'CalendarController@index')->name('home');

// Auth::routes();
Auth::routes(['register' => false]);

/* Authorized Users */
Route::group(['middleware' => ['auth','web'],],
    function () 
{
    Route::POST('add-event','CalendarController@store')->name('events.store');
    // Route::get('/home', 'HomeController@index')->name('home');
    
    /* Admin Links */
    Route::group(['middleware' => ['adminOnly'],'prefix'=>'admin' ],
        function(){
            Route::resource('users','Admin\AdminController');
    });
    

}); //Middleware auth