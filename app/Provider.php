<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $id
 * @property mixed $products
 * @property mixed $mproviders
 */
class Provider extends Model
{
    //
    use Sluggable;

    
    protected $fillable = ['name', 'desc', 'link'];

    public function products(){
        return $this->hasMany(Product::class);
    }


    public function mproviders(){
        return $this->hasMany(Mprovider::class, 'provider_id');
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
