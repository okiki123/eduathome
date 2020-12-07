<?php

namespace App\Models;

use App\Traits\GetAddress;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $telephone
 * @property string $created_at
 * @property string $updated_at
 *
 * Class Caregiver
 * @package App\Models
 */
class Caregiver extends BaseModel {
    use GetAddress;
    /**
     * @var array
     */
    protected $guarded = [];
}
