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
    $data = array (
        'name' => "Learning Laravel",
    );

    Mail::send('emails.welcome', $data, function ($message)
    {
        $message->to('taihanh0310@gmail.com')->subject('Learning Laravel test email');
    });

    return "Your email has been sent successfully";
});


//$middlewares = \Config::get('lfm.middlewares');
//array_push($middlewares, '\Unisharp\Laravelfilemanager\middleware\MultiUser');

// make sure authenticated
//Route::group(array ('middleware' => $middlewares, 'prefix' => 'laravel-filemanager'), function ()
//{
//    // Show LFM
//    Route::get('/', 'Unisharp\Laravelfilemanager\controllers\LfmController@show');
//
//    // upload
//    Route::any('/upload', 'Unisharp\Laravelfilemanager\controllers\UploadController@upload');
//
//    // list images & files
//    Route::get('/jsonitems', 'Unisharp\Laravelfilemanager\controllers\ItemsController@getItems');
//
//    // folders
//    Route::get('/newfolder', 'Unisharp\Laravelfilemanager\controllers\FolderController@getAddfolder');
//    Route::get('/deletefolder', 'Unisharp\Laravelfilemanager\controllers\FolderController@getDeletefolder');
//    Route::get('/folders', 'Unisharp\Laravelfilemanager\controllers\FolderController@getFolders');
//
//    // crop
//    Route::get('/crop', 'Unisharp\Laravelfilemanager\controllers\CropController@getCrop');
//    Route::get('/cropimage', 'Unisharp\Laravelfilemanager\controllers\CropController@getCropimage');
//
//    // rename
//    Route::get('/rename', 'Unisharp\Laravelfilemanager\controllers\RenameController@getRename');
//
//    // scale/resize
//    Route::get('/resize', 'Unisharp\Laravelfilemanager\controllers\ResizeController@getResize');
//    Route::get('/doresize', 'Unisharp\Laravelfilemanager\controllers\ResizeController@performResize');
//
//    // download
//    Route::get('/download', 'Unisharp\Laravelfilemanager\controllers\DownloadController@getDownload');
//
//    // delete
//    Route::get('/delete', 'Unisharp\Laravelfilemanager\controllers\DeleteController@getDelete');
//});
