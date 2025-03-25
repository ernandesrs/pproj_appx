<?php

namespace App\Traits\Chart;

trait PieDonutTrait
{
    /**
     * Add Serie
     * @param string $label
     * @param int|string $value
     */
    public function addSerie(string $label, int|string $value): static
    {
        $this->series[] = [
            'label' => $label,
            'value' => $value,
        ];
        return $this;
    }

    /**
     * To Array
     * @return array
     */
    public function toArray(): array
    {
        $data = parent::toArray();

        $labels = [];
        $series = [];
        array_map(function ($serie) use (&$series, &$labels) {
            $labels[] = $serie['label'];
            $series[] = $serie['value'];
        }, $this->series);

        $data['series'] = $series;
        $data['labels'] = $labels;

        if ($data['chart']['type'] == 'donut' && $this->semi) {
            $data['plotOptions']['pie'] = [
                'startAngle' => -90,
                'endAngle' => 90,
                'offsetY' => 10
            ];
        }

        if ($data['chart']['type'] == 'radialBar' && $this->withTotal) {
            $data['plotOptions']['radialBar']['dataLabels'] = [
                'total' => [
                    'show' => true,
                    'label' => $this->totalLabel
                ]
            ];
        } else {
            $data['stroke']['show'] = true;
            $data['stroke']['width'] = 0;
            $data['stroke']['colors'] = ['transparent'];
        }

        return $data;
    }
}
