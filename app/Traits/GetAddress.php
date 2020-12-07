<?php

namespace App\Traits;

use App\Models\City;
use App\Models\State;

trait GetAddress
{
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
