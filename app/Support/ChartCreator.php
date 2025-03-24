<?php

namespace App\Support;

class ChartCreator
{
    /**
     * Data
     * @var array
     */
    public array $data = [];

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->data = [
            'chart' => [
                'type' => 'line',
                'height' => null
            ],
            'series' => []
        ];
    }

    /**
     * Set Data
     * @param string $type
     * @param ?string $title
     * @param ?string $chartHeight
     * @return ChartCreator
     */
    private static function setData(string $type, ?string $title = null, ?string $height = null): ChartCreator
    {
        $chart = new ChartCreator;

        $chart->data['chart']['type'] = $type;
        $title ? $chart->data['title'] = [
            'text' => $title,
            'align' => 'left'
        ] : null;
        $height ? $chart->data['chart']['height'] = $height : null;

        return $chart;
    }

    /**
     * Line type
     * @param ?string $title
     * @param ?string $height
     * @return ChartCreator
     */
    public static function line(?string $title = null, ?string $height = null): ChartCreator
    {
        return static::setData('line', $title, $height);
    }

    /**
     * Area type
     * @param ?string $title
     * @param ?string $height
     * @return ChartCreator
     */
    public static function area(?string $title = null, ?string $height = null): ChartCreator
    {
        return static::setData('area', $title, $height);
    }

    /**
     * Bar type
     * @param ?string $title
     * @param ?string $height
     * @return ChartCreator
     */
    public static function bar(?string $title = null, ?string $height = null): ChartCreator
    {
        return static::setData('bar', $title, $height);
    }

    /**
     * Add Vertical Info
     * @param int $min
     * @param int $max
     * @param mixed $title
     * @return ChartCreator
     */
    public function addVerticalInfo(int $min, int $max, ?string $title = null): ChartCreator
    {
        $this->data['yaxis']['min'] = $min;
        $this->data['yaxis']['max'] = $max;

        $title ? $this->data['yaxis']['title']['text'] = $title : null;

        return $this;
    }

    /**
     * Add Horizontal Info
     * @param array $labels
     * @param mixed $title
     * @return ChartCreator
     */
    public function addHorizontalInfo(array $labels, ?string $title = null): ChartCreator
    {
        $this->data['xaxis']['type'] = 'category';
        $this->data['xaxis']['categories'] = $labels;

        $title ? $this->data['xaxis']['title']['text'] = $title : null;

        return $this;
    }

    /**
     * Add Serie Data
     * https://apexcharts.com/docs/series/
     * @param string $name
     * @param array $serieData
     *      Example 1: [20, 10]
     *      Example 2: [[1, 34], [3, 54]]
     *      Example 3: [
     *          ['x' => 1, 'y' => 34],
     *          ['x' => 3, 'y' => 54]
     *      ]
     *      Example 4: [
     *          ['x' => 'Apple', 'y' => 34],
     *          ['x' => 'Orange, 'y' => 54]
     *      ]
     *
     * @return ChartCreator
     */
    public function addSerieData(string $name, array $serieData = []): ChartCreator
    {
        $this->data['series'][] = [
            'name' => $name,
            'data' => $serieData
        ];
        return $this;
    }

    /**
     * Horizontal Bar
     * @return ChartCreator
     */
    public function horizontalBar(): ChartCreator
    {
        $this->data['plotOptions']['bar']['horizontal'] = true;
        return $this;
    }

    /**
     * To Array
     * @return array{type: string}
     */
    public function toArray(): array
    {
        $this->data['stroke'] = [
            'curve' => 'smooth'
        ];

        if ($this->data['chart']['type'] == 'bar') {
            $this->data['plotOptions']['bar']['borderRadiusApplication'] = 'end';
            $this->data['plotOptions']['bar']['borderRadius'] = 4;
        }

        return $this->data;
    }
}
