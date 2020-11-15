<?php

namespace App\Process;

abstract class BaseProcess
{
    public $errors;
    /**
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
    }

    public function setErrors($errors)
    {
        $this->errors = $errors;
    }

    abstract public function run();
}
