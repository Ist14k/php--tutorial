<?php

namespace Core;

class Validator
{
    public static function string(string $value, $min = 3, $max = 255): bool
    {
        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function email($value): bool
    {
        $value = trim($value);

        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public static function password($value): bool
    {
        $value = trim($value);

        return strlen($value) >= 8;
    }
}


















