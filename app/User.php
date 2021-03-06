<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;

/**
 * @property mixed $posts
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $id
 * @property mixed $product
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *  test
     * @var array
     */
    protected $fillable = [
        'name', 'email',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //-****************************************

    public function product() {

        return $this->hasMany(Product::class);

    }

    //-****************************************

    public static function add($fields) {

        $user = new static;

        $user->fill($fields);
        $user->password = bcrypt($fields['password']);
        $user->save();

        return $user;

    }

    //-****************************************

    public function edit($fields) {

        $this->fill($fields);

        $this->save();

    }

    //-****************************************

    public function generatePassword($password) {
        if ($password != null) {
            $this->password = bcrypt($password);
        }
        $this->save();
    }

    //-****************************************

    public function remove() {

        $this->removeAvatar();
        $this->delete();
    }

    //-****************************************

    public function uploadAvatar($image) {

        if ($image == null) {return;}

        $this->removeAvatar();

        $filename = str_random(10) . '.' . $image->extension();
        $image->storeAs('uploads', $filename);
        $this->avatar = $filename;
        $this->save();

    }

    //-****************************************

    public function removeAvatar() {
        if ($this->avatar != null){

            Storage::delete('uploads/' . $this->avatar);
        }
    }

    //-****************************************

    public function getImage() {

        if ($this->avatar == null) {

            return '/img/no-user-image.png';
        }

        return '/uploads/' . $this->avatar;

    }

    //-****************************************

    public function makeAdmin() {

        $this->role = 1;
        $this->save();

    }

    public function makeNormal() {
        $this->role = 0;
        $this->save();

    }

    public function toggleAdmin($value) {

        if ($value == null) {

            return $this->makeNormal();
        }

        return $this->makeAdmin();
    }

    //-****************************************

    public function ban() {

        $this->status = 1;
        $this->save();

    }

    public function unban() {

        $this->status = 0;
        $this->save();
    }

    public function toggleBan($value) {

        if ($value == null) {
            return $this->unban();
        }
        return $this->ban();
    }



}
