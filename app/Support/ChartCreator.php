<?php

namespace App\Support;

class ChartCreator
{
    /**
     * Chart type. Allows: line, area, column, pie and radialbar
     * @var string
     */
    public string $type = 'line';

    /**
     * Line type
     * @return ChartCreator
     */
    public static function line(): ChartCreator
    {
        $chart = new ChartCreator;
        $chart->type = 'line';
        return $chart;
    }

    /**
     * Area type
     * @return ChartCreator
     */
    public static function area(): ChartCreator
    {
        $chart = new ChartCreator;
        $chart->type = 'area';
        return $chart;
    }

    /**
     * To Array
     * @return array{type: string}
     */
    public function toArray(): array
    {
        return [
            'type' => $this->type
        ];
    }
}
