<?php

namespace App;

use Cviebrock\EloquentSluggable\Tests\Models\Post;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;

/**
 * @property mixed $posts
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $id
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function posts () {

        return $this->hasMany(Post::class);

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
        $this->password = bcrypt($fields['password']);
        $this->save();

    }

    //-****************************************

    public function remove() {

        Storage::delete('uploads/' . $this->image);
        $this->delete();
    }

    //-****************************************

    public function uploadAvatar($image) {

        if ($image == null) {return;}

        Storage::delete('uploads/' . $this->image);
        $filename = str_random(10) . '.' . $image->extension();
        $image->saveAs('uploads', $filename);
        $this->image = $filename;
        $this->save();

    }

    //-****************************************

    public function getAvatar() {

        if ($this->image == null) {

            return '/img/no-user-image.png';
        }

        return '/uploads/' . $this->image;

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
