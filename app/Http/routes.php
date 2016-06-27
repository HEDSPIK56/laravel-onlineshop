<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::get('/', function ()
{
    return view('welcome');
});

Route::auth();
Route::get('user/activation/{token}', 'Auth\AuthController@activateUser')->name('user.activate');

Route::get('/home', [
    'as' => 'home', 'uses' => 'HomeController@index'
]);

/**
 * Social Auth
 */
Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');
/**
 * End Social Auth
 */
// Login before access task
Route::group(['middleware' => 'auth'], function ()
{
    /**
     * Task
     */
    Route::get('/tasks', [
        'as' => 'getTask',
        'uses' => 'TaskController@index'
    ]);

    Route::post('/task', [
        'as' => 'postTask',
        'uses' => 'TaskController@store'
    ]);
    Route::delete('/task/{task}', [
        'as' => 'deleteTask',
        'uses' => 'TaskController@destroy'
    ]);
    /**
     * End task
     */
});

Route::get('sendemail', function ()
{
//    dd(Config::get("mail"));
//    die;
    $data = array (
        'name' => "Learning Laravel",
    );

    Mail::send('emails.welcome', $data, function ($message)
    {
        $message->to('taihanh0310@gmail.com')->subject('Learning Laravel test email');
    });

    return "Your email has been sent successfully";
});
