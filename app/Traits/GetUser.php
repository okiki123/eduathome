<?php

namespace App\Traits;

use App\Models\User;

trait GetUser
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
