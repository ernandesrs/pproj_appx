<?php

namespace App\Enums;

enum ChartTextColors: string
{
    case LIGHT_PRIMARY_TEXT = '#71717b';
    case LIGHT_SECONDARY_TEXT = '#9f9fa9';

    case DARK_PRIMARY_TEXT = '#d4d4d8';
    case DARK_SECONDARY_TEXT = '#9f9fa8';

    /**
     * Get all light colors
     * @return array
     */
    public static function lightColors(): array
    {
        return [
            self::LIGHT_PRIMARY_TEXT->value,
            self::LIGHT_SECONDARY_TEXT->value,
        ];
    }

    /**
     * Get all dark colors
     * @return array
     */
    public static function darkColors(): array
    {
        return [
            self::DARK_PRIMARY_TEXT->value,
            self::DARK_SECONDARY_TEXT->value,
        ];
    }
}
