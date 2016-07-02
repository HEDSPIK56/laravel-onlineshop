<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Task;
use App\ExampleComment;
use App\ExamplePost;

class User extends Authenticatable {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * relation ship
     */
    public function tasks() {
        return $this->hasMany(Task::class);
    }

    // user has many posts
    public function posts() {
        return $this->hasMany(ExamplePost::class, 'author_id');
    }

    // user has many comments
    public function comments() {
        return $this->hasMany(ExampleComment::class, 'from_user');
    }

    public function can_post() {
        $role = $this->role;
        if ($role == 'author' || $role == 'admin') {
            return true;
        }
        return false;
    }

    public function is_admin() {
        $role = $this->role;
        if ($role == 'admin') {
            return true;
        }
        return false;
    }

}
