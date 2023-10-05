<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum CustomerType: string
{
    use EnumToArray;

    case SELL = 'sell';
    case BUY = 'buy';
    // case SELL_AND_BUY = 'sell_and_buy';

    /**
     * Return enum in associative array with respected key and values as value being ucfirst.
     */
    public static function display(): array
    {
        return [
            self::SELL->value => __('labels.customer.type.sell'),
            self::BUY->value => __('labels.customer.type.buy'),
            // self::SELL_AND_BUY->value => __('labels.customer.type.sell_and_buy'),
        ];
    }

    /**
     * Return the translated text of given type.
     */
    public static function translate(string $type): string
    {
        return match ($type) {
            self::SELL->value => __('labels.customer.type.sell'),
            self::BUY->value => __('labels.customer.type.buy'),
            // self::SELL_AND_BUY->value => __('labels.customer.type.'),
        };
    }
}
