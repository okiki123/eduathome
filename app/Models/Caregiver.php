<?php

namespace App\Models;

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
class Caregiver extends Model {
    /**
     * @var array
     */
    protected $guarded = [];
}
