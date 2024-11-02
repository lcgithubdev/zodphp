<?php

namespace LCGH\Zod\Schemas;

use LCGH\Zod\Exceptions\InvalidTimeStampException;
use LCGH\Zod\Exceptions\InvalidStringException;
use LCGH\Zod\Exceptions\LongStringException;
use LCGH\Zod\Exceptions\ShortStringException;
use DateTime;

class TimeStampSchema extends Schema
{
    private $min;

    private $max;

    public static function make()
    {
        return new static();
    }

    public function min($min)
    {
        $this->min = $min;

        return $this;
    }

    public function max($max)
    {
        $this->max = $max;

        return $this;
    }

    public function isValidMySQLTimestamp($timestamp)
    {

        $dateTime = DateTime::createFromFormat('Y-m-d H:i:s', $timestamp);

        return $dateTime && $dateTime->format('Y-m-d H:i:s') === $timestamp;
    }

    protected function parseValue($value)
    {
        if (! is_string($value)) {
            throw InvalidStringException::make($value);
        }

        if (! is_null($this->min) && strlen($value) < $this->min) {
            throw ShortStringException::make($value, $this->min);
        }

        if (! is_null($this->max) && strlen($value) > $this->max) {
            throw LongStringException::make($value, $this->max);
        }

        if (!$this->isValidMySQLTimestamp($value)) {
            throw InvalidTimeStampException::make($value);
        }

        return $value;
    }
}
