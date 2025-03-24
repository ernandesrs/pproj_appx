<?php

namespace App\Support\Chart\Traits;

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

        return $data;
    }
}
