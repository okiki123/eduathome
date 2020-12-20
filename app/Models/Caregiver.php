<?php

namespace App\Models;

use App\Traits\GetAddress;
use App\Traits\GetUser;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $city_id
 * @property integer $state_id
 * @property string $telephone
 * @property string $status
 * @property string $bio
 * @property string $street1
 * @property string $street2
 * @property string $created_at
 * @property string $updated_at
 *
 * Class Caregiver
 * @package App\Models
 */
class Caregiver extends BaseModel {

    use GetAddress;
    use GetUser;

    /**
     * @var array
     */
    protected $guarded = [];
}
