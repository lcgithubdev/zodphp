<?php

namespace LCGH\Zod\Exceptions;

class InvalidEmailException extends \Exception
{
    public static function make($value)
    {
        return new static('Invalid email. Expected a email, `' . gettype($value) . '` given.');
    }
}
