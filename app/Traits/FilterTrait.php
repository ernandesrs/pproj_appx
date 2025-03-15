<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;

trait FilterTrait
{
    public array $betweenDefaultFields = ['created_at'];

    /**
     * Search
     * @var string
     */
    #[Validate(['nullable', 'string']), Url(keep: false, except: null, nullable: true)]
    public ?string $search;

    /**
     * Between
     * @var array
     */
    public array $between = [];

    /**
     * Searchable Fields
     * @return void
     */
    abstract public function searchableFields(): array;

    /**
     * Search By
     * @return void
     */
    public function searchBy(): void
    {
    }

    /**
     * Apply Filters
     * @return void
     */
    public function applyFilters(): void
    {
    }

    /**
     * Apply Filter
     * @return Builder|Model
     */
    public function applyFilter(): Builder|Model
    {
        $query = $this->modelInstance();

        if (!empty($this->search)) {
            $query = $query
                ->whereRaw(
                    "MATCH(" . implode(', ', $this->searchableFields()) . ") AGAINST(? IN BOOLEAN MODE)",
                    $this->search
                );
        }

        $betweenValidate = $this->validate([
            'between.*.start' => ['nullable', 'date'],
            'between.*.end' => ['nullable', 'date'],
        ]);
        if (count($betweenValidate['between'] ?? [])) {
            foreach ($betweenValidate['between'] as $key => $values) {
                $query = $query->whereBetween($key, [$values['start'], $values['end']]);
            }
        }

        return $query;
    }
}
