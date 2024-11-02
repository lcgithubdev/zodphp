<?php

namespace LCGH\Zod;

use LCGH\Zod\Schemas\EmailSchema;
use LCGH\Zod\Schemas\NumberSchema;
use LCGH\Zod\Schemas\ObjectSchema;
use LCGH\Zod\Schemas\StringSchema;
use LCGH\Zod\Schemas\TimeStampSchema;

class Zod
{
    public static function object($schema = [])
    {
        return ObjectSchema::make($schema);
    }

    public static function string()
    {
        return StringSchema::make();
    }

    public static function email()
    {
        return EmailSchema::make();
    }

    public static function timestamp()
    {
        return TimeStampSchema::make();
    }

    public static function number()
    {
        return NumberSchema::make();
    }
}
