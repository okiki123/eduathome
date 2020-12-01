<?php

namespace App\Constants;

class Messages
{
    const REGISTRATION_FAILED = 'Registration Failed';

    public static function failedToGet($entity)
    {
        return sprintf('Failed to get %s', $entity);
    }
}
