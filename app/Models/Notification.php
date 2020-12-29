<?php

namespace App\Models;

/**
 * @property integer $id
 * @property integer $fired_by
 * @property integer $user_id
 * @property string $type
 * @property string $data
 * @property mixed $read_at
 * @property mixed $created_at
 *
 * Class Notification
 * @package App\Models
 */
class Notification extends BaseModel {
    /**
     * @var array
     */
    protected $guarded = [];

    public $timestamps = false;
}
