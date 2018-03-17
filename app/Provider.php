<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\Tests\Models\Post;
use Illuminate\Database\Eloquent\Model;

/**
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $id
 * @property mixed $posts
 */
class Provider extends Model
{
    //
    use Sluggable;

    protected $fillable = ['name', 'desc', 'link'];

    public function posts(){

        return $this->hasMany(Post::class);

    }


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
