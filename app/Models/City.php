<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $city
 * @property string $state_code
 *
 * Class City
 * @package App\Models
 */
class City extends Model {
    /**
     * @var array
     */
    protected $fillable = [];
}
