<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Product;
use App\ExamplePost;

class ExampleLike extends Model
{

    // Use a Softdelete
    use SoftDeletes;

    protected $table = 'likeables';
    protected $fillable = [
        'user_id',
        'likeable_id',
        'likeable_type',
    ];

    public function products()
    {
        return $this->morphedByMany(Product::class, 'likeable');
    }

    public function posts()
    {
        return $this->morphedByMany(ExamplePost::class, 'likeable');
    }

}
