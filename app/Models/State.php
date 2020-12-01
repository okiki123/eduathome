<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $state
 * @property string $state_code
 *
 * Class Caregiver
 * @package App\Models
 */
class State extends Model {
    /**
     * @var array
     */
    protected $fillable = [];

    /**
     * @return Collection
     */
    public function cities()
    {
        return $this->hasMany(City::class, 'state_code', 'state_code')->get();
    }

    public static function getStates()
    {
        return self::all()->map(function ($item, $key) {
            return [
                'label' => $item['state'],
                'value' => $item['id']
            ];
        });
    }

    public static function getCities($stateId)
    {
        return self::where(['id' => $stateId])->first()->cities()->map(function ($item, $key) {
            return [
                'label' => $item['city'],
                'value' => $item['id']
            ];
        });
    }
}
