<?php

namespace App\Support\Chart;

use App\Enums\Chart\ChartColors;
use App\Enums\Chart\ChartTextColors;

abstract class Chart
{
    /**
     * Type
     * @var string
     */
    protected string $type;

    /**
     * Title
     * @var ?string
     */
    public ?string $title;

    /**
     * Height
     * @var ?string
     */
    public ?string $height;

    /**
     * Series
     * @var array
     */
    public array $series = [];

    /**
     * Series color
     * @var array
     */
    public array $seriesColor = [];

    /**
     * Constructor
     * @param ?string $title
     * @param ?string $height
     */
    public function __construct(?string $title = null, ?int $height = null)
    {
        $this->title = $title;
        $this->height = $height;
    }

    /**
     * Add Series Color
     * @param array[\App\Enums\Chart\ChartColor] $colors
     * @return Chart
     */
    public function addSeriesColor(array $colors): Chart
    {
        $light = [];
        $dark = [];

        array_map(function ($item) use (&$light, &$dark) {
            $light[] = ChartColors::getColor('light', $item->value);
            $dark[] = ChartColors::getColor('dark', $item->value);
        }, $colors);

        $this->seriesColor = [
            'light' => $light,
            'dark' => $dark
        ];

        return $this;
    }

    /**
     * Get colors from config
     * @return array
     */
    public function getColors(): array
    {
        return [
            'colors' => [
                'light' => ChartColors::lightColors(),
                'dark' => ChartColors::darkColors(),
            ],
            'text' => [
                'light' => ChartTextColors::lightColors(),
                'dark' => ChartTextColors::darkColors(),
            ],
        ];
    }

    /**
     * To Array
     * @return array
     */
    public function toArray(): array
    {
        $data = [
            'chart' => [
                'type' => $this->type,
                'height' => $this->height,
                'toolbar' => [
                    'show' => false
                ]
            ]
        ];

        empty($this->title) ? null : $data['title'] = [
            'text' => $this->title,
            'align' => 'left'
        ];

        count($this->seriesColor) ?
            $data['customColors'] = $this->seriesColor :
            null;

        return $data;
    }
}
