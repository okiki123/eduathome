<?php

namespace App\Constants;

class Messages
{
    const REGISTRATION_FAILED = 'Registration Failed';

    public static function failedToGet($entity)
    {
        return sprintf('Failed to get %s', $entity);
    }

    public static function failedMessage($entity, $task)
    {
        return sprintf('Failed to %s %s', $task, $entity);
    }

    public static function successMessage($entity, $task)
    {
        return sprintf('%s %s successfully', $entity, $task);
    }
}
