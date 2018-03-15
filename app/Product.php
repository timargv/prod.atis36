<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\DocBlock\Tags\Factory\Strategy;

/**
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $id
 * @property mixed $category
 * @property mixed $provider
 * @property mixed $author
 * @property int user_id
 * @property mixed $image
 * @property int $category_id
 * @property int $provider_id
 * @property mixed $status
 */
class Product extends Model
{
    //
    use Sluggable;
    protected $fillable = ['title', 'desc', 'prc', 'num', 'user_id'];

    public function category() {

        return $this->hasOne(Category::class);

    }

    //-****************************************

    public function provider () {

        return $this->hasOne(Provider::class);

    }

    //-****************************************

    public function author () {

        return $this->hasOne(User::class);

    }


    //-****************************************

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    //-****************************************

    public static function add($fields) {

        $post = new static;
        $post->fill($fields);
        $post->user_id = 1;
        $post->save();

        return $post;

    }

    //-****************************************

    public function edit($fields) {

        $this->fill($fields);
        $this->save();
    }

    //-****************************************

    public function remove() {

        //Удалить картинку поста
        Storage::delete('uploads/' . $this->image);

        $this->delete();

    }

    //-****************************************

    public function uploadImage($image){

        if ($image == null) {return;}

        Storage::delete('uploads/' . $this->image);

        $filename = str_random(10) . '.' . $image->extension();
        $image->saveAs('uploads', $filename);

        $this->image = $filename;
        $this->save();

    }

    //-****************************************

    public function getImage() {

        if ($this->image == null) {
            return '/img/no-image.png';
        }
        return '/uploads/' . $this->image;

    }

    //-****************************************

    public function setCategory($id){

        if ($id == null) {return;}
        $this->category_id = $id;
        $this->save();

    }

    //-****************************************

    public function setProvider($id){

        if ($id == null) {return;}
        $this->provider_id = $id;
        $this->save();

    }

    //-****************************************

    public function setDraft() {

        $this->status = 0;
        $this->save();

    }

    public function setPublic() {

        $this->status = 1;
        $this->save();

    }

    public function toggleStatus($value) {

        if ($value == null){

            return $this->setDraft();

        }
        return $this->setPublic();

    }

}






















