<?php

namespace App\Models;

use App\Traits\GetUser;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $token
 * @property mixed $expires_at
 * @property mixed $created_at
 *
 * Class VerificationToken
 * @package App\Models
 */
class VerificationToken extends Model {
    use GetUser;

    /**
     * @var array
     */
    protected $guarded = [];

    public $timestamps = false;
}
