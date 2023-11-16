<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * 
 * Class Consumer
 * 
 * @property int id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $password
 * @property int $active
 * 
 * @package App\Models
 */
class Consumer extends Model implements AuthenticatableContract,
AuthorizableContract, JWTSubject
{
	use Authenticatable, Authorizable;

	protected $table = 'Api_Consumers';
	public $timestamps = false;

    /**
     * The attributes that should be hidden for arrays.
     */
    protected $hidden = [
        'password'
    ];

	protected $casts = [
		// 
	];

    protected $attributes = [
        // 
    ];

	protected $fillable = [
		'name',
        'email',
        'phone',
        'password',
        'active'
	];

    /**
     * /------------------------------------------------------------------------
     * / JWT Functions
     * /------------------------------------------------------------------------
    */

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
     * Return a key value array, containing any custom claims to be added to
     * the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}