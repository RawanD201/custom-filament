<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum ExpenseType: string
{
    use EnumToArray;

    case NONE = '-';
    case PUBLIC = 'public';
    case PRIVATE = 'private';
    case SHARED = 'shared';

    /**
     * Return enum in associative array with respected key and values are value translated.
     */
    public static function display(): array
    {
        return [
            self::PUBLIC->value => __('labels.expense.type.public'),
            self::PRIVATE->value => __('labels.expense.type.private'),
            self::SHARED->value => __('labels.expense.type.shared'),
        ];
    }

    /**
     * Return the translated text of given type.
     */
    public static function translate(string $type): string
    {
        return match ($type) {
            self::PUBLIC->value => __('labels.expense.type.public'),
            self::PRIVATE->value => __('labels.expense.type.private'),
            self::SHARED->value => __('labels.expense.type.shared'),
        };
    }
}
