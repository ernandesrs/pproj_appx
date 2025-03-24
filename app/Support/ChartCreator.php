<?php

namespace App\Support;

use App\Support\Chart\AreaChart;
use App\Support\Chart\BarChart;
use App\Support\Chart\LineChart;
use App\Support\Chart\PieChart;

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

    /**
     *  Bar
     * @param ?string $title
     * @param ?string $height
     * @return \App\Support\Chart\BarChart
     */
    public static function bar(?string $title = null, ?int $height = null): BarChart
    {
        return new BarChart($title, $height);
    }

    /**
     *  Pie
     * @param ?string $title
     * @param ?string $height
     * @return \App\Support\Chart\PieChart
     */
    public static function pie(?string $title = null, ?int $height = null): PieChart
    {
        return new PieChart($title, $height);
    }
}
