<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int user_id
 */
class managerProvider extends Model
{
    //
    use Sluggable;

    protected $fillable = ['name_con_p', 'surname_con_p', 'patronymic_con_p', 'position_con_p', 'mobile_con_p', 'office_con_p', 'officedob_con_p', 'email_con_p'];

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

        $manager_provider = new static();
        $manager_provider->fill($fields);
        $manager_provider->user_id = 1;
        $manager_provider->save();
    }

    //-****************************************

    public function edit($fields) {
        $this->fill($fields);
        $this->save();
    }

    //-****************************************

    public function setProvider($id) {
        if ($id != null) {return;}
        $this->id_provider = $id;
        $this->save();
    }

    //-****************************************

    public function getProviderTitle()
    {
        return ($this->provider != null)
            ? $this->provider->name
            : 'Нет поставщика';
    }

    //-****************************************

    public function getProviderID()
    {
        return $this->provider != null ? $this->provider->id : null;
    }


}
