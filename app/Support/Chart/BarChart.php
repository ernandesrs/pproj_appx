<?php

namespace App\Support\Chart;

use App\Support\Chart\Traits\AreaLineTrait;

class BarChart extends Chart
{
    use AreaLineTrait;

    /**
     * Type
     * @var string
     */
    protected string $type = 'bar';

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
