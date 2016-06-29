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
Route::get('/home/read', [
    'as' => 'home.read', 'uses' => 'HomeController@read'
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
    /**
     * Admin section
     */
    Route::group(['prefix' => 'admin'], function ()
    {
        //Dashboard Route
        Route::get('dashboard', function()
        {
            return view('admin.dashboard');
        });

        /**
         * System
         */
        // Upload
        Route::get('/system/upload', [
            'as' => 'system.upload.list',
            'uses' => 'Admin\EShopSystem\UploadsController@index'
        ]);
        Route::post('/system/upload/file', [
            'as' => 'system.upload.file',
            'uses' => 'Admin\EShopSystem\UploadsController@uploadFile'
        ]);
        Route::delete('/system/upload/file', [
            'as' => 'system.upload.file.delete',
            'uses' => 'Admin\EShopSystem\UploadsController@deleteFile'
        ]);
        Route::post('/system/upload/folder', [
            'as' => 'system.upload.folder',
            'uses' => 'Admin\EShopSystem\UploadsController@uploadFolder'
        ]);
        Route::delete('/system/upload/folder', [
            'as' => 'system.upload.folder.delete',
            'uses' => 'Admin\EShopSystem\UploadsController@deleteFolder'
        ]);
        // End Upload
        Route::resource('system-users', 'Admin\EShopSystem\UsersController');
        Route::resource('database-backup', 'Admin\EShopSystem\SystemController@dbbackup');
        Route::resource('csv-export', 'Admin\EShopSystem\SystemController@csvexport');
        Route::resource('csv-import', 'Admin\EShopSystem\SystemController@csvimport');
        //End system
    });
});

//Route::get('sendemail', function ()
//{
//    $data = array (
//        'name' => "Learning Laravel",
//    );
//
//    Mail::send('emails.welcome', $data, function ($message)
//    {
//        $message->to('taihanh0310@gmail.com')->subject('Learning Laravel test email');
//    });
//
//    return "Your email has been sent successfully";
//});
