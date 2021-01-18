<?php

namespace App\Models;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $sender_id
 * @property string $message
 * @property mixed $read_at
 * @property mixed $created_at
 *
 * Class Message
 * @package App\Models
 */
class Message extends BaseModel {
    /**
     * @var array
     */
    protected $guarded = [];

    public $timestamps = false;
}
