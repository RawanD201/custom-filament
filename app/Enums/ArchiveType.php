<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum ArchiveType: string
{
    use EnumToArray;

    case WAITING = 'waiting';
    case APPROVED = 'approved';
    case NORMAL = 'normal';

    /**
     * Return enum in associative array with respected key and values as value being ucfirst.
     */
    public static function display(): array
    {
        return [
            self::WAITING->value => __('labels.type.waiting'),
            self::APPROVED->value => __('labels.type.approve'),
            self::NORMAL->value => __('labels.type.normal'),
        ];
    }


    public static function privateDisplay(): array
    {
        return [
            self::WAITING->value => __('labels.type.waiting'),
            self::NORMAL->value => __('labels.type.normal'),
        ];
    }

    /**
     * Return the translated text of given type.
     */
    public static function translate(string $type): string
    {
        return match ($type) {
            self::WAITING->value => __('labels.type.waiting'),
            self::APPROVED->value => __('labels.type.approve'),
            self::NORMAL->value => __('labels.type.normal'),
        };
    }
}
