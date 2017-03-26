<?php

namespace Acacha\TodosBackend;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User.
 * 
 * @package App
 */
class User extends Authenticatable
{
    use HasApiTokens, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','api_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','api_token'
    ];

    /**
     * A user can have many tasks.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    /**
     * A user can have many messages.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    /**
     * A user can have many GCM tokens.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gcmTokens()
    {
        return $this->hasMany(GcmToken::class);
    }

    /**
     * @return mixed
     */
    public function routeNotificationForGcm()
    {
//        return 'eB-3iFw8lRw:APA91bFHGiE3zEoB7AR8NqkAceF_TRC4tfAEq-Fkt_bTOAincqmVVoQfSASARqL42baPiZq7K-e_S--07jiTBF8Yu2DDZKrrG02Utn82JSNiIBHyAlm0zI6Y7x_7ZDutGq069uhbb93b';
        return $this->gcmTokens->pluck('registration_id')->toArray();
    }
}
