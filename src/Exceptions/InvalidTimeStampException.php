<?php

namespace LCGH\Zod\Exceptions;

class InvalidTimeStampException extends \Exception
{
    public static function make($value)
    {
        return new static('Invalid Timestamp. Expected a Timestamp, `' . gettype($value) . '` given.');
    }
}
