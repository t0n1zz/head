<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Spatie\Activitylog\Traits\LogsActivity;

use App\Support\Dataviewer;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable, LogsActivity, Dataviewer;

    protected static $logAttributes = ['name', 'email', 'username','shop_id','is_active','mobile','type'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','shop_id','is_active','mobile','type'
    ];

    protected $allowedFilters = [
        'name','email','mobile','is_active','type','created_at','updated_at'
    ];

    protected $orderable = [
        'name','email','mobile','is_active','type','created_at','updated_at'
    ];

    public static function initialize()
    {
        return [
            'name' => '','email' => '', 'mobile' => '', 'shop_id' => '', 'is_active' => '', 'type' => ''
        ];
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    // relationship
    public function shop(){
        return $this->belongsTo('App\Shop','shop_id','id')->select('id','name');
    }

}
