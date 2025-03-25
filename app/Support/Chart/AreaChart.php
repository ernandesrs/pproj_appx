<?php

namespace App\Support\Chart;

use App\Traits\Chart\AreaLineTrait;

class AreaChart extends Chart
{
    use AreaLineTrait;

    /**
     * Type
     * @var string
     */
    protected string $type = 'area';

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
