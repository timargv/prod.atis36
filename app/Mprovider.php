<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 * @property mixed $provider
 * @property int $provider_id
 * @property mixed $id_provider
 * @property int user_id
 * @property mixed $author
 */
class Mprovider extends Model
{

    use Sluggable;

    protected $fillable = ['name_con_p', 'surname_con_p', 'patronymic_con_p', 'position_con_p', 'mobile_con_p', 'office_con_p', 'officedob_con_p', 'email_con_p'];

    //-****************************************

    public function provider() {
        return $this->belongsTo(Provider::class);

    }

    public function author () {

        return $this->BelongsTo(User::class, 'user_id');

    }

    //-****************************************

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name_con_p'
            ]
        ];
    }

    //-****************************************

    public static function add($fields) {
        $mprovider = new static();
        $mprovider->fill($fields);
        $mprovider->user_id = 1;
        $mprovider->save();

        return $mprovider;
    }

    //-****************************************

    public function edit($fields) {
        $this->fill($fields);
        $this->save();
    }

    //-****************************************
    // Сохранить поставщика
    public function setProvider($id) {
        if ($id == null) {return;}
        $this->provider_id = $id;
        $this->save();
    }

    //-****************************************
    // Получение имени поставщика
    public function getProviderTitle() {
        return($this->provider != null)
            ? $this->provider->name
            : 'Нет поставщика';
    }

    //-****************************************
    // Получение ID поставщика
    public function getProviderID() {
        return ($this->provider != null) ? $this->provider->id : null;
    }

    


}
