<?php

namespace App;

use App\ExampleComment;
use App\User;
use Illuminate\Database\Eloquent\Model;

class ExamplePost extends Model {

    //restricts columns from modifying
    protected $guarded = [];
    protected $table = "example_posts";

    // posts has many comments
    // returns all comments on that post
    public function comments() {
        return $this->hasMany(ExampleComment::class, 'on_post');
    }
    
    public function author()
    {
      return $this->belongsTo(User::class,'author_id');
    }
}

//http://www.findalltogether.com/tutorial/simple-blog-application-in-laravel-5-part-2-routes-and-models/
//http://www.easylaravelbook.com/blog/2015/04/08/processing-file-uploads-with-laravel-5/
//http://the-amazing-php.blogspot.com/2015/06/laravel-5.1-image-gallery-crud.html
//http://mydnic.be/post/simple-like-system-with-laravel-5
//https://www.flynsarmy.com/2015/02/creating-a-basic-todo-application-in-laravel-5-part-1/