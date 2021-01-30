<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $school_name
 * @property string $entry_year
 * @property string $graduation_year
 * @property string $degree
 * @property string $discipline
 * @property mixed $created_at
 * @property mixed $updated_at
 *
 * Class Education
 * @package App\Models
 */
class Education extends BaseModel {
    /**
     * @var array
     */
    protected $table = 'educations';

    protected $guarded = [];
}
