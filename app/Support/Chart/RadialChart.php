<?php

namespace App\Support\Chart;

use App\Traits\Chart\PieDonutTrait;

class RadialChart extends Chart
{
    use PieDonutTrait;

    /**
     * Type
     * @var string
     */
    protected string $type = 'radialBar';

    /**
     * Total label
     * @var string
     */
    protected string $totalLabel = 'Total';

    /**
     * With Total
     * @var bool
     */
    protected bool $withTotal = false;

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
     * With Total
     * @param ?string $label
     * @return RadialChart
     */
    public function withTotal(?string $label = null): RadialChart
    {
        $label ? $this->totalLabel = $label : null;
        $this->withTotal = true;
        return $this;
    }
}
