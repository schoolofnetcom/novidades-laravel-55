<?php

namespace App\Exceptions;

class UserDisabledException extends \Exception
{
    public function render($request)
    {
        return ['status' => 'user is disabled'];
    }
}
