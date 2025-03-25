<?php

namespace App\Support\Chart\Traits;

trait AreaLineTrait
{
    public array $horizontalInfo = [];

    /**
     * Add Horizontal Info
     * @param array $labels
     * @param ?string $title
     */
    public function addHorizontalInfo(array $labels = [], ?string $title = null): static
    {
        $this->horizontalInfo = [
            'labels' => $labels,
            'title' => $title
        ];
        return $this;
    }

    /**
     * Add Vertical Info
     * @param int $min
     * @param int $max
     * @param ?string $title
     */
    public function addVerticalInfo(int $min, int $max, ?string $title = null): static
    {
        $this->verticalInfo = [
            'min' => $min,
            'max' => $max,
            'title' => $title
        ];
        return $this;
    }

    /**
     * Add Series
     * @param string $name
     * @param array $data
     * Example 1: [100, 20, ...]
     * Example 2: [[100, 10], [20, 35], ...]
     * Example 3: [['x' => 100, 'y' => 10], ['x' => 20, 'y' => 35], ...]
     * Example 4: [['x' => 'Apple', 'y' => 10], ['x' => 'Orange', 'y' => 35], ...]
     */
    public function addSeries(string $name, array $data): static
    {
        $this->series[] = [
            'name' => $name,
            'data' => $data
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

        $data['series'] = $this->series;

        // XAxis
        $data['xaxis']['type'] = 'category';
        empty($this->horizontalInfo['labels']) ?
            null :
            $data['xaxis']['categories'] = $this->horizontalInfo['labels'];
        empty($this->horizontalInfo['title']) ?
            null :
            $data['xaxis']['title'] = [
                'text' => $this->horizontalInfo['title']
            ];

        // YAxis
        empty($this->verticalInfo['min']) ?
            null :
            $data['yaxis'] = [
                'min' => $this->verticalInfo['min'],
                'max' => $this->verticalInfo['max'],
            ];
        empty($this->verticalInfo['title']) ?
            null :
            $data['yaxis']['title'] = [
                'text' => $this->verticalInfo['title']
            ];

        if (in_array($data['chart']['type'], ['line', 'area'])) {
            $data['stroke']['width'] = 2;
            $data['stroke']['curve'] = 'smooth';
        }

        if ($data['chart']['type'] == 'bar') {
            $data['stroke']['show'] = true;
            $data['stroke']['width'] = 2;
            $data['stroke']['colors'] = ['transparent'];
            $data['plotOptions']['bar'] = [
                'horizontal' => false,
                'columnWidth' => '55%',
                'borderRadius' => 4,
                'borderRadiusApplication' => 'end'
            ];
        }

        return $data;
    }
}
