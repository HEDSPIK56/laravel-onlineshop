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

Route::get('/', function () {
    //return 'Hello World';
    $heading = "av";
    $body = "body";
    return view('welcome', compact('heading','body'));
});

//Route::get('/', 'ProductsController@index');

Route::auth();
Route::get('user/activation/{token}', 'Auth\AuthController@activateUser')->name('user.activate');

Route::get('/home', [
    'as' => 'home', 'uses' => 'PostController@index'
]);
Route::get('/home/read', [
    'as' => 'home.read', 'uses' => 'HomeController@read'
]);
Route::get('/home/create', [
    'as' => 'home.create', 'uses' => 'HomeController@create'
]);

/**
 * Front end
 */
// Product
Route::get('/product', [
    'as' => 'product.index', 'uses' => 'ProductsController@index'
]);

Route::get('/product/{id}', [
    'as' => 'product.show', 'uses' => 'ProductsController@show'
])->where('id', '[0-9]+');

Route::post('/product/addToCart',[
    'as' => 'product.add_to_cart',
    'uses' => 'ProductsController@addToCart'
]);
/**
 * End front end
 */

/**
 * Cart
 */
Route::get('/cart', [
    'as' => 'cart.index', 'uses' => 'CartController@index'
]);
/**
 * End cart
 */
/**
 * Social Auth
 */
Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');
/**
 * End Social Auth
 */

Route::group(array('before' => 'auth'), function ()
{
    Route::get('/laravel-filemanager', '\Tsawler\Laravelfilemanager\controllers\LfmController@show');
    //Route::post('/laravel-filemanager/upload', '\Tsawler\Laravelfilemanager\controllers\LfmController@upload');
    Route::any('/laravel-filemanager/upload', '\Tsawler\Laravelfilemanager\controllers\UploadController@upload');
    Route::get('/laravel-filemanager/jsonimages', '\Tsawler\Laravelfilemanager\controllers\ItemsController@getImages');
    Route::get('/laravel-filemanager/jsonfiles', '\Tsawler\Laravelfilemanager\controllers\ItemsController@getFiles');

    // folders
    Route::get('/laravel-filemanager/newfolder', '\Tsawler\Laravelfilemanager\controllers\FolderController@getAddfolder');
    Route::get('/laravel-filemanager/deletefolder', '\Tsawler\Laravelfilemanager\controllers\FolderController@getDeletefolder');
    Route::get('/laravel-filemanager/folders', '\Tsawler\Laravelfilemanager\controllers\FolderController@getFolders');
     Route::get('/laravel-filemanager/rename', '\Tsawler\Laravelfilemanager\controllers\RenameController@getRename');

    // scale/resize
    Route::get('/laravel-filemanager/resize', '\Tsawler\Laravelfilemanager\controllers\ResizeController@getResize');
    Route::get('/laravel-filemanager/doresize', '\Tsawler\Laravelfilemanager\controllers\ResizeController@performResize');

    // download
    Route::get('/laravel-filemanager/download', '\Tsawler\Laravelfilemanager\controllers\DownloadController@getDownload');

    // delete
    Route::get('/laravel-filemanager/delete', '\Tsawler\Laravelfilemanager\controllers\DeleteController@getDelete');
});

// Login before access task
Route::group(['middleware' => 'auth'], function (){
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
    /*
     * Post
     */
    // show new post form
    Route::get('new-post', [
        'as' => 'blog.new.post',
        'uses' => 'PostController@create'
    ]);
    // save new post
    Route::post('new-post', 'PostController@store');
    // edit post form
    Route::get('edit/{slug}', 'PostController@edit');
    // update post
    Route::post('update', 'PostController@update');
    // delete post
    Route::get('delete/{id}', 'PostController@destroy');
    // display user's all posts
    Route::get('my-all-posts', 'UserController@user_posts_all');
    // display user's drafts
    Route::get('my-drafts', 'UserController@user_posts_draft');
    // add comment
    Route::post('comment/add', 'CommentController@store');
    // delete comment
    Route::post('comment/delete/{id}', 'CommentController@distroy');

//users profile
    Route::get('user/{id}', 'UserController@profile')->where('id', '[0-9]+');
// display list of posts
    Route::get('user/{id}/posts', 'UserController@user_posts')->where('id', '[0-9]+');
// display single post
    Route::get('/{slug}', ['as' => 'post', 'uses' => 'PostController@show'])->where('slug', '[A-Za-z0-9-_]+');
    // End post
    // Like
    Route::get('product/like/{id}', ['as' => 'product.like', 'uses' => 'LikeController@likeProduct']);
    Route::get('post/like/{id}', [
        'as' => 'post.like',
        'uses' => 'LikeController@likePost'
    ]);
    // End like

    /**
     * Admin section
     */
    Route::group(['prefix' => 'admin', 'middleware' => ['role:root|admin|manager']], function ()
    {
        //Dashboard Route
        Route::get('/dashboard', [
            'as' => 'dashboard.index',
            'uses' => 'Admin\DashboardController@index'
        ]);

        /**
         * Category
         */
        Route::resource('/data/category', 'Admin\EShopDataEntry\CategoriesController');
        /**
         * End category
         */
        /**
         * Category
         */
        Route::resource('/data/product', 'Admin\EShopDataEntry\ProductsController');
        Route::post('data/product/copy', [
            'as' => 'admin.data.product.copy',
            'uses' => 'Admin\EShopDataEntry\ProductsController@copy'
        ]);
        /**
         * End category
         */
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
            'uses' => 'Admin\EShopSystem\UploadsController@createFolder'
        ]);
        Route::delete('/system/upload/folder', [
            'as' => 'system.upload.folder.delete',
            'uses' => 'Admin\EShopSystem\UploadsController@deleteFolder'
        ]);
        // End Upload

        Route::resource('/system/user', 'Admin\EShopSystem\UsersController');
        Route::resource('database-backup', 'Admin\EShopSystem\SystemController@dbbackup');
        Route::resource('csv-export', 'Admin\EShopSystem\SystemController@csvexport');
        Route::resource('csv-import', 'Admin\EShopSystem\SystemController@csvimport');

        Route::resource('/system/role', 'Admin\EShopSystem\RolesController');
        Route::resource('/system/permission', 'Admin\EShopSystem\PermissionsController');

        // system setting
        Route::get('/system/system-setting', [
            'as' => 'admin.system.system-setting.index',
            'uses' => 'Admin\EShopSystem\SystemSettingController@index'
        ]);

        Route::get('/system/system-setting/create', [
            'as' => 'admin.system.system-setting.create',
            'uses' => 'Admin\EShopSystem\SystemSettingController@create'
        ]);

        Route::get('/system/system-setting/{id}/edit', [
            'as' => 'admin.system.system-setting.edit',
            'uses' => 'Admin\EShopSystem\SystemSettingController@edit'
        ]);

        Route::post('/system/system-setting', [
            'as' => 'admin.system.system-setting.store',
            'uses' => 'Admin\EShopSystem\SystemSettingController@store'
        ]);
        Route::post('/system/system-setting/{id}', [
            'as' => 'admin.system.system-setting.update',
            'uses' => 'Admin\EShopSystem\SystemSettingController@update'
        ]);

        //End system
    });
});

Route::get('/sendemail', function ()
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
