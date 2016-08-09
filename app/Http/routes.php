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

Route::get('/', 'ProductsController@index');

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
        Route::get('dashboard', function()
        {
            return view('admin.dashboard');
        });

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
