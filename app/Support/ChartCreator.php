<?php

namespace App\Support;

use App\Support\Chart\AreaChart;
use App\Support\Chart\LineChart;

class ChartCreator
{
    /**
     * Line
     * @param ?string $title
     * @param ?string $height
     * @return LineChart
     */
    public static function line(?string $title = null, ?int $height = null): LineChart
    {
        return new LineChart($title, $height);
    }

    /**
     * Area
     * @param ?string $title
     * @param ?string $height
     * @return AreaChart
     */
    public static function area(?string $title = null, ?int $height = null): AreaChart
    {
        return new AreaChart($title, $height);
    }
}
