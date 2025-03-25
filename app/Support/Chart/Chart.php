<?php

namespace App\Support\Chart;

use App\Enums\ChartColors;

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

        return $data;
    }

    /**
     * Get colors from config
     * @return array
     */
    public function getColors(): array
    {
        return [
            'light' => ChartColors::lightColors(),
            'dark' => ChartColors::darkColors(),
        ];
    }
}
