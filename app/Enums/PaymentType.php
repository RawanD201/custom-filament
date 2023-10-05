<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum PaymentType: string
{
    use EnumToArray;

    case NONE = '-';
    case CASH = 'cash';
    case LOAN = 'loan';

    /**
     * Return enum in associative array with respected key and values are value translated.
     */
    public static function display(): array
    {
        return [
            self::CASH->value => __('labels.customer.payment.cash'),
            self::LOAN->value => __('labels.customer.payment.loan'),
        ];
    }

    /**
     * Return the translated text of given type.
     */
    public static function translate(string $type): string
    {
        return match ($type) {
            self::CASH->value => __('labels.customer.payment.cash'),
            self::LOAN->value => __('labels.customer.payment.loan'),
        };
    }
}
