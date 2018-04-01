<?php

namespace App;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


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
    protected $fillable = ['title', 'desc', 'prc', 'num', 'site',  'status', 'image', 'user_id'];

    public function category() {

        return $this->belongsTo(Category::class);

    }

    //-****************************************

    public function provider () {

        return $this->belongsTo(Provider::class);

    }

    //-****************************************

    public function author () {

        return $this->BelongsTo(User::class, 'user_id');

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

        $product = new static;
        $product->fill($fields);
        $product->user_id = 1;
        $product->save();

        return $product;

    }

    //-****************************************

    public function edit($fields) {

        $this->fill($fields);
        $this->save();
    }

    //-****************************************

    public function remove() {

        //Удалить картинку поста
        $this->removeImage();

        $this->delete();

    }

    //-****************************************

    public function uploadImage($image){

        if ($image == null) {return;}

        $this->removeImage();

        $filename = str_random(10) . '.' . $image->extension();
        $image->storeAs('uploads', $filename);

        $this->image = $filename;
        $this->save();

    }

    //-****************************************

    public function removeImage()
    {
      if ($this->image != null ) {
        Storage::delete('uploads/' . $this->image);
      }
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

    public function setDateAttribute($value) {
        $date = Carbon::createFromFormat('d/m/y', $value)->format('Y-m-d');
        $this->attributes['date'] = $date;
    }

    public function getDateAttribute($value) {
        $date = Carbon::createFromFormat('Y-m-d', $value)->format('d/m/y');
        return $date;
    }

    public function getCategoryTitle()
    {
       return ($this->category != null)
              ? $this->category->title
              : 'Нет категории';
    }
    public function getProviderTitle()
    {
      return ($this->provider != null)
             ? $this->provider->name
             : 'Нет поставщика';
    }

    public function getCategoryID()
    {
       return $this->category != null ? $this->category->id : null;
    }
    public function getProviderID()
    {
      return $this->provider != null ? $this->provider->id : null;
    }

    //-****************************************
    // Получение ID поставщика
    public function getProviderLink() {
        return ($this->provider != null) ? $this->provider->link : null;
    }

}
