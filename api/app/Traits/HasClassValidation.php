<?php

namespace App\Traits;

trait HasClassValidation
{
    public static array $rules;

    public static function getRules(array $only = []): array
    {
        return count($only) ? array_only(static::$rules, $only) : static::$rules;
    }
}
