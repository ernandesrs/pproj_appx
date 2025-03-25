<?php

namespace App\Support\Chart;

use App\Traits\Chart\PieDonutTrait;

class PieChart extends Chart
{
    use PieDonutTrait;

    /**
     * Type
     * @var string
     */
    protected string $type = 'pie';

    /**
     * Constructor
     * @param string|null $title
     * @param int|null $height
     */
    public function __construct(string|null $title = null, int|null $height = null)
    {
        parent::__construct($title, $height);
    }
}
