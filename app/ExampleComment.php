<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\ExamplePost;

class ExampleComment extends Model {

    protected $table = "example_comments";
    //comments table in database
    protected $guarded = [];

    public function author() {
        return $this->belongsTo(User::class, 'from_user');
    }

    // returns post of any comment
    public function post() {
        return $this->belongsTo(ExamplePost::class, 'on_post');
    }

}
