<?php

namespace App\Support\Chart;

use App\Support\Chart\Traits\PieDonutTrait;

class DonutChart extends Chart
{
    use PieDonutTrait;

    /**
     * Type
     * @var string
     */
    protected string $type = 'donut';

    /**
     * Semi donut
     * @var bool
     */
    protected bool $semi = false;

    /**
     * Constructor
     * @param string|null $title
     * @param int|null $height
     */
    public function __construct(string|null $title = null, int|null $height = null)
    {
        parent::__construct($title, $height);
    }

    /**
     * Semi Donut
     * @return DonutChart
     */
    public function semiDonut(): DonutChart
    {
        $this->semi = true;
        return $this;
    }
}
