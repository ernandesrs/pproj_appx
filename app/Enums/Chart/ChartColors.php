<?php

namespace App\Enums\Chart;

enum ChartColors: string
{
    // Light theme colors
    case LIGHT_BLUE = '#4f39f6';
    case LIGHT_GREEN = '#00bba7';
    case LIGHT_ORANGE = '#ffb86a';
    case LIGHT_RED = '#ff637e';
    case LIGHT_PURPLE = '#00a6f4';

    // Dark theme colors
    case DARK_BLUE = '#312c85';
    case DARK_GREEN = '#005f5a';
    case DARK_ORANGE = '#ca3500';
    case DARK_RED = '#a50036';
    case DARK_PURPLE = '#00598a';

    /**
     * Get all light colors
     * @return array
     */
    public static function lightColors(): array
    {
        return [
            self::LIGHT_BLUE->value,
            self::LIGHT_GREEN->value,
            self::LIGHT_ORANGE->value,
            self::LIGHT_RED->value,
            self::LIGHT_PURPLE->value,
        ];
    }

    /**
     * Get all dark colors
     * @return array
     */
    public static function darkColors(): array
    {
        return [
            self::DARK_BLUE->value,
            self::DARK_GREEN->value,
            self::DARK_ORANGE->value,
            self::DARK_RED->value,
            self::DARK_PURPLE->value,
        ];
    }

    /**
     * Get color by theme and name
     * @param string $theme
     * @param string $color
     * @return string|null
     */
    public static function getColor(string $theme, string $color): ?string
    {
        $constant = strtoupper($theme . '_' . $color);
        return defined("self::$constant") ? constant("self::$constant")->value : null;
    }
}
