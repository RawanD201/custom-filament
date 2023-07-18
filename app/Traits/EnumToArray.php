<?php

namespace App\Traits;

trait EnumToArray
{
    /**
     * Return Enum keys
     */
    public static function names(): array
    {
        return array_column(self::cases(), 'name');
    }

    /**
     * Return Enum values
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    /**
     * Return enum in associative array with respected key and values. Keys are uppercase
     */
    public static function array(): array
    {
        return array_combine(self::names(), self::values());
    }

    /**
     * Return enum in associative array with respected key and values as value.
     */
    public static function options(): array
    {
        $combine = array_combine(self::values(), self::values());

        if (!method_exists(get_class(), 'translate')) {
            return $combine;
        }

        // Translate each key
        return array_map(fn ($v) => static::translate($v), $combine);
    }
}
