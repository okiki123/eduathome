<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

/**
 * @property integer $id
 * @property string $firstname
 * @property string $lastname
 * @property mixed $email_verified_at
 * @property string $email
 * @property string $password
 * @property string $created_at
 * @property string $updated_at
 *
 * Class User
 * @package App\Models
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function fullname()
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    public function caregiver()
    {
        return $this->hasOne(Caregiver::class);
    }

    public function validatePassword($password)
    {
        return Hash::check($password, $this->password);
    }
}
