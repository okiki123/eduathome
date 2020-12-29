<?php

namespace App\Models;

/**
 * @property integer $id
 * @property string $name
 *
 * Class NotificationType
 * @package App\Models
 */
class NotificationType extends BaseModel {

    const TUTOR_CREATED = 'tutor_created';
    const PARENT_CREATED = 'parent_created';
    const TUTOR_APPROVED = 'tutor_approved';

    /**
     * @var array
     */
    protected $fillable = [];
}
