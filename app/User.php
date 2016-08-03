<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Task;
use App\ExampleComment;
use App\ExamplePost;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use App\Profile;

class User extends Authenticatable
{

    use EntrustUserTrait; // add this trait to your user model
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'email', 'password','avatar'
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
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    // user has many posts
    public function posts()
    {
        return $this->hasMany(ExamplePost::class, 'author_id');
    }

    // user has many comments
    public function comments()
    {
        return $this->hasMany(ExampleComment::class, 'from_user');
    }

    public function likedPosts()
    {
        return $this->morphedByMany(ExamplePost::class, 'likeable')->whereDeletedAt(null);
    }

    public function can_post()
    {
//        $role = $this->role;
//        if ($role == 'author' || $role == 'admin')
//        {
//            return true;
//        }
//        return false;
        return true;
    }

    public function is_admin()
    {
//        $role = $this->role;
//        if ($role == 'admin')
//        {
//            return true;
//        }
//        return false;
        return true;
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function getAvatarName()
    {
        return $this->getAttribute('avatar');
    }

    /**
     * @todo Create url get avatar image
     * @return type
     */
    public function getAvatar()
    {
        $imgUrl = "";
        if(empty($this->getAvatarName()))
        {
            $imgUrl = asset('/images/users/1/admin.png');
        }
        else
        {
            $imgUrl = asset('/images/users/' . $this->id . '/' . $this->getAvatarName() . '');
        }
        return $imgUrl;
    }

}
