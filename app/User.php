<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Backpack\Base\app\Notifications\ResetPasswordNotification as ResetPasswordNotification;
use App\Models\Guru;
use App\Models\Siswa;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function guru()
    {
         return $this->hasOne('App\Models\Guru', 'id_user');
    }
    public function siswa()
    {
         return $this->hasOne('App\Models\Siswa', 'id_user');
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
    public function setPasswordAttribute($value){
        $this->attributes['password']=bcrypt($value);
    }
}
