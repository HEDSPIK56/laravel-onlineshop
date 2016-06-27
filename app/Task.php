<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Task extends Model
{

    protected $table = 'tasks';
    protected $fillable = ['name'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
